<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/header.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/scroll.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/speaker.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.0/css/star-rating.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.0/css/star-rating.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>Portal</title>
</head>
<style type="text/css">
	 body {
    padding-top: 56px;
}

.sticky-offset {
    top: 56px;
}

#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    background-color: #333;
    padding: 0;
}

/* Sidebar sizes when expanded and expanded */
.sidebar-expanded {
    width: 230px;
}
.sidebar-collapsed {
    width: 60px;
}

/* Menu item*/
#sidebar-container .list-group a {
    height: 50px;
    color: white;
}

/* Submenu item*/
#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}

/* Separators */
.sidebar-separator-title {
    background-color: #333;
    height: 35px;
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    background-color: #333;    
    height: 60px;
}

/* Closed submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
/* Opened submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
</style>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" a href="<?= base_url();?>speaker_dashboard"style="margin-left: 1%;">
        <img src="<?php echo base_url('img/logowhite.png');?>" width="90" height="40" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                  <a class="nav-link muted" href="#" style="font-weight: bold; ">Speaker Dashboard<span class="sr-only">(current)</span></a>
              </li>

            <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Tasks</a>
                    <a class="dropdown-item" href="#">Etc ...</a>
                </div>
            </li>
            <!-- Smaller devices menu END -->

        </ul>
    </div>
</nav>
<body>