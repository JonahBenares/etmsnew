<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/repair.js"></script>
<script type="text/javascript">
    function isNumberKey(evt, obj) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        var value = obj.value;
        var dotcontains = value.indexOf(".") != -1;
        if (dotcontains)
            if (charCode == 46) return false;
        if (charCode == 46) return true;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<style type="text/css">
    .select2 .select2-container .select2-container--default{
        width:243px!important;
    }
    .select2-container--default .select2-selection--single {
        width: 390px!important;
    }
</style>
 <!-- MAIN CONTENT-->
<div class="page-wrapper">
    <div class="container-fluid">
        <form action = '<?php echo base_url(); ?>repair/unsaved' method = "POST">
            <?php
                foreach($rep AS $d){  
                    $z = 1;
                    foreach($details AS $r){ 
                        switch($r){
                            case($d['ed_id'] == $r['ed_id']):
            ?>
            <input type="hidden" name="ed_id<?php echo $z;?>" value = "<?php echo $d['ed_id'];?>">
            <?php 
                break;
                default: 
                    } $z++; } $counter = $z-1; }  
            ?>
            <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $z;?>">
            <input type = "submit" class="btn btn-warning btn-sm text-white" id="back" value = "Back">
        </form>
        
        <form method = "POST" action = "<?php echo base_url(); ?>repair/insert_repair" novalidate>
            <!-- LOOP HERE -->
            <?php 

                foreach($rep AS $d){  
                    $z = 1;
                    foreach($details AS $r){ 
                        switch($r){
                            case($d['ed_id'] == $r['ed_id']):       
            ?>
            <div class="row">                
                <div class="col-lg-12">
                    
                    <div class="card bor-radius20 shadow encode_css_success">
                        <div class=" card-body ">
                            <table class="table">
                                <tr>
                                    <td width="5%" align="center" class="bg-success"><h1 class="text-white"><?php echo $z;?></h1></td>
                                    <td class="p-0" width="40%"  style="border-right:1px solid #a1a1a1 ">
                                        <table width="100%">
                                            
                                            <tr>
                                                <td class="pad-5" width="29%"><small>Asset Control No.</small></td>
                                                <td class="pad-5">: <?php echo $r['acn'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="pad-5"><small>Item Description</small></td>
                                                <td class="pad-5">: <?php echo $r['item'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="pad-5"><small>Category</small></td>
                                                <td class="pad-5">: <?php echo $r['category'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="pad-5"><small>Brand</small></td>
                                                <td class="pad-5">: <?php echo $r['brand'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="pad-5"><small>Model</small></td>
                                                <td class="pad-5">: <?php echo $r['model'];?></td>
                                            </tr>

                                            <tr>
                                                <td class="pad-5"><small>Serial No.</small></td>
                                                <td class="pad-5">: <?php echo $r['serial'];?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <label for="" class="control-label mb-1">Select Method:</label>
                                        <br>
                                        <p><input id="method1" name="method<?php echo $z;?>" type="radio" value="1" required> Repair</p>
                                        <p><input id="method2" name="method<?php echo $z;?>" type="radio" value="2" required> Upgrade</p>
                                        <br>
                                        <label style="display: none" for="" class="control-label mb-1 upgrade_label" id="upgrade_label">Upgrade Item:</label>
                                        <select id="upgrade_itm" name="upgrade_itm<?php echo $z;?>" class="form-control bor-radius5 cc-exp select2" required>
                                            <option value=''>--Select Item--</option>
                                            <?php foreach($et_head AS $eh){ ?>
                                            <option value="<?php echo $eh->et_id;?>"><?php echo $eh->et_desc." | ".$eh->serial_no." | ".$eh->asset_control_no;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label mb-1" id="rep_date">Repair Date:</label>
                                        <input id="date" name="date<?php echo $z;?>" type="date"  class="form-control bor-radius5 cc-exp" required>
                                        <label for="" class="control-label mb-1" id="rep_price">Repair Price:</label>
                                        <input id="price" name="price<?php echo $z;?>" type="text"  class="form-control bor-radius5 cc-exp" onkeypress="return isNumberKey(event,this)">
                                        <label for="" class="control-label mb-1">JO No. / PR No.:</label>
                                        <input id="date" name="jo<?php echo $z;?>" type="text"  class="form-control bor-radius5 cc-exp">
                                        <label for="" class="control-label mb-1">Supplier:</label>
                                        <input id="date" name="supplier<?php echo $z;?>" type="text"  class="form-control bor-radius5 cc-exp">
                                    </td>
                                    <td>
                                        <label for="" class="control-label mb-1">Assessment:</label>
                                        <br>
                                        <p><input id="radio" name="repair<?php echo $z;?>" type="radio" value="1" required> Repaired</p>
                                        <p><input id="radio" name="repair<?php echo $z;?>" type="radio" value="2" required> Beyond Repair</p>
                                        <br>
                                        <label for="" class="control-label mb-1">Received by:</label>
                                        <input name="receive" type="text" class="form-control bor-radius5 cc-exp receive" data-trigger="<?php echo $z;?>"  autocomplete = "off"  id = "receive<?php echo $z; ?>">
                                        <span id="suggestion-receive<?php echo $z;?>"></span>
                                        <input type="hidden" name="rec_id<?php echo $z;?>" id="rec_id<?php echo $z;?>">

                                        <label for="" class="control-label mb-1">Remarks:</label>
                                        <textarea name="remarks<?php echo $z;?>" id=""  rows="7" class="form-control"></textarea>
                                    </td>
                                    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                                    <input type="hidden" name="ed_id<?php echo $z;?>" value = "<?php echo $d['ed_id'];?>">
                                    <input type="hidden" name="repair_id<?php echo $z;?>" value = "<?php echo $r['repair_id'];?>">
                                    <!-- <input type="hidden" name="damage_id<?php echo $z;?>" value = "<?php echo $d['damage_id'];?>"> -->
                                    <input type="hidden" name="user_id<?php echo $z;?>" value = "<?php echo $_SESSION['user_id'];?>">
                                </tr>
                            </table>
                        </div>                        
                    </div>                     
                </div>
            </div>
            <?php //$z++; } ?>
            <?php break;
                    default: 
                    } $z++; } $counter = $z-1; }  ?>
            <!-- LOOP HERE -->
            <center><div id='alt' style="font-weight:bold"></div></center>
            <div class="row">
                    <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $z;?>">
                    <input type="submit" id="saved" name="submit" class="btn btn-success btn-block  btn-md" value = "Save" onclick="confirmationSave(this);return false;">
            </div>
        </form> 
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').hide();
        $("#method1").click(function(){
            document.getElementById("rep_date").innerHTML = 'Repair Date:';
            document.getElementById("rep_price").innerHTML = 'Repair Price:';
            $('.select2').hide();
            $('.upgrade_label').hide();
        });

        $("#method2").click(function(){
            document.getElementById("rep_date").innerHTML = 'Upgrade Date:';
            document.getElementById("rep_price").innerHTML = 'Upgrade Price:';
            $('.select2').show();
            $('.upgrade_label').show();
        });
    });
</script>