<body >
<div class="masthead text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/homebg.jpg');">
  <div class="container h-100 wrapper fadeInDown">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
      <h1 class="fadeIn first" style = "font-size: 60px; padding-bottom: 10px; "><b>Find the Perfect Speaker</b></h1>
        <p class="lead fadeIn second" style =  "padding-bottom: 30px;">For Schools and Universities inside Dasmariñas</p>
        
        <a class="btn btn-info btn-lg fadeIn third" href="<?= base_url();?>speaker">Get Started</a>
      </div>
    </div>
  </div>
</div>
<div class="col" style="background-color: lightblue;">
  	<div class="container d-flex justify-content-around">
    <a href="<?= base_url();?>application_form"><div class="col" style="text-align: center;">
    	<img width="100" height="80" title="Speaker" alt="Speaker" src="<?php echo base_url('img/spicon.png');?>">
		  <p style="text-align: center;  font-weight: bold;">Are you a speaker? Click here!</p>
    </div></a>
    <div class="col d-flex justify-content-end" style="text-align: center; margin-top: 25px;">
    	<nav class="navbar navbar-light">
		  <form class="form-inline">
		    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="border-color:white;">
		    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		  </form>
		</nav>
    </div>
  </div>
</div>
<div >
<div class="container">
	<br><br>
	<h3 style="text-align: center; font-weight: bold; text-transform: uppercase; font-size: 50px;"> Top Rated Speakers </h3>
	<br>
	<div class="row">
	<?php foreach($speaker as $row){ ?>
	<div class="col-md-4" style="text-align: center;">
    <h4 class="text-center"><strong style="text-transform: capitalize;"><?= $row["department"]; ?></strong></h4>
    <hr>
    <a href="<?= base_url();?><?= $row['slug']?>">
    <div class="profile-card-2"><img src="<?php echo base_url('img/speaker/'.$row['profile_pict']); ?>" class="img-fluid" alt="<?php echo $row["first_name"]." ".$row["last_name"]; ?>">
        <div class="profile-name" style="margin-bottom: 30px;"><?php echo $row["first_name"]." ".$row["last_name"]; ?></div>
    </div>
    </a>
</div>
 <?php } ?>
<br>
</div>
<a class="btn btn-info btn-sm" href="<?= base_url();?>speaker" style="margin-left: 47%;">See more</a>
</div>
<div style="background-color: white;">
	<div style="background-color: lightblue; margin-top: 20px; padding-bottom: 20px;">
		<div class="container"><br>		
		<h3 style="text-align: center; font-weight: bold; text-transform: uppercase; font-size: 40px;">Popular Topics</h3>
  <div class="row" style="text-align: center;">
  	<?php foreach($categories as $row){ ?>
    <div class="col-sm"><br>
      <a href="<?= base_url();?><?= $row['slug']?>"><h4><?= $row["category_name"]?></h4></a>
    </div>
    <?php } ?>
	</div>
</div>
</div>
</div>
</body>