<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
             
    }

    public function index()
    {
        $data['title'] = "Admin Home page";   
        $this->page = 'Home_View';
        $this->render_template($this->page, $data);  
    }

    
}