<body class="body-design" style=" background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
<div class="container bootdey">
<div class="email-app msg-scroll mb-4">
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

        <ul class="messages">
            <?php foreach($result as $row){ if($row->status == "Unseen"){?>
            <li class="message unread">
                <a href="<?= base_url();?>pages/msgs/<?=$row->id;?>">
                    <div class="actions">
                        <span class="action"><i class="fa fa-square-o"></i></span>
                        <span class="action"><i class="fa fa-star-o"></i></span>
                    </div>
                    <div class="header">
                        <span class="from"><?= $row->first_name." ".$row->last_name?></span>
                        
                    </div>
                    <div class="title">
                        <?= $row->title; ?>
                    </div>
                    <div class="description">
                        <?= $row->body; ?>
                        <span class="date"><small><?= $row->created; ?></small></span>
                    </div>
                </a>
            </li>
         <?php } else{ ?>
            <li class="message">
                 <a href="<?= base_url();?>pages/msgs/<?=$row->id;?>">
                    <div class="actions">
                        <span class="action"><i class="fa fa-square-o"></i></span>
                        <span class="action"><i class="fa fa-star-o"></i></span>
                    </div>
                    <div class="header">
                        <span class="from"><?= $row->first_name." ".$row->last_name?></span>    
                    </div>
                    <div class="title">
                        <?= $row->title; ?>
                    </div>
                    <div class="description">
                        <?= $row->body; ?>
                        <span class="date"><small><?= $row->created; ?></small></span>
                    </div>
                </a>
            </li>
            <?php } }?>
        </ul>
    </main>
</div>
</div>
</body>