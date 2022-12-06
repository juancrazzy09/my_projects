<?php 
class Speaker extends CI_Controller{

	 function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 

        $this->load->library('form_validation'); 
        $this->load->model('Speaker_Model');    
        $this->load->library('pagination');
         
        // User login status 
        $this->isSpeakerLoggedIn = $this->session->userdata('isSpeakerLoggedIn'); 
    }
	public function speaker_dashboard(){
		$userid = $this->session->userdata('speakerId');
		$data['speaker'] = $this->Speaker_Model->getSpeak($userid);
		//print_r($data);

		$this->load->view('speaker/header'); 
        $this->load->view('speaker/sidebar');
        $this->load->view('speaker/speaker_dashboard',$data); 
        $this->load->view('speaker/footer');
        
	}
    public function list_of_request(){
        $userid = $this->session->userdata('speakerId');
        $data['speaker'] = $this->Speaker_Model->getSpeak($userid);
        $page = "list_of_request";
        $data['pending'] = $this->Speaker_Model->get_pending($userid);
        $data['accept'] = $this->Speaker_Model->get_accepted($userid);
        
        //if($data['speaker'] ==)
        $this->load->view('speaker/header'); 
        $this->load->view('speaker/sidebar');
        $this->load->view('speaker/'.$page,$data); 
        $this->load->view('speaker/footer');
        
    }
    public function list_of_transaction(){
        $userid = $this->session->userdata('speakerId');
        $data['speaker'] = $this->Speaker_Model->getSpeak($userid);
        $page = "list_of_transaction";
        $data['pending'] = $this->Speaker_Model->get_pending($userid);
        $data['accept'] = $this->Speaker_Model->get_accepted($userid);
       
        //if($data['speaker'] ==)
        $this->load->view('speaker/header'); 
        $this->load->view('speaker/sidebar');
        $this->load->view('speaker/'.$page,$data); 
        $this->load->view('speaker/footer');
        
    }
    public function accept(){
        $id=$this->uri->segment(3);
        $data = $this->Speaker_Model->accept($id);
        redirect('speaker/list_of_request');
    }
    public function decline(){
        $id=$this->uri->segment(3);
        $data = $this->Speaker_Model->decline($id);
        redirect('speaker/list_of_request');
    }
    
    
}