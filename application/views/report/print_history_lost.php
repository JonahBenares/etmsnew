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
                   <p id="head" style="margin: 0px"> <strong><?php echo COMPANY_NAME;?></strong></p>
                    <p id="head" style="margin: 0px"><?php echo ADDRESS;?></p>
                    <p id="head" style="margin: 0px"><?php echo TEL_NO;?></p>
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;border-left: 2px solid #000" width="50%" align="center">
                    <h5><strong>ASSET CLEARANCE FORM</strong></h5>
                </td>
            </tr>
        </table>
        <form id='ACFform'>
            <div class="col-lg-12" style="margin:10px 0px 10px">
                <table width="100%">
                    <tr>
                        <td width="5%"><h5 class="nomarg">Date</h5></td>
                        <td width="20%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo date('Y-m-d');?></label></td>
                        <td width="34%"></td>
                        <td width="13%"><h5 class="nomarg pull-right">ACF No.</h5></td>
                        <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">: <input type = "text" name = "acf_no" id = "acf_no" value = "<?php echo $acf_no; ?>" readonly></label></td>
                    </tr>            
                </table>
            </div>
            <div class="col-lg-12">
                <table width="100%" class="table-bordered">
                    <tr>                
                        <td class="main-tab" width="10%" align="center"><strong>Date Returned</strong></td>
                        <td class="main-tab" width="10%" align="center"><strong>Date Issued</strong></td>
                        <td class="main-tab" width="10%" align="center"><strong>Asset Control No.</strong></td>                     
                        <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>                     
                        <td class="main-tab" width="10%" align="center"><strong>Item</strong></td>                     
                        <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                        <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                        <td class="main-tab" width="7%" align="center"><strong>Unit Price</strong></td>
                        <td class="main-tab" width="8%" align="center"><strong>Remarks</strong></td>
                    </tr>
                    <?php 
                        if(!empty($sub)){
                            usort($sub, function($a, $b) {
                                $a_id = $a['set_id'] ?? 0;
                                $b_id = $b['set_id'] ?? 0;
                                return $a_id <=> $b_id;
                            });
                            $a=0;
                            $previousId = '';
                            $data2 = [];
                            foreach($sub AS $value){
                                $remarks = !empty($value['remarks'])
                                ? $value['remarks']
                                : (
                                    !empty($value['return_details'])
                                        ? (is_array($value['return_details'])
                                            ? ($value['return_details']['return_remarks'] ?? '')
                                            : (json_decode($value['return_details'], true)['return_remarks'] ?? '')
                                        )
                                        : ''
                                );

                            $key = $value['et_id'] . $remarks;
                                if(!isset($data2[$key])) {
                                    $data2[$key]= array(
                                        'et_id'=>$value['et_id'],
                                        'ed_id'=>$value['ed_id'],
                                        'set_id'=>$value['set_id'],
                                        'set_name'=>$value['set_name'],
                                        'set_price'=>$value['set_price'],
                                        'set_currency'=>$value['set_currency'],
                                        'asset_control_no'=>$value['asset_control_no'],
                                        'serial_no'=>$value['serial_no'],
                                        'currency'=>$value['currency'],
                                        'count_set'=>$value['count_set'],
                                        'cat'=>$value['cat'],
                                        'subcat'=>$value['subcat'],
                                        'unit'=>$value['unit'],
                                        'department'=>$value['department'],
                                        'et_desc'=>$value['et_desc'],
                                        'qty'=>$value['qty'],
                                        'accountability'=>$value['accountability'],
                                        'empid'=>$value['empid'],
                                        'unit_price'=>$value['unit_price'],
                                        'lost'=>$value['lost'],
                                        'date_issued' => $value['date_issued'] 
                                        ?? (is_array($value['et_details'] ?? null) 
                                            ? ($value['et_details']['date_issued'] ?? null) 
                                            : (json_decode($value['et_details'] ?? '', true)['date_issued'] ?? null)
                                        ),
                                        'date_returned' => $return_date ?? '',
                                        'remarks' => $remarks,
                                    );
                                }
                            }
                            foreach($data2 AS $det){ 
                                // if($det['lost'] == 0) continue; 
                    ?>
                        <tr style = "<?php echo ($det['lost']!=0) ? "background-color:#ec7070!important" : ''; ?>">
                            <td class="main-tab" align="center">
                                <?php echo ($det['lost'] != 0) ? '' : ($det['date_returned'] ?? ''); ?>
                            </td>
                            <td class="main-tab" align="center">
                                <?php echo !empty($det['date_issued']) 
                                    ? $det['date_issued'] 
                                    : (!empty($det['et_details']['date_issued']) 
                                        ? $det['et_details']['date_issued'] 
                                        : '-'); ?>
                            </td>
                            <td class="main-tab" align="center"><?php echo $det['asset_control_no'];?></td>
                            <td class="main-tab" align="center"><?php echo $det['serial_no'];?></td>
                            <td class="main-tab" align="center"><?php echo ($det['lost']!=0) ? $det['et_desc']." - <b>Lost Item</b>" : $det['et_desc'];;?></td>
                            <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                            <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                            <?php if ($det['set_id']!=0 && ($previousId !== $det['set_id'])) { ?>
                            <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo ($det['set_id']==0) ? $det['unit_price']." <small>".$det['currency']."</small>" : $det['set_price']." <small>".$det['set_currency']."</small>";?></td>
                            <?php } else { ?>
                            <td class="main-tab" align="center"><?php echo $det['unit_price']." <small>".$det['currency']."</small>";?></td>   
                            <?php } ?>
                            <?php if(!empty($det['accountability'])){ ?>
                                <td class="main-tab" align="center"><?php echo $det['remarks']; ?></td>

                            <?php } else { ?>
                                <td class="main-tab" align="center"><?php echo $det['remarks']; ?></td>
                            <?php } ?>
                        </tr>
                        <?php $previousId = $det['set_id']; } } else { ?>
                        <tr>
                            <td class="main-tab" align="center" colspan='9'><center>No Data Available.</center></td>
                        </tr>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td class="main-tab" colspan="9"><center>***nothing follows***</center></td>
                    </tr>   
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td class="main-tab" style="text-indent:20%">This is to certify that <span style="border-bottom: 1px solid #a2a2a2"><?php echo $name;?></span> cleared from any liabilites from the company. </td>
                    </tr>
                </table>
                <br>
                 <table width="100%">
                    <tr>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Prepared by:</td>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Noted by:</td>
                        <td width="10%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <input class="select" type="" name="" value="<?php echo $user_id;?>">
                        </td> 
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <input class="select" type="" name="" value="">
                        </td>
                        <td></td>
                    </tr>
                </table> 
                <hr>
                <small>printed by: <?php echo $_SESSION['fullname'];?> ||date:: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
            </div>
            </div>
            <br>
            <br>
            <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $id; ?>">
            <center><input type='button' class="btn btn-success-alt p-l-100 p-r-100 m-b-50 animated headShake" id='print' onclick='saveACF()' value='Print'></center>
        </form>
    </div>
</div>