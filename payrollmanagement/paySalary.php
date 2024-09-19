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
    
    if(isset($_POST["eId"])){
         
        
        
     
     $eId = $_POST["eId"];
//    $netpay = $_POST["netpay"];
    $accountant = $_SESSION["login_acc"];
    $csql = "select * from funds where amount>=(select netpay from salary where eid = '$eId');";
      $appresult1 = $conn->query($csql);
                        if ($appresult1->num_rows > 0) {
         
          $sql ="INSERT INTO transaction (accountant,employee,payamount)
VALUES ('$accountant', '$eId',(select netpay from salary where eid = '$eId'))";
    echo $sql ;
    if($conn->query($sql)){
        echo 'success';
         $sql ="update funds set amount = amount-(select netpay from salary where eid = '$eId') where id = 1";

    
    if($conn->query($sql)){
        echo 'success';
        
    }else{
       echo("Error In Updating Funds: " . mysqli_error($conn));
    }
    }else{
       echo("Error in Saving Transaction: " . mysqli_error($conn));
    }
     }else{
         ?>
<script> alert("Not enough FUNDS");
    window.open("self");
</script>
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
         <div class="container" style="margin-top: 5%;">
             
             <div class="container-fluid row">
                 
                 <div class="col-md-6">
                        <div class="signup-content">
                <div class="signup-img">
                    <img src="images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Pay Salary</h2>
                        
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" novalidate="novalidate">
                        <div class="form-row">
                            <div class="form-group" style="text-align: center;">
                                
                                
                                <div class="form-input">
                                    <label for="chequeno"><strong>Select Employee</strong></label>
                                     <select class="btn btn-block" style="width: 141%; padding: 10px;" name="eId" id="eId">
  
                                <?php
                                   
               
                             $sql="select * from employee "; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                        {
                                 $eid = $row['id'];
                                 $sql1="select netpay from salary where eid = '$eid'"; 
                                 $appresult1 = $conn->query($sql1);
                        if ($appresult1->num_rows > 0) {
                            // output data of each row
                             while($row1 = $appresult1->fetch_assoc()) 
                                 {
                                $netpay=$row1['netpay'];
                        }}
                                 ?>
                                <option value="<?php echo $eid;?>">ID :: <?php echo $row['id']?> Name :: <?php echo $row['name']?>   --- NetPay ::: <?php echo $netpay;?></option>
                                
 <?php
                                 
                                 
    }}
                          
                                ?>
                                
                                
 
</select>
                                </div>
                              
                            </div>
                            
                            <div class="form-group">
                                
                                
                            
                                <div class="form-input" style="padding: 15px; margin-top: 5%;">
                                   
                                    <button type="submit" class="btn btn-success">Pay Salary</button>
                                </div>
                               
                                
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
                 </div>
                 <div class="col-md-6">
                   
                     <table class="table "  style="color: #fff;">
	<thead>
		<tr>
			<th><h4>ID</h4></th>
			<th><h4>Accountant</h4></th>
			<th><h4>Employee Id</h4></th>
			<th><h4>paydate</h4></th>
                        <th><h4>payAmount</h4></th>
			
		</tr>
	</thead>
	<tbody>
               <?php 
                      
              
                             $sql="select * from transaction"; 
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
             </div>
         
             
             
             
        </div>
        
        
        
        
       
        
        
    </body>
</html>


