<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_Model extends CI_Model{

	function get_all_orders($id) {
				$query = $this->db->select('*')->from('orders')->where('user_id',$id)->get();
				$result = $query->result_array();
				return !empty($result)?$result:false;
    }
	function single_order_items($id) {
				$query = $this->db->select('*')->from('order_items')->where('order_id',$id)->get();
				$result = $query->result_array();
				return !empty($result)?$result:false;
    }
	function singleOrder($id) {
				$query = $this->db->select('*')->from('orders')->where('id',$id)->get();
				$result = $query->result_array();
				return !empty($result)?$result:false;
    }

}
