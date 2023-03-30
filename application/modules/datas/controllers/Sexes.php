<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sexes extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Sexes';
	$this->load->model('Sexes_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Sexes/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_sexes' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_sexe', 'DESC' )->get( 'gr_sexes', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code_sexe', 'Code_sexe', 'required');
			$this->form_validation->set_rules('nom_sexe', 'Nom_sexe', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_sexes',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg',"<div class='text-success'>La sexe : ".$this->input->post('nom_sexe')." a été mis a jour avec succès.</div>");
				}else{
					$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour du sexe ".$this->input->post('nom_sexe')." a échoué </div");
				}
			redirect(base_url('datas/Sexes/add'));
			}
			$this->render_template('sexes/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_sexes',array('id_sexe'=>$id))->row();
			$this->data[ 'title' ] = 'AddSexes';
			$this->render_template('sexes/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_sexe');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Sexes/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_sexes' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_sexe', 'DESC' )->get( 'gr_sexes', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_sexes',array('id_sexe'=>$id))->row();

			$this->form_validation->set_rules('code_sexe', 'Code_sexe', 'required');
			$this->form_validation->set_rules('nom_sexe', 'Nom_sexe', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_sexe',$id);
					$insert = $this->db->update('gr_sexes',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg',"<div class='text-success'>La sexe : ".$this->input->post('nom_sexe')." a été mis a jour avec succès.</div>");
					}else{
						$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour du sexe ".$this->input->post('nom_sexe')." a échoué </div");
					}
				redirect(base_url('datas/Sexes/add'));
				}
			$this->data[ 'title' ] = 'Edit Sexes';
			$this->render_template('sexes/edit', $this->data);
		
		}

		public function delete($id){
			$sexe = $this->My_model->get_one('gr_sexes',array('id_sexe'=>$id));
			if($this->db->delete('gr_sexes',array('id_sexe'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Sexe : '.$sexe->nom_sexe.' a été supprimée.</div>');
				redirect(base_url('datas/Sexes/add'));
			}
		}
}

			