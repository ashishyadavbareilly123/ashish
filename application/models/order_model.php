<?php
class Order_model extends CI_model{
public function order($pid,$qty,$array){

  $this->db->select("*");
  $this->db->from('tbl_order');
  $this->db->where(['fld_order_status'=>'1','fld_product_id'=>$pid]);
  $arr = $this->db->get();
  if ($arr->num_rows() > 0) {
        return '5';
     }

$margin = $array['fld_margin'];
$sub_total = $array['fld_sub_total'];

 if($sub_total > $margin){
     
 }else{
    return '6';
 }
  // Check already is
  $this->db->select("*");
  $this->db->from('tbl_order');
  $arr = $this->db->get();
  if ($arr->num_rows() > 0) {
    $this->db->select_max('fld_bill_no');
    $this->db->from('tbl_order');
    $arr = $this->db->get();
    $array_1 =$arr->result_array();
    $arr2 = $array_1[0]['fld_bill_no'];
    $ar = $arr2+1;
    $array_3['fld_bill_no']=$ar;
    $new_array = array_merge($array,$array_3);
  } else{
    $bill['fld_bill_no'] = 100001;
    $new_array = array_merge($array,$bill);
  }

  $margin_price = $array['fld_margin'];

  $this->db->select("*");
  $this->db->from('tbl_order');
  $this->db->where(['fld_order_status'=>'1','fld_type'=>'product']);
  $arr = $this->db->get();
  if ($arr->num_rows() > 0) {
    return '1';
  } 

  $type = $array['fld_type'];

  $this->db->select("*");
  $this->db->from('tbl_order');
  $this->db->where(['fld_order_status'=>'1','fld_type'=>'1']);
  $arr = $this->db->get();
  if ($arr->num_rows() > 0) {
     if($type == 'product'){
        return '2';
     }
  } 

    $this->db->select("*");
    $this->db->from('tbl_product');
    $this->db->where(['fld_product_id'=>$pid]);
    $arr = $this->db->get();
    $stock = $arr->result_array();
    $totalStock = $stock[0]['fld_total_stock'];

    if($totalStock >= $qty){
       $updateStock = $totalStock-$qty;

       $data = array(
        'fld_total_stock' => $updateStock,
        );
        $this->db->where('fld_product_id', $pid);
        $this->db->update('tbl_product',$data);

       $this->db->insert('tbl_order', $new_array);
       
       $this->db->select("fld_sub_total");
       $this->db->from('tbl_order');
       $this->db->where(['fld_product_id'=>$pid,'fld_order_status'=> '1']);
       $arr = $this->db->get();
       $stock = $arr->result_array();
       $subtotal = $stock[0]['fld_sub_total'];

       $main_margin = $subtotal-$margin_price;
       

       $data_val = array(
        'fld_sub_total' => $main_margin,
        );
       $this->db->where(['fld_product_id'=> $pid,'fld_order_status'=>'1']);
       $this->db->update('tbl_order',$data_val);

       return $this->db->insert_id();
    }else{
        return 'false';
    }
  }

  public function bill_list(){
    $this->db->select("*");
    $this->db->from('tbl_order');
    $this->db->where(['fld_order_status'=> '1']);
    $arr = $this->db->get();
    return $arr->result_array();
  }
  public function show_bill_no(){
    $this->db->select_max('fld_bill_no');
    $this->db->from('tbl_order');
    $arr = $this->db->get();
    return $arr->result_array();
  }

  public function update_order_status($id,$cheses,$order_id,$expiry_date,$charger,$moter,$battery){
         $data = array(
          'fld_order_status' => '0',
          );
        $this->db->update('tbl_order',$data);

        $data2 = array(
          'fld_chases_no' => $cheses,
          'fld_expiry' => $expiry_date,
          'fld_charger_no' => $charger,
          'fld_moter_no' => $moter,
          'fld_battery_no' => $battery,
          );
        $this->db->where('fld_order_id',$order_id);
        $this->db->update('tbl_order',$data2);
        return "true";
  }

  public function remove_order($order_id,$product_id){
    $this->db->delete('tbl_order', array('fld_order_id' => $order_id)); 
   
    $this->db->where('fld_product_id', $product_id);
    $this->db->set('fld_total_stock', '`fld_total_stock`+ 1', FALSE);
    $this->db->update('tbl_product');
    return '1';
  
    //DELETE FROM employee_master WHERE emp_ID = $id
  }

  public function monthly_bill(){
    $this->db->select("*");
    $this->db->from('tbl_order');
    $this->db->where(['MONTH(fld_created_at)'=> date('m') ,'fld_order_status'=>'0']);
    $arr = $this->db->get();    
    return $arr->result_array();
    //$this->db->last_query();

  }

  public function update_chases_number($cheses,$order_id){
    $data = array(
      'fld_chases_no' => $cheses,
      );
    $this->db->where('fld_order_id',$order_id);
    $this->db->update('tbl_order',$data);
    return 1;
   }

   public function bike_list_function(){
    $this->db->select("*");
    $this->db->from('tbl_product');
    $this->db->where(['fld_product_identity'=>'1']);
    $arr = $this->db->get();    
    return $arr->result_array();
   }

   public function bike_parts_list_function(){
    $this->db->select("*");
    $this->db->from('tbl_product');
    $this->db->where(['fld_product_identity'=>'2']);
    $arr = $this->db->get();    
    return $arr->result_array();
   }
}
?>