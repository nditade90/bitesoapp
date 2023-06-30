<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Grades extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Grades';
	$this->data['url_list'] = "";
	// $this->load->model('Grades_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Grades/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_grades' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_grade', 'DESC' )->get( 'gr_grades', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_grade', 'Code_grade', 'required');
			$this->form_validation->set_rules('nom_grade', 'Nom_grade', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_grades',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le grade '.$this->input->post('nom_grade').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du '.$this->input->post('nom_grade').' a échoué </div');
				}
			redirect(base_url('gr/Grades/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('grades/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_grades',array('id_grade'=>$id))->row();
			$this->data[ 'title' ] = 'AddGrades';
			$this->render_template('grades/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_grade');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Grades/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_grades' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_grade', 'DESC' )->get( 'gr_grades', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_grades',array('id_grade'=>$id))->row();

			$this->form_validation->set_rules('code_grade', 'Code_grade', 'required');
			$this->form_validation->set_rules('nom_grade', 'Nom_grade', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_grade',$id);
					$insert = $this->db->update('gr_grades',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Le grade '.$this->input->post('nom_grade').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du grade '.$this->input->post('nom_grade').' a échoué </div');
					}
				redirect(base_url('gr/Grades/add'));
				}
			$this->render_template('grades/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_grades',array('id_grade'=>$id));

			if($this->db->delete('gr_grades',array('id_grade'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Le grade '.$data->nom_grade.' a été supprimée.</div>');
				redirect(base_url('gr/Grades/add'));
			}
		}
}

			