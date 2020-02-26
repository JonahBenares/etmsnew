<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>

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
        <!-- <style type="text/css">
            header h1{
              text-align: center;
              font-weight: bold;
              margin-top: 0;
            }
              
             header p{
               text-align: center;
               margin-bottom: 0;
             }

            .hexa{
              border: 0px;
              float: left;
              text-align: center;
              height: 35px;
              width: 60px;
              font-size: 22px;
              background: #f0f0f0;
              color: #3c3c3c;
              position: relative;
              margin-top: 15px;
            }

            .hexa:before{
              content: ""; 
              position: absolute; 
              left: 0; 
              width: 0; 
              height: 0;
              border-bottom: 15px solid #f0f0f0;
              border-left: 30px solid transparent;
              border-right: 30px solid transparent;
              top: -15px;
            }

            .hexa:after{
              content: ""; 
              position: absolute; 
              left: 0; 
              width: 0; 
              height: 0;
              border-left: 30px solid transparent;
              border-right: 30px solid transparent;
              border-top: 15px solid #f0f0f0;
              bottom: -15px;
            }

            .timeline {
              position: relative;
              padding: 0;
              width: 100%;
              margin-top: 20px;
              list-style-type: none;
            }

            .timeline:before {
              position: absolute;
              left: 50%;
              top: 0;
              content: ' ';
              display: block;
              width: 2px;
              height: 100%;
              margin-left: -1px;
              background: rgb(213,213,213);
              background: -moz-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
              background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
              background: -webkit-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
              background: -o-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
              background: -ms-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
              background: linear-gradient(to bottom, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
              z-index: 5;
            }

            .timeline li {
              padding: 2em 0;
            }

            .timeline .hexa{
              width: 16px;
              height: 10px;
              position: absolute;
              background: #00c4f3;
              z-index: 5;
              left: 0;
              right: 0;
              margin-left:auto;
              margin-right:auto;
              top: -30px;
              margin-top: 0;
            }

            .timeline .hexa:before {
              border-bottom: 4px solid #00c4f3;
              border-left-width: 8px;
              border-right-width: 8px;
              top: -4px;
            }

            .timeline .hexa:after {
              border-left-width: 8px;
              border-right-width: 8px;
              border-top: 4px solid #00c4f3;
              bottom: -4px;
            }

            .direction-l,
            .direction-r {
              float: none;
              width: 100%;
              text-align: center;
            }

            .flag-wrapper {
              text-align: center;
              position: relative;
            }

            .flag {
              position: relative;
              display: inline;
              background: rgb(255,255,255);
              font-weight: 600;
              z-index: 15;
              padding: 6px 10px;
              text-align: left;
              border-radius: 5px;
            }

            .direction-l .flag:after,
            .direction-r .flag:after {
              content: "";
              position: absolute;
              left: 50%;
              top: -15px;
              height: 0;
              width: 0;
              margin-left: -8px;
              border: solid transparent;
              border-bottom-color: rgb(255,255,255);
              border-width: 8px;
              pointer-events: none;
            }

            .direction-l .flag {
              -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
              -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
              box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            }

            .direction-r .flag {
              -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
              -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
              box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            }

            .time-wrapper {
              display: block;
              position: relative;
              margin: 4px 0 0 0;
              z-index: 14;
              line-height: 1em;
              vertical-align: middle;
              color: #fff;
            }

            .direction-l .time-wrapper {
              float: none;
            }

            .direction-r .time-wrapper {
              float: none;
            }

            .time {
              background: #00c4f3;
              display: inline-block;
              padding: 8px;
            }

            .desc {
              position: relative;
              margin: 1em 0 0 0;
              padding: 1em;
              background: rgb(254,254,254);
              -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.20);
              -moz-box-shadow: 0 0 1px rgba(0,0,0,0.20);
              box-shadow: 0 0 1px rgba(0,0,0,0.20);
              z-index: 15;
            }

            .direction-l .desc,
            .direction-r .desc {
              position: relative;
              margin: 1em 1em 0 1em;
              padding: 1em;
              z-index: 15;
            }

            @media(min-width: 768px){
              .timeline {
                width: 660px;
                margin: 0 auto;
                margin-top: 20px;
              }

              .timeline li:after {
                content: "";
                display: block;
                height: 0;
                clear: both;
                visibility: hidden;
              }
              
              .timeline .hexa {
                left: -28px;
                right: auto;
                top: 8px;
              }

              .timeline .direction-l .hexa {
                left: auto;
                right: -28px;
              }

              .direction-l {
                position: relative;
                width: 310px;
                float: left;
                text-align: right;
              }

              .direction-r {
                position: relative;
                width: 310px;
                float: right;
                text-align: left;
              }

              .flag-wrapper {
                display: inline-block;
              }
              
              .flag {
                font-size: 18px;
              }

              .direction-l .flag:after {
                left: auto;
                right: -16px;
                top: 50%;
                margin-top: -8px;
                border: solid transparent;
                border-left-color: rgb(254,254,254);
                border-width: 8px;
              }

              .direction-r .flag:after {
                top: 50%;
                margin-top: -8px;
                border: solid transparent;
                border-right-color: rgb(254,254,254);
                border-width: 8px;
                left: -8px;
              }

              .time-wrapper {
                display: inline;
                vertical-align: middle;
                margin: 0;
              }

              .direction-l .time-wrapper {
                float: left;
              }

              .direction-r .time-wrapper {
                float: right;
              }

              .time {
                padding: 5px 10px;
              }

              .direction-r .desc {
                margin: 1em 0 0 0.75em;
              }
            }

            @media(min-width: 992px){
              .timeline {
                width: 800px;
                margin: 0 auto;
                margin-top: 20px;
              }

              .direction-l {
                position: relative;
                width: 380px;
                float: left;
                text-align: right;
              }

              .direction-r {
                position: relative;
                width: 380px;
                float: right;
                text-align: left;
              }
            }
        </style>
        <header>
            <p>Worked on all modern browers</p>
            <h1>CSS based responsive timeline</h1>
        </header>

        <ul class="timeline">

            <li>
            <div class="direction-l">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Lorem ipsum Anim.</span>
            <span class="time-wrapper"><span class="time">Dec 2014</span></span>
            </div>
            <div class="desc">Lorem ipsum In ut sit in dolor nisi ex magna eu anim anim tempor dolore aliquip enim cupidatat laborum dolore.</div>
            </div>
            </li>


            <li>
            <div class="direction-r">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Lorem ipsum.</span>
            <span class="time-wrapper"><span class="time">Feb 2015</span></span>
            </div>
            <div class="desc">Lorem ipsum Nisi labore aute do aute culpa magna nulla voluptate exercitation deserunt proident.</div>
            </div>
            </li>

            <li>
            <div class="direction-l">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Lorem ipsum Anim.</span>
            <span class="time-wrapper"><span class="time">Dec 2014</span></span>
            </div>
            <div class="desc">Lorem ipsum In ut sit in dolor nisi ex magna eu anim anim tempor dolore aliquip enim cupidatat laborum dolore.</div>
            </div>
            </li>

            <li>
            <div class="direction-r">
            <div class="flag-wrapper">
            <span class="hexa"></span>
            <span class="flag">Lorem Occaecat.</span>
            <span class="time-wrapper"><span class="time">July 2014</span></span>
            </div>
            <div class="desc">Lorem ipsum Minim labore Ut cupidatat quis qui deserunt proident fugiat pariatur cillum cupidatat reprehenderit sit id dolor consectetur ut.</div>
            </div>
            </li>
        </ul> -->


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




