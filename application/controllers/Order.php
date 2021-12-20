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
		if($uid){
			$orders = $this->Orders_Model->get_all_orders($uid);
			foreach ($orders as $key => $order) {
				$orders[$key]['items'] = $this->Orders_Model->single_order_items($order['id']);
			}
			$data['orders'] =$orders;
			$this->load->view('frontend/order',$data);
		}else{
			$cart = base_url()."signin";
			echo "<script>
			alert('Please Login To access Your orders');
			window.location.href='".$cart."';
			</script>";
			exit;
		}
	}

	public function OrderInfo()
	{
		$uid = $this->session->userdata('uid');
		if($uid){
			$orders = $this->Orders_Model->singleOrder($_GET['id']);
			foreach ($orders as $key => $order) {
				$orders[$key]['items'] = $this->Orders_Model->single_order_items($order['id']);
			}
			$data['order'] =$orders[0];
			$this->load->view('frontend/single-order',$data);
		}else{
			$cart = base_url()."signin";
			echo "<script>
			alert('Please Login To access Your orders');
			window.location.href='".$cart."';
			</script>";
			exit;
		}
	}
}
