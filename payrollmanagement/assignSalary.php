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

$eid = $acc =""; $basic = $bonus=$com=$grp=$hra=$vpay=$cell=$it=$med=$pf=$pt=0;
if(isset($_POST['eId'])){
    
  $eid=  $_POST['eId'];
  $acc=  $_POST['accNo'];
  $basic=  $_POST['basic'];
  $bonus=  $_POST['bonus'];
  $com=  $_POST['commutation'];
  $grp=  $_POST['grpallw'];
  $hra=  $_POST['hra'];
  $vpay=  $_POST['vpay'];
  $cell=  $_POST['cell'];
  $it=  $_POST['it'];
  $med=  $_POST['med'];
  $pf=  $_POST['pf'];
  $pt=  $_POST['pt'];
  
  $netpay = $basic + $bonus+$com+$grp+$hra+$vpay-$cell-$it-$med-$pf-$pt;
  
   $sql = "select * from salary where eid = '$eid'";
       $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            $sqlU = "update salary set accNo = '$acc',basic = '$basic',bonus = '$bonus',commutation = '$com',grpallw = '$grp',hra = '$hra',variablepay = '$vpay',cellphn = '$cell',medclaim = '$med',pf = '$pf',pt = '$pt',netpay = '$netpay' where eid = $eid;";
                            if ($conn->query($sqlU) === TRUE) {
    header("Location:manageEmployee.php");
}else{
       ?>
<script>
alert("ERROR assigning New Salary<?php echo mysqli_error($conn);?> ");
window.open("self");
</script>
       <?php
}
                            
}else{
  
  
      $sql = "INSERT INTO salary (eid,accNo,basic,bonus,commutation,grpallw,hra,variablepay,cellphn,it,medclaim,pf,pt,netpay)
VALUES ('$eid', '$acc','$basic','$bonus','$com','$grp', '$hra','$vpay','$cell','$it','$med', '$pf','$pt','$netpay')";
   
if ($conn->query($sql) === TRUE) {
   ?>
<script>
alert("Salary Successfully assigned with NetPay :: <?php echo $netpay;?>");
window.open("self");
</script>
       <?php
}else{
       ?>
<script>
alert("ERROR assigning salary<?php echo mysqli_error($conn);?> ");
window.open("self");
</script>
       <?php
}}
    
    
    
    
}

 $accNo=$basic=$bonus= $commutation =$grpallw= $hra= $variablepay=$cellphn = $it=$medclaim=$pf=$pt = $netpay = "";
$btn = "Assign Salary";
if(isset($_POST["ueid"])){
    $ueid = $_POST["ueid"];
   $btn = "Update Salary";
     $sql1="select * from salary where eid = '$ueid'"; 
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
                        $netpay = $row1['netpay'];}}
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
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    </head>
    <body style="background-image: url(images/bg1.jpg); background-repeat: no-repeat; background-size: cover; ">
        <?php
        // put your code here
        include 'navBar.php';
       
        ?>
        
        <div class="container" style="margin-top: 5%;">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Assign Salary </h2>
                        
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" novalidate="novalidate">
                        <div class="form-row">
                            <div class="form-group" style="margin-left: 40.5%; text-align: center;">
                                
                                
                                <div class="form-input">
                                    
                                    <?php
                                    if(isset($_POST["ueid"])){
                                        ?><h2 style="margin-left: -50%;"><strong>updating Salary for Employee with Id <?php echo $_POST["ueid"]; ?> </strong></h2>
                                        <input type="hidden"  name="eId" id="eIdd" value="<?php echo $_POST["ueid"]; ?>">
  
                                            
                                            <?php
                                    }else{
                                    
                                    ?>
                                    
                                    
                                    <label for="chequeno"><strong>Select Employee</strong></label>
                                     <select class="btn btn-block" style="width: 141%; padding: 10px;" name="eId" id="eIdd">
  
                                <?php
                                   
               
                             $sql="select * from employee "; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                        {
                                 ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name']?></option>
                                   <?php
                                 
                                 
                        }}
                                    }
                                ?>
                                
                                
 
</select>
                                </div>
                              
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">Bank Account No.</label>
                                    <input type="text" name="accNo" value="<?php echo $accNo;?>" class="valid" aria-invalid="false"><label id="first_name-error" class="error" for="first_name" style="display: none;"></label>
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Basic </label>
                                    <input type="text"  value="<?php echo $basic;?>" name="basic"class="error" aria-invalid="true"><label id="last_name-error" class="error" for="last_name"></label>
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">Bonus</label>
                                    <input type="text"   value="<?php echo $bonus;?>" name="bonus" id="company" class="error"><label id="company-error" class="error" for="company"></label>
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Commutation</label>
                                    <input type="text"  value="<?php echo $commutation;?>" name="commutation" id="email" class="error"><label id="email-error" class="error" for="email"></label>
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">GRPALLW</label>
                                    <input type="text"  value="<?php echo $grpallw;?>" name="grpallw" id="phone_number" class="error"><label id="phone_number-error" class="error" for="phone_number"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                
                                <div class="form-input">
                                    <label for="chequeno">HRA</label>
                                    <input type="text" value="<?php echo $hra;?>" name="hra" id="chequeno">
                                </div>
                                <div class="form-input">
                                    <label for="blank_name">Variable Pay</label>
                                    <input type="text"  value="<?php echo $variablepay;?>" name="vpay" id="blank_name">
                                </div>
                                <div class="form-input">
                                    <label for="payable">Cell PHN</label>
                                    <input type="text"  value="<?php echo $cellphn;?>" name="cell" id="payable">
                                </div>
                                <div class="form-input">
                                    <label for="payable">IT</label>
                                    <input type="text" value="<?php echo $it;?>" name="it" id="payable">
                                </div>
                                <div class="form-input">
                                    <label for="payable">MEDClaim</label>
                                    <input type="text"  value="<?php echo $medclaim;?>" name="med" id="payable">
                                </div>
                                
                                <div class="form-input" style="margin-top: 10px;">
                                    <label for="payable">PF</label>
                                    <input type="text"  value="<?php echo $pf;?>" name="pf" id="payable">
                                </div>
                                <div class="form-input" style="padding: 15px; margin-top: 5%;">
                                   
                                    <button type="submit" class="btn btn-success"><?php echo $btn;?></button>
                                </div>
                                <div class="form-input" style="margin-top: 10px;">
                                    <label for="payable">PT</label>
                                    <input type="text"  value="<?php echo $pt;?>" name="pt" id="payable">
                                </div>
                                
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
        
        
        
       
        
        
    </body>
</html>


