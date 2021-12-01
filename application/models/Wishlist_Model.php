<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_Model extends CI_Model{


  function is_added($data)
  {
    $query = $this->db->where(['user_id'=>$data['user_id'],'product_id'=>$data['product_id']])->get('wishlist');
    return $query->row();
  }

  function remove_from_wishlist($data) {
    $this->db->where(['user_id'=>$data['user_id'],'product_id'=>$data['product_id']])->delete('wishlist');
  }
  function my_wishlist($id) {
    return $this->db->where(['user_id'=>$id])->get('wishlist')->result();
  }

  function add_to_wishlist($data) {
    $this->db->insert('wishlist',$data);
    return $this->db->insert_id();
  }

  function user_wishlist_products($id)
  {
    $sql = "SELECT product_id FROM wishlist where user_id='".$id."'";
    $query = $this->db->query($sql);
    $array = $query->result_array();
    $arr = array_column($array,"product_id");
    return $arr;
  }

}
