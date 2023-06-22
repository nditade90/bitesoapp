<?php

class Fdnb_library {

    private $ci; //instance de code igniter

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->library('email');
        $this->ci->load->library('Qrcode_lib');        
        $this->ci->load->model('My_model');
        $this->ci->load->helper(array('form', 'url'));         
    }

    function send_mail($emailTo = array(), $subjet = "", $cc_emails = array(), $message = "", $attach = array()) {

    }

    public function generate_string($taille)
    {
      $Caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
       $QuantidadeCaracteres = strlen($Caracteres);
       $QuantidadeCaracteres--;
 
       $Hash=NULL;
         for($x=1;$x<=$taille;$x++){
             $Posicao = rand(0,$QuantidadeCaracteres);
             $Hash .= substr($Caracteres,$Posicao,1);
         }
         return $Hash;
    }

    public function phone_number_validation($number)
    {
        # code...

    }

    public function generateQrcode($data,$name){
      if(!is_dir('uploads/QRCODE')) //create the folder if it does not already exists
       {
          mkdir('uploads/QRCODE',0777,TRUE);
       }

      $Ciqrcode = new Ciqrcode();
      $params['data'] = $data;
      $params['level'] = 'H';
      $params['size'] = 10;
      $params['overwrite'] = TRUE;
      $params['savename'] = FCPATH . 'uploads/QRCODE/' . $name . '.png';
      $Ciqrcode->generate($params);
   }

   public function pagination_style()
   {
       # code...
    // $config['use_page_numbers'] = TRUE;

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['first_tag_open'] = '<li class="page-item">';
    $config['last_tag_open'] = '<li>';

    $config['next_tag_open'] = '<li class="page-item">';
    $config['prev_tag_open'] = '<li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['first_tag_close'] = '</li>';
    $config['last_tag_close'] = '</li>';

    $config['next_tag_close'] = '</li>';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = "<li class=\"active page-item\" id='btn'><span><b>";
    $config['cur_tag_close'] = "</b></span></li>";

    return $config;
   }
   
   public function table_head(){
        //Init tableau des donnees
        return array(
                'table_open'            => '<table id="dtable" class="table table-hover text-nowrap">',
        
                'thead_open'            => '<thead>',
                'thead_close'           => '</thead>',
                
                'heading_row_start'     => '<tr>',
                'heading_row_end'       => '</tr>',
                'heading_cell_start'    => '<th>',
                'heading_cell_end'      => '</th>',
        
                'tbody_open'            => '<tbody',
                'tbody_close'           => '</tbody>',
        
                'row_start'             => '<tr>',
                'row_end'               => '</tr>',
                'cell_start'            => '<td>',
                'cell_end'              => '</td>',
        
                'row_alt_start'         => '<tr>',
                'row_alt_end'           => '</tr>',
                'cell_alt_start'        => '<td>',
                'cell_alt_end'          => '</td>',
        
                'table_close'           => '</table>'
                );
    }

    public function valide_unique($table, $field, $value)
    {
        # code...
    }
    
    public function upload_file($file, $file_name, $folder="uploads/photo_passport/"){
        // if (!is_dir($folder)) {
        //     mkdir($folder,777,TRUE);
        // }
        
        $config['upload_path']          = FCPATH.$folder;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        $config['overwrite']            = TRUE;
        $config['file_name']            = $file_name;

        $this->ci->load->library('upload', $config);
        
        $return = FALSE;
        if ($this->ci->upload->do_upload($file)){
            //print_r($this->ci->upload->do_upload($file));
             $this->ci->upload->data();
            $return = TRUE;            
        }else{  
            //print_r($this->ci->upload->display_errors());          
            $this->ci->form_validation->set_message($file, $this->ci->upload->display_errors());
        }

       return $return;
    }

}
