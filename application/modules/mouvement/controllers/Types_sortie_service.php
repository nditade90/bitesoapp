<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_sortie_service extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_sortie_service';
	// $this->load->model('Types_sortie_service_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_sortie_service/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_sortie_service' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_sortie', 'DESC' )->get( 'mv_types_sortie_service', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('type_sortie_service', 'Type_sortie_service', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_sortie_service',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Un type de sortie de service '.$this->input->post('type_sortie_service').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'n type de sortie de service '.$this->input->post('type_sortie_service').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_sortie_service/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_sortie_service/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_sortie_service',array('id_type_sortie'=>$id))->row();
			$this->data[ 'title' ] = "Détail de type de sortie de service: ".$this->data['data']->type_sortie_service;
			$this->render_template('types_sortie_service/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_sortie');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_sortie_service/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_sortie_service' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_sortie', 'DESC' )->get( 'mv_types_sortie_service', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_sortie_service',array('id_type_sortie'=>$id))->row();

			$this->form_validation->set_rules('type_sortie_service', 'Type_sortie_service', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_sortie',$id);
					$insert = $this->db->update('mv_types_sortie_service',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Un type de sortie de service '.$this->input->post('type_sortie_service').'  a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'Un type de sortie de service '.$this->input->post('type_sortie_service').'  a échoué </div');
					}
				redirect(base_url('mouvement/Types_sortie_service/add'));
				}
			$this->render_template('types_sortie_service/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_sortie_service',array('id_type_sortie'=>$id));

			if($this->db->delete('mv_types_sortie_service',array('id_type_sortie'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Un type '.$data->type_sortie_service.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_sortie_service/add'));
			}
		}
}

			