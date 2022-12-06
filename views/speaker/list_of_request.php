<div class="container">
<div class="container" style="padding-top: 5%;">
<div class="table-wrapper-scroll-y my-custom-scrollbar">
	<h1 style="font-weight: bold; text-transform: uppercase;">Coeus - Speaker List of Requests</h1>
      <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm table-responsive" cellspacing="0"
  width="100%">
   <thead class="bg-dark text-white">
    <tr>
      <th colspan="15" style="text-align: center;"><h3 >List of request pending</h3></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Hired Speaker</th>
      <th scope="col">Seminar Mode</th>
      <th scope="col">Payment Mode</th>
      <th scope="col">Date</th>
      <th scope="col">Start</th>
      <th scope="col">End</th>
      <th scope="col">Amount</th>
      <th colspan="2" style="text-align: center;">Status</th>
      <th scope="col" width="150" style="margin-left: 50px; text-align: center;">Select All <input type="checkbox" id="selectAll" style="margin-left: 5px;" /></th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <?php foreach($pending as $row){ ?>
    <tr>
      <th scope="row"><?= $row->id;?></th>
      <td><?= $row->first_name;?></td>
      <td><?= $row->last_name;?></td>
      <td><?= $row->email;?></td>
      <td><?= $row->phone;?></td>
      <td><?= $row->first_name." ".$row->last_name;?></td>
      <td><?= $row->mode_of_webinar;?></td>
      <td><?= $row->mode_of_payment;?></td>
      <td><?= $row->date;?></td>
      <td><?= $row->start;?></td>
      <td><?= $row->end;?></td>
      <td><?= $row->sub_total;?></td>
      <td><a href="<?= site_url('speaker/accept/'.$row->id); ?>" class="btn btn-sm btn-success">Accept</a></td>
      <td><a href="<?= site_url('speaker/decline/'.$row->id); ?>" class="btn btn-sm btn-danger">Decline</a></td>
      <td><input type="checkbox" class="checkbox-item" id="<?= $row->id;?>"/></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
     
</div>

</div>
  

    </div>
    <!-- Main Col END -->

</div>
</div>
<script type="text/javascript">
    $('#selectAll1').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});

var $checkboxes = $('.checkbox-item');
$('.checkbox-item').change(function(){
    var checkboxesLength = $checkboxes.length;
    var checkedCheckboxesLength = $checkboxes.filter(':checked').length;
    if(checkboxesLength == checkedCheckboxesLength) {
        $('#selectAll1').prop('checked', true);
    }else{
        $('#selectAll1').prop('checked', false);
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