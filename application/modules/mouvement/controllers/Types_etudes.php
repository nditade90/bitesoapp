<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_etudes extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_etudes';
	// $this->load->model('Types_etudes_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_etudes/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_etudes' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_types_etudes', 'DESC' )->get( 'mv_types_etudes', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('type_etudes', 'Type_etudes', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_etudes',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Un type d\'etude : '.$this->input->post('type_etudes').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'un type d\'etude '.$this->input->post('type_etudes').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_etudes/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_etudes/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_etudes',array('id_types_etudes'=>$id))->row();
			$this->data[ 'title' ] = "Détail un type d'etude : ".$this->data['data']->type_etudes;
			$this->render_template('types_etudes/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_types_etudes');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_etudes/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_etudes' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_types_etudes', 'DESC' )->get( 'mv_types_etudes', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_etudes',array('id_types_etudes'=>$id))->row();

			$this->form_validation->set_rules('type_etudes', 'Type_etudes', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_types_etudes',$id);
					$insert = $this->db->update('mv_types_etudes',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Un type d\'etude '.$this->input->post('type_etudes').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'un type d\'etude '.$this->input->post('type_etudes').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_etudes/add'));
				}
			$this->render_template('types_etudes/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_etudes',array('id_types_etudes'=>$id));

			if($this->db->delete('mv_types_etudes',array('id_types_etudes'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Un type d\'etude '.$data->type_etudes.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_etudes/add'));
			}
		}
}

			