<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

function __construct()
	{
    parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Orders_Model');
  }

	public function index()
	{
		$uid = $this->session->userdata('uid');
		$orders = $this->Orders_Model->get_all_orders($uid);
		foreach ($orders as $key => $order) {
			$orders[$key]['items'] = $this->Orders_Model->single_order_items($order['id']);
		}
		$data['orders'] =$orders;
		$this->load->view('frontend/order',$data);
	}
}
