<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Type_documents extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Type_documents';
	// $this->load->model('Type_documents_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Type_documents/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_type_documents' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_document', 'DESC' )->get( 'gr_type_documents', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_type_document', 'Code_type_document', 'required');
			$this->form_validation->set_rules('nom_type_document', 'Nom_type_document', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_type_documents',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le type de document '.$this->input->post('nom_type_document').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du type de document '.$this->input->post('nom_type_document').' a échoué </div');
				}
			redirect(base_url('gr/Type_documents/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('type_documents/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_type_documents',array('id_type_document'=>$id))->row();
			$this->data[ 'title' ] = 'AddType_documents';
			$this->render_template('type_documents/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_document');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Type_documents/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_type_documents' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_document', 'DESC' )->get( 'gr_type_documents', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_type_documents',array('id_type_document'=>$id))->row();

			$this->form_validation->set_rules('code_type_document', 'Code_type_document', 'required');
			$this->form_validation->set_rules('nom_type_document', 'Nom_type_document', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_document',$id);
					$insert = $this->db->update('gr_type_documents',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Le type de document'.$this->input->post('nom_type_document').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type de document '.$this->input->post('nom_type_document').' a échoué </div');
					}
				redirect(base_url('gr/Type_documents/add'));
				}
			$this->render_template('type_documents/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_type_documents',array('id_type_document'=>$id));

			if($this->db->delete('gr_type_documents',array('id_type_document'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Le type de document'.$data['nom_type_document'].' a été supprimée.</div>');
				redirect(base_url('gr/Type_documents/add'));
			}
		}
}

			