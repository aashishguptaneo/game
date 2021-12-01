<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
//Validating login
function __construct(){
		parent::__construct();
		if(!$this->session->userdata('uid'))
		redirect('signin');
}
//For fetching user data
public function index(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Profile_Model');
			$uid = $this->session->userdata('uid');

			$data['profiledetails'] = $this->Profile_Model->getusedetails($uid);
			$this->load->view('frontend/profile',$data);
}

 private function logged_in()
    {
        if(!$this->session->userdata('uid')){
            redirect('signin');
        }
    }


 public function changePassword()
    {
        $this->logged_in();
        $data['title'] = 'Change Password';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() == false) {
            $this->load->view('frontend/profile', $data);
        }else {
						$this->load->model('Profile_Model');
            $id = $this->session->userdata('uid');
            $newpass = $this->input->post('newpass');
            $this->Profile_Model->update_user($id, array('Password' => $newpass));
            redirect('logout');
        }
    }


	 public function password_check($oldpass)
    {
        $id = $this->session->userdata('uid');
				$this->load->model('Profile_Model');
        $user = $this->Profile_Model->get_user($id);
        if($user->Password !== $oldpass) {
        // if($user->Password !== md5()) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }
        return true;
    }



	public function updateprofile(){
			$this->form_validation->set_rules('lname','	First Name','required|alpha');
			$this->form_validation->set_rules('lname','	Last Name','required|alpha');
			if($this->form_validation->run()){
				//Getting Post Values
				$fname= $this->input->post('fname');
				$lname= $this->input->post('lname');
				$email = $this->input->post('email');
				$uid=$this->session->userdata('uid');
				$this->load->model('Profile_Model');

				$data= [
					'FirstName'=>$fname,
					'LastName'=>$lname,
					'Email'=>$email,
					'mobile'=>$this->input->post('mobile'),
					'address'=>$this->input->post('address'),
					'city'=>$this->input->post('city'),
					'country'=>$this->input->post('country')
				];

				if (!empty($_FILES['profile_pic']['name'])) {
					$config['upload_path'] = './assets/img/profile_images';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = 0;
					$new_name = rand()."--".time() . '--' . $_FILES["profile_pic"]['name'];
					$config['file_name'] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('profile_pic') && !empty($_FILES['profile_pic']['name'])) {
						$error = array('error' => $this->upload->display_errors());
						$data['profile_pic'] = $this->input->post('old_pic');
					}else{
						$upload_data = $this->upload->data();
						$data['profile_pic'] = $upload_data['file_name'];
					}
				}else{
					$data['profile_pic'] = $this->input->post('old_pic');
				}
				$this->Profile_Model->update_user($uid, $data);

				$validate=$this->Profile_Model->get_user($uid);
				$this->session->set_userdata('uid',$validate->id);
				$this->session->set_userdata('fname',$validate->FirstName);
				$this->session->set_userdata('profile_pic',$validate->profile_pic);

				$this->session->set_flashdata('success','Profile updated successfull');
				redirect('Profile');
			}else{
				$this->session->set_flashdata('error','Something went wrong. Please try again.');
				redirect('Profile');
			}
	}

}
