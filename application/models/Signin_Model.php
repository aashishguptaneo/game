<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin_Model extends CI_Model{


  public function index($email,$password){
    $data=['Email'=>$email,'Password'=>$password];
    $query=$this->db->where($data);
    $login=$this->db->get('tblusers');
     if($login!=NULL){
       return $login->row();
     }
  }

}
