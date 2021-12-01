<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{

  function  __construct() {
    parent::__construct();
    $this->load->library('paypal_lib');
    $this->load->model('product');
    	$this->load->model('Wishlist_Model');
    $this->load->database();
  }
  function index(){
    $data = array();
    $data['products'] = $this->product->getRows();
    $this->load->view('products/index', $data);
  }
function buyProduct($id){
  //Set variables for paypal form
  $returnURL = base_url().'paypal/success'; //payment success url
  $cancelURL = base_url().'paypal/cancel'; //payment cancel url
  $notifyURL = base_url().'paypal/ipn'; //ipn url
  //get particular product data
  $product = $this->product->getRows($id);
  $userID = 1; //current user id
  $logo = base_url().'Your_logo_url';
  $this->paypal_lib->add_field('return', $returnURL);
  $this->paypal_lib->add_field('cancel_return', $cancelURL);
  $this->paypal_lib->add_field('notify_url', $notifyURL);
  $this->paypal_lib->add_field('item_name', $product['name']);
  $this->paypal_lib->add_field('custom', $userID);
  $this->paypal_lib->add_field('item_number',  $product['id']);
  $this->paypal_lib->add_field('amount',  $product['price']);
  $this->paypal_lib->image($logo);
  $this->paypal_lib->paypal_auto_form();
}
function success(){
    //get the transaction data
    $paypalInfo = $this->input->get();
    $data['item_number'] = $paypalInfo['item_number'];
    $data['txn_id'] = $paypalInfo["tx"];
    $data['payment_amt'] = $paypalInfo["amt"];
    $data['currency_code'] = $paypalInfo["cc"];
    $data['status'] = $paypalInfo["st"];
    //pass the transaction data to view
    $this->load->view('paypal/success', $data);
}
function cancel(){
//if transaction cancelled
  $this->load->view('paypal/cancel');
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
  //insert the transaction data into the database
    $this->product->storeTransaction($data);
  }
}
function AllProductsCount($search = null)
{
  $para = "";
  if($search && !empty($search)){
    $para = "?withText=yes&name=".urlencode($search);
  }
  $url = "https://gateway.kinguin.net/esa/api/v1/products".$para;
  // echo $url;
  // exit;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  $headers = array();
  $headers[] = 'X-Api-Key: d9430deb28efea8df425f446a59aeb86';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    return 0;
  }
  curl_close ($ch);
  // print_r($result);
  // exit;
  return json_decode($result)->item_count;
}

public function allProducts()
{
    // $productCount = 120;
    $productCount = $this->AllProductsCount();
    $limit =100;
    $pages = ceil($productCount/$limit);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $url = 'https://gateway.kinguin.net/esa/api/v1/products?page='.$page.'&limit='.$limit.'&sortBy=name';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
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
    $data['products'] = json_decode($result)->results;
    $data['page'] = $page;
    $data['pages'] = $pages;
    if($this->session->userdata('uid')){
      $data['wishlist'] = $this->Wishlist_Model->user_wishlist_products($this->session->userdata('uid'));
    }
    $this->load->view('frontend/products',$data);
}

public function Search()
{
  $productCount = $this->AllProductsCount(isset($_GET['search']) ? $_GET['search'] : "");
  // print_r($productCount);
  // exit;
  $limit =40;
  $pages = ceil($productCount/$limit);
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $url = 'https://gateway.kinguin.net/esa/api/v1/products?page='.$page.'&limit='.$limit.'&sortBy=name';
  if(isset($_GET['search'])){
    $url = $url."&withText=yes&name=".urlencode($_GET['search']);
  }


  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
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
  $data['products'] = json_decode($result)->results;
  $data['page'] = $page;
  if(isset($_GET['search'])){
    $data['search'] = $_GET['search'];
  }
  $data['pages'] = $pages;
  if($this->session->userdata('uid')){
    $data['wishlist'] = $this->Wishlist_Model->user_wishlist_products($this->session->userdata('uid'));
  }
  // echo "<pre>";
  // print_r($data['products']);
  // echo "</pre>";
  // exit;
  $this->load->view('frontend/products',$data);
}







}
