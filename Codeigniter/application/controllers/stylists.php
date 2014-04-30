<?php
class Stylists extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->model('stylists_model');
    
    }
    
    public function index()
    {
        $data['stylist'] = $this->stylists_model->get_stylists();
    }
    
    public function view($userId){
        
        $data['stylist'] = $this->stylists_model->get_stylists($userId);
    }
}