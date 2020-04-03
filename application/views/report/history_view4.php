<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>
<link  href="<?php echo base_url(); ?>assets/dist/css/history.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid p-b-0" >
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
            <div class="card card-hist m-b-0">
                <div id="card-over">                    
                    <div class="card-header" style="background: none; " >
                        <div style="position: absolute;right:20px">
                           
                            <?php if($damage == '1'){ ?>
                                <button class="btn btn-danger-alt btn-block btn-sm animated headShake bor-radius20">Damaged</button>
                            <?php }else if($ids==0 && $changeloc==0){ ?>
                                <button class="btn btn-success-alt btn-block btn-sm animated headShake bor-radius20">Available</button>
                            <?php } else if($borrowed=='1'){ ?>
                                <button class="btn btn-warning-alt btn-block btn-sm animated headShake text-white bor-radius20">Borrowed</button>
                            <?php } else if($ids==0 && $changeloc=='1'){ ?>
                                <button class="btn btn-info-alt btn-block btn-sm animated headShake text-white bor-radius20">Moved to <?php echo $location; ?></button>
                            <?php } else if($lost=='1'){ ?>
                                <button class="btn btn-secondary-alt btn-block btn-sm animated headShake text-white bor-radius20">Lost Item</button>
                            <?php }else { echo ''; } ?>
                        </div>

                        <div style="padding:50px 25px 0px 100px ">
                            <h4 style="font-weight: 450;position: absolute;padding-right: 70px"><?php echo $item ?></h4>  
                        </div>
                    </div>
                    <div class="card-body animated fadeIn">    
                        <div style="padding:80px 25px 25px 100px ">
                            <p style="font-weight: 500;font-size: 13px">Brand: <span style="font-weight: 600"><?php echo $brand ?></span></p>
                            <p style="font-weight: 500;font-size: 13px">Model: <span style="font-weight: 600"><?php echo $model ?></span></p>
                            <p style="font-weight: 500;font-size: 13px">Serial Number: <span style="font-weight: 600"><?php echo $sn ?></span></p> 
                            <hr>   
                            <center><p>Current Accountability</p></center>
                            <?php foreach($history AS $hist){ ?>
                            <?php if($hist['method'] == 'Current') {  ?>
                            <p style="font-weight: 500;font-size: 13px">Employee Name: <span style="font-weight: 600"><?php echo $hist['employee']; ?></span></p>
                            <p style="font-weight: 500;font-size: 13px">Date Issued: <span style="font-weight: 600"><?php echo (!empty($hist['trdate']) ? date('F d, Y', strtotime($hist['trdate'])) : ""); ?></span></p> 
                            <?php } ?>
                        </div>               
                        <div class="img-item animated fadeInLeft" >
                            <?php if(empty($hist['picture'])){ ?>
                                <img src="<?php echo base_url(); ?>assets/images/placeholder2.jpg" width="100%" style="border-radius: 20px">
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>uploads/<?php echo $hist['picture'];?>" width="100%" style="border-radius: 20px;height: 100%">
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- <div class="card shadow-sn m-l-150 m-r-150">
                <div class="card-body">
                    <div class="col-lg-8">
                        <h3></h3>
                    </div>
                    <div class="col-lg-4"></div>
                    
                    <br>
                    <table class= "">
                        <tr>
                            <td align="center"><h4><?php echo $brand ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20">-</h4></td>
                            <td align="center"><h4><?php echo $model ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20">-</h4></td>
                            <td align="center"><h4><?php echo  $sn ?></h4></td>
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
            </div> -->
        </center>

        <ul class="timeline m-t-0">

        <?php 
        function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
            $sort_col = array();
            foreach ($arr as $key=> $row) {
                $sort_col[$key] = $row[$col];
            }

            array_multisort($sort_col, $dir, $arr);
        }


            array_sort_by_column($history, 'trdate');

       
        /*foreach($history AS $his){
            echo $his['trdate']."<br>";
        }*/

       

        $direction = array('direction-r', 'direction-l');
        //$bg_arr = array('bg-info-alt', 'bg-success-alt', 'bg-warning-alt', 'bg-danger-alt','bg-dark-alt');
        //$border_arr = array('border-info', 'border-success', 'border-warning', 'border-danger','border-dark');
        $count_dir=0;
        //$count_bg=0;
        
       foreach($history AS $his){
            
            if($count_dir==2){
                $count_dir=0;
            }

            if($count_dir<2){
                $dir = $direction[$count_dir];
                $count_dir++;
            } 


            if($his['method']=='Current'){
                $bg = 'bg-info-alt';
                $border = "border-info";
            } else 
            if($his['method'] == 'Repaired'){
                $bg = 'bg-danger-alt';
                $border = "border-danger";
            } else if($his['method'] == 'Borrowed'){
                $bg = 'bg-warning-alt';
                $border = "border-warning";
            } else if($his['method'] == 'Returned'){
                $bg = 'bg-success-alt';
                $border = "border-success";
            } else if($his['method'] == 'Lost'){
                $bg = 'bg-dark-alt';
                $border = "border-dark";
            }
           /* if($count_bg==5){
                $count_bg=0;
            }
           
           

            if($count_bg<5){
                $bg = $bg_arr[$count_bg];
                $border = $border_arr[$count_bg];
                $count_bg++;
            } 
*/
           
           ?>
                <li>
                <div class="<?php echo $dir; ?>">
                <div class="flag-wrapper">
                <span class="hexa"></span>
                <span class="flag"><?php echo $his['method']; ?></span>
                <span class="time-wrapper">
                    <span class="time <?php echo $bg; ?>"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></span>
                </span>
                </div>
                <div class="desc shadow-sn <?php echo $border; ?>">
                <?php if($his['method'] == 'Current') {  ?>
                    <p class="font-bold">Employee Name: </p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Date Issued:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                <?php }else if($his['method'] == 'Returned'){  ?>
                    <p class="font-bold">Employee Name:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Return Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Received By:</p>
                    <p class="m-b-10"><?php echo $his['received_by']; ?></p>
                    <p class="font-bold">Remarks:</p>
                    <p class="m-b-10"><?php echo $his['remarks']; ?></p>
                <?php } else if($his['method'] == 'Borrowed'){ ?>
                    <p class="font-bold">Employee Name:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Borrow Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Returned By:</p>
                    <p class="m-b-10"><?php echo $his['returned_by']; ?></p>
                    <p class="font-bold">Return Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['returned_date']) ? date('F d, Y', strtotime($his['returned_date'])) : ""); ?></p>
                <?php } else if($his['method'] == 'Repaired'){ ?>
                    <p class="font-bold">Repair Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">JO No.:</p>
                    <p class="m-b-10"><?php echo $his['jo_no']; ?></p>
                    <p class="font-bold">Repair Price:</p>
                    <p class="m-b-10"><?php echo number_format($his['repair_price'],2); ?></p>
                    <p class="font-bold">Supplier:</p>
                    <p class="m-b-10"><?php echo $his['supplier']; ?></p>
                    <p class="font-bold">Received By :</p>
                    <p class="m-b-10"><?php echo $his['received_by']; ?></p>
                <?php }  else if($his['method'] == 'Lost'){ ?>
                    <p class="font-bold">Date Lost:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Replacement Item:</p>
                    <p class="m-b-10"><?php echo $his['replacement']; ?></p>
                    <p class="font-bold">Accountable Person:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Remarks:</p>
                    <p class="m-b-10"><?php echo $his['remarks']; ?></p>
                <?php } ?>
                </div>
                </div>
                </li>

        
       <?php 
        } ?>
            <!-- 

          

          
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
            </li> -->
        </ul>


       <!--  <div class="row">
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
        </div> -->
    </div>
</div>




