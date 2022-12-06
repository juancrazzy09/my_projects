<div class="container">
<div class="container" style="padding-top: 5%;">
    <h1 style="font-weight: bold; text-transform: uppercase;">Coeus - Staff List of Categories</h1>
      <table class="table table-bordered table-hover">
   <thead class="bg-dark text-white">
    <tr>
      <th colspan="7" style="text-align: center;"><h3>List of Categories</h3></th>
    </tr>
  </thead>
  <thead style="text-align: center;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Number of Speakers</th>
      <th colspan="2" style="text-align: center;">Status</th>
      <th scope="col" width="150" style="margin-left: 50px; text-align: center;">Select All <input type="checkbox" id="selectAll" style="margin-left: 5px;" /></th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <?php foreach($categories as $row){ ?>
    <tr>
      <th scope="row"><?= $row->id; ?></th>
      <td><?= $row->category_name; ?></td>
      <td><?= $user->count;?></td>
      <td><a href="#" class="btn btn-sm btn-primary">Edit</a></td>
      <td><a href="#" class="btn btn-sm btn-danger">Delete</a></td>
      <td><input type="checkbox" class="checkbox-item" id="1"/></td>
    </tr>
   <?php } ?>
  </tbody>
</table>
</div>

</div>
  

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