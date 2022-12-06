<div class="container">
<div class="container" style="padding-top: 5%;">
	<h1 style="font-weight: bold; text-transform: uppercase;">Coeus - Staff Dashboard</h1>
</div>
  <div class="row" style="padding-top: 3%;">
    <div class="col-sm">
      <table class="table table-bordered table-hover">
   <thead class="bg-dark text-white">
    <tr>
      <th colspan="6" style="text-align: center;"><h3>List of hiring request</h3></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">No. of Pending</th>
      <th scope="col">No. of Accepted</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <tr>
      <td><?php foreach($pending as $row){ echo $row->status; }?></td>
      <td><?php foreach($accepted as $row){ echo $row->status; }?></td>
    </tr>
  </tbody>
</table>
 <table class="table table-bordered table-hover">
   <thead class="bg-dark text-white">
    <tr>
      <th colspan="6" style="text-align: center;"><h3>List of speaker applicant</h3></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Date of request</th>
      <th colspan="2" style="text-align: center;">Status</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <?php foreach($speaker as $row){?>
    <tr>
      <th scope="row">1</th>
      <td><?= $row->first_name; ?></td>
      <td><?= $row->last_name; ?></td>
      <td><?= $row->created; ?></td>
      <td><a href="#" class="btn btn-sm btn-success">View</a></td>
      <td><a href="#" class="btn btn-sm btn-danger">Decline</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
    </div>
    <div class="col-sm" style="padding-top: -1%;">
      <table class="table table-bordered" style="text-align: center;">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">Add New Speaker</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row" >
        <form action="<?= site_url('staff/add_speaker');?>" method="post" class="form-group ">
          <div class="container">
          <div class="row">
            <div class="col-sm">
              <div class="form-control" style="border-color: #FFFFFF;">
                <input type="text" name="first_name" placeholder="First Name" required="<?php echo !empty($speaker['first_name'])?$speaker['first_name']:''; ?>">
                <?php echo form_error('first_name','<p class="help-block text-danger">','</p>'); ?>
              </div>
                <div class="form-control" style="border-color: #FFFFFF;">
                <input type="text" name="last_name" placeholder="Last Name" required="<?php echo !empty($speaker['last_name'])?$speaker['last_name']:''; ?>">
                <?php echo form_error('last_name','<p class="help-block text-danger">','</p>'); ?>
              </div>
                <div class="form-control" style="border-color: #FFFFFF;">
                <input type="email" name="email" placeholder="Email" required="<?php echo !empty($speaker['email'])?$speaker['email']:''; ?>">
                <?php echo form_error('Email','<p class="help-block text-danger">','</p>'); ?>
              </div>
                <div class="form-control" style="border-color: #FFFFFF;">
                <input type="password" name="password" placeholder="Password" required="<?php echo !empty($speaker['password'])?$speaker['password']:''; ?>">
                <?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>
              </div>              
            </div>
            <div class="col-sm">
               <div class="form-control" style="border-color: #FFFFFF;">
                <input type="text" name="phone" placeholder="Phone" required="<?php echo !empty($speaker['phone'])?$speaker['phone']:''; ?>">
                <?php echo form_error('phone','<p class="help-block text-danger">','</p>'); ?>
              </div>
              <div class="form-control" style="border-color: #FFFFFF;">
                <input type="text" name="address" placeholder="Address" required="<?php echo !empty($speaker['address'])?$speaker['address']:''; ?>">
                <?php echo form_error('address','<p class="help-block text-danger">','</p>'); ?>
                    </div>
                    <div class="form-control" style="border-color: #FFFFFF;">
                      <div class="radio">
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
                <div class="form-control" style="border-color: #FFFFFF;">            
                <select name="select1">
                <option value="" selected disabled>Select Department</option>
                <?php foreach($categories as $row) { ?>
                <option value ="<?= $row->category_name; ?>"><?= $row->category_name; ?></option> 
              <?php } ?>
              </select>
              </div>
            </div>
          </div>
        </div>    
        <div class="form-control" style="border-color: #FFFFFF;">
        <label for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
        </div>
        <div class="form-control" style="border-color: #FFFFFF;">
          <label for="exampleFormControlTextarea1">Details</label>
        </div>
    	<textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
      </td>
    </tr>
    <tr>    
      <th scope="row">
        <?php  
                if(!empty($success_msg)){ 
                    echo '<p class="status-msg success text-success">'.$success_msg.'</p>'; 
                }elseif(!empty($error_msg)){ 
                    echo '<p class="status-msg error text-danger">'.$error_msg.'</p>'; 
                } 
            ?>
        <input class="btn btn-primary btn-sm" type="submit" name="insertSpeaker" value="Add"></th> 
    </tr>
    </form>
  </tbody>
</table>
<table class="table table-bordered table-hover" style="text-align: center;">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">Add New Category</th>
    </tr>
  </thead>
  <tbody>
     <form action="<?= site_url('staff/add_category');?>" method="post" class="form-group ">
    <tr>
      <td scope="row"> 
        <?php  
                if(!empty($success_msg)){ 
                    echo '<p class="status-msg success text-success">'.$success_msg.'</p>'; 
                }elseif(!empty($error_msg)){ 
                    echo '<p class="status-msg error text-danger">'.$error_msg.'</p>'; 
                } 
            ?>
      	<input type="text" name="category" placeholder="Add new category">
      </td>
    </tr>
    <tr>
      <th scope="row"><input class="btn btn-primary btn-sm" type="submit" name="addCategory" value="Add"></th> 
    </tr>
  </tbody>
  </form>
</table>
    </div>
  </div>
</div>
  

    </div>
    <!-- Main Col END -->

</div>
</div>
<!-- body-row END -->
<script type="text/javascript">
  $('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
</script>