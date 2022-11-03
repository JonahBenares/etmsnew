<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/report.js"></script>

<div class="m-t-15">
    <div class="container-fluid">
        <div class="row">                
            <div class="col-lg-12">
                <div class="card bor-radius shadow">
                    <div class="card-header bg-danger-alt cheader-bor">
                        <strong>OBSOLETE</strong> Equipment / Tools
                    </div>
                    <form>
                        <div class="card-body card-block">
                            <table class="table table-hover table-bordered">
                                <thead>       
                                    <th><center><span class="fa fa-bars"></span></center></th>
                                    <th>Date</th>
                                    <th>Item Name</th>
                                    <th>Serial No.</th>
                                    <th>Asset Control Number</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Type</th>
                                </thead>
                                <?php 
                                    foreach($head AS $h){  
                                        foreach($details AS $det){     
                                            switch($det){
                                                case($h['et_id'] == $det['et_id']):
                                ?>
                                <tr>       
                                    <td class="p-2" align="center">
                                        <a href="<?php echo base_url(); ?>report/obsolete_print/<?php echo $det['obsolete_id']?>" class="btn btn-warning-alt item btn-sm"  data-toggle="tooltip" data-placement="top" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td><?php echo date('F d,Y',strtotime($det['receive_date']));?></td>
                                    <td><?php echo $h['item'];?></td>
                                    <td><?php echo $det['serial'];?></td>
                                    <td><?php echo $det['acn'];?></td>
                                    <td><?php echo $det['brand'];?></td>
                                    <td><?php echo $det['model'];?></td>
                                    <td><?php echo $det['type'];?></td>
                                </tr>
                                <?php   
                                    break;
                                    default: 
                                    } } }
                                ?>
                            </table>
                        </div>
                        <div class="card-footer">
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