<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>


<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-filter"></span>  Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/search_report_avail/">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table width="100%">
                                <tr>
                                    <td><p>Date Encoded (from):</p>
                                        <input type="date"  name="encoded_from" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Acquired Date (from):</p>
                                        <input type="date"  name="from" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Category:</p>
                                       <select name="category" class="form-control bor-radius5" id="category" onChange="chooseCategory();">
                                         <option value=''>-- Select Category --</option>
                                           <?php 
                                                foreach ($cat AS $cat) {
                                            ?>
                                            <option value="<?php echo $cat->category_id; ?>"><?php echo $cat->category_name;?></option>
                                            <?php } ?>
                                     </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Sub Category:</p>
                                         <select id="subcat" name="subcat" class="form-control bor-radius5"></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Office/Department:</p>
                                        <input type="text" id="department" name="department" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Item Description:</p>
                                        <input type="text" id="item" name="item" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Physical Condition :</p>
                                        <input type = "text" name="condition" class="form-control bor-radius5">
                                    </td>
                                </tr> 
                                <tr>
                                    <td><p>Placement :</p>
                                        <select name="placement" class="form-control bor-radius5">
                                            <option value=''>-- Select Placement --</option>
                                           <?php 
                                                foreach ($placement1 AS $p) {
                                            ?>
                                            <option value="<?php echo $p->placement_id; ?>"><?php echo $p->placement_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>  
                                 <!-- <tr>
                                    <td><p>Damage</p><input type="checkbox" name="damage" id="damage" value='1'></td>
                                </tr>                                                          -->
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table width="100%">
                                <tr>
                                    <td><p>Date Encoded (to):</p>
                                        <input type="date"  name="encoded_to" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Acquired Date (to):</p>
                                        <input type="date"  name="to" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Brand:</p>
                                        <input type="text" id="brand" name="brand" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Model:</p>
                                        <input type="text" id="model" name="model" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Type:</p>
                                        <input type="text" id="item_type" name="item_type" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Serial No. :</p>
                                        <input type="text" id="serial_no" name="serial_no" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Company :</p>
                                        <select name="company" class="form-control bor-radius5">
                                            <option value=''>-- Select Company --</option>
                                           <?php 
                                                foreach ($company1 AS $r) {
                                            ?>
                                            <option value="<?php echo $r->company_id; ?>"><?php echo $r->company_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><p>Rack :</p>
                                        <select name="rack" class="form-control bor-radius5">
                                            <option value=''>-- Select Rack --</option>
                                           <?php 
                                                foreach ($rack1 AS $r) {
                                            ?>
                                            <option value="<?php echo $r->rack_id; ?>"><?php echo $r->rack_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success-alt btn-sm btn-block bor-radius" value='Filter'>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="lostTag" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-filter"></span>  Lost Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/insert_lost">
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><p>Lost Date:</p>
                                <input type="date" id="lost_date" name="lost_date" class="form-control bor-radius10" >
                            </td>
                        </tr>
                        <tr>
                            <td><p>Accountable Person:</p>
                                <input type="text" style = "pointer-events: none;" name="accountable" id="accountable" class="form-control bor-radius10" >
                            </td>
                        </tr>
                        <tr>
                            <td><p>Remarks:</p>
                                <textarea id="remarks" name="remarks" class="form-control bor-radius10"></textarea>
                            </td>
                        </tr>                                                        
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm btn-block bor-radius" value='Save'>
                </div>
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="ed_id" id="ed_id">
                <input type="hidden" name="et_id" id="et_id">
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="transferItem" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-forward"></span>  Transfer Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/transfer_item">
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><p>Location:</p>
                                <select id="location" name="location" class="form-control bor-radius10">
                                    <option value="">--Select Location--</option>
                                    <?php foreach($location AS $l){ ?>
                                    <option value="<?php echo $l->location_id; ?>"><?php echo $l->location_name; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <p>Date Transfer:</p>
                                <input type="date" id="date" name="transfer_date" onChange="chooseTrans();" class="form-control bor-radius10">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Transfer Series:</p>
                                <select id="trans" name="transfer_no" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ></select>
                            </td>
                        </tr>                                                     
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm btn-block bor-radius" value='Save'>
                </div>
                <input type="hidden" name="ed_id" id="ed_ids">
            </form>
        </div>
    </div>
</div>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Available Equipment / Tools List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Available Equipment / Tools
                            <div class="pull-right btn-group">
                                <?php if($_SESSION['usertype'] == 1){ ?>
                                <a href="<?php echo base_url(); ?>report/create_set_avail" class="btn btn-warning-alt btn-sm text-white">Create Set</a>
                                <a href="<?php echo base_url(); ?>report/aaf_assign_rep" class="btn btn-success-alt btn-sm">
                                    Assign
                                </a>
                                <?php } ?>
                                <button type="button" class="btn btn-sm btn-info-alt " data-toggle="modal" data-target="#largeModal">
                                    <span class="fa fa-filter"></span> Filter
                                </button>
                                <?php if(!empty($filt)){ ?>
                                    <a href = "<?php echo base_url(); ?>report/export_equipment_avail/<?php echo $from;?>/<?php echo $to;?>/<?php echo $category;?>/<?php echo $subcat;?>/<?php echo $department;?>/<?php echo urlencode($item);?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $item_type;?>/<?php echo $serial_no;?>/<?php echo $damage;?>/<?php echo $condition;?>/<?php echo $placement;?>/<?php echo $company;?>/<?php echo $rack;?>/<?php echo $encoded_from;?>/<?php echo $encoded_to;?>" class="btn btn-sm btn-info-alt"><span class="fa fa-report"></span>Export to Excel</a>

                                    <a href = "<?php echo base_url(); ?>report/report_print_avail/<?php echo $from;?>/<?php echo $to;?>/<?php echo $category;?>/<?php echo $subcat;?>/<?php echo $department;?>/<?php echo urlencode($item);?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $item_type;?>/<?php echo $serial_no;?>/<?php echo $damage;?>/<?php echo $condition;?>/<?php echo $placement;?>/<?php echo $company;?>/<?php echo $rack;?>/<?php echo $encoded_from;?>/<?php echo $encoded_to;?>" class="btn btn-sm btn-info-alt"><span class="fa fa-print"></span> Print</a>
                                <?php }else { ?>
                                    <a href = "<?php echo base_url(); ?>report/export_equipment_avail" class="btn btn-sm btn-info-alt"><span class="fa fa-report"></span>Export to Excel</a>
                                    <a href = "<?php echo base_url(); ?>report/report_print_avail" target="_blank" class="btn btn-sm btn-info-alt"><span class="fa fa-print"></span> Print</a>
                                <?php } ?> 
                                <!-- <a href = "<?php echo base_url(); ?>report/report_print_avail" class="btn btn-info-alt btn-sm"><span class="fa fa-print"></span> Print</a>                -->
                            </div>                            
                        </h4>
                        <?php if(!empty($filt)){ ?>     
                            <div class='sufee-alert alert with-close alert-success fade show '><span class='btn btn-success disabled'>Filter Applied</span><?php echo $filt ?>, <a href='<?php echo base_url(); ?>report/report_main_avail' class='remove_filter alert-link pull-right btn'><span class="fa fa-times"></span></a></div>                    
                        <?php } ?>
                        <table class="table table-striped table-hover" id="myTable_peret">
                            <thead>
                                    <tr>
                                        <th width="20%">Subcategory</th>
                                        <th width="20%">Item</th>
                                        <th>Asset Control No.</th>
                                        <th>Serial No.</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Previous Owner</th>
                                        <th width="3%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($avail)){ foreach($avail AS $a){ ?>
                                    <tr <?php if($a['damaged'] == 1){ echo "class='tr-damage'"; } else { echo ''; }?>>
                                        <td><?php echo $a['subcat']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>report/view_more/<?php echo $a['et_id']; ?>"  data-toggle="tooltip" data-placement="left" title="View">
                                            <?php echo $a['et_desc']; ?>
                                             </a>
                                            
                                        </td>
                                        <td ><?php echo $a['asset_control_no']; ?></td>
                                        <td><?php echo $a['serial_no']; ?></td>
                                        <td align="center"><?php echo $a['unit']; ?></td>
                                        <td align="center"><?php echo $a['qty']; ?></td>
                                        <td><?php echo $a['prev_owner']; ?></td>
                                        <td >  
                                            <div class="btn-group">
                                            <?php if($a['damaged']!=1){ ?>     
                                                <?php if($_SESSION['usertype'] == 1){ ?>                                     
                                                <span data-toggle="tooltip" data-placement="top" title="Lost Item"><a class="btn btn-secondary-alt text-white item btn-sm" data-toggle="modal" id = "lost_button" data-id = "<?php echo $a['empid'];?>" data-name = "<?php echo $a['accountability'];?>" data-ab = "<?php echo $a['ed_id'];?>" data-ac = '<?php echo $a['et_id']; ?>' data-target="#lostTag" title="Lost">
                                                    <i class="fa fa-minus-circle"></i>
                                                </a></span>
                                                <a class="btn btn-info-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Update" href="<?php echo base_url(); ?>report/edit_encode/<?php echo $a['et_id'];?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php } ?> 
                                                <a href = "<?php echo base_url(); ?>report/encode_report/<?php echo $a['et_id'];?>" class="btn btn-warning-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                                <?php if($_SESSION['usertype'] == 1){ ?>
                                                <span data-toggle="tooltip" data-placement="top" title="Transfer Item"><a class="btn btn-success-alt item btn-sm text-white" id="itemTransfer" data-id = "<?php echo $a['ed_id'];?>" data-toggle="modal" data-placement="top" title="Transfer Item" data-target="#transferItem">
                                                    <i class="fa fa-forward"></i>
                                                </a></span>
                                                <a class="btn btn-danger-alt item btn-sm text-white" onClick="tagAsDamage(<?php echo $a['empid'];?>,<?php echo $a['et_id'];?>)" data-toggle="tooltip" data-placement="top" title="Tag as Damage">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <?php } ?> 
                                                <?php if($a['method']==1 && $a['upgrade_rem']!=0){ ?>
                                                <a href="<?php echo base_url(); ?>report/remove_upgrade_avail/<?php echo $a['et_id']; ?>/<?php echo $a['rep_edid']; ?>" onclick="confirmationRemove(this);return false;" class="btn btn-warning-alt item btn-sm text-white" data-toggle="tooltip" data-placement="top" title="Remove Upgrade">
                                                    <i class="fa fa-eraser"></i>
                                                </a>  
                                            <?php } }?> 
                                            </div>
                                        </td>
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

