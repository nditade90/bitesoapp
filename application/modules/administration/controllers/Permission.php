<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends Admin_Controller {

  
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

    /*if (!$this->backend_auth_library->permission('Permission/index')) {
      redirect(base_url()."home/Home");   
    }*/
  }

  public function index()
  {
    $sql = "SELECT * FROM admin_permissions";

    $permissions = $this->My_model->get_query($sql);

    foreach ($permissions as $permission) {
    $date = new DateTime($permission->per_datecreated);
    $state = $this->My_model->dropdown_etat($permission->per_active);
    $state_oppose = ($permission->per_active == 1)? $this->My_model->dropdown_etat(2):$this->My_model->dropdown_etat(1);
    $id_oppose = ($permission->per_active == 1)? 2:1;
    $etat = ($permission->per_active == 1)?'<span class="mode mode_on">'.$state.'</span>':'<span class="mode mode_off">'.$state.'</span>';
    
    $sub_array = [];
    
    $sub_array[] = $permission->per_id;
    $sub_array[] = $permission->per_code;
    $sub_array[] = $permission->per_descr;
    $sub_array[] = $etat;
    $sub_array[] = $date->format('d/m/Y');

    //if ($this->backend_auth_library->permission('Permission/nouveau')) {
    $sub_array[] = '
        <span class="actionCust"><a href="'.base_url('administration/Permission/nouveau/'.$permission->per_id).'"><i class="fa fa-pencil"></i></a></span>
        <span data-toggle="modal" data-target="#myModal'.$permission->per_id.'" title="" class="actionCust"><a href="#"><i class="fa fa-trash"></i></a></span>
        
        <div class="modal fade" id="myModal'.$permission->per_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  d-flex justify-content-center">
                        <h5 class="modal-title text-center text-white">Supprimer un role</h5>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="input-group">
                                        Voullez-vous supprimer cette permission : <b>'.$permission->per_descr.'</b>?.
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="'.base_url('administration/Permission/supprimer/'.$permission->per_id.'/'.$id_oppose).'" type="button" class="btn main_bt">'.$state_oppose.'</a>
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
        $this->table->set_heading('#', 'CODE', 'DESCRIPTION','ETAT','ENREGISTRE','OPTION');
        
        //Data
        $data['title'] = "Permissions";
        
        $this->page = 'permission/Permission_Liste_View';
        $this->render_template($this->page, $data);    
    }

    public function nouveau(){
        $per_id = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('per_id');
        if($per_id > 0){
            $permission = $this->My_model->get_one('admin_permissions',['per_id'=>$per_id]);
        }else{
            $permission = $this->My_model->empty_one('admin_permissions');
        }
        
        if($per_id > 0){
            $this->form_validation->set_rules('per_code', 'Code', 'required|is_unique[admin_permissions.per_code]');
        }else{
            $this->form_validation->set_rules('per_code', 'Code', 'required');
        }
        $this->form_validation->set_rules('per_descr', 'Description', 'required');
        $this->form_validation->set_rules('per_active', 'Active', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = $per_id > 0?"Mis a jour de la permission ".$permission->per_code:"Nouvelle permission";
            $data['permission'] = $permission;
            $this->page = 'permission/Permission_New_View';
            $this->render_template($this->page, $data);   
        }else{
            $this->db->set('per_code', $this->input->post('per_code'));
            $this->db->set('per_descr', $this->input->post('per_descr'));      
            $this->db->set('per_active', $this->input->post('per_active'));      

            if($per_id > 0){
                $this->db->where('per_id',$per_id); 
                $this->db->update('admin_permissions');
            }else{
                $this->db->set('per_datecreated',date('Y-m-d H:i:i'));
                $per_id = $this->db->insert('admin_permissions');
            }

            redirect(base_url('administration/Permission/index'));
            
        }
         
    }

    public function supprimer(){
     $per_active = $this->uri->segment(5);
     $per_id = $this->uri->segment(4);
     $permission = $this->My_model->getOne('permissions',['per_id'=>$per_id]);

     if(!empty($permission)){
        $this->db->set('per_active',$per_active);
        $this->db->where('per_id',$per_id);
        $this->db->update('permissions');
     }

     redirect(base_url('administration/Permission/index'));     
    }


}