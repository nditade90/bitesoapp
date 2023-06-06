<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Avancement_grades extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Avancement_grades';
	}
	public function add(){

		    $id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');			
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_categorie', 'Id_categorie', 'required|numeric');
			$this->form_validation->set_rules('id_ancien_grade', 'Id_ancien_grade', 'required|numeric');
			$this->form_validation->set_rules('id_nouveau_grade', 'Id_nouveau_grade', 'required|numeric');
			$this->form_validation->set_rules('annee', 'Annee', 'required|numeric');
			$this->form_validation->set_rules('date_avancement', 'Date_avancement', 'required');
			$this->form_validation->set_rules('ancien_salaire_base', 'Ancien_salaire_base', 'required');
			$this->form_validation->set_rules('nouveau_salaire_base', 'Nouveau_salaire_base', 'required');
			$this->form_validation->set_rules('ref_avancement', 'Ref_avancement', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_avancement_grades',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> L\'avancement de grade '.get_db_value("gr_grades","nom_grade",array("id_grade",$this->input->post('id_nouveau_grade'))).' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du grade '.get_db_value("gr_grades","nom_grade",array("id_grade",$this->input->post('id_nouveau_grade'))).' a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));

			}
			$avancement = $this->db->where(array('id_identification'=>$id_identification))->order_by('id_avancement_grade','DESC')->get('mv_avancement_grades')->row();	
			if($avancement){
				$this->data['data'] = $avancement;
			}else{
				$this->data['data'] = new stdClass();
			}	

			$this->data[ 'title' ] = 'Avancement_grades';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('avancement_grades/add', $this->data);

		}

		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_avancement_grade');
			$this->data['data'] = $this->db->get_where('mv_avancement_grades',array('id_avancement_grade'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_categorie', 'Id_categorie', 'required|numeric');
			$this->form_validation->set_rules('id_ancien_grade', 'Id_ancien_grade', 'required|numeric');
			$this->form_validation->set_rules('id_nouveau_grade', 'Id_nouveau_grade', 'required|numeric');
			$this->form_validation->set_rules('annee', 'Annee', 'required|numeric');
			$this->form_validation->set_rules('date_avancement', 'Date_avancement', 'required');
			$this->form_validation->set_rules('ancien_salaire_base', 'Ancien_salaire_base', 'required');
			$this->form_validation->set_rules('nouveau_salaire_base', 'Nouveau_salaire_base', 'required');
			$this->form_validation->set_rules('ref_avancement', 'Ref_avancement', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_avancement_grade',$id);
					$insert = $this->db->update('mv_avancement_grades',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La mis a jour du grade '.get_db_value("gr_grades","nom_grade",array("id_grade",$this->input->post('id_nouveau_grade'))).' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du grade '.get_db_value("gr_grades","nom_grade",array("id_grade",$this->input->post('id_nouveau_grade'))).' a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));

				}
			$this->data[ 'title' ] = 'Edit Avancement_grades';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('avancement_grades/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = $this->uri->segment(4);
			$id = $this->uri->segment(5);

			if($this->db->delete('mv_avancement_grades',array('id_avancement_grade'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
		}
}

			