<?php
  include 'connect.php';

  if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SI</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Place</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';

    $sql="select * from crud";
    $result= mysqli_query($con,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile =$row['mobile'];
        $place=$row['place'];

        $table.='<tr>
        <th scope="row">'.$number.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$place.'</td>
        <td>
        <button class="btn btn-dark" Onclick="GetDetails('.$id.')">Update</button>
        <button class="btn btn-danger" Onclick="deleteuser('.$id.')">Delete</button>
        </td>
      </tr>';
      $number++;
    }
    $table.='</table>';
    echo $table;
  }
?>
