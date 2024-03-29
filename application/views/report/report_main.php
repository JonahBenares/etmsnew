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
            <form method='POST' action="<?php echo base_url(); ?>report/search_report/">
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
                                 <tr>
                                    <td><p>Damage</p><input type="checkbox" name="damage" id="damage" value='1'></td>
                                </tr>                                                         
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
                    <input type="submit" class="btn btn-success-alt btn-sm btn-block bor-radius" value='Save'>
                </div>
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="ed_id" id="ed_id">
                <input type="hidden" name="et_id" id="et_id">
            </form>
        </div>
    </div>
</div>


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <!-- <h4 class="text-themecolor">Employee List</h4> -->
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Equipment / Tools List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Equipment / Tools
                            <div class="pull-right btn-group">
                                <button type="button" class="btn btn-sm btn-info-alt " data-toggle="modal" data-target="#largeModal">
                                    <span class="fa fa-filter"></span> Filter
                                </button>
                                <?php if(!empty($filt)){ ?>
                                <a href = "<?php echo base_url(); ?>report/export_equipment/<?php echo $from;?>/<?php echo $to;?>/<?php echo $category;?>/<?php echo $subcat;?>/<?php echo $department;?>/<?php echo urlencode($item);?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $item_type;?>/<?php echo $serial_no;?>/<?php echo $damage;?>/<?php echo $condition;?>/<?php echo $placement;?>/<?php echo $company;?>/<?php echo $rack;?>/<?php echo $encoded_from;?>/<?php echo $encoded_to;?>" class="btn btn-sm btn-info-alt"><span class="fa fa-report"></span>Export to Excel</a>

                                <a href = "<?php echo base_url(); ?>report/report_print/<?php echo $from;?>/<?php echo $to;?>/<?php echo $category;?>/<?php echo $subcat;?>/<?php echo $department;?>/<?php echo urlencode($item);?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $item_type;?>/<?php echo $serial_no;?>/<?php echo $damage;?>/<?php echo $condition;?>/<?php echo $placement;?>/<?php echo $company;?>/<?php echo $rack;?>/<?php echo $encoded_from;?>/<?php echo $encoded_to;?>" class="btn btn-sm btn-info-alt"><span class="fa fa-print"></span> Print</a>
                                <?php }else { ?>
                                <a href = "<?php echo base_url(); ?>report/export_equipment" class="btn btn-sm btn-info-alt"><span class="fa fa-report"></span>Export to Excel</a>
                                
                                <a href = "<?php echo base_url(); ?>report/report_print" target="_blank" class="btn btn-sm btn-info-alt"><span class="fa fa-print"></span> Print</a>
                                <?php } ?>                               
                            </div>                            
                        </h4>
                        <?php if(!empty($filt)){ ?>     
                        <div class='sufee-alert alert with-close alert-success fade show '><span class='btn btn-success disabled'>Filter Applied</span><?php echo $filt ?>, <a href='<?php echo base_url(); ?>report/report_main' class='remove_filter alert-link pull-right btn'><span class="fa fa-times"></span></a></div>                    
                        <?php } ?>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Asset Control No.</th>
                                    <th>Serial No.</th>
                                    <th>Sub Category</th>
                                    <th width="20%">Item</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th width="5%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($main)){
                            foreach($main AS $m){ 
                                    if($m['accountability_id']!=0 && $m['borrowed']==0 && $m['lost']==0 && $m['upgrade']==0 && $m['damaged']==0){
                                        $status = '<span class="badge badge-pill bg-primary-alt uppercase">Assigned</span>';
                                    }else if($m['accountability_id']!=0 && $m['borrowed']==0 && $m['lost']==0 && $m['upgrade']!=0 && $m['damaged']==0){
                                        $status = '<span class="badge badge-pill bg-primary-alt uppercase">Assigned / Upgraded</span>';
                                    }else if($m['accountability_id']!=0 && $m['borrowed']==0 && $m['lost']==0 && $m['upgrade']!=0 && $m['damaged']==1){
                                        $status = '<span class="badge badge-pill bg-danger-alt uppercase">Assigned / Upgraded / Damaged</span>';
                                    }else if($m['accountability_id']!=0 && $m['borrowed']==0 && $m['lost']==0 && $m['upgrade']==0 && $m['damaged']==1){
                                        $status = '<span class="badge badge-pill bg-danger-alt uppercase">Assigned / Damaged</span>';
                                    }else if($m['accountability_id']==0 && $m['damaged']==0 && $m['change_location']==0 && $m['upgrade']==0){
                                        $status = '<span class="badge badge-pill bg-success-alt uppercase">Available</span>';
                                    }else if($m['accountability_id']==0 && $m['damaged']==0 && $m['change_location']==0 && $m['upgrade']!=0){
                                        $status = '<span class="badge badge-pill bg-success-alt uppercase">Available / Upgraded</span>';
                                    }else if($m['accountability_id']==0 && $m['change_location']==1){
                                        $status = "Moved to ".$m['location'];
                                    }else if($m['borrowed']==1){
                                        $status = '<span class="badge badge-pill bg-info-alt uppercase">Borrowed</span>';
                                    }else if($m['damaged']==1 && $m['accountability_id']==0){
                                        $status = '<span class="badge badge-pill bg-danger-alt uppercase">Damaged</span>';
                                    }else if($m['damaged']==1 && $m['accountability_id']!=0){
                                        $status = '<span class="badge badge-pill bg-danger-alt uppercase">Damaged / '.$m['accountability'].'</span>';
                                    }else if($m['lost']==1){
                                        $status = '<span class="badge badge-pill bg-dark-alt uppercase">'.'Lost Item / '.$m['accountability'].'</span>';
                                    }
                                ?>
                                <tr>                                        
                                    <td><?php echo $m['accountability']; ?></td>
                                    <td><?php echo $m['asset_control_no']; ?></td>
                                    <td><?php echo $m['serial_no']; ?></td>
                                    <td><?php echo $m['subcat']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $m['et_id'];?>" class=""  data-toggle="tooltip" data-placement="left" title="View" style="word-wrap: break-word;">
                                            <?php echo $m['et_desc']; ?>
                                        </a>   
                                    </td>
                                    <td><?php echo $m['unit']; ?></td>
                                    <td><?php echo $m['qty']; ?></td>
                                    <td><?php echo $m['department']; ?></td>
                                    <td><?php echo $status;?></td>
                                    <td>                                            
                                        <div class="btn-group">
                                            <?php if($_SESSION['usertype'] == 1){ ?>
                                            <span data-toggle="tooltip" data-placement="top" title="Lost">
                                            <a class="btn btn-secondary-alt text-white item btn-sm" data-toggle="modal" id = "lost_button" data-id = "<?php echo $m['empid'];?>" data-name = "<?php echo $m['accountability'];?>" data-ab = "<?php echo $m['ed_id'];?>" data-ac = '<?php echo $m['et_id']; ?>' data-target="#lostTag" style="border-radius: 3px 0px 0px 3px;">
                                                <i class="fa fa-minus-circle"></i>
                                            </a>
                                            </span>
                                            <a class="btn btn-info-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Update" href="<?php echo base_url(); ?>report/edit_encode/<?php echo $m['et_id'];?>">
                                                <i class="fa fa-edit"></i>
                                            </a>                                            
                                            <?php } ?>                                            
                                            <?php if($_SESSION['usertype'] == 1){ ?>
                                            <a class="btn btn-success-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Return" onClick="viewReturn(<?php echo $m['empid'];?>,<?php echo $m['et_id'];?>)">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <?php } ?>
                                            <a href = "<?php echo base_url(); ?>report/encode_report/<?php echo $m['et_id'];?>" class="btn btn-warning-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                                <i class="fa fa-print"></i>
                                            </a>                                            
                                            <?php if($_SESSION['usertype'] == 1){ ?>
                                            <a class="btn btn-danger-alt item btn-sm text-white" onClick="tagAsDamage(<?php echo $m['empid'];?>,<?php echo $m['et_id'];?>)" data-toggle="tooltip" data-placement="top" title="Tag as Damage" <?php echo ($m['damaged']!=0 && $m['accountability_id']!=0) ? 'style="pointer-events:none;background: #ada9a9;"' : ''; ?>>
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

