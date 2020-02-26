<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>




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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/report_main_emp">Equipment / Tools Per Employee</a></li>
                        <li class="breadcrumb-item"><a onclick="history.go(-1);">Current Items</a></li>
                        <li class="breadcrumb-item active">Return Report</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                   <!--  <div class="card-header bg-white" style="border-radius: 10px 10px 0px 0px">
                        
                    </div> -->
                    <div class="card-body"> 
                        <h4 class="card-title">
                            <a onclick="history.go(-1);" class="btn ">
                                <span class="fa fa-arrow-left"></span>
                            </a>
                            <b><?php echo $fullname; ?> RETURN REPORT</b>
                        </h4>
                        <table class="table dataTable table-striped">
                            <thead>
                                <tr>
                                    <th>Return Date</th>
                                    <th>ARS #</th>
                                    <th>Quantity</th>
                                    <th>Received By</th>
                                    <th>Remarks</th>
                                    <th width="10%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                    foreach($info AS $i){ 
                                ?>
                                <tr>                                    
                                    <td><?php echo $i['return_date']; ?></td>
                                    <td><?php echo $i['ars_no']; ?></td>
                                    <td><?php echo $i['quantity']; ?></td>
                                    <td><?php echo $i['receive_by']; ?></td>
                                    <td><?php echo $i['remarks']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url(); ?>report/acf_report/<?php echo $i['return_id']?>" class="btn btn-warning-alt text-white pull-right btn-sm">
                                                <span class="fa fa-print"></span> ACF
                                            </a>
                                            <a href="<?php echo base_url(); ?>report/ars_report/<?php echo $i['return_id']?>" class="btn btn-success-alt item btn-sm" data-toggle="tooltip" data-placement="top" title="Print Return Slip">
                                                <i class="fa fa-print"></i>
                                            </a>
                                            <span data-toggle="tooltip" data-placement="top" title="View Items">
                                                <a href="<?php echo base_url(); ?>report/report_sub/<?php echo $i['return_id']?>" class="btn btn-info-alt item btn-sm" style="border-radius: 0px 2px 2px 0px" >
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </span>
                                            <div class="mess-dropdown mess-sd js-dropdown">
                                                <div class="mess__title" style="padding: 5px">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td>Item Desc:</td>
                                                                <td>S/N</td>
                                                                <td>Cost</td>
                                                            </tr>
                                                        </thead>
                                                        <?php 
                                                            foreach($details AS $det){ 
                                                                switch($det){
                                                                    case($i['return_id'] == $det['return_id']):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $det['item'];?></td>
                                                            <td><?php echo $det['serial'];?></td>
                                                            <td><?php echo $det['price'];?></td>
                                                        </tr>
                                                        <?php 
                                                                break;
                                                                default: 
                                                                } 
                                                            } 
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>                                               
                                        </div>                                           
                                    </td>
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function toggle_multi(source) {
      checkboxes_multi = document.getElementsByClassName('multi');
      for(var i=0, n=checkboxes_multi.length;i<n;i++) {
        checkboxes_multi[i].checked = source.checked;
      }
    }
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>