<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_peine extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_peine';
	// $this->load->model('Types_peine_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_peine/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_peine' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_peine', 'DESC' )->get( 'mv_types_peine', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code_type_peine', 'Code_type_peine', 'required');
			$this->form_validation->set_rules('nom_type_peine', 'Nom_type_peine', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_peine',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Type de peine '.$this->input->post('nom_type_peine').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du type de peine '.$this->input->post('nom_type_peine').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_peine/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_peine/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_peine',array('id_type_peine'=>$id))->row();
			$this->data[ 'title' ] = "Détail du type de peine: ".$this->data['data']->nom_type_peine;
			$this->render_template('types_peine/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_peine');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_peine/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_peine' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_peine', 'DESC' )->get( 'mv_types_peine', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_peine',array('id_type_peine'=>$id))->row();

			$this->form_validation->set_rules('code_type_peine', 'Code_type_peine', 'required');
			$this->form_validation->set_rules('nom_type_peine', 'Nom_type_peine', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_peine',$id);
					$insert = $this->db->update('mv_types_peine',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Type de peine '.$this->input->post('nom_type_peine').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type de peine '.$this->input->post('nom_type_peine').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_peine/add'));
				}
			$this->render_template('types_peine/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_peine',array('id_type_peine'=>$id));

			if($this->db->delete('mv_types_peine',array('id_type_peine'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Type de peine '.$data->nom_type_peine.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_peine/add'));
			}
		}
}

			