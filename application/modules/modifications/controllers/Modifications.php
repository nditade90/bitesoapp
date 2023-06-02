<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Modifications extends Admin_Controller{

	public function __construct(){
        parent::__construct();
        $this->data['page_title'] = 'Modifications';
        $this->data['js'] = base_url()."assets/js/pages/Modifications.js";
        $this->data['url_list'] = "";
	}

	public function index(){

        $table = $this->uri->segment(4);

        $titles = [];
        $titles['gr_fiche_identification'] = "Indentification";
        $titles['gr_fiche_carriere'] = "carriere";
        $titles['gr_ayants_droit'] = "Ayants droits";
        $titles['gr_historique_situations'] = "Historique de situations";
        $titles['mv_cotations'] = "Cotations";
        $titles['mv_etudes_faites'] = "Etudes faites";
        $titles['mv_formations_stages'] = "Formations & stages";
        $titles['mv_avancement_grades'] = "Avancement de grades";
        $titles['mv_fiche_mutations'] = "Mutations";
        $titles['mv_actions_disciplinaires'] = "Actions disciplinaires";
        $titles['mv_dossiers_penals'] = "Dossiers penals";
        $titles['mv_absences'] = "Absences";
        $titles['mv_renforcements'] = "Renforcements";
        $titles['mv_dictinctions_honorifiques'] = "Distinctions honorifiques";
        $titles['mv_accidents_roulage'] = "Accidents de roulage";
        $titles['mv_accidents_travail'] = "Accidents de travail";
        $titles['mv_exemptions_service'] = "Exemption de service";

        
        $this->data[ 'title' ] = 'Les modifications: '.$titles[$table];
        $this->data['table'] = $table;
        $this->data['url_list'] = "modifications/Modifications/fetch_data/".$table;
        $this->render_template('modifications/index', $this->data);
	}

    public function fetch_data(){
        $table= 'user_audit_trails';
        $primary = 'id';
        $select_column = array('id', 'user_id', 'event', 'table_name', 'old_values', 'new_values', 'url', 'ip_address', 'user_agent', 'statut', 'created_at');
        $order_column = array('id', 'url', 'ip_address', 'user_agent', 'statut', 'created_at');
        $search_column = array('id', 'statut', 'created_at');

        $criteres = array(
            'table_name'=>$this->uri->segment(4),
            'event'=>'update',
            'statut !='=>1
        );

        $fetch_data = $this->My_model->make_datatables($table, $primary, $order_column, $search_column, $select_column, $criteres);
        $status =  array('0'=>'-','1'=>'Valider','2'=>'Refuser');

        $array_data = array();
        foreach ($fetch_data as $data) {				
                
                $sub_array = array();
                $user = $this->db->where(['usr_id'=>$data->user_id])->get('admin_collaborateurs')->row();
            
                $sub_array[] =$data->id;
                $sub_array[] = $user->usr_fname." ".$user->usr_lname;
                $sub_array[] =$data->old_values;
                $sub_array[] =$data->new_values;
                $sub_array[] =$data->ip_address;
                $sub_array[] =$status[$data->statut];
                $sub_array[] ="<a href='".base_url('modifications/Modifications/traite/'.$data->id)."'><span class='fa fa-edit'></span></a>";
                
                $array_data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" =>$this->My_model->get_all_data($table),
            "recordsFiltered" => $this->My_model->get_filtered_data($table, $primary, $order_column, $search_column, $select_column, $criteres),
            "data" =>$array_data,
            "table"=>$this->uri->segment(4)
        );

        echo json_encode($output);

    }

    public function traite()
    {
        $id = $this->uri->segment(4);
        $data = $this->db->where(['id'=>$id])->get('user_audit_trails')->row();
        $table = $data->table_name;

        $this->form_validation->set_rules('statut', 'Statut', 'required');

            if($this->form_validation->run()){
                $this->db->set('statut', $this->input->post('statut'))->where(['id'=>$this->input->post('id_trial')])->update('user_audit_trails');
                
                $insert = $this->db->insert('user_audit_trails_validate',$this->input->post());
                
                if(!empty($insert)){
                    $this->session->set_flashdata('msg','<div class="alert alert-success">Cette modification a été sauvegardé avec succès.</div>');
                }else{
                    $this->session->set_flashdata('msg','<div class="alert alert-danger">Cette modification a échoué </div');
                }
                
               redirect(base_url('modifications/Modifications/index/'.$table));
            }

        $this->data[ 'title' ] = "Validation d'une modification";
        $this->data['table'] = $table;
        $this->data['data'] = $data;
        $this->render_template('modifications/traite', $this->data);
    }
}
        