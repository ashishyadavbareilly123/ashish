<?php
class Athenticate extends CI_model{

public function getdata(){
        $this->load->database();
        $q = $this->db->query("select * from test_table");
        return $q->result_array();
}

}
?>