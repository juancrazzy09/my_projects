<?php
class Admin_Model extends CI_Model{
	public function __construct(){
		$this->table = 'tbl_users';
	}
    public function get_Allspeaker(){
        $result = $this->db->query("select * from tbl_users where is_admin = 4");
        return $result->result();
    }
    public function get_Alluser(){
        $result = $this->db->query("select * from tbl_users where is_admin = 1");
        return $result->result();
    }
	public function getAllcategory(){
		$result = $this->db->query("select * from tbl_categories ");
		return $result->result();
	}
	public function getTotalspeaker($param){
		$result = $this->db->query("select count(department) as count from tbl_users where department = '".$param."'");
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
    public function verify_user($param){
        $result = $this->db->query("update tbl_users set status = '2' where id ='".$param."' ");
    }
    public function block_user($param){
        $result = $this->db->query("update tbl_users set status = '3' where id ='".$param."' ");
    }
    public function delete_user($param){
        $result = $this->db->query("delete from tbl_users where id ='".$param."' ");
    }
    public function accept($param){
        $result = $this->db->query("update tbl_user_request set status ='Paid' where id ='".$param."' ");
    }
    public function decline($param){
        $result = $this->db->query("update tbl_user_request set status ='Declined' where id ='".$param."' ");
    }
    public function get_pending(){
        $result = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar ,tbl_user_request.mode_of_payment as mode_of_payment, tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created , tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.status = 'Unpaid'");
        return $result->result();
    }
    public function get_accepted(){
        $result = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar ,tbl_user_request.mode_of_payment as mode_of_payment, tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created , tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.status = 'Paid'");
        return $result->result();
    }
    public function getPending(){

        $result = $this->db->query("select count(is_admin) as status from tbl_users where is_admin = '4' and status ='1'");

        return $result->result();
    }
    public function getAccepted(){

        $result = $this->db->query("select count(is_admin) as status from tbl_users where is_admin = '4' and status = '2'");

        return $result->result();
    }
    public function getPendingSpeaker(){
        $result = $this->db->query("select * from tbl_users where is_admin = '4' and status = '1' ");
        return $result->result();
    }
}