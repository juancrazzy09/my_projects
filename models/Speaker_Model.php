<?php
class Speaker_Model extends CI_Model{
	public function getSpeak($param){
		$result = $this->db->query("select * from tbl_users where id ='".$param."'");
		return $result->result();
	}
	public function get_request(){
        $result = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar ,tbl_user_request.mode_of_payment as mode_of_payment, tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created , tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id");
        return $result->result();
    }
	public function accept($param){
        $result = $this->db->query("update tbl_user_request set status ='Paid' where id ='".$param."' ");
    }
    public function decline($param){
        $result = $this->db->query("update tbl_user_request set status ='Declined' where id ='".$param."' ");
    }
    public function get_pending($param){
        $result = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar ,tbl_user_request.mode_of_payment as mode_of_payment, tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created ,tbl_users.id as user_id2, tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.status = 'Unpaid' and tbl_user_request.speaker_id = '".$param."'");
        
        return $result->result();
    }
    public function get_accepted($param){
        $result = $this->db->query("select tbl_user_request.id as id, tbl_user_request.user_id as user_id , tbl_user_request.speaker_id as speaker_id , tbl_user_request.mode_of_webinar as mode_of_webinar ,tbl_user_request.mode_of_payment as mode_of_payment, tbl_user_request.sub_total as sub_total , tbl_user_request.date as date , tbl_user_request.start as start , tbl_user_request.end as end , tbl_user_request.created as created ,tbl_users.id as user_id2, tbl_users.first_name as first_name , tbl_users.last_name as last_name , tbl_users.email as email , tbl_users.address as address, tbl_users.gender as gender, tbl_users.phone as phone from tbl_user_request join tbl_users on tbl_user_request.user_id = tbl_users.id where tbl_user_request.status = 'Paid' and tbl_user_request.speaker_id = '".$param."'");
        
        return $result->result();
    }
}