<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/own.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/schedule.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/header.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/msg.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/trans.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/scroll.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/application.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.0/css/star-rating.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.0/css/star-rating.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>Portal</title>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-light fixed-top " aria-label="Ninth navbar example">
    <div class="container-xl " >
      <a class="navbar-brand" href="<?= base_url();?>"><img width="150" height="50" title="Coeus" alt="Coeus" src="<?php echo base_url('img/logowhite.png');?>"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 60%">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" style="color: white; font-weight: bold; " href="<?= base_url();?>">Home</a>
          </li>
          <?php if ($this->session->isUserLoggedIn){ ?>
            <!-- notification -->
         <li class="nav-item" style="margin-left: 50px; margin-top: 5px;">
        <div class="dropdown">
            <a class="nav-link bi bi-bell" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bell" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
            </svg><span class="badge badge-light"></span>
            </a>
            <div class="dropdown-menu notif dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            </div>
          </div>
        </li>
        <!-- end -->
        <!-- msg -->
        <li class="nav-item" style="margin-left: 50px; margin-top: 5px;">
          <div class="dropdown">
            <a class="nav-link bi bi-bell" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
            </svg><span class="badge badge-light msg-count"></span>
            </a>
            <div class="dropdown-menu msg dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            </div>
          </div>
        </li>
        <!-- end -->
        <li class="nav-item" style="margin-top: 5px; margin-left: 40px;">
          <div class="dropdown show">
            <a class="nav-link bi bi-gear" style="color: white;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>        
            </a>
            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" style="font-color: white;" href="<?= base_url();?>transaction_history">Transaction History</a>
              <a class="dropdown-item" style="font-color: white;" href="<?= base_url();?>account">Account</a>
              <a class="dropdown-item" style="font-color: white;" href="<?= base_url();?>pages/logout">Logout</a>
            </div>
          </div>
        </li>
          <?php } else { ?> 
          <li class="nav-item">
            <a class="nav-link" style="color: white; font-weight: bold;" href="<?= base_url();?>login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white; font-weight: bold;" href="<?= base_url();?>register">Register</a>
          </li>
          <?php }?>  
        </ul>
      </div>
    </div>
  </nav>
  </header>
  <script type="text/javascript">
    function fetch_notif(){
          $.ajax({
            url: "<?php echo base_url("pages/fetch_notif");?>",
            type: "POST",
            cache: false,
            success: function(data){
              //alert(data);
              $('.notif').html(data); 
            }
          });
        }
  
      $(document).ready(function(){
       setInterval(fetch_notif,5000);
      });
      function notif_count(){
          $.ajax({
            url: "<?php echo base_url("pages/notif_count");?>",
            type: "POST",
            cache: false,
            success: function(data){
              //alert(data);
              $('.badge-light').html(data); 
            }
          });
        }
  
      $(document).ready(function(){
       setInterval(notif_count,5000);
      });
       function fetch_msg(){
          $.ajax({
            url: "<?php echo base_url("pages/fetch_msg");?>",
            type: "POST",
            cache: false,
            success: function(data){
              //alert(data);
              $('.msg').html(data); 
            }
          });
        }
  
      $(document).ready(function(){
       setInterval(fetch_msg,5000);
      });
      function msg_count(){
          $.ajax({
            url: "<?php echo base_url("pages/msg_count");?>",
            type: "POST",
            cache: false,
            success: function(data){
              //alert(data);
              $('.msg-count').html(data); 
            }
          });
        }
  
      $(document).ready(function(){
       setInterval(msg_count,5000);
      });

      window.addEventListener("scroll", function() {
    let nav = document.querySelector('nav');
    let windowPosition = window.scrollY >0;
    nav.classList.toggle('scrolling-active', windowPosition);
    })
        window.addEventListener("scroll", function() {
        let nav = document.querySelector('nav');
        let windowPosition = window.scrollY >0;
        nav.classList.toggle('bg-dark', windowPosition);
    })
  </script>
  <body  >