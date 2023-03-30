<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_cote extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_cote';
	// $this->load->model('Types_cote_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_cote/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_cote' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_cote', 'DESC' )->get( 'mv_types_cote', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('type_cote', 'Type_cote', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_cote',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Le type de cote '.$this->input->post('type_cote').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du type de cote '.$this->input->post('type_cote').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_cote/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_cote/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_cote',array('id_type_cote'=>$id))->row();
			$this->data[ 'title' ] = "Détail de Types_cote:".$this->data['data']->type_cote;
			$this->render_template('types_cote/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_cote');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_cote/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_cote' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_cote', 'DESC' )->get( 'mv_types_cote', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_cote',array('id_type_cote'=>$id))->row();

			$this->form_validation->set_rules('type_cote', 'Type_cote', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_cote',$id);
					$insert = $this->db->update('mv_types_cote',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le type de cote '.$this->input->post('type_cote').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type de cote '.$this->input->post('type_cote').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_cote/add'));
				}
			$this->render_template('types_cote/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_cote',array('id_type_cote'=>$id));

			if($this->db->delete('mv_types_cote',array('id_type_cote'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Le type de cote '.$data->type_cote.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_cote/add'));
			}
		}
}

			