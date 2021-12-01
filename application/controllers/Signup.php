<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
		public function index()
		{
		//Form Validation
			$this->form_validation->set_rules('firstname','First Name','required|alpha');
			$this->form_validation->set_rules('lastname','Last Name','required|alpha');
			$this->form_validation->set_rules('emailid','EmailId','required|valid_email|is_unique[tblusers.Email]');
			$this->form_validation->set_rules('password','Password','required|min_length[6]');
			$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
			$this->form_validation->set_message('is_unique', 'This email is already exists.');
			if($this->form_validation->run()){
				$data=[
					'FirstName'=>$this->input->post('firstname'),
					'LastName'=>$this->input->post('lastname'),
					'Email'=>$this->input->post('emailid'),
					'Password'=>$this->input->post('password'),
					'city'=>$this->input->post('city'),
					'country'=>$this->input->post('country'),
					'address'=>$this->input->post('address')
				];
				$this->load->model('Signup_Model');
				$this->Signup_Model->index($data);
			} else {
				$this->load->view('frontend/signup');
			}
		}

}
