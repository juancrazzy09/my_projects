<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group sticky-top sticky-offset">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id="submenu1" class="collapse sidebar-submenu">
            <a href="<?= base_url();?>staff_dashboard" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Staff Dashboard</span>
                </a>
                <a href="<?= base_url();?>staff_request" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of Request</span>
                </a>
                <a href="staff_transactions" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of Transactions</span>
                </a>
                <a href="<?= base_url();?>staff_speaker" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of Speakers</span>
                </a>
                <a href="<?= base_url();?>staff_users" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of Users</span>
                </a>
                <a href="<?= base_url();?>staff_categories" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">List of Categories</span>
                </a>
            </div>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                    <span class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id="submenu2" class="collapse sidebar-submenu">
                
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Password</span>
                </a>
                <a href="<?= base_url();?>pages/logout" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Logout</span>
                </a>
            </div>
            
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src="<?php echo base_url('img/logowhite.png');?>" width="200" height="100">
            </li>
        </ul>
        <!-- List Group END-->
    </div>
    <!-- sidebar-container END -->