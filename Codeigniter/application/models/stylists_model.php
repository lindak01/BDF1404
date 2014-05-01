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
        
        $query = $this->db->get_where('stylistInfo', array('userId' => $userId));
        return $query->row_array();
    }
    
    public function set_stylist(){
        $this->load->helper('url');
        $userId = url_fname($this->input->post('fname'), 'dash', TRUE);
        
        $data = array(
            'fname' => $this->input->post('fname'),
            'userId' => $userId,
            'lname' => $this->input->post('lname'),
        );
        
        return $this->db->insert('fname', $data);
                    
        
    }
    
    
}