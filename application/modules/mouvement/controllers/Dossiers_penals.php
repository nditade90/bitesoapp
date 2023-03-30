<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dossiers_penals extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Dossiers_penals';
		$this->data['js'] = base_url()."assets/js/pages/Dossiers_penals.js";
	}

	public function add(){

		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');			
		$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('id_type_peine', 'Id_type_peine', 'required|numeric');
			$this->form_validation->set_rules('juridiction', 'Juridiction', 'required');
			$this->form_validation->set_rules('id_type_infraction', 'Id_type_infraction', 'required|numeric');
			$this->form_validation->set_rules('chef', 'Chef', 'required');
			$this->form_validation->set_rules('nbre', 'Nbre', 'required|numeric');
			$this->form_validation->set_rules('id_unite_nbre', 'Id_unite_nbre', 'required|numeric');
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_dossiers_penals',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Le dossier penal a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du dossier penal  a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
			$this->data[ 'title' ] = 'Dossiers_penals';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('dossiers_penals/add', $this->data);

		}


		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_dossier_penal');
			$this->data['data'] = $this->db->get_where('mv_dossiers_penals',array('id_dossier_penal'=>$id))->row();

			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('id_type_peine', 'Id_type_peine', 'required|numeric');
			$this->form_validation->set_rules('juridiction', 'Juridiction', 'required');
			$this->form_validation->set_rules('id_type_infraction', 'Id_type_infraction', 'required|numeric');
			$this->form_validation->set_rules('chef', 'Chef', 'required');
			$this->form_validation->set_rules('nbre', 'Nbre', 'required|numeric');
			$this->form_validation->set_rules('id_unite_nbre', 'Id_unite_nbre', 'required|numeric');
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');

			if($this->form_validation->run()){
			$this->db->where('id_dossier_penal',$id);
					$insert = $this->db->update('mv_dossiers_penals',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le dossier penal a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du dossier penal  a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));

				}
			$this->data[ 'title' ] = 'Edit Dossiers_penals';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('dossiers_penals/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = $this->uri->segment(4);
			$id = $this->uri->segment(5);

			if($this->db->delete('mv_dossiers_penals',array('id_dossier_penal'=>$id))){
				$this->session->set_flashdata('msg','<div class="alert alert-success">Le dossier pénal a été supprimé avec succès.</div>');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));

			}
		}
}

			