<?php
class Login_model extends CI_model{
    public function signIn($username, $pass) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where(['fld_admin_name'=> $username,'fld_password'=>$pass]);
        $admin = $this->db->get();
        return $admin->result_array();
	}
}
?>