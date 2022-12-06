<div class="container">
<div class="container" style="padding-top: 5%;">
	<h1 style="font-weight: bold; text-transform: uppercase;">Coeus - Admin List of User</h1>
</div>
<table class="table table-bordered table-hover">
   <thead class="bg-dark text-white">
    <tr>
      <th colspan="12" style="text-align: center;"><h3>List of User</h3></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>      
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone</th>
      <th scope="col">Date Created</th>
      <th style="text-align: center;" colspan="3">Status</th>
      <th scope="col" width="150" style="margin-left: 50px; text-align: center;">Select All <input type="checkbox" id="selectAll" style="margin-left: 5px;" /></th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
      <?php foreach($user as $row) { ?>
      <tr>
      <th scope="row"><?= $row->id; ?></th>
      <td><?php echo $row->first_name." ".$row->last_name; ?></td>
      <td><?= $row->email;?></td>
      <td><?= $row->department;?></td>
      <td><?= $row->address;?></td>
      <td><?= $row->gender;?></td>
      <td><?= $row->phone;?></td>
      <td><?= $row->created;?></td>
      <?php if($row->status == "1"){?>
          <td><a href="<?= site_url('admin/verify_user/'.$row->id); ?>" onclick="return confirm('Are you sure you want to activate this account?')" class="btn btn-sm btn-success">Activate</a></td>
      <?php } elseif ($row->status == "2"){ ?>
          <td>Activated</td>
      <?php } elseif ($row->status == "3"){ ?>
        <td><a href="<?= site_url('admin/verify_user/'.$row->id); ?>" onclick="return confirm('Are you sure you want to activate this account?')" class="btn btn-sm btn-success">Activate</a></td>
      <?php } ?>
      <?php if($row->status == "3"){?>
      <td>Blocked</td>
      <?php }else{ ?>
        <td><a href="<?= site_url('admin/block_user/'.$row->id); ?>" onclick="return confirm('Are you sure you want to block this account?')" class="btn btn-sm btn-danger">Block</a></td>
      <?php } ?>
      <td><a href="<?= site_url('admin/delete_user/'.$row->id); ?>" onclick="return confirm('Are you sure you want to delete this account?')" class="btn btn-sm btn-danger">Delete</a></td>
      <td><input type="checkbox" class="checkbox-item" id="<?php $row->id; ?>"/></td>
        </tr>
  <?php } ?>
  </tbody>
</table>
   <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
    <!-- Main Col END -->

</div>
</div>
<script type="text/javascript">
    $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});

var $checkboxes = $('.checkbox-item');
$('.checkbox-item').change(function(){
    var checkboxesLength = $checkboxes.length;
    var checkedCheckboxesLength = $checkboxes.filter(':checked').length;
    if(checkboxesLength == checkedCheckboxesLength) {
        $('#selectAll').prop('checked', true);
    }else{
        $('#selectAll').prop('checked', false);
    }
});
</script>
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