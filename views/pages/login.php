<body class="body-design" style= "margin-bottom: 3%; background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
<div class="wrapper fadeInDown">
  <div id="formContent" style="max-width: 450px;">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <i class="bi bi-person"></i>
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
  </svg><br>
  <h2 class="text-dark">Login</h2>
    </div>

    <!-- Login Form -->
    <form action="<?= site_url('pages/login');?>" method="post">
      <div class="form-group">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required="">
      <?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
    </div>
    <div class="form-group">
      <input type="password" id="password" class="form-control fadeIn third" name="password" placeholder="Password" required="">
      <?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>
      <input type="submit" class="fadeIn fourth" name="loginSubmit" value="Log In">
    </div>
    </form>   
    <?php  
                if(!empty($success_msg)){ 
                    echo '<p class="status-msg success text-success">'.$success_msg.'</p>'; 
                }elseif(!empty($error_msg)){ 
                    echo '<p class="status-msg error text-danger">'.$error_msg.'</p>'; 
                } 
            ?>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>