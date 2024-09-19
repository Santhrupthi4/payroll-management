<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

include 'connect.php';
session_start();
if(!isset($_SESSION["login_hr"])){
    header('Location:index.php');
}

$name =$email= $mobile=$address="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["ename"])){
       
         
        
            $name = $_POST["ename"];
     $email = $_POST["eemail"];
   
     $address = $_POST["eadd"];
      $pass = $_POST["epass"];
      $mobile = $_POST["emob"];
    $sql = "INSERT INTO employee (name,email,password,mobile,address)
VALUES ('$name', '$email','$pass','$mobile','$address')";
   
if ($conn->query($sql) === TRUE) {
   ?>
<script>
alert("Employee registered Successfully");
window.open("self");
</script>
       <?php
}else{
       ?>
<script>
alert("ERROR Registering Employee ");
window.open("self");
</script>
       <?php
}
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title>Salary Management</title>
	<meta name="author"	content="Audenberg Technologies (www.audenberg.com)" />

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    </head>
    <body style="background-image: url(images/bg1.jpg); background-repeat: no-repeat; background-size: cover;">
        <?php
        // put your code here
        include 'navBar.php';
       
        ?>
        <div class="container" style="margin-top: 5%;">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Add Employee</h2>
                        <form method="POST" class="register-form" id="register-form" action="addEmployee.php">
                            <div class="form-group">
                                <label for="name"><i class="fa fa-user"></i></label>
                                <input type="text" name="ename" id="name" placeholder="Name of the Employee" pattern="[A-Za-z]{1,}" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i></label>
                                <input type="email" name="eemail" id="email" placeholder="Employee's Email" pattern=".+@gmail\.com" required>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-lock"></i></label>
                                <input type="password" name="epass" id="pass" placeholder="Password">
                            </div>
                             <div class="form-group">
                                <label for="name"><i class="fa fa-mobile"></i></label>
                                <input type="text" name="emob" id="emob" placeholder="Employee's contact" pattern="[0-9]{10}" >
                            </div>
                             <div class="form-group">
                                <label for="name"><i class="fa fa-map-marked-alt"></i></label>
                                <input type="text" name="eadd" id="eadd" placeholder="Employee's Address">
                            </div>
                           
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register">
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        
                    </div>
                </div>
            </div>
        
       
        
        
    </body>
</html>


