<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Entrees_en_service extends Admin_Controller{

		public function __construct(){

			parent::__construct();
			$this->data['page_title'] = 'Entrees_en_service';
			// $this->load->model('Entrees_en_service_model');
			$this->data['url_list'] = "";
		}

		public function index(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Entrees_en_service/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get( 'mv_entrees_en_service' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by( 'id_entree_service', 'DESC' )->get( 'mv_entrees_en_service', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Entrees_en_service';
			$this->data['sort'] = '';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";

			$this->render_template('entrees_en_service/index', $this->data);

		}

		public function add(){

			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
			
			$this->form_validation->set_rules('lieu_entree', 'Lieu_entree', 'required');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('duree_contrat', 'Duree_contrat', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_entrees_en_service',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">L\'entrée en service a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de l\'entrée en service a échoué </div');
				}
			redirect(base_url('mouvement/Entrees_en_service/index'));
			}
			$this->data[ 'title' ] = 'Entrees_en_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('entrees_en_service/add', $this->data);

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_entrees_en_service',array('id_entree_service'=>$id))->row();
			$this->data[ 'title' ] = 'AddEntrees_en_service';
			$this->render_template('entrees_en_service/view', $this->data);
		}

		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_entree_service');
			$this->data['data'] = $this->db->get_where('mv_entrees_en_service',array('id_entree_service'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('lieu_entree', 'Lieu_entree', 'required');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('duree_contrat', 'Duree_contrat', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_entree_service',$id);
					$insert = $this->db->update('mv_entrees_en_service',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> L\'entrée en service a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de l\'entrée en service a échoué </div');
					}
				redirect(base_url('mouvement/Entrees_en_service/index'));
				}
			$this->data[ 'title' ] = 'Edit Entrees_en_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('entrees_en_service/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_entrees_en_service',array('id_entree_service'=>$id));

			if($this->db->delete('mv_entrees_en_service',array('id_entree_service'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> L\'entrée en service a été supprimée.</div>');
				redirect(base_url('mouvement/Entrees_en_service/index'));
			}
		}
}

			