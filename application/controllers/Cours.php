<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cours extends MY_Controller {


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['title'] = "Cours";
        $this->page = 'Cours';
        $this->render_template($this->page, $data);
    }
}