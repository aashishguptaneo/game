<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model{


	function getusedetails($id) {
		$this->db->select('*');
		$this->db->from('tblusers');
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get();
			$result = $query->row_array();
		}
		return !empty($result)?$result:false;
    }




// user tablke me user id nhi hai id hai sirf wo dekh ke karo


//For updating user details
public function updateprofile($uid,$fname,$lname,$email){
		$data=array(
		'FirstName'=>$fname,
		'LastName'=>$lname,
		'Email'=>$email,
		);
		$query=$this->db->where('id',$uid);
		$this->db->update('tblusers',$data);
}




		public function get_user($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('tblusers');
			return $query->row();
		}

    public function update_user($id, $userdata)
    {
        $this->db->where('id', $id);
        $this->db->update('tblusers', $userdata);
    }


}
