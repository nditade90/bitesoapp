<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

  
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

    /*if (!$this->auth_library->permission('Users/index')) {
      redirect(base_url()."home/Home");   
    }*/
  }

  public function index()
  {
    $sql = "SELECT usr.*, rl.rol_description FROM admin_users as usr 
    LEFT JOIN admin_roles AS rl ON rl.rol_id = usr.rol_id
    ";

    $users = $this->My_model->get_query($sql);

    foreach ($users as $user) {
    $date = new DateTime($user->usr_datecreated);
    $state = $this->My_model->dropdown_etat($user->usr_authorized);
    $state_oppose = ($user->usr_authorized == 1)? $this->My_model->dropdown_etat(2):$this->My_model->dropdown_etat(1);
    $id_oppose = ($user->usr_authorized == 1)? 2:1;
    
    $etat = ($user->usr_authorized == 1)?'<span class="mode mode_on">'.$state.'</span>':'<span class="mode mode_off">'.$state.'</span>';
    $sub_array = [];
    
    $sub_array[] = $user->usr_id;
    $sub_array[] = $user->usr_fname." ".$user->usr_lname;
    $sub_array[] = $user->usr_description;
    $sub_array[] = $user->usr_email;
    $sub_array[] = $user->usr_telephone;
    $sub_array[] = $user->rol_description;
    $sub_array[] = $etat;
    $sub_array[] = $date->format('d/m/Y');

    //if ($this->backend_auth_library->permission('Users/detail')) {
    $sub_array[] = '
        <span class="actionCust"><a href="'.base_url('administration/Users/nouveau/'.$user->usr_id).'"><i class="fa fa-pencil"></i></a></span>
        <span data-toggle="modal" data-target="#myModal'.$user->usr_id.'" title="Fichier PDF" class="actionCust"><a href="#"><i class="fa fa-trash"></i></a></span>
        
        <div class="modal fade" id="myModal'.$user->usr_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  d-flex justify-content-center">
                        <h5 class="modal-title text-center text-white">Changement du statut d\'un comptre d\'utilisateur</h5>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="input-group">
                                        Voullez vous le changer le statut de l\'utilisateur <b>'.$user->usr_fname.' '.$user->usr_lname.'</b> vers <b>'.$state_oppose.'</b>?.
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="'.base_url('administration/Users/desactiver/'.$user->usr_id.'/'.$id_oppose).'" type="button" class="btn btn-primary">'.$state_oppose.'</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal End -->

        ';
    //}

    $this->table->add_row($sub_array);
    }

    $template = $this->fdnb_library->table_head();
    $this->table->set_template($template);
        $this->table->set_heading('#', 'UTILISATEUR', 'DESCRIPTION','EMAIL','TELEPHONE','ROLE','STATUT','ENREGISTRE','OPTION');
        
        //Data
        $this->data['title'] = "Utilisateurs";
        
        $this->page = 'users/Users_Liste_View';

        $this->render_template($this->page, $this->data);    
    }

    public function nouveau(){
        $usr_id = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('usr_id');
        if($usr_id > 0){
            $user = $this->My_model->get_one('admin_users',['usr_id'=>$usr_id]);
        }else{
            $user = $this->My_model->empty_one('admin_users');
        }
        
        $this->form_validation->set_rules('usr_fname', 'Prenom', 'required');
        $this->form_validation->set_rules('usr_lname', 'Prenom', 'required');
        $this->form_validation->set_rules('usr_telephone', 'Telephone', 'required|is_unique[admin_users.usr_telephone]');
        $this->form_validation->set_rules('usr_email', 'Email', 'required|is_unique[admin_users.usr_email]');  
        $this->form_validation->set_rules('rol_id', 'Role', 'required');
        $this->form_validation->set_rules('usr_authorized', 'Etat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['title'] = $usr_id > 0?"Mis a jour des information de ".$user->usr_fname." ".$user->usr_lname:"Nouveau utilisateur";
            $this->data['user'] = $user;
            $this->page = 'users/Users_New_View';
            $this->render_template($this->page, $this->data);    
        }else{
            $this->db->set('usr_fname', $this->input->post('usr_fname'));
            $this->db->set('usr_lname', $this->input->post('usr_lname'));
            $this->db->set('usr_telephone', $this->input->post('usr_telephone'));
            $this->db->set('usr_email', $this->input->post('usr_email'));
            $this->db->set('usr_description', $this->input->post('usr_description'));
            $this->db->set('rol_id', $this->input->post('rol_id'));
            $this->db->set('usr_authorized', $this->input->post('usr_authorized'));            

            if($usr_id > 0){
                $this->db->where('usr_id',$usr_id); 
                $this->db->update('admin_users');
            }else{
                $password = $this->fdnb_library->generate_string(8);

                $this->db->set('usr_datecreated',date('Y-m-d H:i:i'));
                $this->db->set('usr_password',md5($password));
                $usr_id = $this->db->insert('admin_users');

                $subject = "FDNB - Vos identifiants.";
                $message = "Bonjour, <br>".$this->input->post('usr_fname')." ".$this->input->post('usr_fname')." Vos identifiants pour se connecter la plateforme CGM <a href='".base_url('Authentification')."'> Application </a>. <br> Nom d'utilisateur : <b>".$this->input->post('usr_email')."</b> <br> Mot de passe <b>".$password."</b> <br>. Pour plus, veuillez contacter votre service informatique.";
                $this->fdnb_library->send_mail($this->input->post('usr_email'), $subject, [], $message, []);

            }

            redirect(base_url('administration/Users/index'));
            
        }
         
    }

    public function desactiver(){
     $usr_authorized = $this->uri->segment(5);
     $usr_id = $this->uri->segment(4);
     $user = $this->My_model->getOne('admin_users',['usr_id'=>$usr_id]);

     if(!empty($user)){
        $this->db->set('usr_authorized',$usr_authorized);
        $this->db->where('usr_id',$usr_id);
        $this->db->update('admin_users');
     }

     redirect(base_url('administration/Users/index'));     
    }


}