<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


function CheckIfProductLive($pid)
{
  return $pid;
}
function CartTotal()
{
  $ci =& get_instance();
  $cartTotal = 0;
    if($ci->session->userdata('uid')){
      $rowdata=$ci->db->query("SELECT sum(price * qty) as total FROM `cart` WHERE user_id =".$ci->session->userdata('uid'))->row();
      return number_format($rowdata->total, 3);
    }else{
      if($ci->session->userdata('cart')){
        $cart = $ci->session->userdata('cart');
         return array_sum(array_map(function($item) {
          return $item['qty']*$item['price'];
        }, $cart));
      }else{
        return 0;
      }
    }
}

function ImageExists($image)
{
  if (@getimagesize($image)) {
    return $image;
  }else{
    return "https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
  }
}



?>
