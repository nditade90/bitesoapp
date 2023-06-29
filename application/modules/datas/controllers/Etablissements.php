<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Etablissements extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Etablissements';
	// $this->load->model('Etablissements_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Etablissements/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_etablissements' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id', 'DESC' )->get( 'gr_etablissements', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code', 'Code', 'required');
			$this->form_validation->set_rules('lieu', 'Lieu', 'required');
			$this->form_validation->set_rules('pays_id', 'Pays_id', 'required|numeric');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_etablissements',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Établissement a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de l\' Établissements a échoué </div');
				}
			redirect(base_url('datas/Etablissements/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('etablissements/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_etablissements',array('id'=>$id))->row();
			$this->data[ 'title' ] = 'AddEtablissements';
			$this->render_template('etablissements/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Etablissements/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_etablissements' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id', 'DESC' )->get( 'gr_etablissements', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_etablissements',array('id'=>$id))->row();

			$this->form_validation->set_rules('code', 'Code', 'required');
			$this->form_validation->set_rules('lieu', 'Lieu', 'required');
			$this->form_validation->set_rules('pays_id', 'Pays_id', 'required|numeric');

			if($this->form_validation->run()){
			$this->db->where('id',$id);
					$insert = $this->db->update('gr_etablissements',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Établissement a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de l\' Établissements a échoué </div');
					}
				redirect(base_url('datas/Etablissements/add'));
				}
			$this->render_template('etablissements/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_etablissements',array('id'=>$id));

			if($this->db->delete('gr_etablissements',array('id'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Établissement a été supprimée.</div>');
				redirect(base_url('datas/Etablissements/add'));
			}
		}
}

			