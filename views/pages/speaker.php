<body class="body-design" style= "margin-bottom: 20%;  background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
  <div class="container">
  	<div class="container" style="width: 250px; text-align: right;">
  		<div class="row">		
                    <div class="col-sm-3">
                      <h6 class="mb-2"> 
                      	<form action="<?= site_url('login_menu/myfunction');?>" method="post" class="form-group ">
  						          <h6 >Sort by:</h6>  
                    </div>

                    <div class="col-sm-9 text-secondary"  >

                    	<select class="form-control" name="select1" >
                                <option value="" selected disabled >Random</option>
                                <option value ="1">Alphabetical</option>
                                <option value ="2">Rating</option>
                                <option value ="3">Recommend</option>                              
                            </select>         
                    </div>
                 </div>
             </div>
  <div class="row">
	<?php foreach($speaker as $row){ ?>
	<div class="col-md-4" style="text-align: center;">
    <h4 class="text-center"><strong style="text-transform: capitalize;"><?= $row["department"]; ?></strong></h4>
    <hr>
    <a href="<?= base_url();?><?= $row['slug']?>">
    <div class="profile-card-2"><img src="<?php echo base_url('img/speaker/'.$row['profile_pict']); ?>" class="img-fluid" alt="<?php echo $row["first_name"]." ".$row["last_name"]; ?>">
        <div class="profile-name" style="margin-bottom: 30px;"><?php echo $row["first_name"]." ".$row["last_name"]; ?></div>
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
<br>
</div>
</div>
</body>