<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Historique_grades extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Historique_grades';
	$this->load->model('Historique_grades_model');
	}

		public function index(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Historique_grades/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_historique_grades' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_identification', 'DESC' )->get( 'gr_historique_grades', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Historique_grades';
			$this->data['sort'] = '';
			$this->render_template('historique_grades/index', $this->data);

		}

		public function add(){

		$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');			$this->form_validation->set_rules('date_grade', 'Date_grade', 'required');
			$this->form_validation->set_rules('ref_avancement', 'Ref_avancement', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_historique_grades',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> '.$this->input->post().' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour '.$this->input->post().' a échoué </div');
				}
			redirect(base_url('gr/Historique_grades/index'));
			}
			$this->data[ 'title' ] = 'Historique_grades';
			$this->render_template('historique_grades/add', $this->data);

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_historique_grades',array('id_identification'=>$id))->row();
			$this->data[ 'title' ] = 'AddHistorique_grades';
			$this->render_template('historique_grades/view', $this->data);
		}

		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_identification');
			$this->data['data'] = $this->db->get_where('gr_historique_grades',array('id_identification'=>$id))->row();

			$this->form_validation->set_rules('date_grade', 'Date_grade', 'required');
			$this->form_validation->set_rules('ref_avancement', 'Ref_avancement', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_identification',$id);
					$insert = $this->db->update('gr_historique_grades',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> '.$this->input->post().' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour '.$this->input->post().' a échoué </div');
					}
				redirect(base_url('gr/Historique_grades/index'));
				}
			$this->data[ 'title' ] = 'Edit Historique_grades';
			$this->render_template('historique_grades/edit', $this->data);
		
		}

		public function delete($id){
			if($this->db->delete('gr_historique_grades',array('id_identification'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Historique_grades/index'));
			}
		}
}

			