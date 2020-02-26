<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/report.js"></script>
 <!-- MAIN CONTENT-->
<div class="m-t-15">
    <div class="container-fluid">
        <div class="row">                
            <div class="col-lg-12">
                <div class="card bor-radius   shadow">
                    <div class="card-header bg-danger-alt cheader-bor">
                        <!-- <a onclick="history.go(-1);" class="btn btn-default"><span class="fa fa-arrow-left"></span></a> -->
                        <strong>DAMAGE</strong> Equipment / Tools
                    </div>
                    <form action="<?php echo base_url(); ?>index.php/report/insert_damage" method="POST">
                        <div class="card-body card-block">
                           <!--  <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <label for="" class="control-label mb-1">Date of Incident</label>
                                    <input type="date" name = "date" class="mb-1 form-control bor-radius5" required>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label for="" class="control-label mb-1">ETDR No.</label>
                                    <input type="text" id = "rec" name = "turn_to" class="mb-1 form-control bor-radius5" autocomplete="off" required>
                                        <span id="suggestion-receivedby"></span>
                                        <input type="hidden" name="rec_id" id="rec_id" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="" class="control-label mb-1">Remarks:</label>
                                    <textarea class="form-control" cols="10" rows="5"></textarea>
                                </div>
                            </div>                                
                            <br> -->
                            <table class="table table-hover table-bordered">
                                <thead>       
                                    <th width="1%"><input type="checkbox" onClick="toggle_trans(this)" class="" style="margin: 0px"></th>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Serial No.</th>
                                    <th width="15%">Asset Control Number</th>
                                    <th width="10%">Brand</th>
                                    <th width="10%">Model</th>
                                    <th width="10%">Type</th>
                                </thead>
                                <?php $x=0; foreach($details AS $det){ ?>
                                <tr>       
                                    <td><input type="checkbox" name="edid[]"  class="trans" value="<?php echo $det['ed_id']; ?>" style="margin: 0px"></td>
                                    <td><?php echo $det['item'];?></td>
                                    <td><?php echo $det['serial_no'];?></td>
                                    <td><?php echo $det['asset_control_no'];?></td>
                                    <td><?php echo $det['brand'];?></td>
                                    <td><?php echo $det['model'];?></td>
                                    <td><?php echo $det['type'];?></td> 
                                </tr>
                                <?php $x++; } ?>
                            </table>
                        </div>
                        <div class="card-footer">
                            <center>
                                <input type = "submit" class="btn btn-danger-alt btn-sm bor-radius10 btn-block" placeholder="Save" value="Proceed">
                                <input type = "hidden" name = "et_id" value="<?php echo $et_id;?>">
                                <input type = "hidden" name = "id" value="<?php echo $id;?>">
                                <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $x;?>">
                                <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>"> 
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function toggle_trans(source) {
      checkboxes_trans = document.getElementsByClassName('trans');
      for(var i=0, n=checkboxes_trans.length;i<n;i++) {
        checkboxes_trans[i].checked = source.checked;
      }
    }
</script>