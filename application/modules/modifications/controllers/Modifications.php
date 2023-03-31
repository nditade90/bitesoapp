<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Modifications extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Recherche';
		$this->data['js'] = base_url()."assets/js/pages/Modifications.js";
    }

    public function index()
    {

    }
}

/* End of file Search.php and path \application\modules\modifications\controllers\Modifications.php */
