<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Actions_disciplinaires extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Actions disciplinaires';
		$this->data['js'] = base_url()."assets/js/pages/Actions_disciplinaires.js";
		$this->data['url_list'] = "";

	}

	public function index(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$this->load->library( 'pagination' );
		$config[ 'base_url' ]      = base_url( 'mouvement/Actions_disciplinaires/index' );
		$config[ 'per_page' ]      = 10;
		$config[ 'num_links' ]     = 2;
		$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get('mv_actions_disciplinaires')->num_rows();
		$this->pagination->initialize( $config );
		$this->data[ 'listing' ] = true;
		$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by( 'id_action_disciplinaire', 'DESC' )->get('mv_actions_disciplinaires', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
		$this->data[ 'title' ] = 'Actions disciplinaires';
		$this->data['sort'] = '';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('actions_disciplinaires/index', $this->data);

	}	


		public function add(){

			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
	
			$this->form_validation->set_rules('date_ouverture', 'Date_ouverture', 'required');
			$this->form_validation->set_rules('id_type_punition', 'Id_type_punition', 'required|numeric');
			$this->form_validation->set_rules('nb_jours_punition', 'Nb_jours_punition', 'required|numeric');
			$this->form_validation->set_rules('date_cloture', 'Date_cloture', 'required');
			$this->form_validation->set_rules('ref_cloture', 'Ref_cloture', 'required');
			$this->form_validation->set_rules('date_levee', 'Date_levee', 'required');
			$this->form_validation->set_rules('autorite_decision', 'Autorite_decision', 'required');
			$this->form_validation->set_rules('ref_levee', 'Ref_levee', 'required');
			$this->form_validation->set_rules('observation', 'Observation', 'required');
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_actions_disciplinaires',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Une action displinaire  a été enregistreé avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'Une action displinaire a échoué </div');
				}
				redirect(base_url('mouvement/Actions_disciplinaires/index'));

			}
			$this->data[ 'title' ] = 'Actions_disciplinaires';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('actions_disciplinaires/add', $this->data);

		}


		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_action_disciplinaire');
			$this->data['data'] = $this->db->get_where('mv_actions_disciplinaires',array('id_action_disciplinaire'=>$id))->row();

			$this->form_validation->set_rules('date_ouverture', 'Date_ouverture', 'required');
			$this->form_validation->set_rules('id_type_punition', 'Id_type_punition', 'required|numeric');
			$this->form_validation->set_rules('nb_jours_punition', 'Nb_jours_punition', 'required|numeric');
			$this->form_validation->set_rules('date_cloture', 'Date_cloture', 'required');
			$this->form_validation->set_rules('ref_cloture', 'Ref_cloture', 'required');
			$this->form_validation->set_rules('date_levee', 'Date_levee', 'required');
			$this->form_validation->set_rules('autorite_decision', 'Autorite_decision', 'required');
			$this->form_validation->set_rules('ref_levee', 'Ref_levee', 'required');
			$this->form_validation->set_rules('observation', 'Observation', 'required');
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');

			if($this->form_validation->run()){
				$this->db->where('id_action_disciplinaire',$id);
					$insert = $this->db->update('mv_actions_disciplinaires',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Une action displinaire a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'Une action displinaire  a échoué </div');
					}
					redirect(base_url('mouvement/Actions_disciplinaires/index'));
			}

			$this->data[ 'title' ] = 'Edit Actions_disciplinaires';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('actions_disciplinaires/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4);

			if($this->db->delete('mv_actions_disciplinaires',array('id_action_disciplinaire'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Une action displinaire a été enregistré</div>');
				redirect(base_url('mouvement/Actions_disciplinaires/index'));
			}
		}
}

			