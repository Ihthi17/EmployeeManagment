<?php
include'connect.php';
$id=$_GET['id'];
$sql="delete from details where id=$id";
if(mysqli_query($con,$sql)){
    
    header('location:employee.php');
}
else{
    echo mysqli_error($con);
}

?>