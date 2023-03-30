<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_missions extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_missions';
	// $this->load->model('Types_missions_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_missions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_missions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_mission', 'DESC' )->get( 'mv_types_missions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('type_mission', 'Type_mission', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_missions',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Un type de mission '.$this->input->post('type_mission').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement d\'un type de mission '.$this->input->post('type_mission').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_missions/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_missions/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_missions',array('id_type_mission'=>$id))->row();
			$this->data[ 'title' ] = "Détail de type de mission: ".$this->data['data']->type_mission;
			$this->render_template('types_missions/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_mission');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_missions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_missions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_mission', 'DESC' )->get( 'mv_types_missions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_missions',array('id_type_mission'=>$id))->row();

			$this->form_validation->set_rules('type_mission', 'Type_mission', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_mission',$id);
					$insert = $this->db->update('mv_types_missions',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Un type de mission '.$this->input->post('type_mission').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour d\'Un type de mission '.$this->input->post('type_mission').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_missions/add'));
				}
			$this->render_template('types_missions/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_missions',array('id_type_mission'=>$id));

			if($this->db->delete('mv_types_missions',array('id_type_mission'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Un type de mission '.$data->type_mission.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_missions/add'));
			}
		}
}

			