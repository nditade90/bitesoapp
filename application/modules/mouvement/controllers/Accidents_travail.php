<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Accidents_travail extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Accidents_travail';
		$this->data['js'] = base_url()."assets/js/pages/Accidents_travail.js";
	}

		public function add(){

		    $id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('date_accident', 'Date_accident', 'required');
			$this->form_validation->set_rules('nature', 'Nature', 'required');
			$this->form_validation->set_rules('decision', 'Decision', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_accidents_travail',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> L\'accident de travail a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de l\'accdent de travail a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
			$this->data[ 'title' ] = 'Accidents_travail';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('accidents_travail/add', $this->data);

		}


		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_accident');
			$this->data['data'] = $this->db->get_where('mv_accidents_travail',array('id_accident'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('date_accident', 'Date_accident', 'required');
			$this->form_validation->set_rules('nature', 'Nature', 'required');
			$this->form_validation->set_rules('decision', 'Decision', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_accident',$id);
					$insert = $this->db->update('mv_accidents_travail',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> L\'accident de travail a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'un accident de travail a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
				}
			$this->data[ 'title' ] = 'Edit Accidents_travail';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('accidents_travail/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = $this->uri->segment(4);
			$id = $this->uri->segment(5);

			if($this->db->delete('mv_accidents_travail',array('id_accident'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
		}
}

			