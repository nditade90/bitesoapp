<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Absences extends Admin_Controller{

		public function __construct(){
			parent::__construct();
			$this->data['page_title'] = 'Absences';
			$this->data['js'] = base_url()."assets/js/pages/Absences.js";
			$this->data['url_list'] = "";

		}

		public function index(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
	
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Absences/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get('mv_absences')->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by('id_absence', 'DESC' )->get('mv_absences', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Dossiers penals';
			$this->data['sort'] = '';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('absences/index', $this->data);
	
		}

		public function add(){

			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('nb_jours', 'Nb_jours', 'required|numeric');
			$this->form_validation->set_rules('nb_heures', 'Nb_heures', 'required|numeric');
			$this->form_validation->set_rules('est_justifie', 'Est_justifie', 'required');
			$this->form_validation->set_rules('justification', 'Justification', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_absences',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Une absence a été enregistré.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\enregistrement d\'une absence a échoué </div');
				}
			redirect(base_url('mouvement/Absences/index'));
			}
			$this->data[ 'title' ] = 'Absences';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
            $this->data['id_identification'] = $id_identification;
			$this->render_template('absences/add', $this->data);
		}


		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_absence');
			$this->data['data'] = $this->db->get_where('mv_absences',array('id_absence'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('nb_jours', 'Nb_jours', 'required|numeric');
			$this->form_validation->set_rules('nb_heures', 'Nb_heures', 'required|numeric');
			$this->form_validation->set_rules('est_justifie', 'Est_justifie', 'required');
			$this->form_validation->set_rules('justification', 'Justification', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_absence',$id);
					$insert = $this->db->update('mv_absences',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Une absence a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'une absence a échoué </div');
					}
				redirect(base_url('mouvement/Absences/index'));
				}
			$this->data[ 'title' ] = 'Modifier une absence';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
            $this->data['id_identification'] = $id_identification;
			$this->render_template('absences/edit', $this->data);
		
		}

		public function delete($id){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
			$id = $this->uri->segment(4);

			if($this->db->delete('mv_absences',array('id_absence'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-danger">Une absence a été enregistré.</div>');
				redirect(base_url('mouvement/Absences/index'));
			}
		}
}

			