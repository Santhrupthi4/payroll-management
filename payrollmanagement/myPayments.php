<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

include 'connect.php';
session_start();
if(!isset($_SESSION["login_emp"])){
    header('Location:index.php');
}?>
<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title>Salary Management</title>
	<meta name="author"	content="Audenberg Technologies (www.audenberg.com)" />
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    </head>
    <body style="background-image: url(images/bg1.jpg); background-repeat: no-repeat; background-size: cover;">
        <?php
        // put your code here
        include 'navBar.php';
     
        ?>
        <div class="container" style="margin-top: 5%;">
            
        
        <table class="table "  style="color: #fff;">
	<thead>
		<tr>
			<th><h4>Transaction ID</h4></th>
			<th><h4>Accountant</h4></th>
			<th><h4>My EmployeeId</h4></th>
			<th><h4>Recieved On</h4></th>
                        <th><h4>payAmount</h4></th>
			
		</tr>
	</thead>
	<tbody>
               <?php 
                      
              $eId =$_SESSION["eid"];
                             $sql="select * from transaction where employee = '$eId'"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $id = $row['id'];
                                $accountant=$row['accountant'];
                                $employee=$row['employee'];
                                $paydate=$row['paydate'];
                                
                                $payamount = $row['payamount'];

                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $accountant;?></td>
                                    <td><?php echo $employee;?></td>
                                    <td><?php echo $paydate;?></td>
                                    <td>INR <?php echo $payamount;?> /-</td>
                                    
                                    
                                    
                                </tr>
                                <?php
                                 }}  
                              ?>
	</tbody>
</table>  
      </div>  
        
        
        
    </body>
</html>


