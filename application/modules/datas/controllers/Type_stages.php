<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Type_stages extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Type_stages';
	// $this->load->model('Type_stages_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Type_stages/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_type_stages' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id', 'DESC' )->get( 'mv_type_stages', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('categorie_id', 'Categorie_id', 'required|numeric');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_type_stages',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Type de stage a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de type de stage a échoué </div');
				}
			redirect(base_url('datas/Type_stages/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('type_stages/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_type_stages',array('id'=>$id))->row();
			$this->data[ 'title' ] = 'AddType_stages';
			$this->render_template('type_stages/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Type_stages/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_type_stages' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id', 'DESC' )->get( 'mv_type_stages', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_type_stages',array('id'=>$id))->row();

			$this->form_validation->set_rules('categorie_id', 'Categorie_id', 'required|numeric');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run()){
			$this->db->where('id',$id);
					$insert = $this->db->update('mv_type_stages',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Type de stage a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type de stage   a échoué </div');
					}
				redirect(base_url('datas/Type_stages/add'));
				}
			$this->render_template('type_stages/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_type_stages',array('id'=>$id));

			if($this->db->delete('mv_type_stages',array('id'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Type de stage a été supprimée.</div>');
				redirect(base_url('datas/Type_stages/add'));
			}
		}
}

			