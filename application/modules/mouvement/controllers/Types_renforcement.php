<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Types_renforcement extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Types_renforcement';
	// $this->load->model('Types_renforcement_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_renforcement/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_renforcement' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_renforcement', 'DESC' )->get( 'mv_types_renforcement', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('type_renforcement', 'Type_renforcement', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_types_renforcement',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le type de renforcement : '.$this->input->post('type_renforcement').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du  type de renforcement '.$this->input->post('type_renforcement').' a échoué </div');
				}
			redirect(base_url('mouvement/Types_renforcement/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('types_renforcement/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_types_renforcement',array('id_type_renforcement'=>$id))->row();
			$this->data[ 'title' ] = "Détail d'un type de renforcement: ".$this->data['data']->type_renforcement;
			$this->render_template('types_renforcement/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_type_renforcement');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Types_renforcement/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_types_renforcement' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_type_renforcement', 'DESC' )->get( 'mv_types_renforcement', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('mv_types_renforcement',array('id_type_renforcement'=>$id))->row();

			$this->form_validation->set_rules('type_renforcement', 'Type_renforcement', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_type_renforcement',$id);
					$insert = $this->db->update('mv_types_renforcement',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le type de renforcement : '.$this->input->post('type_renforcement').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type de renforcement : '.$this->input->post('type_renforcement').' a échoué </div');
					}
				redirect(base_url('mouvement/Types_renforcement/add'));
				}
			$this->render_template('types_renforcement/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('mv_types_renforcement',array('id_type_renforcement'=>$id));

			if($this->db->delete('mv_types_renforcement',array('id_type_renforcement'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Le type de renforcement '.$data->type_renforcement.' a été supprimée.</div>');
				redirect(base_url('mouvement/Types_renforcement/add'));
			}
		}
}

			