<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ayants_droit extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Ayants_droit';
		$this->data['js'] = base_url()."assets/js/pages/Ayants_droit.js";
	}
		

	public function add(){
		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
		$this->data['identification'] = $this->db->get_where('gr_fiche_identification',['id_identification'=>$id_identification])->row();

		$this->form_validation->set_rules('id_categorie_ayant_droit', 'Id_categorie_ayant_droit', 'required|numeric');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenoms', 'Prenoms', 'required');
		$this->form_validation->set_rules('date_naissance', 'Date_naissance', 'required');
		$this->form_validation->set_rules('ref_extrait_naissance', 'Ref_extrait_naissance', 'required');

		if($this->input->post('id_categorie_ayant_droit') == 1){
			$this->form_validation->set_rules('date_marriage', 'Date_marriage', 'required');
			$this->form_validation->set_rules('ref_extrait_marriage', 'Ref_extrait_marriage', 'required');
		}
		

		if($this->data['identification']->id_etat_civil == 3){
			$this->form_validation->set_rules('date_divorce', 'Date_divorce', 'required');
		}

		if($this->data['identification']->id_etat_civil == 3){
			$this->form_validation->set_rules('date_deces', 'Date_deces', 'required');
			$this->form_validation->set_rules('ref_cert_deces', 'Ref_cert_deces', 'required');
		}
		$this->form_validation->set_rules('prise_en_charge', 'Prise_en_charge', 'required');

		if($this->form_validation->run()){

		$insert = $this->db->insert('gr_ayants_droit',$this->input->post());
		if(!empty($insert)){
			$this->session->set_flashdata('msg','<div class="text-success"> Un ayant droit '.$this->input->post('nom').' '.$this->input->post('prenom').' a été enregistré avec succès.</div>');
		}else{
			$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'un ayant droit '.$this->input->post('nom').' '.$this->input->post('prenom').' a échoué </div');
		}
			redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}

		$this->data[ 'title' ] = 'Ayants_droit';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		
		$this->render_template('ayants_droit/add', $this->data);

	}

	public function edit(){
		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
		$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_ayant_droit');
		$this->data['data'] = $this->db->get_where('gr_ayants_droit',array('id_ayant_droit'=>$id))->row();
		$this->data['identification'] = $this->db->get_where('gr_fiche_identification',['id_identification'=>$id_identification])->row();

		$this->form_validation->set_rules('id_categorie_ayant_droit', 'Id_categorie_ayant_droit', 'required|numeric');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenoms', 'Prenoms', 'required');
		$this->form_validation->set_rules('date_naissance', 'Date_naissance', 'required');
		$this->form_validation->set_rules('ref_extrait_naissance', 'Ref_extrait_naissance', 'required');

		if($this->input->post('id_categorie_ayant_droit') == 1){
			$this->form_validation->set_rules('date_marriage', 'Date_marriage', 'required');
			$this->form_validation->set_rules('ref_extrait_marriage', 'Ref_extrait_marriage', 'required');
		}

		if($this->data['identification']->id_etat_civil == 3){
			$this->form_validation->set_rules('date_divorce', 'Date_divorce', 'required');
		}

		if($this->data['identification']->id_etat_civil == 3){
			$this->form_validation->set_rules('date_deces', 'Date_deces', 'required');
			$this->form_validation->set_rules('ref_cert_deces', 'Ref_cert_deces', 'required');
		}

		$this->form_validation->set_rules('prise_en_charge', 'Prise_en_charge', 'required');

		if($this->form_validation->run()){
		$this->db->where('id_ayant_droit',$id);
		$insert = $this->db->update('gr_ayants_droit',$this->input->post());

		if(!empty($insert)){
			$this->session->set_flashdata('msg','<div class="text-success"> Un ayant droit '.$this->input->post('nom').' '.$this->input->post('prenom').' a été mis a jour avec succès.</div>');
		}else{
			$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'un ayant droit '.$this->input->post('nom').' '.$this->input->post('prenom').' a échoué </div');
		}
		redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;		
		$this->data[ 'title' ] = 'Edit Ayants_droit';
		$this->render_template('ayants_droit/edit', $this->data);
	
	}

	public function delete(){
		$id_identification = $this->uri->segment(4);
		$id = $this->uri->segment(5);
		$identification = get_db_occurency('gr_fiche_identification',  ['id_identification',$id_identification]);
	
		if($this->db->delete('gr_ayants_droit',array('id_ayant_droit'=>$id))){
			$this->session->set_flashdata('msg','<div class="text-success">L\' ayant droit '.get_db_value("gr_ayants_droit","nom",array("id_ayant_droit",$id))." a été supprimé.</div>");
			redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}
	}
}

			