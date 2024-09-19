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
  if(isset($_POST['eid'])){
    
    include 'connect.php';
    $empId = $_POST['eid'];
    
    $sql = "delete from employee where id = '$empId'";
    
    if ($conn->query($sql) === TRUE) {
        $sql = "delete from salary where eid = '$empId'";
    
    if ($conn->query($sql) === TRUE) {
    header("Location:manageEmployee.php");
}else{
        echo 'error deleting staff';
    }
    
}else{
        echo 'error deleting staff';
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
        <table class="table " >
	<thead>
		<tr>
			<th><h4>ID</h4></th>
			<th><h4>name</h4></th>
			<th><h4>Email</h4></th>
			<th><h4>Mobile</h4></th>
                        <th><h4>Address</h4></th>
			<th><h4>Remove</h4></th>
                        <th><h4>update Salary</h4></th>
                        <th><h4>Salary Details</h4></th>
                        
		</tr>
	</thead>
	<tbody>
               <?php 
			   $sql="call employee1()";
                      
              
                             $sql="select * from Employee"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $id = $row['id'];
                                $email=$row['email'];
                                $name=$row['name'];
                                $address=$row['address'];
                                
                                $mobile = $row['mobile'];

                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $mobile;?></td>
                                    <td><?php echo $address;?></td>
                                    <td><form method="post" action="manageEmployee.php">
                                        
                                                    <input type="hidden" value="<?php echo $id;?>" name="eid">
                                                    <button type="submit" class="btn btn-danger" ><span class="fa fa-trash" ></span></button>
                                        </form></td>
                                        <td><form method="post" action="assignSalary.php">
                                        
                                                    <input type="hidden" value="<?php echo $id;?>" name="ueid">
                                                    <button type="submit" class="btn btn-danger" ><span class="fa fa-edit" ></span></button>
                                        </form></td>
                                        <td>
                                            <table class="table table-condensed "  >
	<thead>
		<tr>
			<th><h4>Ac/No</h4></th>
			<th><h4>Basic</h4></th>
			<th><h4>Bonus</h4></th>
			<th><h4>Commutation</h4></th>
                        <th><h4>GRPALLW</h4></th>
			<th><h4>HRA</h4></th>
                        <th><h4>Variable Pay</h4></th>
			<th><h4>CellPhn</h4></th>
                        <th><h4>IT</h4></th>
			<th><h4>Medclaim</h4></th>
                        <th><h4>PF</h4></th>
			<th><h4>PT</h4></th>
                        <th><h4>NetPay</h4></th>
		</tr>
	</thead>
	<tbody>
               <?php 
                      
              
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
                                ?>
                                <tr>
                                    <td><?php echo $accNo;?></td>
                                    <td><?php echo $basic;?></td>
                                    <td><?php echo $bonus;?></td>
                                    <td><?php echo $commutation;?></td>
                                    <td><?php echo $grpallw;?></td>
                                    <td><?php echo $hra;?></td>
                                    <td><?php echo $variablepay;?></td>
                                    <td><?php echo $cellphn;?></td>
                                    <td><?php echo $it;?></td>
                                    <td><?php echo $medclaim;?></td>
                                     <td><?php echo $pf;?></td>
                                    <td><?php echo $pt;?></td>
                                    <td><?php echo $netpay;?></td>
                                    
                                    
                                </tr>
                                <?php
                                 }}  
                              ?>
	</tbody>
</table>
                                        </td>
                                    
                                </tr>
                                <?php
                                 }}  
                              ?>
	</tbody>
</table>
        </div>
        
        
        
       
        
        
    </body>
</html>


