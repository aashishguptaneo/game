<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_welcome extends CI_Model 
{
    
  

    function checkout($data) {
        $this->db->insert('orders',$data);
        return $this->db->insert_id();
    }

    

}