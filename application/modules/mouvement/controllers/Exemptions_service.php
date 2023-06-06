<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Exemptions_service extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Exemptions_service';
	$this->data['js'] = base_url()."assets/js/pages/Exemptions_service.js";

	}


		public function add(){

		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('annee', 'Annee', 'required|numeric');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('nb_jours', 'Nb_jours', 'required|numeric');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_exemptions_service',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Cet exemption de service a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de cet exemption de service a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
			$this->data[ 'title' ] = 'Exemptions_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('exemptions_service/add', $this->data);

		}

		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_exemption');
			$this->data['data'] = $this->db->get_where('mv_exemptions_service',array('id_exemption'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('annee', 'Annee', 'required|numeric');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('nb_jours', 'Nb_jours', 'required|numeric');

			if($this->form_validation->run()){
			$this->db->where('id_exemption',$id);
					$insert = $this->db->update('mv_exemptions_service',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Cet exemption de service a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de cet exemption de service a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
				}
			$this->data[ 'title' ] = 'Edit Exemptions_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('exemptions_service/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = $this->uri->segment(4);
			$id = $this->uri->segment(5);

			if($this->db->delete('mv_exemptions_service',array('id_exemption'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
		}
}

			