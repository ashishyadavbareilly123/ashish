<?php
class Product_model extends CI_model{
public function get_products(){
    $this->db->select('*');
    $this->db->from('tbl_product');
    $res = $this->db->get();
    return $res->result_array();
}

public function TotalStock(){
    $this->db->select('*');
    $this->db->from('tbl_product');
    $res = $this->db->get();
    return $res->result_array();
}

public function get_product(){
    $this->db->select('*');
    $this->db->from('tbl_product');
    $res = $this->db->get();
    return $res->result_array();
}

public function get_product_price($proId){
    $this->db->select('fld_product_price');
    $this->db->from('tbl_product');
    $this->db->where(['fld_product_id'=> $proId]);
    $res = $this->db->get();
    return $res->result_array();
}

public function addProduct($array,$img_path){
        // $product_data = $array[0];
		// echo $img_data = $array[1];
		$img_arr = array('fld_image' => $img_path);
		$main_arr = array_merge($array, $img_arr);
	    $this->db->insert('tbl_product', $main_arr);
        return '1';
}

public function expiry_product(){
    $this->db->select('fld_product_name');
    $this->db->from('tbl_order');
    $this->db->where(['fld_expiry' => date("Y-m-d" , strtotime("+1 days"))]);
    $res = $this->db->get();
//    echo  $this->db->last_query();
    return $res->result_array();
}

public function fetch_product_details($id) {
    $query = $this->db->select(['fld_product_id','fld_product_name', 'fld_total_stock', 'fld_product_price', 'fld_product_desc'])
        ->from('tbl_product')
        ->where(['fld_product_id' => $id])
        ->get();
    return $query->row();
}

public function update_products($productId, Array $post,$img_path){
		//$articleId me id milegi and $article iye ek array h isme article title,body milegi update kerne ke liye
        if($img_path == '/assets/images/'){
		    return $this->db->update('tbl_product', $post, array('fld_product_id' => $productId));
        }else{
            $img_arr = array('fld_image' => $img_path);
            $main_arr = array_merge($post, $img_arr);
		    return $this->db->update('tbl_product', $main_arr, array('fld_product_id' => $productId));
        }
		
}

}
?>