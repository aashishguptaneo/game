<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

function __construct()
{
    parent::__construct();
	    $this->load->helper('url');
	    $this->load->database();
	    $this->load->model('Cart_Model');
}

function CheckIfItemAvailable($pid)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://gateway.kinguin.net/esa/api/v1/products/'.$pid);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$headers = array();
	$headers[] = 'X-Api-Key: d9430deb28efea8df425f446a59aeb86';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close ($ch);
 return json_decode($result);

}

function RemoveUnavilable($id)
{
	$cart = $this->session->userdata('cart');
	if($this->session->userdata('uid')){
		$this->db->where(['id'=>$id])->delete('cart');
	}else{
		unset($cart[$id]);
		$this->session->set_userdata('cart',$cart);
	}
}
public function NewCart()
{
	$data = [];
	if($this->session->userdata('uid')){
		$data['cart'] = $this->Cart_Model->my_cart($this->session->userdata('uid'));
		$data['cart_type'] = 'db';
	}else{
		if($this->session->userdata('cart')){
		$data['cart'] = $this->session->userdata('cart');
		$data['cart_type'] = 'session';
		}
	}
	return $data;
}
public function index()
{
		$data = [];
		if($this->session->userdata('uid')){
			$data['cart'] = $this->Cart_Model->my_cart($this->session->userdata('uid'));
			$data['cart_type'] = 'db';
		}else{
			if($this->session->userdata('cart')){
				$data['cart'] = $this->session->userdata('cart');
				$data['cart_type'] = 'session';
			}
		}
		if(count($data['cart']) > 0){
			$cart = $data['cart'];
			foreach ($cart as $key => $value) {
				$value = gettype($value) == 'array' ? (object) $value : $value;
				$availbale = $this->CheckIfItemAvailable($value->product_id);
				if(isset($availbale->status) && $availbale->status == 404){
					$this->RemoveUnavilable(isset($value->id) ? $value->id : $key);
				}
			}
		}
		$data = $this->NewCart();
		$this->load->view('frontend/cart',$data);
}

function update_cart()
{
	$cart = $this->session->userdata('cart');
	foreach ($_POST['id'] as $key => $id) {
		if($this->session->userdata('uid')){
			$this->db->where('id',$id)->update('cart',["qty" => $_POST['qty'][$key]]);
		}else{
			$item = $cart[$id];
			$item['qty'] = $_POST['qty'][$key];
			$cart[$id] = $item;
		}
	}
	if(!$this->session->userdata('uid')){
		$this->session->set_userdata('cart',$cart);
	}
	$this->session->set_flashdata('success','Cart Items Updated successfully');
	redirect($_SERVER['HTTP_REFERER']);
}

function clear()
{
	if($this->session->userdata('uid')){
		$this->db->where(['user_id'=>$this->session->userdata('uid')])->delete('cart');
	}else{
		$this->session->unset_userdata('cart');
	}
	$this->session->set_flashdata('success','Cart Items Deleted successfully');
	redirect($_SERVER['HTTP_REFERER']);
}
function remove()
{
	$cart = $this->session->userdata('cart');
	if($this->session->userdata('uid')){
		$this->db->where(['id'=>$_GET['id']])->delete('cart');
	}else{
		unset($cart[$_GET['id']]);
		$this->session->set_userdata('cart',$cart);
	}
	$this->session->set_flashdata('success','Cart Item Removed Successfully');
	redirect($_SERVER['HTTP_REFERER']);
}

function Add()
{
	$post = $_POST;
	$post['created_at'] = date( 'Y-m-d H:i:s');
	if($this->session->userdata('uid')){
		$post['user_id'] = $this->session->userdata('uid');
		$isAdded = $this->Cart_Model->is_added($post);
		if($isAdded){
			$this->db->where('id',$isAdded->qty)->update('cart',["qty" => $post['qty']+$isAdded->qty]);
		}else{
			$post['qty'] = $post['qty'];
			$this->Cart_Model->add_to_cart($post);
		}
	}else{
		$cart = $this->session->userdata('cart');
		if($cart){
			$isInCart = false;
			foreach ($cart as $key => $item) {
				if($item['product_id'] == $post['product_id'] ){
					$item['qty'] = $item['qty']+$post['qty'];
					$cart[$key] =$item;
					$isInCart = true;
				}
			}
			if(!$isInCart){
				array_push($cart, $post);
			}
			$this->session->set_userdata('cart',$cart);
		}else{
			$session = [];
			$session[0] = $post;
			$this->session->set_userdata('cart',$session);
		}
	}
	$return = ["code"=>"200","msg"=>"Item added to your Cart"];
	echo json_encode($return);
	exit;
}


}
