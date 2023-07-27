<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP BOOTSTRAP MODEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <label for="completename">Name</label>
            <input type="text" class="form-control" id="completename"  placeholder="Enter name">
            </div>

            <div class="form-group">
            <label for="completeemail">Email</label>
            <input type="email" class="form-control" id="completeemail"  placeholder="Enter email">
            </div>

            <div class="form-group">
            <label for="completemobile">Mobile</label>
            <input type="text" class="form-control" id="completemobile"  placeholder="Enter mobile">
            </div>

            <div class="form-group">
            <label for="completeplace">Place</label>
            <input type="text" class="form-control" id="completeplace"  placeholder="Enter place">
            </div>
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="adduser()">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="text" value="1">

         </div>
        </div>
    </div>
    </div>
    <!--update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <label for="updatename">Name</label>
            <input type="text" class="form-control" id="updatename"  placeholder="Enter name">
            </div>

            <div class="form-group">
            <label for="updateemail">Email</label>
            <input type="email" class="form-control" id="updateemail"  placeholder="Enter email">
            </div>

            <div class="form-group">
            <label for="updatemobile">Mobile</label>
            <input type="text" class="form-control" id="updatemobile"  placeholder="Enter mobile">
            </div>

            <div class="form-group">
            <label for="updateplace">Place</label>
            <input type="text" class="form-control" id="updateplace"  placeholder="Enter place">
            </div>
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="updateDetails()">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="hidden"id="hiddendata" >
         </div>
        </div>
    </div>
    </div>

    <div class="container my-3">
       <h1 text class="center">MOBILE OFFICE DB</h1>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completeModal">
       Add Users
       </button>
       <div id="displayDataTable"></div>
    </div>

    <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"--></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

$(document).ready(function(){
    displayData();
});
//displayData();
function displayData(){
    var displayData="true";
    $.ajax({
        url:"display.php",
        type:"post",
        data:{
            displaySend:displayData
        },
        success:function(data,status){
           $("#displayDataTable").html(data);
        }
    }); 
}

function adduser(){
    var nameAdd=$("#completename").val();
    var emailAdd=$("#completeemail").val();
    var mobileAdd=$("#completemobile").val();
    var placeAdd=$("#completeplace").val();
        
    $.ajax({
        url:"insert.php",
        type:'post',
        data:{
            nameSend:nameAdd,
            emailSend:emailAdd,
            mobileSend:mobileAdd,
            placeSend:placeAdd
        },
        success:function(data,status){
           //function to display data;
            //console.log(status);
            $("#completeModal").modal("hide");

            displayData();
        }
    });
}
function deleteuser(deleteid){
  $.ajax({
    url:"delete.php",
    type:"post",
    data:{
        deletesend:deleteid
    },
    success:function(data, status){
        displayData();
    }
  });
}
function GetDetails(updateid){

    $("#hiddendata").val(updateid);
    $.post("update.php",{updateid:updateid},function(data, status){
        var userid=JSON.parse(data);
        $('#updatename').val(userid.name);
        $('#updateemail').val(userid.email);
        $('#updatemobile').val(userid.mobile);
        $('#updateplace').val(userid.place);

    });

    $('#updateModal').modal("show");
}
//onclick update values
function updateDetails(){
    var updatename = $('#updatename').val();
    var updateemail = $('#updateemail').val();
    var updatemobile = $('#updatemobile').val();
    var updateplace = $('#updateplace').val();
    var hiddendata=$('#hiddendata').val();
    
    $.post("update.php",{
        updatename:updatename,
        updateemail:updateemail,
        updatemobile:updatemobile,
        updateplace:updateplace,
        hiddendata:hiddendata
    },function(data,status){
        $("#updateModal"). modal("hide");
        displayData();

    });

}
    </script>

</body>
</html>