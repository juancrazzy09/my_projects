<?php
class My_Model extends CI_Model{

	public function __construct(){

		$this->table = 'tbl_users';
	}
	function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 
    public function insert($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->table, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }
    public function getSpeaker(){
        $data = $this->db->query("select * from tbl_users where is_admin = 4");
        return $data->result_array();
    }
    // Fetch records
 
  public function getSpeaker_single($param){
    $this->db->where('slug',$param);
    $result = $this->db->get('tbl_users');

    return $result->row_array();
  }
  public function getAllcat(){
    $data = $this->db->query("select * from tbl_categories");
    return $data->result_array();
  }
  public function getSinglecat($param){
    $this->db->where('slug',$param);
    $result = $this->db->get('tbl_categories');

    return $result->row_array();
  }
  public function getcat($param){
    $str = str_replace('-', ' ', $param);
    $data = $this->db->query("select * from tbl_users where department = '".$str."'");
    return $data->result();
  }
  public function getprofession($param){
    $data = $this->db->query("select category_name as category from tbl_categories where slug = '".$param."' LIMIT 1");
    return $data->result();
  }
  public function insertRequest($data = array()){
    if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            $insert = $this->db->insert('tbl_user_request', $data); 
             
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
  }
  public function getreceipt($param){

    $client = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar , tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created , tbl_user_request.mode_of_payment as payment, tbl_user_request.status as status, tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.user_id = '".$param."' and tbl_users.id = '".$param."' order by id desc limit 1");

    return $client->result();
  }
  public function speaker($param){

      $speaker = $this->db->query("select tbl_user_request.id as id, tbl_user_request.speaker_id as speaker_id, tbl_users.id as user_id, tbl_users.first_name as first_name, tbl_users.last_name as last_name , tbl_users.email as email, tbl_users.address as address , tbl_users.gender as gender , tbl_users.phone as phone , tbl_users.department as department from tbl_user_request join tbl_users where tbl_user_request.speaker_id ='".$param."' and tbl_users.id = '".$param."' limit 1");

      return $speaker->result();
  }
  public function getTOS(){
    $result = $this->db->query("select * from terms_and_conditions");
    return $result->result();
  }
  public function getPaymentinfo($param){

     $client = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar , tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created , tbl_user_request.mode_of_payment as payment, tbl_user_request.status as status, tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.user_id = '".$param."' and tbl_users.id = '".$param."' order by id desc limit 1");

    return $client->result();
  }
  public function msg_view($param){
    $result = $this->db->query("select tbl_msg.id as id, tbl_msg.sender_id as sender_id, tbl_msg.reciever_id as reciever_id, tbl_msg.title as title, tbl_msg.body as body,tbl_msg.created as created, tbl_msg.status as status, tbl_users.id as user_id, tbl_users.first_name as first_name, tbl_users.last_name as last_name from tbl_msg join tbl_users on tbl_msg.reciever_id = tbl_users.id where tbl_msg.id = '".$param."' limit 1");
    return $result->result();
  }
  public function rcv_msg($param){
    $result = $this->db->query("select tbl_msg.id as id, tbl_msg.sender_id as sender_id, tbl_msg.reciever_id as reciever_id, tbl_msg.title as title,tbl_msg.created as created, tbl_msg.body as body, tbl_msg.status as status, tbl_users.id as user_id, tbl_users.first_name as first_name, tbl_users.last_name as last_name, tbl_users.email as email from tbl_msg join tbl_users on tbl_msg.reciever_id = tbl_users.id where tbl_msg.reciever_id = '".$param."'");
    return $result->result();
  }
  public function msgcount($param){
    $result = $this->db->query("select count(status) as count from tbl_msg where reciever_id = '".$param."' and status = 'Unseen'");
    return $result->result();
  }
  public function gettrans($param){
    $result = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar , tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created , tbl_user_request.mode_of_payment as payment, tbl_user_request.status as status, tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.user_id = '".$param."' and tbl_users.id = '".$param."'");
    return $result->result();
  }
  public function insertSpeaker($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->table, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
        
    }
    public function getAllcategory(){
      $result = $this->db->query("select * from tbl_categories");
      return $result->result();
    }
}