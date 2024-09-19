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
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["amount"])){
       
         
    $amount ="";
    $sql1="select * from funds where id = (SELECT max(id) from funds)";
    $res1 = mysqli_query($conn,$sql1);
    while($row1 = mysqli_fetch_row($res1)){
        $amount = $row1['amount'];
    } 

     $quantity = $_POST["amount"];
     $amount = $amount+$quantity;
 $sqlU = "INSERT INTO `funds`(`amount`,`date`) values ( '$amount', current_timestamp())";

  if ($conn->query($sqlU) === TRUE) {
    header("Location:manageFunds.php");
    }
    
    else{
        ?>
<script> alert("error Adding funds"); window.open("self");</script>
            <?php
    }
}}

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
        
        <div class="container-fluid" style="margin-top:5%; ">
            
            <div class="row" style="width:100%;"> 
                <div class="col-md-6">
                    <div class="container-fluid" style="margin-top: 10%;">
        <div class="row justify-content-center">
            
            <div class="media-container-column col-lg-8" data-form-type="formoid" style=" color:#fff;">
                    <div data-form-alert="" hidden="">
                       
                    </div>
            <h2 style="color:black;">Add Funds</h2>
            <form class="mbr-form" action="manageFunds.php" method="post" >
                <div class="form-group" >
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Amount To Add</label>
                            <input type="text" class="form-control" name="amount"  >
                        </div>
                        
                        
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">Add Funds</button>
                        </span>
                    </form>
            </div>
        </div>
    </div>
                </div>
                <div class="col-md-6">
                    <div class="" style="margin-top:5%; width: 100%; background-color: rgba(225,225,225,0.6); color:black;">
        <h3 style="font-size:45px"><strong> Funds</strong> </h3>
               <?php 
                        include 'connect.php';
             
                             $sql="select sum(amount) from funds "; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $funds = $row['sum(amount)'];
                        }}
                            $sql_t="select sum(payamount) from transaction "; 
                                 $appresult_t = $conn->query($sql_t);
                        if ($appresult_t->num_rows > 0) {
                            // output data of each row
                             while($row_t = $appresult_t->fetch_assoc()) 
                                 {
                                 $subsal = $row_t['sum(payamount)'];
                        }}
                             
                               $funds -= $subsal;
                                ?>
        <h1><strong>INR <?php echo $funds;?> /-</strong></h1>    
        </div>
                </div>
            </div>
        </div>
        
        <table class="table "  style="color:black;">
	<thead>
		<tr>
			<th><h4>Funds</h4></th>
			<th><h4>Date Time</h4></th>
			
		</tr>
	</thead>
	<tbody>
               <?php 
                      
              
                             $sql="select * from funds"; 
                                $res=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_array($res))
                                {

                            

                                ?>
                                <tr>
                                    <td><?php echo $row["amount"];?></td>
                                    <td><?php echo $row["date"];?></td>
                                    
                                    
                                    
                                    
                                </tr>
                                <?php
                                 }
                              ?>
	</tbody>
</table>  
       
        
        
    </body>
</html>