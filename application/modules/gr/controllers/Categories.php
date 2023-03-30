<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Categories';
	// $this->load->model('Categories_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Categories/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_categories' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_categorie', 'DESC' )->get( 'gr_categories', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = 'id_categorie';			
			$this->form_validation->set_rules('code_categorie', 'Code', 'required|is_unique[gr_categories.code_categorie]');
			$this->form_validation->set_rules('nom_categorie', 'Catégorie', 'required');

			
			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_categories',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La catégorie '.$this->input->post('nom_categorie').' a été enregistrée avec succès</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">Erreur, Enregistrement de la Catégorie '.$this->input->post('nom_categorie').' a échoué</div>');
				}
			redirect(base_url('gr/Categories/add'));
			}
			$this->render_template('categories/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->My_model->get_one('gr_categories',array('id_categorie'=>$id));
			$this->render_template('categories/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_categorie');
			
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Categories/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_categories' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_categorie', 'DESC' )->get( 'gr_categories', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = 'id_categorie';
			$this->data['data'] = $this->db->get_where('gr_categories',array('id_categorie'=>$id))->row();

			// $this->form_validation->set_rules('code_categorie', 'Code_categorie', 'required|is_unique[gr_categories.code_categorie]');
			$this->form_validation->set_rules('code_categorie', 'Code', 'required');
			$this->form_validation->set_rules('nom_categorie', 'Catégorie', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_categorie',$id);
					$insert = $this->db->update('gr_categories',$_POST);

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La mise à jour de la catégorie '.$this->input->post('nom_categorie').' a été bien faite.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">Erreur, la mise à jour de la catégorie'.$this->input->post('nom_categorie').' a échoué.</div>');
					}
				redirect(base_url('gr/Categories/add'));
				}
			$this->data[ 'title' ] = 'Détail de la catégorie: '.$this->input->post('nom_categorie');			
			$this->render_template('categories/edit', $this->data);
		
		}

		public function delete($id){
			$category = $this->My_model->get_one('gr_categories',array('id_categorie'=>$id));
			if($this->db->delete('gr_categories',array('id_categorie'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> La catégorie '.$category->nom_categorie.' a été supprimée.</div>');
				redirect(base_url('gr/Categories/add'));
			}
		}
}

			