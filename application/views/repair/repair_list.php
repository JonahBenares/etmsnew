<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<link src="<?php echo base_url(); ?>assets/select2/select2.min.css">
<script src="<?php echo base_url();?>assets/dist/js/select2.min.js"></script>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Damaged List</li>
                    </ol>
                </div>
            </div>
        </div>
        <!--Modal Start -->
        <div class="modal fade" id="damage_modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="damageExportForm" method="POST" action = "<?php echo base_url();?>repair/export_damage">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-xs-4">
                                        <label for="" class="control-label mb-1">Date Received From:</label>
                                        <input name="date_received_from" type="date" class="form-control bor-radius5" required>
                                    </div>
                                    <div class="col-lg-4 col-xs-4">
                                        <label for="" class="control-label mb-1">Date Received To:</label>
                                        <input name="date_received_to" type="date" class="form-control bor-radius5" required>
                                    </div>
                                    <div class="col-lg-4 col-xs-4">
                                        <label class="control-label mb-1">With accountability</label>
                                        <div class="d-flex align-items-center gap-3 mt-2">
                                            <div class="form-check m-r-5">
                                                <input class="form-check-input m-r-0" type="radio" name="with_accountability" id="accountability_yes" value="1">
                                                <label class="form-check-label" for="accountability_yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input m-r-0" type="radio" name="with_accountability" id="accountability_no" value="0">
                                                <label class="form-check-label" for="accountability_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary-alt btn-block" value="Export">
                            </div>
                        </form>
                    </div>                                        
                </div>
            </div>
        </div>
        <!--Modal End -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Damaged
                            <a href="<?php echo base_url(); ?>report/damage_report_blank" class="btn btn-sm btn-danger pull-right animated headShake infinite">PRINT <b>BLANK</b> E/T DAMAGE REPORT</a>
                            <a href="#"  data-target= "#damage_modal" data-toggle="modal" class="btn btn-sm btn-primary pull-right ">Filter</a>
                        </h4>
                        <form  action="<?php echo base_url(); ?>repair/insert_redirect" method="POST">
                            <table class="table table-borderless table-striped table-earning table-hover" id="myTable_pseret">
                                <thead>
                                    <tr>
                                        <th align="center" width="1%"><input type="checkbox" class="m-0" onClick="toggle_multi(this)"></th>
                                        <th width="25%">Asset Control No.</th>
                                        <th width="40%%">Item Description</th>
                                        <th width="20%">Accountable Person</th>
                                        <th width="%">Brand</th>
                                        <th width="15%">Model</th>
                                        <th width="%">Serial No.</th>
                                        <th width="%">Status</th>
                                        <th width="%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($damage)){ $x=0; foreach($damage as $d){ ?>
                                    <tr>
                                        <!-- <td class="p-b-10 p-t-10" align="center"><input type="checkbox" class="multi m-0" name="edid[]" value=<?php echo $d['ed_id']."/".$d['damage_id']; ?>></td> -->
                                        <td class="p-b-10 p-t-10" align="center"><input type="checkbox" class="multi m-0" name="edid[]" value=<?php echo $d['ed_id']; ?>></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['asset_control'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['et_desc'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo ($d['accountable_id']!=0) ? $d['accountable'] : $d['accountability'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['brand'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['model'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['serial_no'];?></td>
                                        <td class="p-b-10 p-t-10"><?php if($d['beyond_repair']==1){ echo 'Beyond Repair';}else if($d['repair']==1 && $d['count_ed_id'] < 1){ echo 'Repaired'; }?></td>
                                        <td class="p-b-10 p-t-10" align="center">
                                            <div style="display:flex; justify-content:center; align-items:center; gap:5px;">
                                                <a href="<?php echo base_url(); ?>report/damage_report_nav/<?php echo $d['damage_id']?>"
                                                   class="btn btn-warning-alt text-white btn-sm"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Print">
                                                    <i class="fa fa-print"></i>
                                                </a>

                                                <a href="javascript:void(0);"
                                                   class="btn btn-primary btn-sm"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Change Accountability"
                                                   onclick="showChangeAccountability('<?php echo $d['damage_id']; ?>',
                                                                                     '<?php echo $d['accountable_id']; ?>')">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php $x++; } ?>                                        
                                </tbody>
                            </table>
                            <?php if($_SESSION['usertype'] == 1){ ?> 
                            <input type = "submit" class="btn btn-info-alt btn-block  btn-md" value = "Repair" onclick="confirmationRepair(this);return false;">
                            <?php } ?>
                            <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $x;?>">
                            <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="changeAccountability" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4>Change Accountability</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <input type="hidden" id="damage_id">

                <label>Change Accountability</label>
                <select id="new_accountability" name="new_accountability" class="form-control select2-accountability">
                    <?php foreach($new_accountability as $na){ ?>
                        <option value="<?php echo $na->employee_id; ?>">
                            <?php echo $na->employee_name; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="modal-footer">

                <button class="btn btn-primary" onclick="updateAccountability()">
                    Save
                </button>

            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#damage_modal').on('hidden.bs.modal', function () {
            // Only reset radio buttons
            $('input[name="with_accountability"]').prop('checked', false);
        });
    });

    $(function () {
        $('#new_accountability').select2({
            width: '100%',
            dropdownParent: $('#changeAccountability')
        });
    });

    function showChangeAccountability(id, current_employee)
    {
        $('#damage_id').val(id);

        // Select the current employee
        $('#new_accountability').val(current_employee).trigger('change');

        $('#changeAccountability').modal('show');
    }

    function updateAccountability()
    {
        $.ajax({
            url: "<?php echo base_url('repair/update_accountability'); ?>",
            type: "POST",
            data: {
                damage_id: $('#damage_id').val(),
                employee_id: $('#new_accountability').val()
            },
            success: function(res){
                alert("Updated successfully");

                // Redirect to damage report page
                window.location.href = "<?php echo base_url('report/damage_report_nav/'); ?>" + $.trim(res);
            }
        });
    }
</script>

