<?php
include'connect.php';
if (isset($_GET['id'])) {
$id=$_GET['id'];
$sql="SELECT * FROM details where id=$id";
$result=$con->query($sql);
if($result->num_rows>0){
        

while($row = mysqli_fetch_array($result)) {
$f_name=$row["F_Name"];
$l_name=$row["L_Name"];
$mail=$row["Mail"];
$mobile=$row["Mobile"];
$occupation=$row["Occupation"];
$salary=$row["Salary"];


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
     <!--form start-->
     <div class="fom">
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>">
<table class="table">
    <tr>
        <td>
            <label>First Name:</label>
</td>
<td>
    <input type="text" name="f_name" required value="<?php echo $f_name;?>">
</td>
</tr>

<tr>
        <td>
            <label>Last Name:</label>
</td>
<td>
    <input type="text" name="l_name" required value="<?php echo $l_name;?>">
</td>
</tr>

<tr>
        <td>
            <label>Mail:</label>
</td>
<td>
    <input type="mail" name="mail" required value="<?php echo $mail;?>">
</td>
</tr>

<tr>
        <td>
            <label>Mobile:</label>
</td>
<td>
    <input type="tel" name="mobile" required value="<?php echo $mobile;?>">
</td>
</tr>

<tr>
        <td>
            <label>Occupation:</label>
</td>
<td>
<select class="form-select"name="occupation"required aria-label="Default select example" value="<?php echo $occupation;?>"> 
  <option value="  Developer">Developer</option>
  <option value="  Software-Engineer">Software-Engineer</option>
  <option value="  Business-Analysis">Business-Analysis</option>
  <option value=" Technical-Lead">Technical-Lead</option>
  <option value=" Accountant">Accountant</option>
  <option value=" Web-Designer">Web-Designer</option>
  <option value=" Intern">Intern</option>
  <option value=" Database-Designer">Database-Designer</option>
  <option value="Data-Analysis">Data-Analysis</option>
  <option value=" Graphics-Designer">Graphics-Designer</option>
</select>
</td>
</tr>

<tr>
        <td>
            <label>Salary:</label>
</td>
<td>
    <input type="number" name="salary" required value="<?php echo $salary;?>">
</td>
</tr>
<tr>
    <td>

    </td>
    <td>
    <input type="submit" name="update" value="UPDATE" class="btn btn-success">

    </td>
</tr>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php

} else{ 

   echo "Recode Updated Successfully";

} 

}

?> 
<?php
if(isset($_POST["update"])){
    $id=$_POST["id"]; // is not coming
    $f_name=$_POST["f_name"];
    $l_name=$_POST["l_name"];
    $mail=$_POST["mail"];
    $mobile=$_POST["mobile"];
    $occupation=$_POST["occupation"];
    $salary=$_POST["salary"];
    $sql="UPDATE details set F_Name='$f_name',L_Name='$l_name',Mail='$mail',Mobile='$mobile',Occupation='$occupation',Salary=$salary where id=$id";
    if(mysqli_query($con,$sql)){
        header("Location: employee.php");

    }
        else
        {
            echo mysqli_error($con);
        }
    }




?>