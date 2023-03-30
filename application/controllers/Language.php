<?php


class Language extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
      $targetUrl = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER'] :base_url()."home/Home";   
      $array_session_language = array('site_lang' => $this->uri->segment(3));
      $this->session->set_userdata($array_session_language);
     redirect($targetUrl);
    }
  }

?>
