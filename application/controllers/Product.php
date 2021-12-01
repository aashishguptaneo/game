<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

function __construct() 
	{
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    }
    
	public function index()
	{
		$this->load->view('frontend/product');
	}
}
