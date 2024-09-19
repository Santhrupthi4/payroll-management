<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include 'connect.php';
session_start();
if(!isset($_SESSION["login_acc"])){
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
        
      <div class="" style="margin-top:5%; width: 100%; background-color: rgba(225,225,225,0.6);">
        <h1> Employees</h1>

<br>
<div style= "margin:20px">
<form action="" method="post">
                         <label for="employees" >Employees</label> 
                         <div class="select">
                            <select name="employee" id="employee" >
                            <option></option>
                            <?php  
                           
                            $sql_emp = "SELECT * from `employee`";
                            $res_emp = mysqli_query ($conn, $sql_emp);
                            while($row_emp = mysqli_fetch_array($res_emp)){
                              echo "<option>"; echo $row_emp['email']; echo "</option>";
                            }
                            
                            ?>
                         </select>
                        
                         <button type="submit" name="submit" class="btn btn-primary">GO</button>
                    </div>
                        </form>
        <?php 
         if(isset($_POST['submit'])){ 
            $emailid = isset($_POST['employee']) ? $_POST['employee'] : '';
            $sql_sp = "CALL `employee1`('$emailid')";
            if($res_sp = mysqli_query($conn,$sql_sp)) {
              while($row_sp = mysqli_fetch_row($res_sp)){
                   echo "<table class='table' >
                <thead>
                    <tr>
                        <th><h4><strong>ID</strong></h4></th>
                        <th><h4><strong>Name</strong></h4></th>
                        <th><h4><strong>Email</strong></h4></th>
                        <th><h4><strong>Mobile</strong></h4></th>
                                    <th><h4><strong>Address</strong></h4></th>
                        <th><h4><strong>Ac/No</strong></h4></th>
                        <th><h4><strong>Basic</strong></h4></th>
			<th><h4><strong>Bonus</strong></h4></th>
			<th><h4><strong>Commutation</strong></h4></th>
                        <th><h4><strong>GRPALLW</strong></h4></th>
			<th><h4><strong>HRA</strong></h4></th>
                        <th><h4><strong>Variable Pay</strong></h4></th>
			<th><h4><strong>CellPhn</strong></h4></th>
                        <th><h4><strong>IT</strong></h4></th>
			<th><h4><strong>Medclaim</strong></h4></th>
                        <th><h4><strong>PF</strong></h4></th>
			<th><h4><strong>PT</strong></h4></th>
                        <th><h4><strong>NetPay</strong></h4></th>
                    </tr>
                </thead>";

                echo "<tr>";
                    echo "<td> "; echo $row_sp["0"]; echo"</td>";
                      echo "<td> "; echo $row_sp["1"]; echo"</td>";
                      echo "<td> "; echo $row_sp["2"]; echo"</td>";
                      echo "<td> "; echo $row_sp["4"]; echo"</td>";
                      echo "<td> "; echo $row_sp["5"]; echo"</td>";
                      echo "<td> "; echo $row_sp["8"]; echo"</td>";
                      echo "<td> "; echo $row_sp["9"]; echo"</td>";
                      echo "<td> "; echo $row_sp["10"]; echo"</td>";
                      echo "<td> "; echo $row_sp["11"]; echo"</td>";
                      echo "<td> "; echo $row_sp["12"]; echo"</td>";
                      echo "<td> "; echo $row_sp["13"]; echo"</td>";
                      echo "<td> "; echo $row_sp["14"]; echo"</td>";
                      echo "<td> "; echo $row_sp["15"]; echo"</td>";
                      echo "<td> "; echo $row_sp["16"]; echo"</td>";
                      echo "<td> "; echo $row_sp["17"]; echo"</td>";
                      echo "<td> "; echo $row_sp["18"]; echo"</td>";
                      echo "<td> "; echo $row_sp["19"]; echo"</td>";
                      echo "<td> "; echo $row_sp["20"]; echo"</td>";
                      while(mysqli_next_result($conn));
              }
              
             
          }
          
        }
        ?>
         </div>
        </div>
          
       
        
       
        
        
    </body>
</html>