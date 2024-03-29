<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/printable.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid m-t-20">        
        <table class = "table-main " style = "width:100%">
            <tr>
                <td style="padding:10px;border-bottom: 2px solid #000" width="15%">
                    <img src="<?php echo base_url().LOGO;?>" width="100%" height="auto">
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;"  width="35%" >
                   <p style="margin: 0px"> <strong><?php echo COMPANY_NAME;?></strong></p>
                    <p style="margin: 0px"><?php echo ADDRESS;?></p>
                    <p style="margin: 0px"><?php echo TEL_NO;?></p>
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;border-left: 2px solid #000" width="50%" align="center">
                    <h5><strong>ASSET ACCOUNTABILITY FORM <?php echo ($save_temp!=0) ? '<span style="color:red;">(DRAFT)</span>' : ''; ?></strong></h5>
                </td>
            </tr>
        </table>
        <form id='Assignform' class="<?php echo ($save_temp!=0) ? 'cancel' : '';?>">
            <div class="col-lg-12" style="margin:10px 0px 10px">
                <table width="100%">
                    <tr>
                        <td width="13%"><h5 class="nomarg">Employee</h5></td>
                        <td width="40%" style="border-bottom: 1px solid #999">
                            <input type="text" id = "assign" name = "assigned" autocomplete="off" style="width: 100%" value = "<?php echo $name;?>">
                        </td>
                        <td width="4%"></td>
                        <td width="13%"><h5 class="nomarg pull-right">Employee No.</h5></td>
                        <td colspan="3" style="border-bottom: 1px solid #999; padding-left: 10px;">
                            <input type="text" name = "aaf_no" id ="aaf_no" style="width: 100%" value = "<?php echo $employee_no;?>">
                        </td>
                    </tr>
                    <tr>
                        <td><h5 class="nomarg">Position</h5></td>
                        <td style="border-bottom: 1px solid #999">
                            <input type="text" name = "position" id = "position" style="width: 100%" value = "<?php echo $position;?>">
                        </td>
                        <td width="4%"></td>
                        <td width="13%"><h5 class="nomarg pull-right">Date Issued</h5></td>
                        <td colspan="3" style="border-bottom: 1px solid #999;padding-left: 10px;">
                            <input type="date" name = "date_issued" id ="date_issued" style="width: 100%" value = "<?php echo $date_issued;?>">
                        </td>
                    </tr>
                    <tr>
                        <td><h5 class="nomarg">Department</h5></td>
                        <td style="border-bottom: 1px solid #999">
                            <input type="text" name = "department" id = "department" style="width: 100%" value = "<?php echo $department;?>">
                        </td>
                    </tr>              
                </table>
            </div>
            <div class="col-lg-12">
                <table width="100%" class="table-bordered">
                    <tr>                
                        <td class="main-tab" width="7%" align="center"><strong>Asset #</strong></td>
                        <td class="main-tab" width="6%" align="center"><strong>Acq Date</strong></td>
                        <td class="main-tab" width="20%" align="center"><strong>Item</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Brand</strong></td>                           
                        <td class="main-tab" width="10%" align="center"><strong>Model</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>                    
                        <td class="main-tab" width="3%" align="center"><strong>Qty</strong></td>
                        <td class="main-tab" width="4%" align="center"><strong>U/M</strong></td>
                        <td class="main-tab" width="8%" align="center"><strong>Cost</strong></td>
                        <td class="main-tab" width="8%" align="center"><strong>Total</strong></td>
                        <td class="main-tab" width="8%" align="center"><strong>Status</strong></td>
                    </tr>
                    <tr>
                        <?php 
                            if(!empty($head)){ 
                                foreach($head as $head){
                                    foreach($details AS $det){ 
                                        switch($det){
                                            case($head['et_id'] == $det['et_id']):

                                    if($det['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']==0 && $det['damaged']==0){
                                        $status = 'Assigned';
                                    }else if($det['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']!=0){
                                        $status = 'Assigned / Upgraded';
                                    }else if($det['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']==0 && $det['damaged']==1){
                                        $status = 'Assigned / Damaged';
                                    }else if($det['accountability_id']==0 && $det['damaged']==0 && $det['change_location']==0 && $det['upgrade']==0){
                                        $status = 'Available';
                                    }else if($det['accountability_id']==0 && $det['damaged']==0 && $det['change_location']==0 && $det['upgrade']!=0){
                                        $status = 'Available / Upgraded';
                                    }else if($det['accountability_id']==0 && $det['change_location']==1){
                                        $status = "Moved to ".$det['location'];
                                    }else if($det['borrowed']==1){
                                        $status = 'Borrowed';
                                    }else if($det['damaged']==1 && $det['accountability_id']==0){
                                        $status = '>Damaged';
                                    }else if($det['damaged']==1 && $det['accountability_id']!=0){
                                        $status = '>Damaged / '.$det['accountability'].'</span>';
                                    }else if($det['lost']==1){
                                        $status = 'Lost Item / '.$det['accountability'].'</span>';
                                    }
                        ?>
                        <tr>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['acn_no'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['date'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['item'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['brand'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['model'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['serial'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['qty'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['unit'];?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $det['price']." <small>".$det['currency']."</small>";?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo number_format($det['price'],2)." <small>".$det['currency']."</small>";?></td>
                            <td class="main-tab" align="center" style="font-size: 11px"><?php echo $status;?></td>
                        </tr>
                        <?php   
                            break;
                            default: 
                            } } } 
                            } else { 
                        ?>
                        <tr>
                            <td class="main-tab" align="center" colspan='11'><center>No Data Available.</center></td>
                        </tr>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td class="main-tab" colspan="11"><center>***nothing follows***</center></td>
                    </tr>  
                </table>
                <br>
                <table width = '100%'>
                        <tr>
                            <td width = '7%' style ="color:black;"><strong>Remarks:</strong></td>
                            <td style = "border-bottom: 1px solid #aeaeae">
                                <?php 
                                    foreach($remarks_it AS $rem){ 
                                ?>
                                <?php if($rem['remarks'] == ''){ ?>   
                                <?php } else { ?>
                                    <b><?php echo $rem['remarks']; ?> ,</b>
                                <?php } ?>
                                <?php } ?> 
                            </td>
                        </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td class="main-tab" style="text-indent:20%">I hereby acknowledge receipt of the company owned property/ies listed above for which I am accountable. I agree to maintain the property/ies in good condition and to return it when I cease working for the company, or earlier on request.  I promise to report any loss or damage immediately and further agree to use the said property for work related purposes.</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Prepared by:</td>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Received by:</td>
                        <td width="10%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom:1px solid #000;vertical-align:bottom;color:black" align = 'center'>
                            <?php echo $user_id;?>
                        </td> 
                        <td></td>
                        <td style="border-bottom:1px solid #000;color:black">
                            <?php if($type == 2){ ?>
                                <?php 
                                    if(!empty($child)){
                                        foreach($child as $c){ 
                                            echo  "<div style='margin-top: 20px;'>".$c['emp'].", </div>"; 
                                        }
                                    }else{
                                        echo $name;
                                    }
                                ?>
                            <?php } else { ?>
                                <div style = "text-align:center;"><?php echo  $name;?></div>
                            <?php } ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="select" type="" name="" value="Asset Management Assistant" >
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table> 
            </div>
            <br>
            <br>
            <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
            <center>
                <div class="btn-group" id="btn-group-print">
                    <a href="<?php echo base_url(); ?>encode/encode_et" class="btn btn-warning-alt text-white" id="back"><span class="fa fa-plus"></span> Add New</a>
                    <input type='button' class="btn btn-info-alt p-l-50 p-r-50 " id='print' value='Print'>
                </div>
            </center>
            <input type="hidden" id="user_id" name="user_id" value = "<?php echo $_SESSION['user_id'];?>"> 
            <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
        </form>
    </div>
</div>