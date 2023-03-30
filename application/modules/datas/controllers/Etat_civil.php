<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Etat_civil extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Etat_civil';
	$this->load->model('Etat_civil_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Etat_civil/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_etat_civil' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_etat_civil', 'DESC' )->get( 'gr_etat_civil', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('nom_etat_civil', 'Nom_etat_civil', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_etat_civil',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg',"<div class='text-success'>L'état civil : ".$this->input->post('nom_etat_civil')." a été mis a jour avec succès.</div>");
				}else{
					$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour du l\'état civil ".$this->input->post('nom_etat_civil')." a échoué </div");
				}
			redirect(base_url('datas/Etat_civil/add'));
			}
				$this->data[ 'title' ] = 'Add Etat_civil';
			$this->render_template('etat_civil/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_etat_civil',array('id_etat_civil'=>$id))->row();
			$this->render_template('etat_civil/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_etat_civil');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Etat_civil/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_etat_civil' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_etat_civil', 'DESC' )->get( 'gr_etat_civil', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_etat_civil',array('id_etat_civil'=>$id))->row();

			$this->form_validation->set_rules('nom_etat_civil', 'Nom_etat_civil', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_etat_civil',$id);
					$insert = $this->db->update('gr_etat_civil',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg',"<div class='text-success'>L'état civil : ".$this->input->post('nom_etat_civil')." a été mis a jour avec succès.</div>");
					}else{
						$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour du l\'état civil ".$this->input->post('nom_etat_civil')." a échoué </div");
					}
				redirect(base_url('datas/Etat_civil/add'));
				}
			$this->data[ 'title' ] = 'Edit Etat_civil';
			$this->render_template('etat_civil/edit', $this->data);
		
		}

		public function delete($id){
			$etat = $this->My_model->get_one('gr_etat_civil',array('id_etat_civil'=>$id));

			if($this->db->delete('gr_etat_civil',array('id_etat_civil'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> L\'état civil: '.$etat->nom_etat_civil.' a été supprimée.</div>');
				redirect(base_url('datas/Etat_civil/add'));
			}
		}
}

			