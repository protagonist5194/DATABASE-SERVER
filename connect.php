<?php
  $con=mysqli_connect("localhost","root","","bootstrapcrud");

  if(!$con){
    die(mysqli_error($con));
  }
?>