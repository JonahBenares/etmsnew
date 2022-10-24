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
                        <li class="breadcrumb-item active">Equipment / Tools History List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <h4 class="card-title">Equipment / Tools History  </h4>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th width="50%">Item Name</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>S/N</th>                                        
                                    <th>Accountability / Status</th>                                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($item AS $i){ 
                                        foreach($details AS $det){ 
                                            switch($det){
                                                case($i['et_id'] == $det['et_id']):

                                                    if($i['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']==0 && $det['damage']==0 && $det['obsolete']==0 ){
                                                        $status = $i['employee'];
                                                    }else if($i['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']!=0 && $det['damage']==0){
                                                        $status = $i['employee']." / Upgraded";
                                                    }else if($i['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']!=0 && $det['damage']==1){
                                                        $status = $i['employee']." / Upgraded / Damaged";
                                                    }else if($i['accountability_id']!=0 && $det['borrowed']==0 && $det['lost']==0 && $det['upgrade']==0 && $det['damage']==1){
                                                        $status = $i['employee']." / Damaged";
                                                    }else if($i['accountability_id']==0 && $det['damage']==0 && $det['change_location']==0 && $det['upgrade']==0){
                                                        $status = '<span style = "color:green;">Available</span>';
                                                    }else if($i['accountability_id']==0 && $det['damage']==0 && $det['change_location']==0 && $det['upgrade']!=0){
                                                        $status = '<span style = "color:green;">Available / Upgraded</span>';
                                                    }else if($i['accountability_id']==0 && $det['change_location']==1){
                                                        $status = "Moved to ".$det['location'];
                                                    }else if($det['borrowed']==1){
                                                        $status = '<span style = "color:blue;">Borrowed</span>';
                                                    }else if($det['damage']==1 && $i['accountability_id']==0){
                                                        $status = '<span style = "color:red;">Damaged</span>';
                                                    }else if($det['damage']==1 && $i['accountability_id']!=0){
                                                        $status = '<span style = "color:red;">Damaged / '.$i['employee'].'</span>';
                                                    }else if($det['lost']==1){
                                                        $status = '<span style = "color:orange;">Lost Item / '.$i['employee'].'</span>';
                                                    }else if($det['obsolete']==1){
                                                        $status = '<span style = "color:orange;">Obsolete Item / '.$i['employee'].'</span>';
                                                    }
                                ?>
                                <tr >
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/history_view2/<?php echo $det['ed_id']; ?>" target="_blank" class="" data-toggle="tooltip" data-placement="right" title="View"  style="white-space: normal!important;text-align: left">
                                                <?php echo $i['item']; ?>
                                        </a>                                            
                                    </td>
                                    <td><?php echo $det['brand']; ?></td>                                     
                                    <td><?php echo $det['model']; ?></td>                                     
                                    <td><?php echo $det['serial']; ?></td>                                     
                                    <td><?php echo $status; ?></td>                                     
                                </tr>
                                <?php  
                                    break;
                                    default: 
                                    } } } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

