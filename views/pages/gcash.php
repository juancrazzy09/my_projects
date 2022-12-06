<body class="body-design" style= "background-attachment: fixed;background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
	<div class="container">
	<div class="card text-center">
  <div class="card-header">
    Gcash
  </div>
  <div class="card-body">
    <h6 class="pb-2" >Scan QR Code</h6>
       <img width="300" height="300" title="Gcash" alt="Gcash" src="<?php echo base_url('img/gcash.jpg');?>">
       <p class="text-muted"> Note: You only have 30 minutes to send the payment credentials. If the payment is not recieved the transaction will be automatically invalid. You can send your payment now.</p>
  </div>
  <div class="card-footer text-muted">
    <a href="<?= base_url();?>official_receipt" class="btn btn-primary">Proceed</a>
  </div>
</div>
</div>
</body>