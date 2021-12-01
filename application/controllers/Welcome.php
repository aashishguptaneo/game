<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('paypal_lib');
		$this->load->database();
		$this->load->model('Model_welcome');
		$this->load->model('Wishlist_Model');
		$this->load->model('Cart_Model');
	}

	public function index()
	{
		$ch = curl_init();
// 		sortBy 	string 	Sort field name (values: kingiunId, updatedAt, name, qty or price)
// sortType
		$url = 'https://gateway.kinguin.net/esa/api/v1/products?limit=40&sortType=asc&sortBy=updatedAt';
		// curl_setopt($ch, CURLOPT_URL, 'https://gateway.kinguin.net/esa/api/v1/products');
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$headers = array();
		$headers[] = 'X-Api-Key: d9430deb28efea8df425f446a59aeb86';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		$data['product'] = json_decode($result)->results;
		if($this->session->userdata('uid')){
			$data['wishlist'] = $this->Wishlist_Model->user_wishlist_products($this->session->userdata('uid'));
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		// $url = "https://sandbox.kinguin.net/services/library/api/v1/products/search?phrase=fifa&size=5&visible=1&sort=bestseller.total,DESC";


		$this->load->view('frontend/index',$data);
	}

	public function about()
	{
		$this->load->view('frontend/about');
	}

	public function games()
	{
		$this->load->view('frontend/games');
	}

	public function contact()
	{
		$this->load->view('frontend/contact');
	}

	public function checkout($id = null)
	{
		$data =[];
		if($id){
			$url =  'https://gateway.kinguin.net/esa/api/v1/products/'.$id;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			$headers = array();
			$headers[] = 'X-Api-Key: d9430deb28efea8df425f446a59aeb86';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);
			$product = json_decode($result);

			$data['products'][0] = [
				"kinguinId" => $product->kinguinId,
				"name" => $product->name,
				"price" => $product->price,
				"qty" => 1,
				"image" => isset($product->coverImageOriginal) ? $product->coverImageOriginal : ""
			];
			if($this->session->userdata('uid')){
				$data['user'] = $this->db->where(['id'=>$this->session->userdata('uid')])->get('tblusers')->row();
			}

		}else{
			if(!$this->session->userdata('uid')){
				$cart = base_url()."signin";
				echo "<script>
				alert('Please Login To Proceed with the cart');
				window.location.href='".$cart."';
				</script>";
				exit;
			}
			$data['user'] = $this->db->where(['id'=>$this->session->userdata('uid')])->get('tblusers')->row();
			$data['products'] =  $this->session->userdata('uid') ?  $this->Cart_Model->my_cart($this->session->userdata('uid')) :  ($this->session->userdata('cart') ? $this->session->userdata('cart') : []);
		}
		if($this->session->userdata('uid')){
			$data['wishlist'] = $this->Wishlist_Model->user_wishlist_products($this->session->userdata('uid'));
		}
		$this->load->view('frontend/checkout',$data);

	}
	public function checkout_submit()
	{
		$uid = $this->session->userdata('uid');
		if(isset($_POST['form1'])) {
				$valid = 1;
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				if($this->form_validation->run() == FALSE) {
					$valid = 0;
					$error .= validation_errors();
				}else{
					if($valid == 1){
								$items= [];
								$order_total = 0;
								foreach ($_POST['kinguinId'] as $key => $value) {
									$order_total+=$_POST['price'][$key]*$_POST['qty'][$key];
									$items[] = ["product_id" => $value,"price" => $_POST['price'][$key],"title" => $_POST['name'][$key],"image" =>  $_POST['image'][$key],"qty" => $_POST['qty'][$key],"subtotal" => $_POST['price'][$key]*$_POST['qty'][$key]];
								}
								$form_data = [
									'first_name' => $_POST['first_name'],
									'last_name' => $_POST['last_name'],
									'country' => $_POST['country'],
									'address' => $_POST['address'],
									'city' => $_POST['city'],
									'email' => $_POST['email'],
									'mobile' => $_POST['mobile'],
									'user_id' => $uid,
									'note' => $_POST['note'],
									'order_total' => $order_total,
									'created_at' => date( 'Y-m-d H:i:s')
								];
								$id = $this->Model_welcome->checkout($form_data);
								$this->session->set_userdata('order_id',$id);

								$items = array_map(function($arr) use ($id){
										return $arr + ['order_id' => $id];
								}, $items);
								$this->db->insert_batch('order_items', $items);

								$returnURL = base_url().'welcome/success';
								$cancelURL = base_url().'welcome/cancel';
								$userID = $this->session->userdata('uid');
								$logo = base_url().'assets/img/logo.png';
								$this->paypal_lib->add_field('return', $returnURL);
								$this->paypal_lib->add_field('cancel_return', $cancelURL);

							foreach ($_POST['kinguinId'] as $k2 => $v) {
								$this->paypal_lib->add_field('item_name_'.($k2+1),$_POST['name'][$k2]);
								$this->paypal_lib->add_field('item_number_'.($k2+1),$v);
								$this->paypal_lib->add_field('amount_'.($k2+1),$_POST['price'][$k2]);
								$this->paypal_lib->add_field('quantity_'.($k2+1), $_POST['qty'][$k2]);
							}
							$this->paypal_lib->add_field('custom', $userID);
							$this->paypal_lib->image($logo);
							$this->paypal_lib->paypal_auto_form();

						}
				}
		}

	}

	function CreateOrderInKin($order_id)
	{
		// $order_id = 1;
		$items =  $this->db->where(['order_id'=>$order_id])->get('order_items')->result();
		$products['products'] = [];
		foreach ($items as $key => $item) {
			$products['products'][] = [
				"kinguinId" =>(int)$item->product_id,
				"qty" => (int)$item->qty,
				"name" => $item->title,
				"price" => (float)$item->price,
			];
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://gateway.kinguin.net/esa/api/v1/order');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($products));

		$headers = array();
		$headers[] = 'X-Api-Key: d9430deb28efea8df425f446a59aeb86';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    // echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$result = json_decode($result);

		echo "<pre>";
		print_r($result);
		echo "</pre>";

		exit;
	}
	function success(){
			$paypalInfo = $this->input->get();
			$order_id = $this->session->userdata('order_id');
			$this->CreateOrderInKin($order_id);
			$data['PayerID'] = $paypalInfo['PayerID'];
			$data['order'] = $this->db->where(['id'=>$order_id])->get('order_items')->row();
			$data['order']['items']  = $this->db->where(['order_id'=>$order_id])->get('order_items')->result();
			$this->load->view('paypal/success', $data);
	}
	function cancel(){
		$this->load->view('paypal/cancel');
	}



	public function notfind()
	{
		$this->load->view('frontend/404');
	}


	public function login()
	{
		$this->load->view('frontend/login');
	}


   public function product_single($id)
	{

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://gateway.kinguin.net/esa/api/v1/products/'.$id);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			$headers = array();
			$headers[] = 'X-Api-Key: d9430deb28efea8df425f446a59aeb86';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);
			$data['product'] = json_decode($result);
			$data['id']=$id;
			if($this->session->userdata('uid')){
				$data['wishlist'] = $this->Wishlist_Model->user_wishlist_products($this->session->userdata('uid'));
			}
			$this->load->view('frontend/product-single',$data);
	}
   public function register()
	{
		$this->load->view('frontend/register');
	}

	public function single_game()
	{
		$this->load->view('frontend/single-game');
	}



	public function all_product()
	{

	}

	public function get_order()
	{

	}

	public function profile()
	{
		// $
		$data['profiledetails'] = (array)$this->db->where(['id'=>$this->session->userdata('uid')])->get('tblusers')->row();
		$this->load->view('frontend/profile',$data);
	}

	public function setcurrency() {
	  $currency = $this->input->post('currency');
	  $this->session->set_userdata('currency_code', strtoupper($currency));
	}




function ipn(){
//paypal return transaction details array
		$paypalInfo    = $this->input->post();
		$data['user_id'] = $paypalInfo['custom'];
		$data['product_id']    = $paypalInfo["item_number"];
		$data['txn_id']    = $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["mc_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['payer_email'] = $paypalInfo["payer_email"];
		$data['payment_status']    = $paypalInfo["payment_status"];
		$paypalURL = $this->paypal_lib->paypal_url;
		$result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		//check whether the payment is verified
		if(preg_match("/VERIFIED/i",$result)){
			$this->product->storeTransaction($data);
		}
}


}
