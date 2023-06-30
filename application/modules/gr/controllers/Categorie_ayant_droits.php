<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categorie_ayant_droits extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Categorie_ayant_droits';
	$this->data['url_list'] = "";
	// $this->load->model('Categorie_ayant_droits_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Categorie_ayant_droits/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_categorie_ayant_droits' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_categorie_ayant_droit', 'DESC' )->get( 'gr_categorie_ayant_droits', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('nom_categorie', 'Nom_categorie', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_categorie_ayant_droits',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La catégorie des ayants droits'.$this->input->post('nom_categorie').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la catégorie des ayants droits '.$this->input->post('nom_categorie').' a échoué </div');
				}
			redirect(base_url('gr/Categorie_ayant_droits/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('categorie_ayant_droits/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_categorie_ayant_droits',array('id_categorie_ayant_droit'=>$id))->row();
			$this->data[ 'title' ] = 'AddCategorie_ayant_droits';
			$this->render_template('categorie_ayant_droits/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_categorie_ayant_droit');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Categorie_ayant_droits/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_categorie_ayant_droits' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_categorie_ayant_droit', 'DESC' )->get( 'gr_categorie_ayant_droits', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_categorie_ayant_droits',array('id_categorie_ayant_droit'=>$id))->row();

			$this->form_validation->set_rules('nom_categorie', 'Nom_categorie', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_categorie_ayant_droit',$id);
					$insert = $this->db->update('gr_categorie_ayant_droits',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La catégorie des ayants droits '.$this->input->post('nom_categorie').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la catégorie  des ayants droits '.$this->input->post('nom_categorie').' a échoué </div');
					}
				redirect(base_url('gr/Categorie_ayant_droits/add'));
				}
			$this->render_template('categorie_ayant_droits/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_categorie_ayant_droits',array('id_categorie_ayant_droit'=>$id));

			if($this->db->delete('gr_categorie_ayant_droits',array('id_categorie_ayant_droit'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">La catégorie des ayants droits '.$data->nom_categorie.' a été supprimée.</div>');
				redirect(base_url('gr/Categorie_ayant_droits/add'));
			}
		}
}

			