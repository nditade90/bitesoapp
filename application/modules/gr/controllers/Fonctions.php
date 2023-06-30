<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fonctions extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Fonctions';
	$this->data['url_list'] = "";
	// $this->load->model('Fonctions_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Fonctions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_fonctions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_fonction', 'DESC' )->get( 'gr_fonctions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code_fonction', 'Code', 'required');
			$this->form_validation->set_rules('nom_fonction', 'Fonction', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_fonctions',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La fonction a été enregistrée avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la fonction a échouée.</div');
				}
			redirect(base_url('gr/Fonctions/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('fonctions/add', $this->data);
			

		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_fonction');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Fonctions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_fonctions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_fonction', 'DESC' )->get( 'gr_fonctions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_fonctions',array('id_fonction'=>$id))->row();

			$this->form_validation->set_rules('code_fonction', 'Code', 'required');
			$this->form_validation->set_rules('nom_fonction', 'Fonction', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_fonction',$id);
					$insert = $this->db->update('gr_fonctions',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La fonction a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la fonction a échoué </div');
					}
				redirect(base_url('gr/Fonctions/add'));
				}
			$this->render_template('fonctions/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_fonctions',array('id_fonction'=>$id));

			if($this->db->delete('gr_fonctions',array('id_fonction'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">La fonction a été supprimée.</div>');
				redirect(base_url('gr/Fonctions/add'));
			}
		}
}

			