<?php


?>

<!-- Modal -->

<div class="modal fade" id="empsignup" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel" style="background-image: url(images/bg.jpg);">
  <div class="modal-dialog" role="document">
      <div class="modal-content"  style="background-color: transparent; box-shadow: 0px 0px 0px transparent; border: 0px transparent">
    
        
		<div class="form1">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Login</h1>
    </div>
    <div class="form-content">
        <form method="post" action="signin.php">
        <div class="form-group">
          <label for="username">Email</label>
          <input type="text" id="username" name="email" pattern="(admin@gmail\.com|accountant@gmail\.com)$" title="You don't have access to login" required="required"/> required="required"/>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required="required"/>
        </div>
        <div class="form-group">
          <label class="form-remember">
            <input type="checkbox"/>Remember Me
          </label><a class="form-recovery" href="#">Forgot Password?</a>
        </div>
        <div class="form-group">
          <button type="submit">Log In</button>
        </div>
      </form>
    </div>
  </div></div>
  
</div></div></div>



  
  
  
  
  