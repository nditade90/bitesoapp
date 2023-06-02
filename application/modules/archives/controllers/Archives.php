<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Archives extends Admin_Controller{

	public function __construct(){
        parent::__construct();
        $this->data['page_title'] = 'Les archives';
        $this->data['js'] = base_url()."assets/js/pages/Archives.js";
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

        $this->load->library( 'pagination' );
        $config[ 'base_url' ]      = base_url( 'archives/Archives/index/'.$table );
        $config[ 'per_page' ]      = 10;
        $config[ 'num_links' ]     = 2;
        $config[ 'total_rows' ] = $this->db->where(['table_name'=>$table, 'statut !='=>1])->get('user_audit_trails')->num_rows();
        $this->pagination->initialize( $config );
        $this->data[ 'listing' ] = true;
        $this->data[ 'datas' ]   = $this->db->where(['table_name'=>$table, 'statut !='=>1])->order_by( 'id', 'ASC' )->get( 'user_audit_trails',$this->uri->segment( 5 ), $config[ 'per_page' ] )->result();
       
        $names = explode("_",$table);

        $this->data[ 'title' ] = 'Les archives : '.$titles[$table] ;
        $this->data['table'] = $table;
        $this->render_template('index', $this->data);
	}

    
}
        