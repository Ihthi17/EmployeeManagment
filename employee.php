<?php
include'connect.php';
if(isset($_POST["insert"]))
{
    $f_name =$_POST['f_name'];
    $l_name =$_POST['l_name'];
    $mail =$_POST['mail'];
    $mobile =$_POST['mobile'];
    $occupation =$_POST['occupation'];
    $salary =$_POST['salary'];

    $sql="INSERT INTO details(F_Name,L_Name,Mail,Mobile,Occupation,Salary)VALUES('$f_name','$l_name',' $mail',' $mobile','$occupation','$salary')";
    if($con->query($sql)==TRUE)
   {

   }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Managment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="emp.css">
</head>
<body>
    <div class="container-fluid">
        <div class="Head">
            Employee Managment System!.....
</div>
<div>
   
<div class="container">
  <div class="row">
    <div class="col-lg-6">
     <!--form start-->
     <div class="fom">
<form action="employee.php" method="POST">
<table class="table">
    <tr>
        <td>
            <label>First Name:</label>
</td>
<td>
    <input type="text" name="f_name" required autocomplete="off">
</td>
</tr>

<tr>
        <td>
            <label>Last Name:</label>
</td>
<td>
    <input type="text" name="l_name" required autocomplete="off">
</td>
</tr>

<tr>
        <td>
            <label>Mail:</label>
</td>
<td>
    <input type="mail" name="mail" required autocomplete="off">
</td>
</tr>

<tr>
        <td>
            <label>Mobile:</label>
</td>
<td>
    <input type="tel" name="mobile" required autocomplete="off">
</td>
</tr>

<tr>
        <td>
            <label>Occupation:</label>
</td>
<td>
<select class="form-select"name="occupation"required aria-label="Default select example">
  <option value="Developer">Developer</option>
  <option value="Software-Engineer">Software-Engineer</option>
  <option value="Business-Analysis">Business-Analysis</option>
  <option value="Technical-Lead">Technical-Lead</option>
  <option value="Accountant">Accountant</option>
  <option value="Web-Designer">Web-Designer</option>
  <option value="Intern">Intern</option>
  <option value="Database-Designer">Database-Designer</option>
  <option value="Data-Analysis">Data-Analysis</option>
  <option value="Graphics-Designer">Graphics-Designer</option>
</select>
</td>
</tr>

<tr>
        <td>
            <label>Salary:</label>
</td>
<td>
    <input type="number" name="salary" required autocomplete="off">
</td>
</tr>
<tr>
    <td>

    </td>
    <td>
    <input type="submit" name="insert" value="Add" class="btn btn-success">
<input type="reset" value="Cencel" class="btn btn-danger">
    </td>
</tr>
</div>
</form>

<br>
<br>

     <!--form end-->
    
    
    



    </div>
    
    <div class="col-lg-6">
        <?php
        $sql="SELECT * FROM details";
        $result=$con->query($sql);
        if($result->num_rows>0)
        {
            
           
            
           ?>
        
    
    <br>
    <br>
    <table border="1" class="table">
  
  <tr>
    <td>#</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Mail</td>
    <td>Mobile</td>
    <td>Occupation</td>
    <td>Salary</td>
    <td>Update</td>
    <td>Delete</td>
   
  </tr>
  <?php 
  $count = 1;
            while($row = mysqli_fetch_array($result)) {
                $id=$row['id'];
                ?>
    <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $row["F_Name"]; ?></td>
    <td><?php echo $row["L_Name"]; ?></td>
    <td><?php echo $row["Mail"]; ?></td>
    <td><?php echo $row["Mobile"]; ?></td>
    <td><?php echo $row["Occupation"]; ?></td>
    <td><?php echo $row["Salary"]; ?></td>
    <td><button class="btn btn-primary"><a href="update.php?id=<?php echo $row['id'];?>"class="text-light">Update</a></button></td>
    <td><button class="btn btn-danger"><a href="delete.php?id=<?php echo $id;?>"onclick="return confirm('Are you sure?')"class="text-light">Delete</a></button></td>
</tr>
<?php

}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>


    </div>
    
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>