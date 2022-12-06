<body class="body-design" style= "margin-bottom: 30%;  background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
  <section class="section about-section" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">About Me</h3>
                            <h6 class="theme-color lead">Welcome user this is your account details.</h6>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Name</label>
                                        <p><?php echo $user['first_name'].' '.$user['last_name']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Email</label>
                                        <p><?php echo $user['email']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p><?php echo $user['address']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><?php echo $user['phone']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Gender</label>
                                        <p><?php echo $user['gender']; ?></p>
                                    </div>
                                    <div class="media">
                                      <a class="text-primary" href="<?= base_url();?>certificate_list">Certificates</a>
                                    </div>
                                    <div class="media">
                                      <button type="button" class="btn btn-outline secondary text-primary" data-toggle="modal" data-target="#exampleModalCenter">Change Password</button>
                                    </div>
                                </div>                                
                            </div>
                        </div>                       
                    </div>
                    <style type="text/css">
                      .about-avatar .file {
                        position: relative;
                        overflow: hidden;
                        margin-top: -20%;
                        width: 70%;
                        border: none;
                        border-radius: 0;
                        font-size: 15px;
                        background: #212529b8;
                    }
                    .about-avatar .file input {
                        position: absolute;
                        opacity: 0;
                        right: 0;
                        top: 0;
                    }
                    </style>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                            <div class="file btn btn-sm btn-primary" style="width: 300px;">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
      
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="text-align: center;">
              <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalLongTitle" style="margin-left: 35%;">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= site_url('pages/changepass');?>" method="post">
                <div class="form-group">
                <input type="password" class="form-control" name="oldpassword" placeholder="Old Password" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" name="newpassword" placeholder="New Password" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" name="conf_password" placeholder="Confirm New Password" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
                </div>
              </div>
              <div class="modal-footer">
                <input class="btn btn-sm btn-outline-light" type="submit" name="changeSubmit" value="Confirm" style="margin-right: 120px;">
             </div>
            </form>     
        </div>
    </div>
   </div>  
 </div>
 </body>