<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Unites extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Unites';
	// $this->load->model('Unites_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Unites/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_unites' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_unite', 'DESC' )->get( 'gr_unites', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_unite', 'Code_unite', 'required');
			$this->form_validation->set_rules('nom_unite', 'Nom_unite', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_unites',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Unité '.$this->input->post('nom_unite').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du l\'Unité '.$this->input->post('nom_unite').' a échoué </div');
				}
			redirect(base_url('gr/Unites/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('unites/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_unites',array('id_unite'=>$id))->row();
			$this->data[ 'title' ] = 'AddUnites';
			$this->render_template('unites/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_unite');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Unites/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_unites' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_unite', 'DESC' )->get( 'gr_unites', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_unites',array('id_unite'=>$id))->row();

			$this->form_validation->set_rules('code_unite', 'Code_unite', 'required');
			$this->form_validation->set_rules('nom_unite', 'Nom_unite', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_unite',$id);
					$insert = $this->db->update('gr_unites',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Unité '.$this->input->post('nom_unite').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour unité '.$this->input->post('nom_unite').' a échoué </div');
					}
				redirect(base_url('gr/Unites/add'));
				}
			$this->render_template('unites/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_unites',array('id_unite'=>$id));

			if($this->db->delete('gr_unites',array('id_unite'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">L\'unité '.$data->nom_unite.' a été supprimée.</div>');
				redirect(base_url('gr/Unites/add'));
			}
		}
}

			