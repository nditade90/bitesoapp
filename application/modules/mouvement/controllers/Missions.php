<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Missions extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Missions';
	// $this->load->model('Missions_model');
	$this->data['url_list'] = "";
	}

		public function index(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Missions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get( 'mv_missions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by( 'id_mission', 'DESC' )->get( 'mv_missions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Missions';
			$this->data['sort'] = '';
			$this->render_template('missions/index', $this->data);

		}

		public function add(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->form_validation->set_rules('id_type_mission', 'Id_type_mission', 'required|numeric');
			$this->form_validation->set_rules('contingent', 'Contingent', 'required');
			$this->form_validation->set_rules('bataillon', 'Bataillon', 'required');
			$this->form_validation->set_rules('fonction', 'Fonction', 'required');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_missions',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La mission a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la mission a échoué </div');
				}
			redirect(base_url('mouvement/Missions/index'));
			}
			$this->data[ 'title' ] = 'Missions';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('missions/add', $this->data);

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_missions',array('id_mission'=>$id))->row();
			$this->data[ 'title' ] = 'AddMissions';
			$this->render_template('missions/view', $this->data);
		}

		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_mission');
			$this->data['data'] = $this->db->get_where('mv_missions',array('id_mission'=>$id))->row();

			$this->form_validation->set_rules('id_type_mission', 'Id_type_mission', 'required|numeric');
			$this->form_validation->set_rules('contingent', 'Contingent', 'required');
			$this->form_validation->set_rules('bataillon', 'Bataillon', 'required');
			$this->form_validation->set_rules('fonction', 'Fonction', 'required');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_mission',$id);
					$insert = $this->db->update('mv_missions',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La mission a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la mission a échoué </div');
					}
				redirect(base_url('mouvement/Missions/index'));
				}
			$this->data[ 'title' ] = 'Edit Missions';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('missions/edit', $this->data);
		
		}

		public function delete($id){
			if($this->db->delete('mv_missions',array('id_mission'=>$id))){
				$this->session->set_flashdata('msg','La mission a été supprimée ');
				redirect(base_url('mouvement/Missions/index'));
			}
		}
}

			