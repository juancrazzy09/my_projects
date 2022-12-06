<body class="body-design" style= "margin-bottom: 40%;  background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
<div class="wrapper fadeInDown">
	<br><br><br>
  <div id="formContent" style="width: 800px;">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
  <h2 class="text-dark">Register</h2>
    </div>

    <!-- Login Form -->
    <form action="" method="post">
        <div class="container">
  <div class="row">
    <div class="col">
     <div class="form-group">
            <input type="email" class="fadeIn first" name="email" placeholder="Email" value="<?php echo !empty($user['email'])?$user['email']:''; ?>" required>
                <?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
            </div>
             <div class="form-group">
                <input type="password" class="fadeIn second" id="password" name="password" placeholder="Password" required>
                <?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="fadeIn third" id="password" name="conf_password" placeholder="Confirm Password" required>
                <?php echo form_error('conf_password','<p class="help-block text-danger">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="text" class="fadeIn fifth" name="phone" placeholder="Phone Number" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>" required>
                <?php echo form_error('phone','<p class="help-block text-danger">','</p>'); ?>
            </div>
    </div>
       <div class="col">
        <div class="form-group">
                <input type="text" class="fadeIn first" name="first_name" placeholder="First Name" value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>" required>
                <?php echo form_error('first_name','<p class="help-block text-danger">','</p>'); ?> 
            </div>
            <div class="form-group">
                <input type="text"class="fadeIn second" name="last_name" placeholder="Last Name" value="<?php echo !empty($user['last_name'])?$user['last_name']:''; ?>" required>
                <?php echo form_error('last_name','<p class="help-block text-danger">','</p>'); ?>
            </div>        
            <div class="form-group">
                <input type="text" class="fadeIn third" name="address" placeholder="Address" value="<?php echo !empty($user['address'])?$user['address']:''; ?>" required>
                <?php echo form_error('phone','<p class="help-block text-danger">','</p>'); ?>        
                </div>                                                
            <div class="form-group">               
                <div class="radio fadeIn fourth">
                    <label>Gender: </label>
                <?php 
                if(!empty($user['gender']) && $user['gender'] == 'Female'){ 
                    $fcheck = 'checked="checked"'; 
                    $mcheck = ''; 
                }else{ 
                    $mcheck = 'checked="checked"'; 
                    $fcheck = ''; 
                } 
                ?>
                    <label>
                        <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
            Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                        Female
                    </label>
                </div>
            </div>         
    </div>
  </div>   	
      <div class="send-button fadeIn sixth">
                <input class="btn btn-lg btn-secondary" type="submit" name="signupSubmit" value="Create Account">
            </div>
    </form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="<?= base_url();?>login">Login</a>
    </div>

  </div>
</div>
</div>
</div>
</body>