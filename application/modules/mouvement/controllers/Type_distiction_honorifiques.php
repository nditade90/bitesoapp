<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Type_distiction_honorifiques extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Type_distiction_honorifiques';
// 	$this->load->model('Type_distiction_honorifiques_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Type_distiction_honorifiques/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_type_distiction_honorifiques' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_distiction', 'DESC' )->get( 'mv_type_distiction_honorifiques', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('type_distiction', 'Type_distiction', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_type_distiction_honorifiques',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Le type: '.$this->input->post('type_distiction').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du type : '.$this->input->post('type_distiction').' a échoué </div');
				}
			redirect(base_url('mouvement/Type_distiction_honorifiques/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('type_distiction_honorifiques/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_type_distiction_honorifiques',array('id_type_distiction'=>$id))->row();
			$this->data[ 'title' ] = "Détail d'un type de distinction honorifique :".$this->data['data']->type_distiction;
			$this->render_template('type_distiction_honorifiques/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_distiction');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Type_distiction_honorifiques/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_type_distiction_honorifiques' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_distiction', 'DESC' )->get( 'mv_type_distiction_honorifiques', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_type_distiction_honorifiques',array('id_type_distiction'=>$id))->row();

			$this->form_validation->set_rules('type_distiction', 'Type_distiction', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_distiction',$id);
					$insert = $this->db->update('mv_type_distiction_honorifiques',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le type : '.$this->input->post('type_distiction').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type : '.$this->input->post('type_distiction').' a échoué </div');
					}
				redirect(base_url('mouvement/Type_distiction_honorifiques/add'));
				}
			$this->render_template('type_distiction_honorifiques/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_type_distiction_honorifiques',array('id_type_distiction'=>$id));

			if($this->db->delete('mv_type_distiction_honorifiques',array('id_type_distiction'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Le type de distiction a été supprimée.</div>');
				redirect(base_url('mouvement/Type_distiction_honorifiques/add'));
			}
		}
}

			