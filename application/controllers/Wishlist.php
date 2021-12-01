<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

function __construct()
	{
    	parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Wishlist_Model');
    }

	public function index()
	{
		$wishlist = $this->Wishlist_Model->my_wishlist($this->session->userdata('uid'));
		$data['wishlist'] = $wishlist;
		$this->load->view('frontend/wishlist',$data);
	}

	public function Add()
	{
		$post = $_POST;
		$post['created_at'] = date( 'Y-m-d H:i:s');
		$post['user_id'] = $this->session->userdata('uid');
		$isAdded = $this->Wishlist_Model->is_added($post);
		$return = ["code"=>"200","msg"=>"Item Removed From Wishlist"];
		if($isAdded){
			$this->Wishlist_Model->remove_from_wishlist($post);
		}else{
			$post['qty'] = $post['qty'];
			$this->Wishlist_Model->add_to_wishlist($post);
			$return = ["code"=>"200","msg"=>"Item added to your Wishlist"];
		}
		echo json_encode($return);
		exit;
	}

	public function ATC()
	{
		$row = $this->db->where(['id'=>$_POST['id']])->get('wishlist')->result_array();
		$post = $row[0];
		$post['created_at'] = date( 'Y-m-d H:i:s');
		$this->db->insert('cart',$post);
		$this->delete_from_wishlist($_POST['id']);
		echo json_encode(["code"=>"200","msg"=>"Item Added To Wishlist"]);
	}

	function delete_from_wishlist($id)
	{
		$this->db->where(['id'=>$id])->delete('wishlist');
	}

	public function Remove()
	{
		$this->delete_from_wishlist($_POST['id']);
		echo json_encode(["code"=>"200","msg"=>"Item Removed Wishlist"]);
	}


}
