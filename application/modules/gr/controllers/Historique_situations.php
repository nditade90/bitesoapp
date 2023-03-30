<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Historique_situations extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Historique_situations';
	}

	public function add(){
		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
		$this->form_validation->set_rules('id_situation', 'Id_situation', 'required|numeric');
		// $this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
		$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
		$this->form_validation->set_rules('observation', 'Observation', 'required');

		if($this->form_validation->run()){

			$insert = $this->db->insert('gr_historique_situations',$this->input->post());
			if(!empty($insert)){
				$this->session->set_flashdata('msg','<div class="text-success">La categorie de la situation '.get_db_value("gr_situations","nom_situation",array("id_situation",$this->input->post('id_situation'))).' a été mis a jour avec succès.</div>');
			}else{
				$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement categorie de la situation '.get_db_value("gr_situations","nom_situation",array("id_situation",$this->input->post('id_situation'))).' a échoué </div');
			}
			
			redirect(base_url('gr/Fiche_identification/view/'.$this->input->post('id_identification')));
		}

		$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
		$this->data['id_identification'] = $id_identification;
		$this->data['title'] = 'Historique_situations';
		$this->render_template('historique_situations/add', $this->data);
	}


	public function edit(){
		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
		$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_historique');

		$this->data['data'] = $this->db->get_where('gr_historique_situations',array('id_historique'=>$id))->row();

		$this->form_validation->set_rules('id_situation', 'Id_situation', 'required|numeric');
		// $this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
		$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
		$this->form_validation->set_rules('observation', 'Observation', 'required');

		if($this->form_validation->run()){
				$this->db->where('id_historique',$id);
				$insert = $this->db->update('gr_historique_situations',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La situation '.get_db_value("gr_situations","nom_situation",array("id_situation",$this->input->post('id_situation'))).' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la situation '.get_db_value("gr_situations","nom_situation",array("id_situation",$this->input->post('id_situation'))).' a échoué </div');
				}

				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
		$this->data[ 'title' ] = 'Edit Historique_situations';
		$this->data['id_identification'] = $id_identification;
		$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
		$this->render_template('historique_situations/edit', $this->data);

			
	}

	public function delete(){
		$id_identification = $this->uri->segment(4);
		$id = $this->uri->segment(5);
		$histo = get_db_occurency('gr_historique_situations',  ['id_historique',$id]);

		if($this->db->delete('gr_historique_situations',array('id_historique'=>$id))){
			$this->session->set_flashdata('msg','<div class="text-danger">La suppression de la situation '.get_db_value("gr_situations","nom_situation",array("id_situation",$histo->id_situation)).' a été effectué </div');
			redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
		}
	}
}

			