<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller{
function __construct() 
	{
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
	
    }
    
	public function index()
	{
		$this->load->view('frontend/profile');
	}}
	
	 function editOld($userId = NULL)
    {
            if($userId == null)
            {
                redirect('pages/settings');
            }

            $data['userInfo'] = $this->settings_model->getUserInfo($userId);

            $data['title'] = 'Settings';

            $this->load->view('templates/header');
            $this->load->view('pages/settings', $data);
            $this->load->view('templates/footer');

    }

    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
            $this->load->library('form_validation');

            $userId = $this->session->userdata('user_id');

            $this->form_validation->set_rules('fname','First Name','trim|required|max_length[128]|xss_clean');
		    $this->form_validation->set_rules('lname','Last Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
   

            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = $this->input->post('fname');
                $username = $this->input->post('lname');
                $email = $this->input->post('email');
               

                $userInfo = array();

                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'username'=>$username, 'name'=>$name,
                                    'mobile'=>$mobile, 'bio'=>$bio, 'birthday'=>$birthday, 'gender'=>$gender, 'updatedBy'=>$userId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'username'=>$username, 'name'=>$name,
                                    'mobile'=>$mobile, 'bio'=>$bio, 'birthday'=>$birthday, 'gender'=>$gender, 'updatedBy'=>$userId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }

                $result = $this->settings_model->editUser($userInfo, $userId);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Profile updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Profile update failed');
                }

                redirect('pages/settings');
            }

    }