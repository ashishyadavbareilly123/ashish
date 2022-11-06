<?php
class Home extends MY_Controller {
    public function index(){
        $this->load->model('product_model');
        $product_arr = $this->product_model->get_products();
        $product_expiry = $this->product_model->expiry_product();
        
        $this->load->view('admin/header');
        $this->load->view('admin/home_page',['products'=> $product_arr,'expiry_product'=>$product_expiry]); 
        $this->load->view('admin/footer');
    }

    public function logout() {
		$this->session->unset_userdata('user');
		return redirect('login/index');
	}

    public function api(){
        return "Helo";
    }
}

?>