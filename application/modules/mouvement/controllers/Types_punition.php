<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_punition extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_punition';
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_punition/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_punition' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_punition', 'DESC' )->get( 'mv_types_punition', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code_type_punition', 'Code_type_punition', 'required');
			$this->form_validation->set_rules('nom_type_punition', 'Nom_type_punition', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_punition',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Un type de punition '.$this->input->post('nom_type_punition').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'un type de punition '.$this->input->post('nom_type_punition').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_punition/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_punition/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_punition',array('id_type_punition'=>$id))->row();
			$this->data[ 'title' ] = "Détail d'un type de punition: ".$this->data['data']->nom_type_punition;
			$this->render_template('types_punition/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_punition');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_punition/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_punition' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_punition', 'DESC' )->get( 'mv_types_punition', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_punition',array('id_type_punition'=>$id))->row();

			$this->form_validation->set_rules('code_type_punition', 'Code_type_punition', 'required');
			$this->form_validation->set_rules('nom_type_punition', 'Nom_type_punition', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_punition',$id);
					$insert = $this->db->update('mv_types_punition',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Un type de punition '.$this->input->post('nom_type_punition').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'Un type de punition '.$this->input->post('nom_type_punition').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_punition/add'));
				}
			$this->render_template('types_punition/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_punition',array('id_type_punition'=>$id));

			if($this->db->delete('mv_types_punition',array('id_type_punition'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Un type de punition '.$data->nom_type_punition.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_punition/add'));
			}
		}
}			