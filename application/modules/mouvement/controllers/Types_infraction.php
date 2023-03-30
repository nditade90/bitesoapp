<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_infraction extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_infraction';
	// $this->load->model('Types_infraction_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_infraction/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_infraction' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_infraction', 'DESC' )->get( 'mv_types_infraction', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_infraction', 'Code_infraction', 'required');
			$this->form_validation->set_rules('nom_infraction', 'Nom_infraction', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_infraction',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Un type d\'infraction'.$this->input->post('nom_infraction').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'un type d\'infraction '.$this->input->post('nom_infraction').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_infraction/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_infraction/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_infraction',array('id_type_infraction'=>$id))->row();
			$this->data[ 'title' ] = "Détail de type d'infraction: ".$this->data['data']->nom_infraction;
			$this->render_template('types_infraction/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_infraction');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_infraction/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_infraction' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_infraction', 'DESC' )->get( 'mv_types_infraction', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_infraction',array('id_type_infraction'=>$id))->row();

			$this->form_validation->set_rules('code_infraction', 'Code_infraction', 'required');
			$this->form_validation->set_rules('nom_infraction', 'Nom_infraction', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_infraction',$id);
					$insert = $this->db->update('mv_types_infraction',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Un type d\'infraction '.$this->input->post('nom_infraction').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'un type d\'infraction '.$this->input->post('nom_infraction').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_infraction/add'));
				}
			$this->render_template('types_infraction/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_infraction',array('id_type_infraction'=>$id));

			if($this->db->delete('mv_types_infraction',array('id_type_infraction'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Un type d\'infraction '.$data->nom_infraction.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_infraction/add'));
			}
		}
}

			