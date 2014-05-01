<?php
class Stylists extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->model('stylists_model');
    
    }
    
    public function index()
    {
        $data['stylist'] = $this->stylists_model->get_stylists();
        $data['fname'] = 'First name';
        
        $this->load->view('templates/header', $data);
        $this->load->view('stylists/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($userId){
        
        $data['stylist_detail'] = $this->stylists_model->get_stylists($userId);
        
        if (empty($data['stylist_detail'])){
            
            show_404();
        }
        
        $data['stylistEmail'] = $data['stylist_detail']['stylistEmail'];
        $data['stylistPhone'] = $data['stylist_detail']['stylistPhone'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('stylists/view', $data);
        $this->load->view('templates/footer');
    }
    
}