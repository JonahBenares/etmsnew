<link href="<?php echo base_url(); ?>assets/dist/css/prntrp.css" rel="stylesheet">
<div class="main-contdent" >
    <div>
        <div  style="position: fixed;width: 100%;top: 0" id="btn_print" >
            <center>
                <a class="btn btn-lg btn-warning-alt text-white" href = '<?php echo base_url(); ?>report/report_main_avail'  style="width:5%"><span class="fa fa-chevron-left"></span></a>
                <button class="btn btn-lg btn-info-alt" style="width:90%;" onclick="printDiv('printableArea')">Print</button>
            </center>
        </div>
        <div id="printableArea" style="margin-top:50px">
            <table class=" table-bordered table-hover" style="width:190%">
                <tr>
                    <td class="thead">Category</td>
                    <td class="thead" align="center">Asset Control No.</td>
                    <td class="thead" align="center">Acquisition Date</td>
                    <td class="thead"><p style="width: 300px">Item Description</p></td>
                    <td class="thead">Brand</td>
                    <td class="thead">Model</td>
                    <td class="thead">Serial No.</td>
                    <td class="thead">Qty</td>
                    <td class="thead">UOM</td>
                    <td class="thead">Date Issue</td>
                    <td class="thead">Status</td>
                    <td class="thead">Department</td>
                    <td class="thead">Placement</td>
                    <td class="thead">Rack</td>
                    <td class="thead">Company</td>
                    <td class="thead" align="center">Physical Condition</td>
                    <td class="thead" align="center">Set Name</td>
                    <td class="thead" align="center">Set Serial No.</td>
                    <td class="thead" align="center">Unit Cost</td>
                    <td class="thead" align="center">Total Cost</td>
                    <td width="30%" class="thead">Remarks</td>
                    <td class="thead" align="center">Date of Inspection</td>
                    <td class="thead" align="center">Inspected By</td>
                    <td class="thead" align="center">Status</td>
                    <td class="thead" align="center">Inspection Remarks</td>
                </tr>
                <tbody>
                    <?php 
                        $previousId='';
                        foreach($report AS $r){ 
                        if($r['accountability_id']!=0 && $r['borrowed']==0){
                            $status = 'Assigned';
                        }else if($r['accountability_id']==0 && $r['damaged']==0 && $r['change_location']==0){
                            $status = '<span style = "color:green;">Available</span>';
                        }else if($r['accountability_id']==0 && $r['change_location']==1){
                            $status = "Moved to ".$r['location'];
                        }else if($r['borrowed']==1){
                            $status = '<span style = "color:blue;">Borrowed</span>';
                        }else if($r['damaged']==1){
                            $status = '<span style = "color:red;">Damaged</span>';
                        }
                    ?>
                    <tr>
                        <td><?php echo $r['category'];?></td>
                        <td align="center"><?php echo $r['asset_control_no'];?></td>
                        <td align="center"><?php echo $r['acquisition_date'];?></td>
                        <td style="white-space: normal!important;"><?php echo $r['item'];?></td>
                        <td><?php echo $r['brand'];?></td>
                        <td><?php echo $r['model'];?></td>
                        <td><?php echo $r['serial_no'];?></td>
                        <td><?php echo $r['qty'];?></td>
                        <td><?php echo $r['unit'];?></td>
                        <td><?php echo $r['date_issued'];?></td>
                        <td><?php echo $status;?></td>
                        <td><?php echo $r['department'];?></td>
                        <td><?php echo $r['placement'];?></td>
                        <td><?php echo $r['rack'];?></td>
                        <td><?php echo $r['company'];?></td>
                        <td align="center"><?php echo $r['condition'];?></td>
                        <?php
                            if ($r['set_id']!=0 && ($previousId !== $r['set_id'])) { 
                        ?>
                            <td class="main-tab" align="center" <?php if($r['set_id']!=0) echo " rowspan='".$r['count_set']."'"; ?>><?php echo $r['set_name'];?></td>
                            <td class="main-tab" align="center" <?php if($r['set_id']!=0) echo " rowspan='".$r['count_set']."'"; ?>><?php echo $r['set_serial'];?></td>
                            <td class="main-tab" align="center" <?php if($r['set_id']!=0) echo " rowspan='".$r['count_set']."'"; ?>><?php echo $r['unit_price']; ?></td>
                            <td class="main-tab" align="center" <?php if($r['set_id']!=0) echo " rowspan='".$r['count_set']."'"; ?>><?php echo number_format($r['total'],2); ?></td>
                            <td <?php if($r['set_id']!=0) echo " rowspan='".$r['count_set']."'"; ?> style="text-wrap: wrap;"><?php echo $r['remarks'];?></td>
                        <?php }else if($r['set_id']==0){ ?>
                            <td class="main-tab" align="center"><?php echo $r['set_name'];?></td>
                            <td class="main-tab" align="center"><?php echo $r['set_serial'];?></td>
                            <td class="main-tab" align="center"><?php echo $r['unit_price']; ?></td>
                            <td class="main-tab" align="center"><?php echo number_format($r['total'],2); ?></td>
                            <td style="text-wrap: wrap;"><?php echo $r['remarks'];?></td>
                        <?php } $previousId = $r['set_id']; ?>
                        <td><?php echo $r['inspection_date']?></td>
                        <td><?php echo $r['inspected_by']?></td>
                        <td><?php echo $r['ins_status']?></td>
                        <td><?php echo $r['ins_remarks']?></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname']; ?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        window.print();
    }
</script>