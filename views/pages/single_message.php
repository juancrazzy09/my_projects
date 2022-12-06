<body class="body-design" style= "margin-bottom: 30%;  background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
<div class="container bootdey">
<div class="email-app mb-4">
    <nav>
        <a href="<?= base_url();?>create_msg" class="btn btn-danger btn-block">New Email</a>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>msgs"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-danger"><?php foreach($count as $row){ echo $row->count; } ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-star"></i> Sent</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-rocket"></i> Draft</a>
            </li>
        </ul>
    </nav>
    <main class="inbox">
        <div class="toolbar">
            <div class="btn-group">
                <button type="button" class="btn btn-light">
                    <span class="fa fa-envelope"></span>
                </button>
                <button type="button" class="btn btn-light">
                    <span class="fa fa-bookmark-o"></span>
                </button>
            </div>
            <button type="button" class="btn btn-light">
                <span class="fa fa-trash-o"></span>
            </button>
            <div class="btn-group float-right">
                <button type="button" class="btn btn-light">
                    <span class="fa fa-chevron-left"></span>
                </button>
                <button type="button" class="btn btn-light">
                    <span class="fa fa-chevron-right"></span>
                </button>
            </div>
        </div>

        <div class="messages">
            <?php foreach($sender as $row){?>
             <div class="email-head-sender d-flex align-items-center justify-content-between flex-wrap">
                  <div class="d-flex align-items-center">
                    <div class="avatar">
                      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="rounded-circle user-avatar-md">
                    </div>
                    <div class="sender d-flex align-items-center">
                      <a href="#"><?= $row->first_name." ".$row->last_name;?></a> <span>to</span><a href="#">me</a>
                    </div>
                  </div>
                  <div class="date"><?= $row->created;?></div>
                </div>
                   <div class="email-body">
                <p><?= $row->title; ?></p>
                <br>
                <?= $row->body;?>
                <p><strong>Regards</strong>,<br><?= $row->first_name." ".$row->last_name;?></p>
                <br>
                <a href="#">Reply</a>
              </div>
              <div class="email-attachments">
                <div class="title">Attachments <span>(3 files, 12,44 KB)</span></div>
                <ul>
                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Reference.zip <span class="text-muted tx-11">(5.10 MB)</span></a></li>
                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Instructions.zip <span class="text-muted tx-11">(3.15 MB)</span></a></li>
                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Team-list.pdf <span class="text-muted tx-11">(4.5 MB)</span></a></li>
                </ul>
              </div>
               <?php } ?>
        </div>
       
            </div>
          </div>
    </main>
</div>
</div>
</body>