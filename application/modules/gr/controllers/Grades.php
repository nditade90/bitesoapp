<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Grades extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Grades';
	}

		public function add(){

		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');			$this->form_validation->set_rules('code_grade', 'Code_grade', 'required');
			$this->form_validation->set_rules('nom_grade', 'Nom_grade', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_grades',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> '.$this->input->post().' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour '.$this->input->post().' a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
			$this->data[ 'title' ] = 'Grades';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('grades/add', $this->data);

		}

		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_grade');
			$this->data['data'] = $this->db->get_where('gr_grades',array('id_grade'=>$id))->row();

			$this->form_validation->set_rules('code_grade', 'Code_grade', 'required');
			$this->form_validation->set_rules('nom_grade', 'Nom_grade', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_grade',$id);
					$insert = $this->db->update('gr_grades',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> '.$this->input->post().' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour '.$this->input->post().' a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
				}
			$this->data[ 'title' ] = 'Edit Grades';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('grades/edit', $this->data);
		
		}

		public function delete($id){
			if($this->db->delete('gr_grades',array('id_grade'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));

			}
		}
}

			