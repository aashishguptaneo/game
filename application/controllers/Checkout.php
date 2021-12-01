<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

function __construct()
	{
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
	}

	public function index()
	{
			if($this->session->userdata('uid')){
				$this->load->view('frontend/checkout');
				exit;
			}else{
				echo "I am Not Logged In";
				exit;
				// echo "<script type='javascript/text'>";
				// echo "alert('Please Login Before To proceed the checkout');"
				// echo "window.location.href = '" . base_url() . "cart';"
				// echo "</script>";
			}
	}
}
