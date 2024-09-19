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
        
         <div class="" style="margin-top:5%; width: 100%; background-color: rgba(225,225,225,0.6);">
        <h1> My Salary Details</h1>
     <?php 
                      $id = $_SESSION["eid"];
              
                             $sql1="select * from salary where eid = '$id'"; 
                                 $appresult1 = $conn->query($sql1);
                        if ($appresult1->num_rows > 0) {
                            // output data of each row
                             while($row1 = $appresult1->fetch_assoc()) 
                                 {
                                 
                                $accNo=$row1['accNo'];
                                $basic=$row1['basic'];
                                $bonus=$row1['bonus'];
                                
                                $commutation = $row1['commutation'];

                                   $grpallw=$row1['grpallw'];
                                $hra=$row1['hra'];
                                $variablepay=$row1['variablepay'];
                                
                                $cellphn = $row1['cellphn'];
                                $it=$row1['it'];
                                $medclaim=$row1['medclaim'];
                                $pf=$row1['pf'];
                                
                                $pt = $row1['pt'];
                                $netpay = $row1['netpay'];
                                
                                 
                                    
                            
                                 
                                
                                 }}  
                              ?>
        <div class="container-fluid row" style=" text-align: center;">
            <div class="col-md-6">
                <h2><strong>Salary</strong></h2>
               <h3>Ac/No ::  <?php echo $accNo;?>   </h3> 
			  <h3>Basic ::   <?php echo $basic;?>  </h3> 
			  <h3>Bonus ::  <?php echo $bonus;?>  </h3> 
			  <h3>Commutation ::  <?php echo $commutation;?>  </h3> 
                          <h3>GRPALLW ::  <?php echo $grpallw;?>  </h3> 
			  <h3>HRA ::  <?php echo $hra;?>  </h3> 
                          <h3>Variable Pay ::  <?php echo $variablepay;?>  </h3> 
            </div>
            <div class="col-md-6">
                <h2><strong>Deductions</strong></h2>
                <h3>CellPhn ::  <?php echo $cellphn;?>  </h3> 
                          <h3>IT ::  <?php echo $it;?>  </h3> 
			  <h3>Medclaim ::  <?php echo $medclaim;?>  </h3> 
                          <h3>PF ::  <?php echo $pf;?>  </h3> 
			  <h3>PT ::  <?php echo $pt;?>  </h3> 
                          
            </div>
            
        </div> 
			  
		 <h1>NetPay :: <?php echo $netpay;?>  </h1> 
	
               
	
        
    </div>
        
        
    </body>
</html>


