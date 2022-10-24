<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
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
                        <li class="breadcrumb-item active">Obsolete List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Obsolete</h4>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Obsolete Item</th>
                                    <th>Accountable Person</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($obsolete)){
                            foreach($obsolete AS $l){ ?>
                                <tr>                                        
                                    <td><?php echo $l['obsolete_date']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $l['et_id'];?>" class=""  data-toggle="tooltip" data-placement="right" title="View" style="word-wrap: break-word;">
                                            <?php echo $l['item']; ?>
                                        </a> 
                                    </td>
                                    <td><?php echo $l['accountability']; ?></td>
                                    <td><?php echo $l['obsolete_remarks']; ?></td>
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

