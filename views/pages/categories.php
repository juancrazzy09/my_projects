<body class="body-design" style= "background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
<div class="container">	
	
	<div style="text-align: center;">
	<!--<?php foreach($category as $row) { 
		echo "<h1>".$row->category."</h1>"; 
	} ?>-->
</div>
<div class="row">
	<?php foreach($category as $row){ ?>
	<div class="col-md-4" style="text-align: center;">
    <h4 class="text-center"><strong style="text-transform: capitalize;"><?= $row->department; ?></strong></h4>
    <hr>
    <a href="<?= base_url();?><?= $row->slug?>">
    <div class="profile-card-2"><img src="<?php echo base_url('img/speaker/'.$row->profile_pict); ?>" class="img-fluid" alt="<?php echo $row->first_name." ".$row->last_name; ?>">
        <div class="profile-name" style="margin-bottom: 30px;"><?php echo $row->first_name." ".$row->last_name; ?></div>
        <div class="profile-icons">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
        </div>
    </div>
    </a>
</div>
 <?php } ?>
</div>
</body>