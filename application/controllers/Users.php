<?php
class Users extends MY_Controller{
    public function index(){
        $this->load->view('Users_data/user_list');
       
    }
}

?>