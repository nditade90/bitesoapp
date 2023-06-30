<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sous_categories extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Sous_categories';
	$this->data['url_list'] = "";
	// $this->load->model('Sous_categories_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$sql_principal = "SELECT sc.*,ct.* FROM gr_sous_categories AS sc JOIN gr_categories as ct On sc.id_categorie = ct.id_categorie ";

			$config[ 'base_url' ]      = base_url( 'gr/Sous_categories/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = count($this->My_model->get_query($sql_principal));

			$syle = $this->fdnb_library->pagination_style();
			$this->pagination->initialize(array_merge($config,$syle));
			$this->data[ 'listing' ] = true;
			
			//Champ order 
			$start = $this->uri->segment(4) > 0 ? $this->uri->segment(4):0;
			$order = $this->input->get('order')?$this->input->get('order'):"sc.id_sous_categorie";
			$sort = $this->input->get('sort') == 'DESC'?'ASC':"DESC";
			$sql_secondaire = $sql_principal . "ORDER BY $order $sort LIMIT ".$start.",".$config[ 'per_page' ];
			
			$this->data[ 'datas' ]   = $this->My_model->get_query($sql_secondaire);

			$this->form_validation->set_rules('id_categorie', 'Catégorie', 'required|numeric');
			$this->form_validation->set_rules('code_sous_categorie', 'Code', 'required');
			$this->form_validation->set_rules('nom_sous_categorie', 'Sous-catégorie', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_sous_categories',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La sous-catégorie '.$this->input->post('nom_sous_categorie').' a été enregistré avec succès</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">Erreur, enregistrement de la sous-catégorie '.$this->input->post('nom_sous_categorie').' a echoué.</div>');
				}
			redirect(base_url('gr/Sous_categories/add'));
			}
			$this->data['sort'] = $sort;
			$this->data['links'] = $this->pagination->create_links();
			$this->render_template('sous_categories/add', $this->data);			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_sous_categories',array('id_sous_categorie'=>$id))->row();
			$this->render_template('sous_categories/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_sous_categorie');

			$sql_principal = "SELECT sc.*,ct.* FROM gr_sous_categories AS sc JOIN gr_categories as ct On sc.id_categorie = ct.id_categorie ";

			$config[ 'base_url' ]      = base_url( 'gr/Sous_categories/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = count($this->My_model->get_query($sql_principal));

			$syle = $this->fdnb_library->pagination_style();
			$this->pagination->initialize(array_merge($config,$syle));
			$this->data[ 'listing' ] = true;
			
			//Champ order 
			$start = $this->uri->segment(4)?$this->uri->segment(4):0 ;
			$order = $this->input->get('order')?$this->input->get('order'):"sc.id_sous_categorie";
			$sort = $this->input->get('sort') == 'DESC'?'ASC':"DESC";
			$sql_secondaire = $sql_principal . "ORDER BY $order $sort LIMIT ".$start.",".$config[ 'per_page' ];
			
			$this->data['datas'] = $this->My_model->get_query($sql_secondaire);

			
			$this->form_validation->set_rules('id_categorie', 'Catégorie', 'required|numeric');
			$this->form_validation->set_rules('code_sous_categorie', 'Code', 'required');
			$this->form_validation->set_rules('nom_sous_categorie', 'Sous-catégorie', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_sous_categorie',$id);
				$insert = $this->db->update('gr_sous_categories',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La sous-catégorie '.$this->input->post('nom_sous_categorie').' a été mis a jou avec succès</div>');

				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">Erreur, mis a jour de la sous-catégorie '.$this->input->post('nom_sous_categorie').' a été echoué.</div>');
				}
				redirect(base_url('gr/Sous_categories/add'));
			}
			$this->data['sort'] = $sort;
			$this->data['links'] = $this->pagination->create_links();
			$this->data['data_un'] = $this->My_model->get_one('gr_sous_categories',['id_sous_categorie'=>$id]);
			$this->render_template('sous_categories/edit', $this->data);
		
		}

		public function delete($id){
			$sous_category = $this->My_model->get_one('gr_sous_categories',array('id_sous_categorie'=>$id));
			if($this->db->delete('gr_sous_categories',array('id_sous_categorie'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> La sous-catégorie '.$sous_category->nom_sous_categorie.' a été supprimée.</div>');
				redirect(base_url('gr/Sous_categories/add'));
			}
		}
}

			