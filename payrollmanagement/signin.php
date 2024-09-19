<?php


include 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
  if(!isset($_POST['email']) || !isset($_POST['password'])){
     $output = 'Please enter credentials!';
   
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{ //email validation
    $output = 'Please enter a valid email!';
    
}
																																		 
if($conn->connect_error){
        $output = 'Error connecting';
    
    }
    
    
    $sqlU = "select * from hr where email = '$email' and password = '$password';";
     $sqlB = "select * from accountant where email = '$email' and password = '$password';";
     $sqle = "select * from employee where email = '$email' and password = '$password';";
     
     
     
$resultU = $conn->query($sqlU);
if ($resultU->num_rows > 0) {
    // output data of each row
     if($rowE = $resultU->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["hid"]= $rowE["id"];
    $_SESSION["login_hr"]= $rowE["name"];
 header('Location: manageEmployee.php');
     
    

}}



    $resultB = $conn->query($sqlB);
    
if ($resultB->num_rows > 0) {
    // output data of each row
     if($rowS = $resultB->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["aid"]= $rowS["id"];
    $_SESSION["login_acc"]= $rowS["name"];

     
header('Location: viewAllEmployees.php');

}}else{
    $output = "Invalid Credentials";
}

    $resultE = $conn->query($sqle);
    
if ($resultE->num_rows > 0) {
    // output data of each row
     if($rowE = $resultE->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["eid"]= $rowE["id"];
    $_SESSION["login_emp"]= $rowE["name"];

     
header('Location: mySalary.php');

}}else{
    $output = "Invalid Credentials";
}
    ?>
        <html>
    <head>
        <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background: url(images/bg.jpg);height: 100vh;">
        <div style="">
        
        </div>
        
        <!-- Trigger the modal with a button -->
<button id="modalBtn" type="button" style="display:none" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background-image: linear-gradient(to right, #fff,#1f1f1f); box-shadow: 0px 0px 15px #fff; ">
      <div class="modal-header">
        
      <h3><?php echo $output;?></h3>
     <br>
     <a href="index.php">try Again</a>
    </div>
    </div>
</div>
    
    <script>
     $('#modalBtn').trigger("click");
    </script>
    </body>
</html>
        
        <?php
   
}else{
    header("Location:index.php");
}

    
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

