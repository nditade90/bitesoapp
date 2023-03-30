<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentification extends MY_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
             
    }

    public function index()
    {
        # code...
        if($this->is_user){       
            redirect(base_url()."home/Home");                  
        }else{
            $this->login();
        }
    }

   	public function login(){
        
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_email', 'user_email', 'required|valid_email');
		$this->form_validation->set_rules('user_password', 'user_password', 'required');
        
        //echo password_hash($this->input->post('user_password'),2).'<br>';
		
        if($this->form_validation->run() == FALSE) {
			$data['title'] ="Home page";
			$this->page = 'auth/login/Login_View';

            $this->load->view("auth/login/Login_View", $data);
		} else {

			if($this->auth_library->login($this->input->post('user_email'), $this->input->post('user_password'))){  
                redirect(base_url()."home/Home",'refresh');            
            }else{   
               redirect(base_url('Authentification'),'refresh');         
			}
		}		
   	}

	public function logout(){
		$this->auth_library->logout();
        redirect(base_url('Authentification'),'refresh');         
	}

    public function forgetpassword()
    {
        # code...
    }

}

/* End of file Login.php */


?>