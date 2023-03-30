<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

  
  public function __construct()
  {
    parent::__construct();     
    $this->is_auth();
  }

  public function is_auth()
  {
    if(empty($this->session->userdata('user'))){     
      redirect(base_url('Authentification'));   
    }
  }

  public function index(){
    $data['title'] = "Admin Home pages ".$this->uri->segment(4);   
    $this->page = 'Home_View';
    $this->data['ID'] = 5;

    // echo "<pre>";
    // print_r($this->user);
    // echo "</pre>";

    $this->render_template($this->page, $data);  
  }

  public function get_args()
    {
        # code...       

        $data['title'] = "Admin Home page ".$this->uri->segment(3);   
        $this->page = 'Home_View';
        $this->render_template($this->page, $data); 
    }
}