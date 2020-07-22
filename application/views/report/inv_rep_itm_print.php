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
            <table class=" table-bordered table-hover" style="width:100%">
                <tr>
                    <td class="thead">Item Name</td>
                    <td class="thead" align="center">Set Name</td>
                    <td class="thead" align="center">Available</td>
                    <td class="thead"><p style="width: 300px">In-Use</p></td>
                </tr>
                <tbody>
                    <tr>
                        <td></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td style="white-space: normal!important;"></td>
                    </tr>
                    
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