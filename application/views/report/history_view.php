<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>
<link  href="<?php echo base_url(); ?>assets/dist/css/history.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid ">
        <div class="row page-titles">
            <div class="col-md-3 align-self-center"></div>
            <div class="col-md-6 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                    </ol>
                </div>
            </div>
            <div class="col-md-2 align-self-center text-right"></div>
        </div>
        <center>
            <div class="card shadow-sn m-l-150 m-r-150">
                <div class="card-body">
                    <div class="col-lg-8">
                        <h3><?php echo $item ?></h3>
                    </div>
                    <div class="col-lg-4"></div>
                    
                    <br>
                    <table class= "">
                        <tr>
                            <td align="center"><h4><?php echo $brand ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20">-</h4></td>
                            <td align="center"><h4><?php echo $model ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20">-</h4></td>
                            <td align="center"><h4><?php echo $sn ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20"></h4></td>
                        </tr>
                        <tr>
                            <td style="border-top:1px solid #d7d7d7"><center><small>Brand</small></center></td>
                            <td></td>
                            <td style="border-top:1px solid #d7d7d7"><center><small>Model</small></center></td>
                            <td></td>
                            <td style="border-top:1px solid #d7d7d7"><center><small>Serial Number</small></center></td>
                        </tr>
                        <?php if($damage == '1'){ ?>
                        <tr>
                            <td colspan="7"><button class="btn btn-danger btn-block btn-lg animated headShake">DAMAGED</button></td>
                        </tr>
                        <?php }else if($ids==0 && $changeloc==0){ ?>
                        <tr>
                            <td colspan="7"><button class="btn btn-success btn-block btn-lg animated headShake">Available</button></td>
                        </tr>
                        <?php } else if($borrowed=='1'){ ?>
                        <tr>
                            <td colspan="7"><button class="btn btn-warning btn-block btn-lg animated headShake text-white">Borrowed</button></td>
                        </tr>   
                        <?php } else if($ids==0 && $changeloc=='1'){ ?>
                        <tr>
                            <td colspan="7"><button class="btn btn-info btn-block btn-lg animated headShake text-white">Moved to <?php echo $location; ?></button></td>
                        </tr> 
                        <?php } else if($lost=='1'){ ?>
                        <tr>
                            <td colspan="7"><button class="btn btn-secondary btn-block btn-lg animated headShake text-white">Lost Item</button></td>
                        </tr> 
                        <?php }else { echo ''; } ?>
                    </table>
                </div>
            </div>
        </center>

        <ul class="timeline">

            <li>
            <div class="direction-r">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Currrent</span>
            <span class="time-wrapper"><span class="time bg-info-alt">Feb 2015</span></span>
            </div>
            <div class="desc shadow-sn border-info">
                <p class="font-bold">Employee Name:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Return Date:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Received By:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Qty:</p>
                <p class="m-b-10">lorem ipsum</p>
            </div>
            </div>
            </li>

            <li>
            <div class="direction-l">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Returned</span>
            <span class="time-wrapper"><span class="time bg-success-alt">Dec 2014</span></span>
            </div>
            <div class="desc shadow-sn border-success">
                <p class="font-bold">Employee Name:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Return Date:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Received By:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Qty:</p>
                <p class="m-b-10">lorem ipsum</p>
            </div>
            </div>
            </li>


            <li>
            <div class="direction-r">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Borrowed</span>
            <span class="time-wrapper"><span class="time bg-warning-alt">Feb 2015</span></span>
            </div>
            <div class="desc shadow-sn border-warning">
                <p class="font-bold">Employee Name:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Return Date:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Received By:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Qty:</p>
                <p class="m-b-10">lorem ipsum</p>
            </div>
            </div>
            </li>

            <li>
            <div class="direction-l">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Repaired</span>
            <span class="time-wrapper"><span class="time bg-danger-alt">Dec 2014</span></span>
            </div>
            <div class="desc shadow-sn border-danger">
                <p class="font-bold">JO No.:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Repair Price:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Supplier:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Received By :</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Repair Date:</p>
                <p class="m-b-10">lorem ipsum</p>
                <p class="font-bold">Qty:</p>
                <p class="m-b-10">lorem ipsum</p>
            </div>
            </div>
            </li>

            <li>
            <div class="direction-r">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Lost</span>
            <span class="time-wrapper "><span class="time bg-dark-alt">July 2014</span></span>
            </div>
            <div class="desc shadow-sn border-dark">
               <p class="font-bold">Date Lost:</p>
                <p class="m-b-10">lorem ipsum</p>
               <p class="font-bold">Item:</p>
                <p class="m-b-10">lorem ipsum</p>
               <p class="font-bold">Replacement Item:</p>
                <p class="m-b-10">lorem ipsum</p>
               <p class="font-bold">Accountable Person:</p>
                <p class="m-b-10">lorem ipsum</p>
               <p class="font-bold">Remarks:</p>
                <p class="m-b-10">lorem ipsum</p>
            </div>
            </div>
            </li>
        </ul>


        <div class="row">
            <div class="col-lg-12 ">
                <div class="card bor-radius shadow ">
                     <div class="card-header bg-white">
                        <a href="" onclick="closeWindow()" class="btn btn-default-alt"><span class="fa fa-arrow-left"></span></a>
                        <center>
                                <table class= "">
                                    <tr>
                                        <td align="center"><h5><?php echo $item ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20">-</h5></td>
                                        <td align="center"><h5><?php echo $brand ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20">-</h5></td>
                                        <td align="center"><h5><?php echo $model ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20">-</h5></td>
                                        <td align="center"><h5><?php echo $sn ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20"></h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Item Description</small></center></td>
                                        <td></td>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Brand</small></center></td>
                                        <td></td>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Model</small></center></td>
                                        <td></td>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Serial Number</small></center></td>
                                    </tr>
                                    <?php if($damage == '1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-danger btn-block btn-lg animated headShake">DAMAGED</button></td>
                                    </tr>
                                    <?php }else if($ids==0 && $changeloc==0){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-success btn-block btn-lg animated headShake">Available</button></td>
                                    </tr>
                                    <?php } else if($borrowed=='1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-warning btn-block btn-lg animated headShake text-white">Borrowed</button></td>
                                    </tr>   
                                    <?php } else if($ids==0 && $changeloc=='1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-info btn-block btn-lg animated headShake text-white">Moved to <?php echo $location; ?></button></td>
                                    </tr> 
                                    <?php } else if($lost=='1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-secondary btn-block btn-lg animated headShake text-white">Lost Item</button></td>
                                    </tr> 
                                    <?php }else { echo ''; } ?>
                                </table>

                            </center>
                    </div>
                    <div class="m-t-10 m-b-10 m-r-10 m-l-10">
                        <div>
                            
                        </div>
                        
                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-1-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">CURRENT</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="70%">Employee Name</td>
                                        <td align="right">Date Issued</td>
                                        <td width="10%" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($current AS $cur){ ?>
                                    <?php if($damage == '0' && $cur['id']!=0){ ?>
                                    <tr>
                                        <td><?php echo $cur['employee']; ?></td>
                                        <td align="right"><?php echo $cur['date_issued']; ?></td>
                                        <td align="right">
                                            <label class="btn btn-info btn-sm bor-radius btn-block">
                                                <center><span class="badge bg-white text-dark badge-pill"><h5><?php echo $cur['qty']; ?></h5></span></center>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-5-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">RETURNED</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="40%">Employee Name</td>   
                                        <td align="right">Return Date</td>                                         
                                        <td width="35%">Received By</td>
                                        <td width="10%" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($head AS $ret){ 
                                            /*foreach($returned AS $det){ 
                                                switch($det){
                                                    case($ret['return_id'] == $det['return_id']): */
                                    ?>
                                    <tr>
                                        <td><?php echo $ret['employee']; ?></td>
                                        <td align="right"><?php echo $ret['return_date']; ?></td>
                                        <td><?php echo $ret['received']; ?></td>
                                        <td align="right">
                                            <label class="btn btn-success btn-sm bor-radius btn-block">
                                                <span class="badge bg-white text-dark badge-pill"><h5><?php echo $ret['qty']; ?></h5></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php 
                                        /*break;
                                        default: 
                                        } }*/ }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-3-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">BORROWED</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="40%">Employee Name</td>
                                        <td >Borrowed Date</td>
                                        <td >Returned By</td>
                                        <td >Returned Date</td>
                                        <td width="10%" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($borrow AS $to){ ?>
                                    <tr>
                                        <td><?php echo $to['borrowed_by']; ?></td>
                                        <td align="right"><?php echo $to['borrowed_date']; ?></td>
                                        <td><?php echo $to['returned_by']; ?></td>
                                        <td><?php echo date("Y-m-d",strtotime($to['return_date'])); ?></td>
                                        <td align="right">
                                            <label class="btn btn-warning btn-sm bor-radius btn-block">
                                                <span class="badge bg-white text-dark badge-pill"><h5><?php echo $to['qty']; ?></h5></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-4-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">REPAIRED</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="">JO No.</td>
                                        <td width="">Repair Price</td>
                                        <td width="">Supplier</td>
                                        <td width="">Received By</td>
                                        <td align = "right">Repair Date</td>
                                        <td width="" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($repair AS $to){ ?>
                                    <tr>
                                        <td><?php echo $to['jo_no']; ?></td>
                                        <td><?php echo $to['repair_price']; ?></td>
                                        <td><?php echo $to['supplier']; ?></td>
                                        <td><?php echo $to['receive_by']; ?></td>
                                        <td align="right"><?php echo $to['repair_date']; ?></td>
                                        <td align="right">
                                            <label class="btn btn-warning btn-sm bor-radius btn-block">
                                                <span class="badge bg-white text-dark badge-pill"><h5><?php echo $to['qty']; ?></h5></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5" style = "background-color:#5a6268">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10" style = "color:white!important">LOST ITEM</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td>Date Lost</td>
                                        <td>Item</td>
                                        <td>Replacement Item</td>
                                        <td>Accountable Person</td>
                                        <td>Remarks</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($losts)){ foreach($losts AS $l){ ?>
                                    <tr>
                                        <td><?php echo $l['lost_date']; ?></td>
                                        <td><?php echo $l['item']; ?></td>
                                        <td><?php echo $l['replacement']; ?></td>
                                        <td><?php echo $l['employee']; ?></td>
                                        <td align="right"><?php echo $l['remarks']; ?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




