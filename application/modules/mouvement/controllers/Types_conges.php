<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_conges extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_conges';
	// $this->load->model('Types_conges_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_conges/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_conges' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_conge', 'DESC' )->get( 'mv_types_conges', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('type_conge', 'Type_conge', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_conges',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Un type de conge : '.$this->input->post('type_conge').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du Un type de conge : '.$this->input->post('type_conge').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_conges/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_conges/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_conges',array('id_type_conge'=>$id))->row();
			$this->data[ 'title' ] = "Détail d'un type de conge: ".$this->data['data']->type_conge;
			$this->render_template('types_conges/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_conge');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_conges/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_conges' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by('id_type_conge', 'DESC' )->get( 'mv_types_conges', $config[ 'per_page' ],
			$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_conges',array('id_type_conge'=>$id))->row();

			$this->form_validation->set_rules('type_conge', 'Type_conge', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_conge',$id);
					$insert = $this->db->update('mv_types_conges',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Un type de conge : '.$this->input->post('type_conge').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'un type de conge: '.$this->input->post('type_conge').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_conges/add'));
				}
			$this->render_template('types_conges/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_conges',array('id_type_conge'=>$id));

			if($this->db->delete('mv_types_conges',array('id_type_conge'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Un type de conge '.$data->type_conge.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_conges/add'));
			}
		}
}

			