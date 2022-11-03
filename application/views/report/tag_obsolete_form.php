<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<?php 
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }
?>
 <!-- MAIN CONTENT-->
<div class="m-t-20">
    <div class="container-fluid">
        <div class="row">                
            <div class="col-lg-12">
                <form action="<?php echo base_url(); ?>report/insert_obsolete_form" method="POST">
                <?php 

                foreach($head AS $h){  
                    $x = 1;
                    foreach($details AS $det){     
                    switch($det){
                    case($h['et_id'] == $det['et_id']):
                ?>
                <div class="card bor-radius20 shadow encode_css_danger">
                    <div class=" card-body card-block">
                        <div class="rows">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <center><a href=""  class="btn btn-danger btn-block btn-lg m-t-10"><?php echo $x;?></a></center>
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="control-label mb-1">Receive Date:</label>
                                            <input id="recdate" name="recdate<?php echo $x;?>" type="date" class="form-control bor-radius5 cc-exp" required>
                                        </div>
                                        <div class="col-5">
                                            <label for="" class="control-label mb-1">Date of Incident:</label>
                                            <input id="date" name="date<?php echo $x;?>" type="date" class="form-control bor-radius5 cc-exp" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="control-label mb-1">Activity that the equipment was being used for:</label>
                                            <textarea name="activity<?php echo $x;?>" id="" class="form-control" cols="30" rows="2" required></textarea>
                                        </div>     
                                        <div class="col-lg-6">
                                            <label for="" class="control-label mb-1">Location where incident occurred:</label>
                                            <textarea name="location<?php echo $x;?>" id="" class="form-control" cols="30" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">                                                 
                                        <div class="col-6">
                                            <label for="" class="control-label mb-1">Date Acquired:</label>
                                            <input id="" name="date_aquired" type="date" class="form-control bor-radius5 cc-exp"  value = "<?php echo $det['acquisition_date']; ?>" style = "pointer-events:none;">
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="control-label mb-1">Item Name:</label>
                                            <input id="" name="item" type="text" class="form-control bor-radius5 cc-exp" value = "<?php echo $h['item'];?>" style = "pointer-events:none;">
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Asset Control No:</label>
                                            <div class="input-group">
                                                <input id="" name="asset_control_no" class="form-control bor-radius5 cc-cvc" type="text" value = "<?php echo $det['asset_control_no']; ?>" style = "pointer-events:none;">
                                            </div>
                                        </div>                                                
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Model:</label>
                                            <div class="input-group">
                                                <input id="" name="model" class="form-control bor-radius5 cc-cvc" type="text" value = "<?php echo $det['model']; ?>" style = "pointer-events:none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">  
                                        <div class="col-6">
                                            <label for="" class="control-label mb-1">Brand:</label>
                                            <input id="" name="brand" type="text" class="form-control bor-radius5 cc-exp"  value = "<?php echo $det['brand']; ?>" style = "pointer-events:none;">
                                        </div>                                               
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Serial Number:</label>
                                            <div class="input-group">
                                                <input id="" name="serial" class="form-control bor-radius5 cc-cvc" type="text" value = "<?php echo $det['serial']; ?>" style = "pointer-events:none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">PO/SI Number</label>
                                            <div class="input-group">
                                                <input id="" name="po_si_no<?php echo $x;?>" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                                 
                                        <div class="col-12">
                                            <label for="" class="control-label mb-1">Person(s) who were using the equipment/Memorandum Receipt/Accountability:</label>
                                            <textarea name="receipt<?php echo $x;?>" class="form-control" id="" cols="30" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">                                                 
                                        <div class="col-12">
                                            <label for="" class="control-label mb-1">Provide a brief description and recommendation for the equipment:</label>
                                            <textarea name="recommendation<?php echo $x;?>" class="form-control" id="" cols="30" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">                                                 
                                        <div class="col-12">
                                            <label for="" class="control-label mb-1">Remarks:</label>
                                            <textarea name="remarks<?php echo $x;?>" class="form-control" id="" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">                                                 
                                        <div class="col-6">
                                            <label for="" class="control-label mb-1">Prepared By:</label>
                                            <input name="prepared_by" type="text" class="form-control bor-radius5 cc-exp checked" data-trigger="<?php echo $x;?>"  autocomplete = "off"  id = "checked<?php echo $x; ?>">
                                            <span id="suggestion-checked<?php echo $x;?>"></span>
                                            <input type="hidden" name="prepared_id<?php echo $x;?>" id="checked_id<?php echo $x;?>" >
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Accountable Person:</label>
                                            <input type="text" class="form-control bor-radius5 cc-exp accountable" data-trigger="<?php echo $x;?>"  value = "<?php echo $h['accountability'];?>" style = "pointer-events:none;" autocomplete = "off"  id = "accountable<?php echo $x; ?>">
                                            <!--<span id="suggestion-accountable<?php echo $x;?>"></span>-->
                                            <input type="hidden" name="accountable<?php echo $x;?>" value="<?php echo $id; ?>">
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Verified By:</label>
                                            <input name="verified_by" type="text" class="form-control bor-radius5 cc-exp submitted" data-trigger="<?php echo $x;?>"  autocomplete = "off"  id = "submitted<?php echo $x; ?>" required>
                                            <span id="suggestion-submitted<?php echo $x;?>"></span>
                                            <input type="hidden" name="verified_id<?php echo $x;?>" id="submitted_id<?php echo $x;?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="control-label mb-1">Noted By:</label>
                                            <input name="noted_by" type="text" class="form-control bor-radius5 cc-exp noted" data-trigger="<?php echo $x;?>"  autocomplete = "off"  id = "noted<?php echo $x; ?>" >
                                            <span id="suggestion-noted<?php echo $x;?>"></span>
                                            <input type="hidden" name="noted_id<?php echo $x;?>" id="noted_id<?php echo $x;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <input type = "hidden" name = "ed_id<?php echo $x;?>" value="<?php echo $det['ed_id'];?>">
                <?php   
                    break;
                    default: 
                    } $x++; } }
                    $counter = $x - 1;
                ?>
                <div class="card-footer ">
                    <center> 
                        <input type = "submit" class="btn btn-success-alt btn-block " value="Save">  
                        <input type = "hidden" name = "et_id" value="<?php echo $et_id;?>">
                        <input type="hidden" id="id" name="id" class="form-control" value = "<?php echo $id;?>">    
                        <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $counter;?>">
                        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                        <input type="hidden" id="user_id" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">                    
                    </center>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>