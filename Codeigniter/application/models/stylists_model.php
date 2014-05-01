<?php
class Stylists_model extends CI_Model {
    
    public function __construct(){
        $this->load->database();
    }
    
    public function get_stylists($userId = FALSE)
    {
        if ($userId === FALSE)
        {
            $query = $this->db->get('stylist');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('stylists', array('userId' => $userId));
        return $query->row_array();
    }
    
    
}