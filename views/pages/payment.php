<body class="body-design" style= "background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
    <div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
        </div>
    </div> <!-- End -->
    <div class="row">
    <div class="col">
      <div class="card" style="text-align: center;">
        <?php foreach($tos as $row){?>
  <div class="card-header">
    <strong><?= $row->title1; ?></strong>
  </div>
  <div class="card-body" >
    <?php echo "<p><small>".$row->body1."</small></p><br>";?>
        <strong><?= $row->title2; ?></strong>
        <?php echo "<p><small>".$row->body2."</small></p><br>";?>
        <strong><?= $row->title3; ?></strong>
        <?php echo "<p><small>".$row->body3."</small></p><br>";?>
        <?php } ?>
        <input type="checkbox" name="tos" value="accept">
        <label> I accept the conditions.</label><br>
    </div>
</div>
    </div>
    <div class="col">
<div class="card" style="text-align: center;">
  <div class="card-header">
    <form method="post" action="<?= site_url('pages/payment_function');?>">
    <strong>Payment Method</strong>
  </div>
  <div class="card-body">
    <h5 class="card-title">Choose your Payment</h5>
    <div class="input-group mb-3">
      <select name="payment" class="custom-select" id="inputGroupSelect02" >
        <option selected disabled>Choose...</option>
        <option value="Gcash">Gcash</option>
        <option value="Paymaya">Paymaya</option>
      </select>
    </div>
    <p class="text-muted"> Note: You only have 30 minutes to send the payment credentials. If the payment is not recieved the transaction will be automatically invalid. You can send your payment now. </p>
     <input type="submit" class="btn btn-primary btn-sm" value="Proceed" name = "insertPayment">
  </div>
  </form>
</div>
    </div>
  </div>
</body>