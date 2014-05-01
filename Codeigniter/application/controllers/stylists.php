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
        
        /*if (empty($data['stylist_detail'])){
            
            show_404();
        }*/
        
        $data['fname'] = $data['stylist_detail']['fname'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('stylists/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['fname'] ='Create a stylist';
        
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        
        if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('stylists/create');
                $this->load->view('templates/footer');
            }
        else{
            $this->stylists_model->set_stylist();
            $this->load->view('stylists/success');
        }
    }
    
}