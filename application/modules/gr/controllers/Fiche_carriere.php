<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fiche_carriere extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Fiche_carriere';
	$this->data['js'] = base_url()."assets/js/pages/Fiche_carriere.js";
	// $this->load->model('Fiche_carriere_model');
	}


	public function add(){
		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
		
		$carriere = $this->db->where(array('id_identification'=>$id_identification))->order_by('id_fiche_carriere ','DESC')->get('gr_fiche_carriere')->row();	
		if($carriere){
			$this->data['identif'] = $this->db->get_where('gr_fiche_identification',array('id_identification'=>$carriere->id_identification))->row();
			$this->data['data'] = $carriere;
		}else{
			$this->data['identif'] = new stdClass(); 
			$this->data['data'] = new stdClass();
		}		

		// $this->form_validation->set_rules('id_identification', 'Individu', 'required|numeric');
		$this->form_validation->set_rules('id_departement', 'Departement', 'required|numeric');
		// $this->form_validation->set_rules('est_recensee', 'rencense', 'required');
		$this->form_validation->set_rules('id_grade', 'Grade', 'required');
		$this->form_validation->set_rules('grade_obtenu_date', 'Obtenu', 'required');
		$this->form_validation->set_rules('id_service', 'Service', 'required|numeric');
		$this->form_validation->set_rules('id_unite', 'Unite', 'required|numeric');
		$this->form_validation->set_rules('id_categorie', 'Categorie', 'required|numeric');
		$this->form_validation->set_rules('id_sous_categorie', 'Sous_categorie', 'required|numeric');
		$this->form_validation->set_rules('id_statut', 'Statut', 'required|numeric');
		$this->form_validation->set_rules('id_fonction', 'Fonction', 'required|numeric');
		//$this->form_validation->set_rules('est_candidat', 'Est candidat', 'required');
		$this->form_validation->set_rules('code_indemnite_risque', 'Code indemnite de risque', 'required|numeric');
		//$this->form_validation->set_rules('est_handicappe', 'Est handicappe', 'required|numeric');
		//$this->form_validation->set_rules('utilise_mfp', 'Utilise mfp', 'required|numeric');
		$this->form_validation->set_rules('date_embauche', 'Date d\'embauche', 'required');
		$this->form_validation->set_rules('prime_sante', 'Prime de la sante', 'required');
		$this->form_validation->set_rules('salaire_base', 'Salaire de base', 'required');
		$this->form_validation->set_rules('id_specialite', 'Specialite', 'required|numeric');
		$this->form_validation->set_rules('id_niveau_formation', 'Niveau_formation', 'required|numeric');
		if($this->input->post('id_niveau_formation') == 8){
		  $this->form_validation->set_rules('niveau_autre', 'Autre niveau', 'required');
		}
		$this->form_validation->set_rules('ref_avancement_grade', 'Ref. d\'avancement grade', 'required');
		$this->form_validation->set_rules('ref_affectation', 'Ref. d\'affectation', 'required');

		// if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// 	$this->form_validation->set_rules('photo_psp', 'Photo passeport', $this->fdnb_library->upload_file('photo_psp'));
		// }

		if($this->form_validation->run()){

			// echo "<pre>";
			// print_r($this->input->post());
			// echo "</pre>";

			$insert = $this->db->insert('gr_fiche_carriere',$this->input->post());

			if(!empty($insert)){
				$this->session->set_flashdata('msg','<div class="text-success">Une fiche de carriere de '.get_db_value("gr_fiche_identification","nom",array("id_identification",$id_identification)).' a été enregistré avec succès </div>');
			}else{
				$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la fiche de carriere de '.get_db_value("gr_fiche_identification","nom",array("id_identification",$id_identification)).' n\'a pas ete enregistre.</div>');
			}
			redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}

		$this->data[ 'title' ] = 'Gestion de carriere';
		$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
		$this->data['id_identification'] = $id_identification;
		$this->render_template('fiche_carriere/add', $this->data);
	}


	public function edit(){
		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
		$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5):$this->input->post('id_fiche_carriere');
		
		$carriere = $this->db->get_where('gr_fiche_carriere',array('id_fiche_carriere'=>$id))->row();		
		$this->data['identif'] = $this->db->get_where('gr_fiche_identification',array('id_identification'=>$carriere->id_identification))->row();
		
		$this->data['data'] = $carriere;

		$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		// $this->form_validation->set_rules('est_recensee', 'rencense', 'required');
		$this->form_validation->set_rules('id_grade', 'Grade', 'required');
		$this->form_validation->set_rules('grade_obtenu_date', 'Obtenu', 'required');
		$this->form_validation->set_rules('id_departement', 'Id_departement', 'required|numeric');
		$this->form_validation->set_rules('id_service', 'Id_service', 'required|numeric');
		$this->form_validation->set_rules('id_unite', 'Id_unite', 'required|numeric');
		$this->form_validation->set_rules('id_categorie', 'Id_categorie', 'required|numeric');
		$this->form_validation->set_rules('id_sous_categorie', 'Id_sous_categorie', 'required|numeric');
		$this->form_validation->set_rules('id_statut', 'Id_statut', 'required|numeric');
		$this->form_validation->set_rules('id_fonction', 'Id_fonction', 'required|numeric');
		$this->form_validation->set_rules('est_candidat', 'Est_candidat', 'required');
		$this->form_validation->set_rules('code_indemnite_risque', 'Code_indemnite_risque', 'required|numeric');
		// $this->form_validation->set_rules('est_handicappe', 'Est_handicappe', 'required|numeric');
		// $this->form_validation->set_rules('utilise_mfp', 'Utilise_mfp', 'required|numeric');
		$this->form_validation->set_rules('date_embauche', 'Date_embauche', 'required');
		$this->form_validation->set_rules('prime_sante', 'Prime_sante', 'required');
		$this->form_validation->set_rules('salaire_base', 'Salaire_base', 'required');
		$this->form_validation->set_rules('id_specialite', 'Id_specialite', 'required|numeric');
		$this->form_validation->set_rules('id_niveau_formation', 'Id_niveau_formation', 'required|numeric');
		// $this->form_validation->set_rules('niveau_autre', 'Niveau_autre', 'required');
		$this->form_validation->set_rules('ref_avancement_grade', 'Ref_avancement_grade', 'required');
		$this->form_validation->set_rules('ref_affectation', 'Ref_affectation', 'required');

		if($this->form_validation->run()){
			// echo "<pre>";
			// print_r($this->input->post());
			// echo "</pre>";

			$this->db->where('id_fiche_carriere',$id);
			$insert = $this->db->update('gr_fiche_carriere',$this->input->post());

			if(!empty($insert)){
				$this->session->set_flashdata('msg','<div class="text-success">Une fiche de carriere de '.get_db_value("gr_fiche_identification","nom",array("id_identification",$id_identification)).' a été enregistré avec succès </div>');
			}else{
				$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la fiche de carriere de '.get_db_value("gr_fiche_identification","nom",array("id_identification",$id_identification)).' n\'a pas ete enregistre.</div>');
			}

			redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}

		$this->data['id_identification'] = $id_identification;
		$this->data[ 'title' ] = 'Modification d\'une fiche de carriere';
		$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
		$this->render_template('fiche_carriere/edit', $this->data);
	
	}

	public function delete(){
		$id_identification = $this->uri->segment(4);
		$id = $this->uri->segment(5);
		$identification = get_db_occurency('gr_fiche_identification',  ['id_identification',$id_identification]);

		if($this->db->delete('gr_fiche_carriere',array('id_fiche_carriere'=>$id))){
			$this->session->set_flashdata('msg','<div class="text-success">Une fiche des carrieres de '.get_db_value("gr_fiche_identification","nom",array("id_identification",$id_identification)).' a été supprimé avec succès.</div>');
			redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}
	}

	public function get_sous_categories()
	{
		# code...
		$id_categorie = $this->uri->segment(4);
		// $id_categorie = $this->input->post('id_categorie');
		// $id_sous_categorie = $this->input->post('id_sous_categorie');?
		$id_sous_categorie = $this->uri->segment(5);

		
		$sous_categories = $this->My_model->get_all('gr_sous_categories',['id_categorie'=>$id_categorie]);

		$options = "<option value='0'> -Selectionner- </option>";
		// $options = array();
		if($sous_categories){
			foreach ($sous_categories as $sous_categorie) {
				# code...
				$selected = $id_sous_categorie == $sous_categorie->id_sous_categorie?"selected":"";
				$options .= "<option $selected value='".$sous_categorie->id_sous_categorie."'>".$sous_categorie->nom_sous_categorie."</option>";
				// $options[$sous_categorie->id_sous_categorie] = $sous_categorie->nom_sous_categorie;
			}
		}

		echo $options;
		// echo json_encode(['sous_categories'=>$options]);
	}
}

			