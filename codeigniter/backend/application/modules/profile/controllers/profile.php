<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends MX_Controller{
    public function __Construct()
    {
    	parent::__Construct();
    	is_already_logged_in();
    	
		$this->load->model('crud_model','crud');
		$this->load->model('change_model','change');
		                                                     
  		$this->load->library('form_validation');
  		// $this->form_validation->CI =& $this;                            
	}

	public $redirect = 'profile';


    
    public function index() {

		//$this->load->helper('form_helper');
		$this->load->helper('security');
		$this->load->library('form_validation');
		

			$table =  'igc_users';
			$field_name =  'user_id';
		           

    	if($this->input->post()) {



    		
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]|callback_password_check');
			$this->form_validation->set_rules('passconf', 'Re Type Password', 'required');

			if ($this->form_validation->run()) {


				$password = md5($this->input->post('old_password'));
			    $user_id =  $this->session->userdata('admin_id');

				$result = $this->crud->check_multiple_condition($password, 'password', $user_id,$field_name, $table);
				if (empty($result)) 
				{

					$data['error'] = "Old Password Cannot Match";

				} 
				else 
				{

					$update['password'] = md5($this->input->post('password'));

					$result = $this->crud->update($user_id,$field_name, $update, $table);

					if ($result) 
					{
						$this->session->set_flashdata('success', "Password has been changed.");
						redirect($this->redirect);

					} 
					else 
					{

						$data['error'] = "Password can't changed.";

					}

				}
			}


		}

		//$data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Change Password";
        $this->load->view('header', $data);
        $this->load->view('profile_form');
        $this->load->view('footer');

	}

	public function password_check($str)
	{
		//echo $str;
		//exit();
		if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
			return TRUE;
		}
		return FALSE;
	}







}
