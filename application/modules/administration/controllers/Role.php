<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends Admin_Controller {

  
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

    /*if (!$this->backend_auth_library->permission('Role/index')) {
      redirect(base_url()."home/Home");   
    }*/
  }

  public function index()
  {
    $sql = "SELECT * FROM admin_roles";

    $roles = $this->My_model->get_query($sql);

    foreach ($roles as $role) {
    $date = new DateTime($role->rol_datecreated);
    $state = $this->My_model->dropdown_etat($role->rol_active);
    $state_oppose = ($role->rol_active == 1)? $this->My_model->dropdown_etat(2):$this->My_model->dropdown_etat(1);
    $id_oppose = ($role->rol_active == 1)? 2:1;
    $etat = ($role->rol_active == 1)?'<span class="mode mode_on">'.$state.'</span>':'<span class="mode mode_off">'.$state.'</span>';
    
    //gestion des permissions 
        $all_permissions = $this->db->query('SELECT per.*, count(rol_per.rol_per_id) as total_saved FROM '.$this->db->dbprefix('admin_permissions').' AS per LEFT JOIN '.$this->db->dbprefix('admin_roles_permissions').' AS rol_per ON rol_per.per_id = per.per_id AND rol_per.rol_id = ? GROUP BY per.per_id', array($role->rol_id));
        $mes_permissions = "";
        foreach ($all_permissions->result() as $perm) {
            # code...
            $checked = $perm->total_saved > 0?'checked':''; 
            $mes_permissions .= '
                                <div class="col-md-3 mb-5">
                                    <label style="font-weight: 900; color:#454545">'.$perm->per_code.'</label>
                                    <p> <label class="switch">
                                        <input type="checkbox" value="'. $perm->per_id.'" name="perm_id['.$perm->per_id.']" '.$checked.'>
                                        <span class="slider round"></span>
                                    </label> </p>
                                </div>
                                
                                ';
        }
        $permission = '
        <span data-toggle="modal" data-target="#add_permission'.$role->rol_id.'" title="permissions" class="actionCust"><a href="#"><i class="fa fa-cog"></i></a></span>

        <div class="modal fade" id="add_permission'.$role->rol_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  d-flex justify-content-center">
                        <h5 class="modal-title text-center text-white">Gestion des permissions</h5>
                    </div>
                    <div class="modal-body">
                        '.form_open('administration/Role/add_permissions',null,['rol_id'=>$role->rol_id]).'
                            <div class="row">
                                <legend>Les permissions</legend>                                 
                                '.$mes_permissions.'
                            </div>
                       
                    </div>
                    <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    '.form_button(array('type' =>'submit','class' => 'main_bt btn-sm','value'=> 'true','content'=> 'Enregister')).'    
                    </div>
                    '.form_close().'
                </div>
            </div>
        </div>
        ';
    //End Gestion des permissions 
    $sub_array = [];
    
    $sub_array[] = $role->rol_id;
    $sub_array[] = $role->rol_code;
    $sub_array[] = $role->rol_description; 
    $sub_array[] = $permission;
    $sub_array[] = $etat;
    $sub_array[] = $date->format('d/m/Y');

    //if ($this->backend_auth_library->permission('Role/nouveau')) {
    $sub_array[] = '
        <span class="actionCust"><a href="'.base_url('administration/Role/nouveau/'.$role->rol_id).'"><i class="fa fa-pencil"></i></a></span>
        <span data-toggle="modal" data-target="#myModal'.$role->rol_id.'" title="" class="actionCust"><a href="#"><i class="fa fa-trash"></i></a></span>
        
        <div class="modal fade" id="myModal'.$role->rol_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  d-flex justify-content-center">
                        <h5 class="modal-title text-center text-white">Supprimer un role</h5>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="input-group">
                                        Voullez-vous supprimer ce role : <b>'.$role->rol_code.'</b>?.
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="'.base_url('administration/Role/supprimer/'.$role->rol_id.'/'.$id_oppose).'" type="button" class="btn main_bt">'.$state_oppose.'</a>
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
    $this->table->set_heading('#', 'CODE', 'DESCRIPTION', 'PERMISSION','ETAT','ENREGISTRE','OPTION');
        
        //Data
        $data['title'] = "Roles";
        
        $this->page = 'roles/Roles_Liste_View';
        $this->render_template($this->page, $data);     
    }

    public function nouveau(){
        $rol_id = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('rol_id');
        if($rol_id > 0){
            $role = $this->My_model->get_one('admin_roles',['rol_id'=>$rol_id]);
        }else{
            $role = $this->My_model->empty_one('admin_roles');
        }
        
        $this->form_validation->set_rules('rol_code', 'Role', 'required|is_unique[admin_roles.rol_code]');
        $this->form_validation->set_rules('rol_description', 'Description', 'required');
        $this->form_validation->set_rules('rol_active', 'Etat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = $rol_id > 0?"Mis a jour du role ".$role->rol_code:"Nouveau role";
            $data['role'] = $role;
            $this->page = 'roles/Roles_New_View';
            $this->render_template($this->page, $data);   
        }else{
            $this->db->set('rol_code', $this->input->post('rol_code'));
            $this->db->set('rol_description', $this->input->post('rol_description'));      
            $this->db->set('rol_active', $this->input->post('rol_active'));      

            if($rol_id > 0){
                $this->db->where('rol_id',$rol_id); 
                $this->db->update('admin_roles');
            }else{
                $this->db->set('rol_datecreated',date('Y-m-d H:i:i'));
                $rol_id = $this->db->insert('admin_roles');
            }

            redirect(base_url('administration/Role/index'));
            
        }
         
    }

    public function supprimer(){
     $rol_active = $this->uri->segment(5);
     $rol_id = $this->uri->segment(4);
     $user = $this->My_model->getOne('admin_roles',['rol_id'=>$rol_id]);

     if(!empty($user)){
        $this->db->set('rol_active',$rol_active);
        $this->db->where('rol_id',$rol_id);
        $this->db->update('admin_roles');
     }

     redirect(base_url('administration/Role/index'));     
    }

    public function add_permissions()
    {
        $this->db->where('rol_id',$this->input->post('rol_id'))->delete('admin_roles_permissions');
     
        if(!empty($this->input->post())){
            foreach ($this->input->post('perm_id') as $key => $value) {
                # code...
                $this->db->set('rol_per_datecreated',date('Y-m-d H:i:s'));
                $this->db->set('per_id',$key);
                $this->db->set('rol_id',$this->input->post('rol_id'));
                $return = $this->db->insert('admin_roles_permissions');
                
               // echo $return.",";
            }
        
           redirect(base_url('administration/Role/index'));    

        }
    }


}