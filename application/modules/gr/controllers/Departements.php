<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Departements extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Departements';
	$this->data['url_list'] = "";
	// $this->load->model('Departements_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Departements/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_departements' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_departement', 'DESC' )->get( 'gr_departements', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code_departement', 'Code_departement', 'required');
			$this->form_validation->set_rules('nom_departement', 'Nom_departement', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_departements',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le département '.$this->input->post('nom_departement').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du département '.$this->input->post('nom_departement').' a échoué </div');
				}
			redirect(base_url('gr/Departements/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('departements/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_departements',array('id_departement'=>$id))->row();
			$this->data[ 'title' ] = 'AddDepartements';
			$this->render_template('departements/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_departement');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Departements/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_departements' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_departement', 'DESC' )->get( 'gr_departements', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_departements',array('id_departement'=>$id))->row();

			$this->form_validation->set_rules('code_departement', 'Code_departement', 'required');
			$this->form_validation->set_rules('nom_departement', 'Nom_departement', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_departement',$id);
					$insert = $this->db->update('gr_departements',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Le département '.$this->input->post('nom_departement').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du département '.$this->input->post('nom_departement').' a échoué </div');
					}
				redirect(base_url('gr/Departements/add'));
				}
			$this->render_template('departements/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_departements',array('id_departement'=>$id));

			if($this->db->delete('gr_departements',array('id_departement'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Le département '.$data->nom_departement.' a été supprimée.</div>');
				redirect(base_url('gr/Departements/add'));
			}
		}
}

			