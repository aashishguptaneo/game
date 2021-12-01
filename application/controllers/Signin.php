<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller{
  function __construct()
  	{
      parent::__construct();
  	    $this->load->helper('url');
  	    $this->load->database();
  	    $this->load->model('Cart_Model');
  }

public function index(){
  //Validation for login form
  $this->form_validation->set_rules('emailid','Email id','required|valid_email');
  $this->form_validation->set_rules('password','Password','required');
    if($this->form_validation->run()){
      $email=$this->input->post('emailid');
      $password=$this->input->post('password');
      $this->load->model('Signin_Model');
      $validate=$this->Signin_Model->index($email,$password);
      if($validate){
        $this->session->set_userdata('uid',$validate->id);
        $this->session->set_userdata('fname',$validate->FirstName);
        $this->session->set_userdata('profile_pic',$validate->profile_pic);
        $this->session->set_userdata('user',$validate);
        if($this->session->userdata('cart')){
          $cart = $this->session->userdata('cart');
          foreach ($cart as $key => $item) {
            $post = $item;
            $post['created_at'] = date( 'Y-m-d H:i:s');
            $post['user_id'] = $this->session->userdata('uid');
            $isAdded = $this->Cart_Model->is_added($post);
        		if($isAdded){
        			$this->db->where('id',$isAdded->qty)->update('cart',["qty" => $post['qty']+$isAdded->qty]);
        		}else{
        			$post['qty'] = $post['qty'];
        			$this->Cart_Model->add_to_cart($post);
        		}
    			}
          $this->session->unset_userdata('cart');
        }
        redirect('welcome');
      } else {
        $this->session->set_flashdata('error','Invalid login details.Please try again.');
        redirect('signin');
      }
    } else{
      $this->load->view('frontend/signin');
    }
  }

}
