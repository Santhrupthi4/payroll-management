
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" style="box-shadow: 0px 3px 4px rgba(0, 0, 0, .6); ">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#" style="">Payroll Management</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
     
    
    <ul class="nav navbar-nav navbar-right ">
        <li><a href="index.php">HOME</a></li>
      
        	<?php 
                
               if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
                if(isset($_SESSION['login_emp']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
                    $myusername = $_SESSION['login_emp'];
   echo ' <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="mySalary.php">Salary Details</a></li>
             <li><a href="myPayments.php">Payments</a></li>
            
             <li><a href="logout.php">Logout</a></li>
       
          </ul>
        </li>';
 }
 elseif(isset($_SESSION["login_hr"]))   // Checking whether the employer session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
                    $myusername = $_SESSION["login_hr"];
   echo ' <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="manageEmployee.php">Manage Employee</a></li>
             <li><a href="addEmployee.php">Add Employee</a></li>
              <li><a href="assignSalary.php">Assign Salary</a></li>
              <li><a href="logout.php">Logout</a></li>
       
          </ul>
        </li>';
 }
 elseif(isset($_SESSION["login_acc"]))   // Checking whether the employer session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
                    $myusername = $_SESSION["login_acc"];
   echo ' <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="viewAllEmployees.php">View Employees</a></li>
             <li><a href="manageFunds.php">Funds</a></li>
              <li><a href="paySalary.php">Payments</a></li>
               <li><a href="logout.php">Logout</a></li>
       
          </ul>
        </li>';
 }else{
     echo '<li> <a id="regNowBtn" class="btn btn-primary"  data-toggle="modal" data-target="#empsignup"  style="color: brown;" >
                                HR/Accountant</a></li>';
 }
  ?>
       
         
      </ul>
          
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>