<?php
class Login extends MY_Controller{
    public function index(){
            $this->load->view('admin/login_page');
    }

    public function user_login(){
        if ($this->form_validation->run('login_rules')) {
            $uname = $this->input->post('username');
            $pass = $this->input->post('password');
            $this->load->model('login_model');
            $login = $this->login_model->signIn($uname,$pass);
            if(!empty($login)){
               // $session_data['session_pass'] = $login['0']['fld_type'];
                $session_type = $login['0']['fld_type'];
                $this->session->set_userdata('user', $session_type);
                return redirect('admin/home');
            }else{
                $this->session->set_flashdata('invailid_up',"Invailid Username & Password");
                $this->load->view('admin/header');
                $this->load->view('admin/login_page');
                $this->load->view('admin/footer');
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/login_page');
            $this->load->view('admin/footer');
        }
    }
}

?>