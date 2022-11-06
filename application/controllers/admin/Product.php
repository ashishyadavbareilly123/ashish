<?php
class Product extends MY_Controller {
    public function total_stock_list(){
        $this->load->model('product_model');
        $total_stock = $this->product_model->TotalStock();
        $this->load->view('admin/header');
        $this->load->view('admin/total_stock_page',['stock_list'=>$total_stock]);
        $this->load->view('admin/footer');
    }

    public function create_order() {
        $this->load->model('product_model');
        $list = $this->product_model->get_product();    

        $this->load->view('admin/header');
        $this->load->view('admin/generate_order',['product_lists'=>$list]);
        $this->load->view('admin/footer');
    }

    public function get_select_product_price(){
        $this->load->model('product_model');
        $product_id = $this->input->post('product_id');
        $arr = $this->product_model->get_product_price($product_id);
        if($arr){
            $price = $arr[0]['fld_product_price'];
            echo $price;
        }else{
            echo "failed";
        }       
    }

    public function add_product(){
        $config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
        if($this->form_validation->run('add_product')){
            $post = $this->input->post();
			$data = array('upload_data' => $this->upload->data() && $this->upload->do_upload('fld_image'));
			$file_array = $this->upload->data('file_name');
			$url = '/assets/images/';
            // $profile['profile_picture'] = $file_array['file_name'];
			$b_url = $url.$file_array;
            $this->load->model('product_model');
			$res = $this->product_model->addProduct($post,$b_url);	
            if($res == '1'){
                $this->session->set_flashdata('msg', 'Product Added Succesfully');
				$this->session->set_flashdata('msg_art', 'alert-success');
            }else{
                $this->session->set_flashdata('msg', 'Product Not Added Succesfully');
				$this->session->set_flashdata('msg_art', 'alert-danger');
            }
            return redirect('admin/product/add_product');
        } else {
			// $upload_error = $this->upload->display_errors();
            $this->load->view('admin/header');
            $this->load->view('admin/add_product_page');
            $this->load->view('admin/footer');
		}
    }
    public function edit_product(){
        $id = $this->input->post('id');
        $this->load->model('product_model');
		$product = $this->product_model->fetch_product_details($id);
        $this->load->view('admin/header');
		$this->load->view('admin/edit_product_page', ['product' => $product]);
        $this->load->view('admin/footer');
    }

    public function update_product(){
        $config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
        if ($this->form_validation->run('add_product')) {
			$post = $this->input->post();
            $data = array('upload_data' => $this->upload->data() && $this->upload->do_upload('fld_image'));
			$file_array = $this->upload->data('file_name');
			$url = '/assets/images/';
			$b_url = $url.$file_array;
            $product_id = $post['fld_product_id'];

			$this->load->model('product_model');
			if ($this->product_model->update_products($product_id, $post,$b_url)) {
				$this->session->set_flashdata('msg', 'Product Update Succesfully');
				$this->session->set_flashdata('msg_art', 'alert-success');
			} else {
				$this->session->set_flashdata('msg', 'Product not Update Please try again!!');
				//dynmic kiya h alert class ko with multiple flashdata
				$this->session->set_flashdata('msg_art', 'alert-danger');
			}
			return redirect('admin/product/total_stock_list');
			//    print_r($post);  sari form ki input le leta h is tarike se
			//    exit;
		} else {
            $this->session->set_flashdata('required', 'Please fill All  form fields');
            return redirect('admin/product/total_stock_list');
		 }

    }
}

?>