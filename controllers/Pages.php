    <?php

class Pages extends CI_Controller{


    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 

        $this->load->library('form_validation'); 
        $this->load->model('My_Model'); 
        $this->load->library("pagination");
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        $this->isSpeakerLoggedIn = $this->session->userdata('isSpeakerLoggedIn');
    }
	public function home($param = null){
        $slug1 = $this->db->query("select slug as slug from tbl_users where slug ='".$param."'")->row();
        $slug2 = $this->db->query("select slug as slug from tbl_categories where slug ='".$param."'")->row();

        if($param == null){

        $this->load->model('My_Model');
        $page = "home";
        $data = array();

        // Userid
        $userid = $this->session->userdata('userid');

        // Fetch all records

        $data['speaker'] = $this->My_Model->getSpeaker();

        $data['categories'] = $this->My_Model->getAllcat();

        

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer');

        }
        elseif($slug1){       

                $page = "single";
                $this->load->model('My_Model');
                $data['speaker'] = $this->My_Model->getSpeaker_single($param);
                $data['id'] = $data['speaker']['id'];
                $data['first_name'] = $data['speaker']['first_name'];
                $data['last_name'] = $data['speaker']['last_name'];
                $data['cont_no'] = $data['speaker']['phone'];
                $data['email'] = $data['speaker']['email'];
                $data['department'] = $data['speaker']['department'];
                $data['address'] = $data['speaker']['address'];
                $data['price'] = $data['speaker']['price'];
                $data['details'] = $data['speaker']['details'];
                $data['profile_pict'] = $data['speaker']['profile_pict'];
                $speaker_id = $this->session->set_userdata('speaker_id',$data['id']);
                if($data['speaker']){
                    $this->load->view('templates/header');
                    $this->load->view('pages/'.$page,$data);
                    $this->load->view('templates/footer');
                }
                else{
                    show_404();
                }
        }elseif($slug2){ 

                $page = "categories";
                $data['category'] = $this->My_Model->getcat($param);
                $data['speaker'] = $this->My_Model->getprofession($param);
                $this->load->view('templates/header');
                $this->load->view('pages/'.$page,$data);
                $this->load->view('templates/footer');
        }else{
                //print_r($slug1);
                show_404();
        //print_r($slug2);
            }      
        
	} 
    public function account(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->My_Model->getRows($con); 
            // Pass the user data and load view 
            $this->load->view('templates/header', $data); 
            $this->load->view('pages/account', $data); 
            $this->load->view('templates/footer'); 
        }else{ 
            show_404(); 
        } 
    } 
    public function login(){ 

        $data = array(); 
          
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        
        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('email', 'Email', 'required'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => $this->input->post('password'),
                    ) 
                );  
                $checkLogin['user'] = $this->My_Model->getRows($con);
                $checkLogin['id'] = $checkLogin['user']['id'];
                $checkLogin['first_name'] = $checkLogin['user']['first_name'];
                $checkLogin['last_name'] = $checkLogin['user']['last_name'];
                $checkLogin['email'] = $checkLogin['user']['email'];
                $checkLogin['address'] = $checkLogin['user']['address'];
                $checkLogin['gender'] = $checkLogin['user']['gender'];
                $checkLogin['phone'] = $checkLogin['user']['phone'];
                $checkLogin['is_admin'] = $checkLogin['user']['is_admin'];
                $checkLogin['status'] = $checkLogin['user']['status'];
                if($checkLogin['status'] == 2){
                if($checkLogin['is_admin'] == 1){                
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect('pages/home'); 
                }elseif($checkLogin['is_admin'] == 2){
                    redirect('admin/admin_dashboard'); 
                }elseif($checkLogin['is_admin'] == 3){
                    redirect('staff/staff_dashboard');
                }elseif($checkLogin['is_admin'] == 4){
                    $this->session->set_userdata('isSpeakerLoggedIn', TRUE); 
                    $this->session->set_userdata('speakerId', $checkLogin['id']); 
                    redirect('speaker/speaker_dashboard');
                }else{ 
                    $data['error_msg'] = 'Wrong username or password, please try again.'; 
                } 
              }elseif($checkLogin['status'] == 1){
                    $data['error_msg'] = 'Your account is not verified';
              }elseif($checkLogin['status'] == 3){
                     $data['error_msg'] = 'Your account is blocked by Admin. Please contact our customer service for more info.';
              }else{ 
                    $data['error_msg'] = 'Wrong username or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
        
        $this->load->template('pages/login',$data);
    
    } 
 
    public function register(){ 
        $data = $userData = array(); 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
            $this->form_validation->set_rules('address', 'address', 'required'); 
        
            $userData = array( 
                'email' => strip_tags($this->input->post('email')),
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')),             
                'password' => strip_tags($this->input->post('password')),
                'address' => strip_tags($this->input->post('address')), 
                'gender' => $this->input->post('gender'), 
                'phone' => strip_tags($this->input->post('phone')),
                'is_admin' => 1,
                'status' => 1
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->My_Model->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('pages/login'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['user'] = $userData; 
         
        // Load view 
        $this->load->view('templates/header', $data); 
        $this->load->view('pages/register', $data); 
        $this->load->view('templates/footer');  
    } 
     
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userdataId'); 
        $this->session->sess_destroy(); 
        redirect('pages/home'); 
    } 
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->My_Model->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }
	public function changepass(){
           $oldpass = $this->input->post('oldpassword');
           $newpass = $this->input->post('newpassword');
           $confpass = $this->input->post('conf_password');
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->My_Model->getRows($con);
            $data['id'] = $data['user']['id'];
            $data['password'] = $data['user']['password'];   
        }
        if($this->input->post('changeSubmit')){
            if($oldpass == $data['password']){
                if($newpass == $confpass){
                $this->db->query("update users set password ='".$newpass."' where id ='".$data['id']."'");
                $data['succss'] = 'Password Has Been Successfuly Changed.'; 
            }
            else{
                $data['error'] = 'New Password and Confirm Password didnt match.'; 
            }
            }else{
                $data['error'] = 'Incorrect Old Password.'; 
            }
        }
        $this->load->template('pages/account',$data);
    }
	public function speaker(){ 

            $page = "speaker";
            $data['speaker'] = $this->My_Model->getSpeaker();
         
            // Pass the user data and load view 
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page,$data); 
            $this->load->view('templates/footer'); 
        
        }
    public function schedule(){ 

            $page = "schedule";
            if($this->input->post('insertSchedule')){

            $userid = $this->session->userdata('userId');
            $speaker_id = $this->session->userdata('speaker_id');
            $price['subt'] = $this->db->query('select price from tbl_users where id = "'.$speaker_id.'" limit 1')->result_array();
            $sub_total = $price['subt'][0]['price'];
            $con = array(
            'user_id' => $userid,
            'speaker_id' => $speaker_id,
            'mode_of_webinar' => $this->input->post('select1'),
            'sub_total' => $sub_total,
            'date' => $this->input->post('date'),
            'start' => $this->input->post('start_time'),
            'end' => $this->input->post('end_time')
            );
            $data = $this->My_Model->insertRequest($con);
            redirect('pages/receipt');  

            } 
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page); 
            $this->load->view('templates/footer');       
        
        }
    public function receipt(){ 

            $page = "receipt";

            $userid = $this->session->userdata('userId');
            $speaker_id = $this->session->userdata('speaker_id');

            $data['user'] = $this->My_Model->getreceipt($userid);
            $data['speaker'] = $this->My_Model->speaker($speaker_id);
            // Pass the user data and load view 
         
            // Pass the user data and load view 
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page,$data); 
            $this->load->view('templates/footer'); 
        
        }
    public function payment(){ 

            $page = "payment";

            $data['tos'] = $this->My_Model->getTOS();

            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page,$data); 
            $this->load->view('templates/footer'); 
        
        }
    public function payment_function(){

            $userid = $this->session->userdata('userId');

            $payment = $this->input->post('payment');
            $this->db->query("update tbl_user_request set mode_of_payment ='".$payment."' where user_id='".$userid."'");

            if($payment==null){
                redirect('pages/payment');
            }
            elseif($payment=="gcash"){

            redirect('pages/'.$payment);

            }else{
            redirect('pages/'.$payment);
            }

        }
    public function gcash(){ 

            $page = "gcash";
         
            // Pass the user data and load view 
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page); 
            $this->load->view('templates/footer'); 
        
        }
    public function paymaya(){ 

            $page = "paymaya";
         
            // Pass the user data and load view 
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page); 
            $this->load->view('templates/footer'); 
        
        }
        public function payment_confirmation(){ 

            $userid = $this->session->userdata('userId');
            $speaker_id = $this->session->userdata('speaker_id');
            $page = "payment_confirmation";
            $data['user'] = $this->My_Model->getPaymentinfo($userid);
            $data['speaker'] = $this->My_Model->speaker($speaker_id);
            $this->db->query("update tbl_user_request set status ='Paid' where user_id='".$userid."'");
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page,$data); 
            $this->load->view('templates/footer');
        
        }

        public function official_receipt(){ 

            $userid = $this->session->userdata('userId');
            $speaker_id = $this->session->userdata('speaker_id');

            $data['user'] = $this->My_Model->getreceipt($userid);
            $data['speaker'] = $this->My_Model->speaker($speaker_id);

            $page = "official_receipt";
            $this->load->view('templates/header'); 
            $this->load->view('pages/'.$page,$data); 
            $this->load->view('templates/footer'); 
        
        }
        public function alert(){
        echo "<script type='text/javascript'>alert('You need to login first.');</script>";
        redirect('pages/login', 'refresh');
        }
        public function fetch_notif(){
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->My_Model->getRows($con);
            $id['id'] = $data['user']['id'];
            $email['email'] = $data['user']['email'];
            }
            $q = $this->db->query("select tbl_notif.id as id, tbl_notif.sender_id as send_id, tbl_notif.reciever_id as reciever_id, tbl_notif.title as title, tbl_notif.body as body, tbl_notif.created as created, tbl_notif.status as status, tbl_users.id as user_id, tbl_users.first_name as first_name, tbl_users.last_name as last_name, tbl_users.email as email from tbl_notif join tbl_users on tbl_notif.reciever_id = tbl_users.id where tbl_notif.reciever_id = '".$id['id']."'")->result();
     
                
                echo "<h3 style='margin-left: 10px;'><strong>Notification</strong></h3><br>";
                foreach($q as $row)
                {                 
                       if($row->status == "Seen"){

                      echo "<a href='".base_url()."/pages/notif/".$row->id."' class='dropdown-item'>";
                      echo "<p><i>$row->first_name $row->last_name</i></small>";
                      echo "<p>$row->title</p>";
                      echo "<small>$row->body </small>";
                      echo "<small>$row->created</small><br>";
                      echo "<small>seen</small>";
                      echo "</a>";

                      }else{

                      echo "<a href='".base_url()."/pages/notif/".$row->id."' class='dropdown-item'>";
                      echo "<strong><p><i>$row->first_name $row->last_name</strong></i></small>";
                      echo "<p>$row->title</p>";
                      echo "<small>$row->body </small>";
                      echo "<small>$row->created</small><br>";
                      echo "<small>unseen</small>";
                      echo "</strong></a>";

                      }
                    }                    

                echo "<a class='nav-link text-dark' href='".base_url()."msgs'>See all notif...</a>";
    }
    public function notif_count(){
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->My_Model->getRows($con);
            $id['id'] = $data['user']['id'];
            $email = $data['user']['email'];
            }
       $q = $this->db->query("select count(status) as count from tbl_notif where reciever_id ='".$id['id']."' and status = 'Unseen'")->row();

       echo "$q->count"; 
    }
    public function fetch_msg(){
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->My_Model->getRows($con);
            $id['id'] = $data['user']['id'];
            }
            $q = $this->db->query("select tbl_msg.id as id, tbl_msg.sender_id as send_id, tbl_msg.reciever_id as reciever_id, tbl_msg.title as title, tbl_msg.body as body, tbl_msg.created as created, tbl_msg.status as status, tbl_users.id as user_id, tbl_users.first_name as first_name, tbl_users.last_name as last_name, tbl_users.email as email from tbl_msg join tbl_users on tbl_msg.reciever_id = tbl_users.id where tbl_msg.reciever_id = '".$id['id']."'")->result();
                
                echo "<h3 style='margin-left: 10px;'><strong>Messages</strong></h3><br>";
                foreach($q as $row){                 

                      if($row->status == "Seen"){

                      echo "<a href='".base_url()."/pages/msgs/".$row->id."' class='dropdown-item'>";
                      echo "<p><i>$row->first_name $row->last_name</i></small>";
                      echo "<p>$row->title</p>";
                      echo "<small>$row->body </small>";
                      echo "<small>$row->created</small><br>";
                      echo "<small>seen</small>";
                      echo "</a>";

                      }else{

                      echo "<a href='".base_url()."/pages/msgs/".$row->id."' class='dropdown-item'>";
                      echo "<strong><p><i>$row->first_name $row->last_name</strong></i></small>";
                      echo "<p>$row->title</p>";
                      echo "<small>$row->body </small>";
                      echo "<small>$row->created</small><br>";
                      echo "<small>unseen</small>";
                      echo "</strong></a>";

                      }
                    }                    

                echo "<a class='nav-link text-dark' href='".base_url()."msgs'>See all messages...</a>";
    }
    public function msg_count(){
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->My_Model->getRows($con);
            $id['id'] = $data['user']['id'];
            }
       $q = $this->db->query("select count(status) as count from tbl_msg where reciever_id ='".$id['id']."' and status = 'Unseen'")->row();

       echo "$q->count"; 
    }
    public function msgs($param = null){

          $slug = $this->db->query("select id from tbl_msg where id ='".$param."'")->row();

          if($param == null){
          $page = "message";
          $userid = $this->session->userdata('userId');
          $data['result'] = $this->My_Model->rcv_msg($userid);
          $data['count'] = $this->My_Model->msgcount($userid);
          //print_r($data);
          $this->load->view('templates/header'); 
          $this->load->view('pages/'.$page,$data); 
          $this->load->view('templates/footer');

      }else{

          $this->db->query("update tbl_msg set status ='Seen' where id ='".$param."'");
          $page = "single_message";
          $userid = $this->session->userdata('userId');
          $data['sender']= $this->My_Model->msg_view($param);
          $data['count'] = $this->My_Model->msgcount($userid);
          //print_r($data);
          $this->load->view('templates/header'); 
          $this->load->view('pages/'.$page,$data); 
          $this->load->view('templates/footer');
      }
    }
    public function create_msg(){
        $userid = $this->session->userdata('userId');
        $data['count'] = $this->My_Model->msgcount($userid);
        $page = "create_message";
        $this->load->view('templates/header'); 
        $this->load->view('pages/'.$page,$data); 
        $this->load->view('templates/footer');
    }
    public function application_form(){

        $page = "application_form";
        

        $data = $userData = array(); 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        if($this->input->post('speakerSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
            $this->form_validation->set_rules('address', 'address', 'required'); 
        
            $userData = array( 
                'email' => strip_tags($this->input->post('email')),
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')),             
                'password' => strip_tags($this->input->post('password')),
                'address' => strip_tags($this->input->post('address')), 
                'gender' => $this->input->post('gender'), 
                'phone' => strip_tags($this->input->post('phone')),
                'department' => strip_tags($this->input->post('select1')),
                'resume' => strip_tags($this->input->post('resume')),
                'profile_pict' => strip_tags($this->input->post('profile_pict')),
                'is_admin' => 4,
                'status' => 1
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->My_Model->insertSpeaker($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. The staff will verify your account first. Thank you!'); 
                    redirect('pages/login'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['user'] = $userData; 
         
        // Load view  
        $data['categories'] = $this->My_Model->getAllcategory();
        $this->load->view('templates/header',$data); 
        $this->load->view('pages/'.$page,$data); 
        $this->load->view('templates/footer'); 
        

    }
    public function transaction_history(){

        $page = "transaction_history";
        $userid = $this->session->userdata('userId');
        $data['transaction'] = $this->My_Model->gettrans($userid);
        $this->load->view('templates/header'); 
        $this->load->view('pages/'.$page,$data); 
        $this->load->view('templates/footer'); 

    }
    public function certificate_list(){

        $page = "certificate_list";

        $this->load->view('templates/header'); 
        $this->load->view('pages/'.$page); 
        $this->load->view('templates/footer'); 

    }
}