<?php
class Order extends MY_Controller{
    public function generate_bill(){
        $this->load->view('admin/header');
        $this->load->view('admin/generate_order');
        $this->load->view('admin/footer');
    }

    public function order_generate(){
       $product = $this->input->post('product');
       $qty = $this->input->post('qty');
       $price = $this->input->post('price');
       $id = $this->input->post('hiddenField');
       $hiddenName = $this->input->post('product_name');
       $identity_type = $this->input->post('identity');
       $margin = $this->input->post('margin');
       $created = date("Y-m-d");
	   $status = '1';
       if($price == ''){
        $this->session->set_flashdata('success',"Please Fill Product Price");
        return redirect('admin/order/show_order_list');
       }
       $sub_total = $price*$qty;

       if($identity_type == null){
         $fld_type = '1';
       }else{
         $fld_type = $identity_type;
       }
       $data = [
        'fld_product_id'=>$id,
        'fld_product_name' => $hiddenName,
        'fld_product_qty' => $qty,
        'fld_product_price' => $price,
        'fld_sub_total' => $sub_total,
        'fld_order_status' => $status,
        'fld_created_at' => $created,
        'fld_type' => $fld_type,
        'fld_margin' => $margin,
    ];
       $this->load->model('order_model');
       $id =  $this->order_model->order($id,$qty,$data);
       if($id == 'false'){
            $this->session->set_flashdata('qty',"Quantity is greater According stock");
            return redirect('admin/product/create_order');
       }else if($id == '1'){
            $this->session->set_flashdata('success',"You can add only one product! Because This Product is,for Insurence");
            return redirect('admin/order/show_order_list');
       }
       else if($id == '2'){
            $this->session->set_flashdata('success',"Now you can add only with out insurence part!");
            return redirect('admin/order/show_order_list');
       }
       else if($id == '5'){
        $this->session->set_flashdata('success',"You Have Already added this product");
        return redirect('admin/order/show_order_list');
       }else if($id == '6'){
        $this->session->set_flashdata('success',"Your margin is greater,according your sub total");
        return redirect('admin/order/show_order_list');
       }
       else {
            $this->session->set_flashdata('success',"Order created Successfully");
            return redirect('admin/order/show_order_list');
       }

    }
    public function show_order_list(){
        $this->load->model('order_model');
        $list = $this->order_model->bill_list();
        $bill_no = $this->order_model->show_bill_no();
        // $this->load->view('admin/header');
        $this->load->view('admin/create_bill',['order_lists' => $list,'bill_number'=>$bill_no]);
    }

    public function update_status(){
        $id = $this->input->post('id');
        $cheses = $this->input->post('cheses');
        $charger = $this->input->post('charger');
        $battery = $this->input->post('battery');
        $moter = $this->input->post('moter');
        $order_id = $this->input->post('order_id');
        $expiry_date = $this->input->post('expiry_date');
        $this->load->model('order_model');
        $status = $this->order_model->update_order_status($id,$cheses,$order_id,$expiry_date,$charger,$battery,$moter);
        if($status == 'true'){
            echo "1";
        }else{
            echo "2";
        }
    }

    public function delete_product(){
        $order_id = $this->input->post('o_id');
        $product_id = $this->input->post('product_id');
        $this->load->model('order_model');
        $id = $this->order_model->remove_order($order_id,$product_id);
        if($id == '1'){
            echo "1";
        }else{
            echo "2";
        }
    }

    public function show_monthly_bill(){
       $this->load->model('order_model');
       $arr = $this->order_model->monthly_bill();
       $this->load->view('admin/monthly_bill_page',['monthly_bill'=>$arr]);
    }

    public function update_chases(){
       $cheses = $this->input->post('chases');
       $order_id = $this->input->post('order_id');
       $this->load->model('order_model');
       $id = $this->order_model->update_chases_number($cheses,$order_id);
       if($id == '1'){
         $this->session->set_flashdata('cheses',"Chases Number updated Successfully");
         return redirect('admin/order/show_order_list');
       }
    }

    public function bike_list(){
        $this->load->model('order_model');
        $arr  = $this->order_model->bike_list_function();
        $this->load->view('admin/header');
        $this->load->view('admin/bike_list_page',['bike_lists'=>$arr]);
        $this->load->view('admin/footer');
        
    }

    public function bike_parts_list(){
        $this->load->model('order_model');
        $arr  = $this->order_model->bike_parts_list_function();
        $this->load->view('admin/header');
        $this->load->view('admin/bike_parts_list_page',['bike_parts_lists'=>$arr]);
        $this->load->view('admin/footer');
        
    }
}

?>