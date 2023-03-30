<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of LanguagesLoader
 *
 * @author BlackDev
 */
class LanguagesLoader {
    
    
    
    function initialize() {
	    $this->ci =& get_instance();
	    $this->ci->load->helper('language');

        $siteLang = $this->ci->session->userdata('site_lang');
        if (!empty($siteLang)) {
            $this->ci->lang->load('message',$siteLang);
        } else {
            $this->ci->lang->load('message','fr');
            $this->ci->session->set_userdata(['site_lang'=>'fr']);
       }
	}

    public function post_controller_constructor() {
		 $this->ci =& get_instance();
         
         $this->ci->load->library('Auth_library');

         if(!empty($this->ci->session->userdata('user'))) {
            $this->ci->is_user = TRUE;
            $this->ci->user = $this->ci->auth_library->get();
                        
         }else{
            $this->ci->is_user = FALSE;
            $this->ci->user = new stdClass();         
         }

    }
}
