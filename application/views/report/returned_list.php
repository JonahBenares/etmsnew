<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Returned List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Returned</h4>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th width = "11%">Returned Date</th>
                                    <th width = "15%">Employee Name</th>
                                    <th width = "30%">Item</th>
                                    <th width = "10%">Received By</th>
                                    <th width = "20%">Remarks</th>
                                    <th width="5%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($main)){
                            foreach($main AS $m){ ?>
                                <tr> 
                                    <td><?php echo $m['returned_date']; ?></td>                                       
                                    <td><?php echo $m['accountability']; ?></td>
                                    <td><?php echo $m['item_desc']; ?></td>
                                    <td><?php echo $m['received_by']; ?></td>
                                    <td><?php echo $m['remarks']; ?></td>
                                    <td>                                            
                                        <div class="table-data-feature">
                                            <a href = "<?php echo base_url(); ?>index.php/report/ars_report/<?php echo $m['return_id'];?>" class="btn btn-warning-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                                <i class="fa fa-print"></i>
                                            </a>
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

