<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        date_default_timezone_set("Asia/Manila");
        $this->load->model('super_model');
        $this->dropdown['delete_item']=$this->super_model->custom_query("SELECT * FROM et_head eh INNER JOIN et_details ed ON eh.et_id=ed.et_id");
        function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }
    }

    public function borrow_list(){  
    	$this->load->view('template/header');
    	$this->load->view('template/navbar',$this->dropdown);
        $row=$this->super_model->count_rows("borrow_head");
        if($row!=0){
            foreach($this->super_model->select_all_order_by('borrow_head', 'borrowed_date', 'ASC') AS $all){
                $employee = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $all->borrowed_by);
                $returned_date = $this->super_model->select_column_where("borrow_details", "returned_date", "bh_id", $all->bh_id);
                /*$data['bh_id'] = $all->bh_id;*/
                $data['all'][] = array(
                    'bh_id'=>$all->bh_id,
                    'returned_date'=>$returned_date,
                    'series'=>$all->borrow_series,
                    'employee'=>$employee,
                    'date'=>$all->borrowed_date,
                );
            }
        }else {
            $data['all'] = array();
        }
        $this->load->view('borrow/borrow_list',$data);
        $this->load->view('template/footer');
    }

    public function borrowlist(){
        $borrow=$this->input->post('borrow');
        $rows=$this->super_model->count_custom_where("employees","status = '0' AND employee_name LIKE '%$borrow%'");
        if($rows!=0){
             echo "<ul id='name-item'>";
            foreach($this->super_model->select_custom_where("employees", "status = '0' AND employee_name LIKE '%$borrow%'") AS $brw){ 
                   
                    ?>
                   <li onClick="selectBorrow('<?php echo $brw->employee_id; ?>','<?php echo $brw->employee_name; ?>')"><?php echo $brw->employee_name; ?></li>
                <?php 
            }
             echo "<ul>";
        }
    }

    public function insert_borrow_head(){
        $head_rows = $this->super_model->count_rows("borrow_head");
        if($head_rows==0){
            $bh_id=1;
        } else {
            $maxid=$this->super_model->get_max("borrow_head", "bh_id");
            $bh_id=$maxid+1;
        }

        foreach($this->super_model->select_row_where("employees","employee_id", $this->input->post('borrow_id')) AS $l){
            $locations = $this->super_model->select_column_where("location","location_id",'location_id',$l->location_id);
            $location_prefix = $this->super_model->select_column_where("location","location_prefix",'location_id',$l->location_id);
            if($locations == $l->location_id){
                $location = $location_prefix;
            }else {
                $location = 'NA';
            }
        }

        $date = $this->input->post('date');
        $date_format = date("Y-m",strtotime($date));
        $borrow_pref=$location."-".$date_format;
        /*$bor_prefix= $this->super_model->select_column_custom_where("borrow_head", "borrow_series", "borrowed_date LIKE '$date_format%'");
        
        $borpref=explode("-", $bor_prefix);
        $bor_one=$borpref[0];
        $bor_two=$borpref[1];
        $bor_three=(!empty($borpref[2])) ? $borpref[2] : '';
        $bor_four = $borpref[3];
        $bor_five = (!empty($borpref[4])) ? $borpref[4] : '';
        if(!empty($bor_one) && !empty($bor_two) && !empty($bor_three) && !empty($bor_four) && !empty($bor_five)){
            $borrow_pref1=$borpref[0];
            $borrow_pref2=$borpref[1];
            $borrow_pref3=$borpref[2];
            $borrow_pref4=$borpref[3];
            $borrow_pref=$borrow_pref1."-".$borrow_pref2."-".$borrow_pref3."-".$borrow_pref4;
        }else{
            $borrow_pref1=$borpref[0];
            $borrow_pref2=$borpref[1];
            $borrow_pref3=$borpref[2];
            $borrow_pref=$borrow_pref1."-".$borrow_pref2."-".$borrow_pref3;
        }*/

        $rows=$this->super_model->count_custom_where("borrow_series","borrow_prefix = '$borrow_pref'");
        if($rows==0){
            $borrow_no= $location."-".$date_format."-1001";
        } else {
            $series = $this->super_model->get_max_where("borrow_series", "series","borrow_prefix = '$borrow_pref'");
            $next=$series+1;
            $borrow_no = $location."-".$date_format."-".$next;
        }

        $borrowdetails=explode("-", $borrow_no);
        $borrow_one=$borrowdetails[0];
        $borrow_two=$borrowdetails[1];
        $borrow_three=(!empty($borrowdetails[2])) ? $borrowdetails[2] : '';
        $borrow_four = $borrowdetails[3];
        $borrow_five = (!empty($borrowdetails[4])) ? $borrowdetails[4] : '';
        if(!empty($borrow_one) && !empty($borrow_two) && !empty($borrow_three) && !empty($borrow_four) && !empty($borrow_five)){
            $borrow_prefix1=$borrowdetails[0];
            $borrow_prefix2=$borrowdetails[1];
            $borrow_prefix3=$borrowdetails[2];
            $borrow_prefix4=$borrowdetails[3];
            $borrow_prefix=$borrow_prefix1."-".$borrow_prefix2."-".$borrow_prefix3."-".$borrow_prefix4;
            $series = $borrowdetails[4];
        }else{
            $borrow_prefix1=$borrowdetails[0];
            $borrow_prefix2=$borrowdetails[1];
            $borrow_prefix3=$borrowdetails[2];
            $borrow_prefix=$borrow_prefix1."-".$borrow_prefix2."-".$borrow_prefix3;
            $series = $borrowdetails[3];
        }
        $borrow_data= array(
            'borrow_prefix'=>$borrow_prefix,
            'series'=>$series
        );
        $this->super_model->insert_into("borrow_series", $borrow_data);

        $data = array(
            'bh_id'=>$bh_id,
            'user_id'=>$this->input->post('user_id'),
            'borrowed_by'=>$this->input->post('borrow_id'),
            'borrow_series'=>$borrow_no,
            'borrowed_date'=>$this->input->post('date'),
            'create_date'=>date("Y-m-d H:i:s")
        );
        if($this->super_model->insert_into("borrow_head", $data)){
            echo "<script>window.location ='".base_url()."borrow/borrow_add/$bh_id'; </script>";
        }
    }

    public function itemlist(){
        $item=$this->input->post('item');
        $rows=$this->super_model->count_custom_where("et_head","et_desc LIKE '%$item%'");
        if($rows!=0){
             echo "<ul id='name-item'>";
            foreach($this->super_model->select_custom_where("et_head", "accountability_id='0' AND et_desc LIKE '%$item%'") AS $itm){
                foreach($this->super_model->select_custom_where("et_details", "damage='0' AND lost = '0' AND et_id ='$itm->et_id'") AS $det){  
                    $qty = 1;
                    $unit = $this->super_model->select_column_where("unit", "unit_name", "unit_id", $itm->unit_id);
                    $total = $det->unit_price*$qty;
            ?>
                   <li onClick="selectItem('<?php echo $itm->et_id; ?>','<?php echo $det->ed_id; ?>','<?php echo htmlentities($itm->et_desc); ?>','1','<?php echo $det->asset_control_no;?>','<?php echo $det->type; ?>','<?php echo $det->serial_no; ?>','<?php echo $det->brand; ?>','<?php echo $det->model; ?>','<?php echo $unit; ?>')"><?php echo $itm->et_desc." - ".$det->brand." - ".$det->type." - ".$det->serial_no." - ".$det->model; ?></li>
            <?php 
                }
            }
            echo "<ul>";
        }
    }

    public function getitem(){
        foreach($this->super_model->select_row_where("et_head", "et_id", $this->input->post('itemid')) AS $et){
            $unit = $this->super_model->select_column_where("unit", "unit_name", "unit_id",$et->unit_id);
        }
        $acn=$this->input->post('acn');
        $serial=$this->input->post('serial');
        $type=$this->input->post('type');
        $model=$this->input->post('model');
        $brand=$this->input->post('brand');
        $data['list'] = array(
            'bh_id'=>$this->input->post('bh_id'),
            'et_id'=>$this->input->post('itemid'),
            'ed_id'=>$this->input->post('edid'),
            'brand'=>$brand,
            'type'=>$type,
            'serial'=>$serial,
            'model'=>$model,
            'unit'=>$unit,
            'acn'=>$acn,
            'qty'=>$this->input->post('qty'),
            'item'=>$this->input->post('item'),
            'count'=>$this->input->post('count'),
        );  
        $this->load->view('borrow/row_item',$data);
    }

    public function insert_borrow_details(){
        $count = $this->input->post('counter');
        for($x=0;$x<$count;$x++){ 
            $bh_id = $this->input->post('bh_id');
            $et_id = $this->input->post('itemid');
            $ed_id = $this->input->post('edid');
            $borrowed_by = $this->input->post('borrowed_id');
            $qty = $this->input->post('qty');
            foreach($this->super_model->select_row_where('et_head', 'et_id', $et_id[$x]) AS $ret){
                if($qty < $ret->qty){
                    $rows_et=$this->super_model->count_rows("et_head");
                    if($rows_et==0){
                        $new_etid= 1;
                    } else {
                        $series = $this->super_model->get_max("et_head", "et_id");
                        $new_etid = $series+1;
                    }
                    $et_data = array(
                        'et_id'=>$new_etid,
                        'user_id'=>$this->input->post('user_id'),
                        'et_desc'=>$ret->et_desc,
                        'unit_id'=>$ret->unit_id,   
                        'qty'=>$qty,
                        'accountability_id'=>$borrowed_by,
                        'department'=>$ret->department,
                        'category_id'=>$ret->category_id,
                        'subcat_id'=>$ret->subcat_id,
                        'create_date'=>date("Y-m-d H:i:s"),
                    );
                    if($this->super_model->insert_into("et_head", $et_data)){
                        foreach($this->super_model->select_row_where('et_details', 'ed_id', $ed_id[$x]) AS $det){
                            $det_data = array(
                                'et_id'=>$new_etid,
                                'date_issued'=>$date,
                                'borrowed'=>1
                            ); 
                            $this->super_model->update_where("et_details", $det_data, "ed_id", $ed_id[$x]);
                        }
                        $new_qty = $ret->qty-$qty;
                        $qty_data = array(
                            'qty'=>$new_qty
                        );
                        $this->super_model->update_where('et_head', $qty_data, 'et_id', $et_id[$x]);

                        $bdet_data = array(
                            'bh_id'=>$bh_id,
                            'et_id'=>$new_etid,
                            'ed_id'=>$ed_id[$x],   
                            'qty'=>$qty
                        );
                        $this->super_model->insert_into("borrow_details", $bdet_data);
                    }
                }else if($qty == $ret->qty){
                    $data = array(
                        'accountability_id'=>$borrowed_by
                    );
                    if($this->super_model->update_where('et_head', $data, 'et_id', $et_id[$x])){
                        foreach($this->super_model->select_row_where('et_details', 'ed_id', $ed_id[$x]) AS $det){
                            $det_data = array(
                                'date_issued'=>$date,
                                'borrowed'=>1
                            ); 
                            $this->super_model->update_where("et_details", $det_data, "ed_id", $ed_id[$x]);
                        }
                        $bdet_data = array(
                            'bh_id'=>$bh_id,
                            'et_id'=>$et_id[$x],
                            'ed_id'=>$ed_id[$x],   
                            'qty'=>$qty
                        );
                        $this->super_model->insert_into("borrow_details", $bdet_data);
                    }
                }
            }
        }
    }

    public function borrow_add(){  
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        foreach($this->super_model->select_row_where("borrow_head","bh_id",$id) AS $borrow){
            $data['name'] = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $borrow->borrowed_by);
            $employee_name = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $borrow->borrowed_by);
            $data['user_id'] = $this->super_model->select_column_where("users", "username", "user_id", $borrow->user_id);
            $data['borrow'][] = array(
                'employee'=>$employee_name,
                'id'=>$borrow->borrowed_by,
                'date'=>$borrow->borrowed_date,
                'series'=>$borrow->borrow_series,
            );
        }
        $this->load->view('borrow/borrow_add',$data);
        $this->load->view('template/footer');
    }


    public function borrow_view(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $user = $_SESSION['user_id'];
        $data['user_id'] = $this->super_model->select_column_where("users", "username", "user_id", $user); 
        /*$data['bh_id']=$this->uri->segment(3);*/
        $borrowed_by=$this->uri->segment(3);
        $bh_id=$this->uri->segment(4);
        $data['borrowed_by']=$this->uri->segment(3);
        $sql="";
        if($borrowed_by!='null'){
            $sql.= " borrowed_by = '$borrowed_by' AND";
            $sql.= " bh_id = '$bh_id' AND";
        }

        $query=substr($sql,0,-3);
        $count=$this->super_model->custom_query("SELECT * FROM borrow_head WHERE ".$query);
        /*$count=$this->super_model->custom_query("SELECT * FROM borrow_head WHERE ".$query);*/
        if($count!=0){
            foreach($this->super_model->custom_query("SELECT * FROM borrow_head WHERE ".$query) AS $head){
                $employee = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $head->borrowed_by);  
                $data['employees'] = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $head->borrowed_by);  
                $data['date'] = $head->borrowed_date;  
                $data['series'] = $head->borrow_series;  
                foreach($this->super_model->custom_query("SELECT * FROM borrow_details WHERE bh_id = '$head->bh_id' AND returned = '0'") AS $det){
                    $item = $this->super_model->select_column_where('et_head', 'et_desc', 'et_id', $det->et_id);
                    $brand = $this->super_model->select_column_where('et_details', 'brand', 'ed_id', $det->ed_id); 
                    $type = $this->super_model->select_column_where('et_details', 'type', 'ed_id', $det->ed_id); 
                    $model = $this->super_model->select_column_where('et_details', 'model', 'ed_id', $det->ed_id);
                    $serial = $this->super_model->select_column_where('et_details', 'serial_no', 'ed_id', $det->ed_id);
                    foreach($this->super_model->select_row_where("et_head","et_id",$det->et_id) AS $un){
                       $unit = $this->super_model->select_column_where("unit", "unit_name", "unit_id", $un->unit_id);
                    }
                    $data['return'][] = array(
                        'bh_id'=>$det->bh_id,
                        'et_id'=>$det->et_id,
                        'ed_id'=>$det->ed_id,
                        'item'=>$item,
                        'type'=>$type,
                        'brand'=>$brand,
                        'serial'=>$serial,
                        'model'=>$model,
                        'unit'=>$unit,
                        'borrowed_qty'=>$det->qty,
                    );
                }
            }
        }
        $this->load->view('borrow/borrow_view',$data);
        $this->load->view('template/footer');
    }

    public function generateReturn(){
        $bh_id = $this->input->post('bh_id');
        if(!empty($this->input->post('return_id'))){
            $return_id = $this->input->post('return_id');
        } else {
            $return_id = "null";
        }

       ?>
       <script>
        window.location.href ='<?php echo base_url(); ?>borrow/borrow_view/<?php echo $return_id; ?>/<?php echo $bh_id; ?>'</script> <?php
    }


    public function returnlist(){
        $return=$this->input->post('return');
        $rows=$this->super_model->count_custom_where("employees","employee_name LIKE '%$return%'");
        if($rows!=0){
             echo "<ul id='name-item'>";
            foreach($this->super_model->select_custom_where("employees", "employee_name LIKE '%$return%'") AS $itm){
                foreach($this->super_model->custom_query("SELECT * FROM borrow_head LEFT JOIN borrow_details ON borrow_details.bh_id = borrow_head.bh_id WHERE borrow_head.borrowed_by = '$itm->employee_id' AND borrow_details.returned = '0' GROUP BY borrow_details.bh_id") AS $he){
                    $item='';
                    foreach($this->super_model->select_custom_where("borrow_details","bh_id='$he->bh_id' AND returned='0'") AS $i){
                        $item .= $this->super_model->select_column_where("et_head","et_desc","et_id",$i->et_id)."<b>,</b> ";
                    }
            ?>
                   <li onClick="selectReturn('<?php echo $itm->employee_id; ?>','<?php echo $he->borrow_series; ?>','<?php echo $he->borrowed_date; ?>','<?php echo $itm->employee_name; ?>','<?php echo $he->bh_id; ?>')"><?php echo $itm->employee_name." - ".$item; ?></li>
            <?php 
                }
            }
            echo "<ul>";
        }
    }

    public function insert_return(){
        $count = $this->input->post('count');
        $returned_by = $this->input->post('returned_by');
        for($x=1;$x<=$count;$x++){
            $et_id = $this->input->post('et_id'.$x);
            $ed_id = $this->input->post('ed_id'.$x);
            $date = date("Y-m-d");
            $bh_id = $this->input->post('b_id');
            $qty = $this->input->post('ret_qty'.$x);  
            if(!empty($qty) || $qty !=0){
                foreach($this->super_model->select_row_where('et_head', 'et_id', $et_id) AS $ret){
                    if($qty < $ret->qty){
                        $rows_et=$this->super_model->count_rows("et_head");
                        if($rows_et==0){
                            $new_etid= 1;
                        } else {
                            $series = $this->super_model->get_max("et_head", "et_id");
                            $new_etid = $series+1;
                        }
                        $et_data = array(
                            'et_id'=>$new_etid,
                            'user_id'=>$this->input->post('user_id'),
                            'et_desc'=>$ret->et_desc,
                            'unit_id'=>$ret->unit_id,   
                            'qty'=>$qty,
                            'accountability_id'=>0,
                            'department'=>$ret->department,
                            'category_id'=>$ret->category_id,
                            'subcat_id'=>$ret->subcat_id,
                            'create_date'=>date("Y-m-d H:i:s"),
                        );
                        if($this->super_model->insert_into("et_head", $et_data)){
                            foreach($this->super_model->select_row_where('et_details', 'ed_id', $ed_id) AS $det){
                                $det_data = array(
                                    'et_id'=>$new_etid,
                                    'date_issued'=>$date,
                                    'borrowed'=>0
                                ); 
                                $this->super_model->update_where("et_details", $det_data, "ed_id", $ed_id);
                            }
                            $new_qty = $ret->qty+$qty;
                            $qty_data = array(
                                'qty'=>$new_qty
                            );
                            $this->super_model->update_where('et_head', $qty_data, 'et_id', $et_id);
                            $bdet_data = array(
                                'et_id'=>$new_etid,
                                'returned'=>1,   
                                'returned_date'=>date("Y-m-d H:i:s"),   
                                'returned_by'=>$returned_by,   
                                'return_qty'=>$qty,
                            );
                            foreach($this->super_model->select_row_where("borrow_details","ed_id",$et_id) AS $up){
                                $this->super_model->update_where('borrow_details', $bdet_data, 'bd_id', $up->bd_id);
                            }
                        }
                        echo "<script>alert('Successfully Returned!'); window.location = '".base_url()."borrow/borrow_list'; </script>";
                    }else if($qty == $ret->qty){
                        $data = array(
                            'accountability_id'=>0
                        );
                        if($this->super_model->update_where('et_head', $data, 'et_id', $et_id)){
                            foreach($this->super_model->select_row_where('et_details', 'ed_id', $ed_id) AS $det){
                                $det_data = array(
                                    'date_issued'=>$date,
                                    'borrowed'=>0
                                ); 
                                $this->super_model->update_where("et_details", $det_data, "ed_id", $ed_id);
                            }
                            $bdet_data = array(
                                'returned'=>1,   
                                'returned_date'=>date("Y-m-d H:i:s"),   
                                'returned_by'=>$returned_by,   
                                'return_qty'=>$qty,
                            );
                            foreach($this->super_model->select_row_where("borrow_details","et_id",$et_id) AS $up){
                                $this->super_model->update_where('borrow_details', $bdet_data, 'bd_id', $up->bd_id);
                            }
                        }
                        echo "<script>alert('Successfully Returned!'); window.location = '".base_url()."borrow/borrow_list'; </script>";
                    }
                }
            }
        }

        $e_id = $this->input->post('e_id');
        $et_id = $this->input->post('ets_id');
        $checked =count($e_id);
        for($z=0;$z<$checked;$z++){
            if(isset($e_id[$z])){
                foreach($this->super_model->select_row_where('et_head', 'et_id', $et_id[$z]) AS $ret){
                        $data = array(
                            'accountability_id'=>0,
                        );
                        if($this->super_model->update_where('et_head', $data, 'et_id', $et_id[$z])){
                                $count_exist = $this->super_model->count_custom_where("et_details","et_id = '$ret->et_id' AND ed_id= '$e_id[$z]'");
                                if($count_exist!=0){
                                    foreach($this->super_model->select_row_where('et_details', 'ed_id', $e_id[$z]) AS $det){
                                        $det_data = array(
                                            'date_issued'=>'',
                                            'damage'=>1,
                                            'borrowed'=>0
                                        ); 
                                        $this->super_model->update_where("et_details", $det_data, "ed_id", $e_id[$z]);
                                    }
                                }
                            //}
                            $bdet_data = array(
                                'returned'=>1,   
                                'returned_date'=>date("Y-m-d H:i:s"),   
                                'returned_by'=>$returned_by,   
                                'return_qty'=>1,
                            );
                            foreach($this->super_model->select_row_where("borrow_details","et_id",$et_id[$z]) AS $up){
                                $this->super_model->update_where('borrow_details', $bdet_data, 'bd_id', $up->bd_id);
                            }
                            echo "<script>window.location = '".base_url()."borrow/tag_damage_form/$returned_by'; </script>";
                        }
                } 
            }
        }
    }

    public function tag_damage_form(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['noted_by'] = $this->super_model->select_column_where("employees", "employee_name", "employee_id", '66'); 
        $data['checked_by'] = $this->super_model->select_column_where("employees", "employee_name", "employee_id", '53'); 
        $data['checked_name'] = $this->super_model->select_column_where("employees", "employee_id", "employee_name", 'Mary Grace Bugna'); 
        $data['noted_id'] = $this->super_model->select_column_where("employees", "employee_id", "employee_name", 'Eric Jabiniar'); 
        foreach($this->super_model->select_custom_where("borrow_head", "borrowed_by='$id'")  AS $head){
            $borrowed_by = $head->borrowed_by;
            $bh_id = $head->bh_id;
        } 

        foreach($this->super_model->select_all("borrow_details") AS $b){
            foreach($this->super_model->select_custom_where("et_details", "ed_id='$b->ed_id'") AS $d){
                $damage =$this->super_model->select_column_where("et_details", "damage", "ed_id", $d->ed_id);
            }
            if($borrowed_by == $id && $b->bh_id == $bh_id && $damage!=0){
                $data['dam'][]=array(
                    'bd_id'=>$b->bd_id,
                    'ed_id'=>$b->ed_id,
                    'et_id'=>$b->et_id,
                );
            
                foreach($this->super_model->select_custom_where("et_details", "ed_id='$b->ed_id'") AS $dets){
                    foreach($this->super_model->select_custom_where("et_head", "et_id='$dets->et_id'") AS $et){
                        $category=$this->super_model->select_column_where("category", "category_name", "category_id", $et->category_id);  
                    } 
                    $item=$this->super_model->select_column_where("et_head", "et_desc", "et_id", $dets->et_id);             
                    $model =$this->super_model->select_column_where("et_details", "model", "ed_id", $dets->ed_id);
                    $model =$this->super_model->select_column_where("et_details", "model", "ed_id", $dets->ed_id);
                    $serial =$this->super_model->select_column_where("et_details", "serial_no", "ed_id", $dets->ed_id);
                    $brand =$this->super_model->select_column_where("et_details", "brand", "ed_id", $dets->ed_id);
                    $acn =$this->super_model->select_column_where("et_details", "asset_control_no", "ed_id", $dets->ed_id);
                    /*$damage =$this->super_model->select_column_where("et_details", "damage", "ed_id", $dets->ed_id);*/
                    $data['details'][]=array(
                        'ed_id'=>$dets->ed_id,
                        'item'=>$item,
                        //'damage'=>$damage,
                        'category'=>$category,
                        'brand'=>$brand,
                        'model'=>$model,
                        'serial'=>$serial,
                        'acn'=>$acn,
                    );
                }
            }
        }
       
        $this->load->view('borrow/tag_damage_form',$data);
        $this->load->view('template/footer');
    }

    public function insert_damage_form(){
        $count = $this->input->post('count');
        $id = $this->input->post('id');
        
        $head_rows = $this->super_model->count_rows("return_head");
        if($head_rows==0){
            $return_id=1;
        } else {
            $maxid=$this->super_model->get_max("return_head", "return_id");
            $return_id=$maxid+1;
        }

        for($x=1;$x<=$count;$x++){
            $et_id = $this->input->post('et_id'.$x);
            $id = $this->input->post('id');
            $date = $this->input->post('date'.$x);
            $edid = $this->input->post('ed_id'.$x);
            $activity = $this->input->post('activity'.$x);
            $checked_by = $this->input->post('checked_id'.$x);
            $submitted_by = $this->input->post('submitted_id'.$x);
            $noted_by = $this->input->post('noted_id'.$x);
            $etdr_no = $this->input->post('etdr_no'.$x);
            $incident = $this->input->post('incident'.$x);
            $location = $this->input->post('location'.$x);
            $damage_done = $this->input->post('damage_done'.$x);
            $receipt = $this->input->post('receipt'.$x);
            $recommendation = $this->input->post('recommendation'.$x);

            foreach($this->super_model->select_row_where("employees","employee_id", $id) AS $l){
                $locations = $this->super_model->select_column_where("location","location_id",'location_id',$l->location_id);
                $location_prefix = $this->super_model->select_column_where("location","location_prefix",'location_id',$l->location_id);
                if($locations == $l->location_id){
                    $location1 = $location_prefix;
                }else {
                    $location1 = 'NA';
                }
            }
            $date_format = date("Y-m",strtotime($date));
            $dam_pref=$location1."-".$date_format;
            /*$damage_no= $this->super_model->select_column_custom_where("damage_info", "etdr_no", "incident_date LIKE '$date_format%'");
            
            $damagepref=explode("-", $damage_no);
            $dam_one=$damagepref[0];
            $dam_two=$damagepref[1];
            $dam_three=$damagepref[2];
            $dam_four = $damagepref[3];
            $dam_five = (!empty($damagepref[4])) ? $damagepref[4] : '';
            if(!empty($dam_one) && !empty($dam_two) && !empty($dam_three) && !empty($dam_four) && !empty($dam_five)){
                $dam_pref1=$damagepref[0];
                $dam_pref2=$damagepref[1];
                $dam_pref3=$damagepref[2];
                $dam_pref4=$damagepref[3];
                $dam_pref=$dam_pref1."-".$dam_pref2."-".$dam_pref3."-".$dam_pref4;
            }else{
                $dam_pref1=$damagepref[0];
                $dam_pref2=$damagepref[1];
                $dam_pref3=$damagepref[2];
                $dam_pref=$dam_pref1."-".$dam_pref2."-".$dam_pref3;
            }*/

            $rows=$this->super_model->count_custom_where("damage_series","damage_prefix = '$dam_pref'");
            if($rows==0){
                $etdr_no= $location1."-".$date_format."-1001";
            } else {
                $series = $this->super_model->get_max_where("damage_series", "series","damage_prefix = '$dam_pref'");
                $next=$series+1;
                $etdr_no = $location1."-".$date_format."-".$next;
            }

            $damagedetails=explode("-", $etdr_no);
            $damage_one=$damagedetails[0];
            $damage_two=$damagedetails[1];
            $damage_three=$damagedetails[2];
            $damage_four = $damagedetails[3];
            $damage_five = (!empty($damagedetails[4])) ? $damagedetails[4] : '';
            if(!empty($damage_one) && !empty($damage_two) && !empty($damage_three) && !empty($damage_four) && !empty($damage_five)){
                $damage_prefix1=$damagedetails[0];
                $damage_prefix2=$damagedetails[1];
                $damage_prefix3=$damagedetails[2];
                $damage_prefix4=$damagedetails[3];
                $damage_prefix=$damage_prefix1."-".$damage_prefix2."-".$damage_prefix3."-".$damage_prefix4;
                $series = $damagedetails[4];
            }else{
                $damage_prefix1=$damagedetails[0];
                $damage_prefix2=$damagedetails[1];
                $damage_prefix3=$damagedetails[2];
                $damage_prefix=$damage_prefix1."-".$damage_prefix2."-".$damage_prefix3;
                $series = $damagedetails[3];
            }
            $damage_data= array(
                'damage_prefix'=>$damage_prefix,
                'series'=>$series
            );
            $this->super_model->insert_into("damage_series", $damage_data);
            $data_damage = array(
                'et_id'=>$et_id,
                'incident_date'=>$date,
                'activity'=>$activity,
                'etdr_no'=>$etdr_no,
                'ed_id'=>$edid,
                'damage_location'=>$location,
                'accountability'=>$receipt,
                'incident_description'=>$incident,
                'equip_damage'=>$damage_done,
                'recommendation'=>$recommendation,
                'submitted_by'=>$submitted_by,
                'checked_by'=>$checked_by,
                'noted_by'=>$noted_by,
                'create_date'=>date("Y-m-d H:i:s"),
                'user_id'=>$this->input->post('user_id'),
            ); 
            $this->super_model->insert_into("damage_info", $data_damage); 
            $date_issued = $this->super_model->select_column_where("et_details", "date_issued", "ed_id", $edid);
            $returndet_data = array(
                'et_id'=>$et_id,
                'ed_id'=>$edid,
                'return_id'=>$return_id,
                'date_issued'=>$date_issued
            );
        }

        $atf_format = date("Y");
        $ret_pref=$location1."-".$atf_format;
        /*$retpref= $this->super_model->select_column_custom_where("return_head", "atf_no", "return_date LIKE '$atf_format%'");
        $retp=explode("-", $retpref);
        $ret_one=$retp[0];
        $ret_two=$retp[1];
        $ret_three=$retp[2];
        $ret_four = (!empty($retp[3])) ? $retp[3] : '';
        if(!empty($ret_one) && !empty($ret_two) && !empty($ret_three) && !empty($ret_four)){
            $ret_pref1=$retp[0];
            $ret_pref2=$retp[1];
            $ret_pref3=$retp[2];
            $ret_pref=$ret_pref1."-".$ret_pref2."-".$ret_pref3;
        }else{
            $ret_pref1=$retp[0];
            $ret_pref2=$retp[1];
            $ret_pref=$ret_pref1."-".$ret_pref2;
        }*/

        $rows=$this->super_model->count_custom_where("atf_series","atf_prefix = '$ret_pref'");
        if($rows==0){
            $atf_no= $location1."-".$atf_format."-1001";
        } else {
            $series = $this->super_model->get_max_where("atf_series", "series","atf_prefix = '$ret_pref'");
            $next=$series+1;
            $atf_no = $location1."-".$atf_format."-".$next;
        }

        $atfdetails=explode("-", $atf_no);
        $atf_one=$atfdetails[0];
        $atf_two=$atfdetails[1];
        $atf_three=$atfdetails[2];
        $atf_four = (!empty($atfdetails[3])) ? $atfdetails[3] : '';
        if(!empty($atf_one) && !empty($atf_two) && !empty($atf_three) && !empty($atf_four)){
            $atf_prefix1=$atfdetails[0];
            $atf_prefix2=$atfdetails[1];
            $atf_prefix3=$atfdetails[2];
            $atf_prefix=$atf_prefix1."-".$atf_prefix2."-".$atf_prefix3;
            $series = $atfdetails[3];
        }else{
            $atf_prefix1=$atfdetails[0];
            $atf_prefix2=$atfdetails[1];
            $atf_prefix=$atf_prefix1."-".$atf_prefix2;
            $series = $atfdetails[2];
        }

        $atf_data= array(
            'atf_prefix'=>$atf_prefix,
            'series'=>$series
        );
        $this->super_model->insert_into("atf_series", $atf_data);


        $date_format = date("Y-m",strtotime($date));
        $ars_pref=$location1."-".$date_format;
        /*$arsprefix= $this->super_model->select_column_custom_where("return_head", "ars_no", "return_date LIKE '$date_format%'");

        $arspref=explode("-", $arsprefix);
        $ars_one=$arspref[0];
        $ars_two=$arspref[1];
        $ars_three=$arspref[2];
        $ars_four =$arspref[3];
        $ars_five = (!empty($arspref[4])) ? $arspref[4] : '';
        if(!empty($ars_one) || !empty($ars_two) || !empty($ars_three) || !empty($ars_four) || !empty($ars_five)){
            $ars_pref1=$arspref[0];
            $ars_pref2=$arspref[1];
            $ars_pref3=$arspref[2];
            $ars_pref4=$arspref[3];
            $ars_pref=$ars_pref1."-".$ars_pref2."-".$ars_pref3."-".$ars_pref4;
        }else{
            $ars_pref1=$arspref[0];
            $ars_pref2=$arspref[1];
            $ars_pref3=$arspref[2];
            $ars_pref=$ars_pref1."-".$ars_pref2."-".$ars_pref3;
        }*/

        $rows=$this->super_model->count_custom_where("returned_series","prefix = '$ars_pref'");
        if($rows==0){
            $ars_no= $location1."-".$date_format."-1001";
        } else {
            $series = $this->super_model->get_max("returned_series", "series","prefix = '$ars_pref'");
            $next=$series+1;
            $ars_no = $location1."-".$date_format."-".$next;
        }

        $returnhead_data = array(
            'return_id'=> $return_id,
            'accountability_id'=> $id,
            'received_by'=> $checked_by,
            'return_date'=> $date,
            'create_date'=>date("Y-m-d H:i:s"),
            'atf_no'=> $atf_no,
            'ars_no'=> $ars_no,
            'return_remarks'=>$damage_done
        );

        if($this->super_model->insert_into("return_head", $returnhead_data)){
            $ars = $ars_no;
            $assetdetails=explode("-", $ars);
            $assetdetails_one=$assetdetails[0];
            $assetdetails_two=$assetdetails[1];
            $assetdetails_three=$assetdetails[2];
            $assetdetails_four =$assetdetails[3];
            $assetdetails_five = (!empty($assetdetails[4])) ? $assetdetails[4] : '';
            if(!empty($assetdetails_one) || !empty($assetdetails_two) || !empty($assetdetails_three) || !empty($assetdetails_four) || !empty($assetdetails_five)){
                $subcat_prefix1=$assetdetails[0];
                $subcat_prefix2=$assetdetails[1];
                $subcat_prefix3=$assetdetails[2];
                $subcat_prefix4=$assetdetails[3];
                $subcat_prefix=$subcat_prefix1."-".$subcat_prefix2."-".$subcat_prefix3."-".$subcat_prefix4;
                $series = $assetdetails[4];
            }else {
                $subcat_prefix1=$assetdetails[0];
                $subcat_prefix2=$assetdetails[1];
                $subcat_prefix3=$assetdetails[2];
                $subcat_prefix=$subcat_prefix1."-".$subcat_prefix2."-".$subcat_prefix3;
                $series = $assetdetails[3];
            }
            $ars_data= array(
                'prefix'=>$subcat_prefix,
                'series'=>$series
            );
            $this->super_model->insert_into("returned_series", $ars_data);
        }
        echo "<script>alert('Successfully Tagged as Damage!'); window.location = '".base_url()."borrow/tag_damage_print';</script>";
    }

    public function tag_damage_print(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        foreach($this->super_model->select_all('et_head') AS $head){ 
                $data['head'][] =  array(
                    'et_id'=>$head->et_id,  
                );
            foreach($this->super_model->select_row_where('damage_info', 'et_id', $head->et_id) AS $det){
               $data['details'][] =  array(
                    'damage_id'=>$det->damage_id,
                    'item'=> $this->super_model->select_column_where("et_head", "et_desc", "et_id", $det->et_id),
                    'et_id'=>$det->et_id,
                    'ed_id'=>$det->ed_id,
                    'acn'=> $this->super_model->select_column_where("et_details", "asset_control_no", "ed_id", $det->ed_id),
                    'type'=> $this->super_model->select_column_where("et_details", "type", "ed_id", $det->ed_id),
                    'model'=> $this->super_model->select_column_where("et_details", "model", "ed_id", $det->ed_id),
                    'brand'=> $this->super_model->select_column_where("et_details", "brand", "ed_id", $det->ed_id),
                    'serial' => $this->super_model->select_column_where("et_details", "serial_no", "ed_id", $det->ed_id)
                );
            }
        }    
        $this->load->view('borrow/tag_damage_print',$data);
        $this->load->view('template/footer');
    }

    public function get_name($col, $table, $whr_clm, $whr_val){
        $column = $this->super_model->select_column_where($table, $col, $whr_clm, $whr_val);
        return $column;
    }
}
