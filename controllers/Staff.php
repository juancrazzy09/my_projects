<?php 
class Staff extends CI_Controller{
		function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 

        $this->load->library('form_validation'); 
        $this->load->model('Staff_Model');
        $this->load->helper('security'); 
        $this->load->library('upload');
         
    }

	public function staff_dashboard(){

		$page = "staff_dashboard";
            $data['categories'] = $this->Staff_Model->getAllcategory();
            $data['pending'] = $this->Staff_Model->getPending();
            $data['accepted'] = $this->Staff_Model->getAccepted();
            $data['speaker'] = $this->Staff_Model->getPendingSpeaker();
           	$this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/'.$page,$data); 
            $this->load->view('staff/footer'); 
	}
	public function staff_request(){

		$page = "staff_request";
        $data['pending'] = $this->Staff_Model->get_pending();
        $data['accept'] = $this->Staff_Model->get_accepted();
           	$this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/'.$page,$data); 
            $this->load->view('staff/footer'); 
	}
    public function staff_transactions(){

        $page = "staff_transactions";
        $data['pending'] = $this->Staff_Model->get_pending();
        $data['accept'] = $this->Staff_Model->get_accepted();
           	$this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/'.$page,$data); 
            $this->load->view('staff/footer'); 
    }
	public function staff_speaker(){

		$page = "staff_speaker";
        $data['speaker'] = $this->Staff_Model->get_Allspeaker();
         
           	$this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/'.$page,$data); 
            $this->load->view('staff/footer'); 
	}
	public function staff_categories(){

		$page = "staff_categories";
        $data['categories'] = $this->Staff_Model->getAllcategory();
        $param = $data['categories'][0]->category_name;
        $data['user'] = $this->Staff_Model->getTotalspeaker($param);

           	$this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/'.$page,$data); 
            $this->load->view('staff/footer'); 
	}
	public function staff_users(){

		$page = "staff_users";
        $data['user'] = $this->Staff_Model->get_Alluser();
         
           	$this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/'.$page,$data); 
            $this->load->view('staff/footer'); 
	}
    public function add_speaker(){

        $data = $speakerData = array();

        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
       
        if($this->input->post('insertSpeaker')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'Password', 'required');  
            $this->form_validation->set_rules('phone', 'Phone', 'required'); 
            $this->form_validation->set_rules('address', 'address', 'required'); 
            $this->form_validation->set_rules('profession', 'Profession', 'required'); 
            $this->form_validation->set_rules('gender', 'Gender', 'required'); 
            $this->form_validation->set_rules('department', 'Department', 'required'); 
            $this->form_validation->set_rules('img', 'img', 'required');
            $this->form_validation->set_rules('details', 'Details', 'required'); 
            $slug = strip_tags($this->input->post('first_name'))." ".strip_tags($this->input->post('last_name'));
            $str = str_replace(' ', '-', $slug);
            $speakerData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => strip_tags($this->input->post('password')), 
                'phone' => strip_tags($this->input->post('phone')),
                'address' => strip_tags($this->input->post('address')),
                'slug' => $str,
                'department' => strip_tags($this->input->post('select1')),
                'profile_pict' => strip_tags($this->input->post('img')),
                'details' => strip_tags($this->input->post('details')),
                'is_staff' => 4                
            ); 
 
            //if($this->form_validation->run() == true){ 
                $insert = $this->Staff_Model->insertSpeaker($speakerData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Speaker account registration has been successful.'); 
                    redirect('staff/add_speaker');
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            //}else{ 
               // $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            //} 
        } 
         
        // Posted data 
        $data['speaker'] = $speakerData; 
        $data['pending'] = $this->Staff_Model->getPending();
        $data['accepted'] = $this->Staff_Model->getAccepted();
            $this->load->view('staff/header'); 
            $this->load->view('staff/sidebar');
            $this->load->view('staff/staff_dashboard',$data); 
            $this->load->view('staff/footer'); 
    }
    public function add_category(){
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
        $category = $this->input->post('category');
        $result = $this->db->query("select category_name from tbl_categories where category_name ='".$category."'")->row();
        $str = str_replace(' ', '-', $category);
        $insert = $this->db->query("INSERT into tbl_categories(slug,category_name) values ('".$str."','".$category."')");
        if($insert){
            $this->session->set_userdata('success_msg', 'Add new category has been successful.');
            redirect('staff/staff_dashboard');
        }else{
            $this->session->set_userdata('error_msg','Some problems occured, please try again.');
            redirect('staff/staff_dashboard'); 
        }
        
    }
    public function verify(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->verify_user($id);
        redirect('staff/staff_speaker');
    }
    public function block(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->block_user($id);
        redirect('staff/staff_speaker');
    }
     public function delete(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->delete_user($id);
        redirect('staff/staff_speaker');
    }
    public function verify_user(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->verify_user($id);
        redirect('staff/staff_users');
    }
    public function block_user(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->block_user($id);
        redirect('staff/staff_users');
    }
     public function delete_user(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->delete_user($id);
        redirect('staff/staff_users');
    }
    public function accept(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->accept($id);
        redirect('staff/staff_request');
    }
    public function decline(){
        $id=$this->uri->segment(3);
        $data = $this->Staff_Model->decline($id);
        redirect('staff/staff_request');
    }
}