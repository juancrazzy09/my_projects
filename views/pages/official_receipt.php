<body class="body-design" style= "background-attachment: fixed; background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)), url('http://localhost/coeus/img/bg2.jpg'";>
<div class="page-content container">
 <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Official Receipt</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <?php foreach($user as $row){ ?>
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $row->first_name." ".$row->last_name;?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1" style="color: black;">
                                <?= $row->address;?>
                            </div>
                            <div class="my-1" style="color: black;">
                                <?= $row->phone;?>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">

                            <div class="my-2" style="color: black;"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90" style="color: black;">Official Receipt:</span> #<?= $row->id; ?></div>

                            <div class="my-2" style="color: black;"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90" style="color: black;">Issue Date:</span> <?= $row->created; ?></div>
                            <div class="my-2" style="color: black;"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90" style="color: black;">Mode of Payment:</span> <span class="badge badge-warning badge-pill px-25"><?= $row->payment; ?></span></div>
                            <div class="my-2" style="color: black;"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90" style="color: black;">Status:</span> <span class="badge badge-warning badge-pill px-25"><?= $row->status; ?></span></div>
                        </div>
                    </div>
                <?php } ?>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="col-1">#</div>
                        <div class="col-2">Name</div>
                        <div class="col-2">Category</div>
                        <div class="col">Date</div>
                        <div class="col-2">Starting Time</div>
                        <div class="col">End Time</div>  
                        <div class="col">Mode</div>               
                        <div class="col">Amount</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="col-1"><?php foreach($speaker as $row){ echo $row->id; }?></div>
                            <div class="col-2"><?php foreach($speaker as $row){ echo $row->first_name." ".$row->last_name; }?></div>
                            <div class="col-2"><?php foreach($speaker as $row){ echo $row->department; }?></div>
                            <div class="col"><?php foreach($user as $row){ echo $row->date; }?></div>
                            <div class="col-2"><?php foreach($user as $row){ echo $row->start; }?></div>
                            <div class="col"><?php foreach($user as $row){ echo $row->end; }?></div>  
                            <div class="col"><?php foreach($user as $row){ echo $row->mode_of_webinar; }?></div>               
                            <div class="col"><?php foreach($user as $row){ echo $row->sub_total; }?></div>
                        </div>

                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            -->

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Note: This is your official receipt.
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">PHP:<?php foreach($user as $row){ echo $row->sub_total; }?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                </div>
            </div>
        </div>
    </div>
</div>
</body>