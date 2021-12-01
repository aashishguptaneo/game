<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_Model extends CI_Model{



  function my_cart($id) {
    return $this->db->where(['user_id'=>$id])->get('cart')->result();
  }
  function is_added($data)
  {
    $query = $this->db->where(['user_id'=>$data['user_id'],'product_id'=>$data['product_id']])->get('cart');
    return $query->row();
  }
  function add_to_cart($data) {
    $this->db->insert('cart',$data);
    return $this->db->insert_id();
  }


}
