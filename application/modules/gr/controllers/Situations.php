<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Situations extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Situations';
	// $this->load->model('Situations_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Situations/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_situations' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_situation', 'DESC' )->get( 'gr_situations', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('nom_situation', 'Nom_situation', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_situations',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La situation '.$this->input->post('nom_situation').' a été enregistré succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la situation '.$this->input->post('nom_situation').'  a échoué </div');
				}
			redirect(base_url('gr/Situations/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('situations/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_situations',array('id_situation'=>$id))->row();
			$this->data[ 'title' ] = 'AddSituations';
			$this->render_template('situations/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_situation');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Situations/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_situations' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_situation', 'DESC' )->get( 'gr_situations', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_situations',array('id_situation'=>$id))->row();

			$this->form_validation->set_rules('nom_situation', 'Nom_situation', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_situation',$id);
					$insert = $this->db->update('gr_situations',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La situation '.$this->input->post('nom_situation').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la '.$this->input->post('nom_situation').' a échoué </div');
					}
				redirect(base_url('gr/Situations/add'));
				}
			$this->render_template('situations/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_situations',array('id_situation'=>$id));

			if($this->db->delete('gr_situations',array('id_situation'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">La situation :'.$data->nom_situation.' a été supprimée.</div>');
				redirect(base_url('gr/Situations/add'));
			}
		}
}

			