<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fiche_identifications extends Admin_Controller{

		public function __construct(){
			parent::__construct();
			$this->data['page_title'] = $this->lang->line('identity_title');
			$this->data['js'] = base_url()."assets/js/pages/Fiche_identification.js";
		}

		public function index(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'carriere/Fiche_identification/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_fiche_identification' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_identification', 'DESC' )->get( 'gr_fiche_identification', $config[ 'per_page' ],$this->uri->segment( 4 ));
			$this->data[ 'title' ] = $this->lang->line('identity_title');
			$this->data[ 'title_top_bar' ] = 'Liste des fiches';
			$this->render_template('fiche_identification/index', $this->data);
		}


    public function add()
    {
        $this->form_validation->set_rules('matricule', 'Matricule', 'required');
			$this->form_validation->set_rules('nouveau_matricule', 'Nouveau_matricule', 'required');
			$this->form_validation->set_rules('ancien_matricule', 'Ancien_matricule', 'required');
			$this->form_validation->set_rules('id_categorie', 'Id_categorie', 'required|numeric');
			$this->form_validation->set_rules('nom', 'Nom', 'required');
			$this->form_validation->set_rules('prenom', 'Prenom', 'required');
			//$this->form_validation->set_rules('photo_psp', 'Photo_psp', 'required');
			$this->form_validation->set_rules('id_sexe', 'Id_sexe', 'required|numeric');
			$this->form_validation->set_rules('id_ethnie', 'Id_ethnie', 'required|numeric');
			$this->form_validation->set_rules('id_corps_origine', 'Id_corps_origine', 'required|numeric');
			$this->form_validation->set_rules('id_etat_civil', 'Id_etat_civil', 'required|numeric');
			$this->form_validation->set_rules('nombre_enfant', 'Nombre_enfant', 'required|numeric');

			if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('id_etat_civil') == 1){
				$this->form_validation->set_rules('conjoin_salarie', 'Conjoin_salarie', 'required');				
			}
			
			$this->form_validation->set_rules('date_naissance', 'Date_naissance', 'required');
			$this->form_validation->set_rules('annee_naissance', 'Annee_naissance', 'required|numeric');
			$this->form_validation->set_rules('anne_pension_min', 'Anne_pension_min', 'required|numeric');
			$this->form_validation->set_rules('annee_pension_max', 'Annee_pension_max', 'required|numeric');
			$this->form_validation->set_rules('id_pays_naissance', 'Id_pays_naissance', 'required|numeric');
			$this->form_validation->set_rules('ville_naissance', 'Ville_naissance', 'required');
			$this->form_validation->set_rules('id_province', 'id_province', 'required|numeric');
			$this->form_validation->set_rules('id_commune', 'id_commune', 'required|numeric');
			$this->form_validation->set_rules('id_colline', 'Id_colline', 'required|numeric');
			$this->form_validation->set_rules('id_promotion', 'Id_promotion', 'required|numeric');
			$this->form_validation->set_rules('noms_pere', 'Noms_pere', 'required');
			$this->form_validation->set_rules('noms_mere', 'Noms_mere', 'required');
			$this->form_validation->set_rules('numero_inss', 'Numero_inss', 'required');
			$this->form_validation->set_rules('numero_mfp', 'Numero_mfp', 'required');
			$this->form_validation->set_rules('numero_psp', 'Numero_psp', 'required');
			$this->form_validation->set_rules('id_religion', 'Id_religion', 'required|numeric');
			$this->form_validation->set_rules('id_groupe_sanguin', 'Id_groupe_sanguin', 'required|numeric');

			$file_name = "";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){	
				$file_name = date('YmdHis').'_'.$_FILES['photo_psp']['name'];	
				$this->form_validation->set_rules('photo_psp', 'Photo passeport', $this->fdnb_library->upload_file('photo_psp', $file_name));
			}

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_fiche_identification',$_POST);

				if(!empty($insert)){
					$this->session->set_flashdata('msg','Entry added succesfuly');
				}else{
					$this->session->set_flashdata('msg','Error while inserting data');
				}
			redirect(base_url('gr/Fiche_identifications/index'));
			}
			$this->data[ 'title' ] = 'Fiche Identification';
			$this->render_template('fiche_identification/add', $this->data);
    }
}