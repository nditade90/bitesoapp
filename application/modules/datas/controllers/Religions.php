<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Religions extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Religions';
	$this->load->model('Religions_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Religions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_religions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_religion', 'DESC' )->get( 'gr_religions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('nom_religion', 'Nom_religion', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_religions',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> La religion '.$this->input->post('nom_religion').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la religion '.$this->input->post('nom_religion').' a échoué </div');
				}
			redirect(base_url('datas/Religions/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('religions/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_religions',array('id_religion'=>$id))->row();
			$this->data[ 'title' ] = 'AddReligions';
			$this->render_template('religions/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_religion');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Religions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_religions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_religion', 'DESC' )->get( 'gr_religions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_religions',array('id_religion'=>$id))->row();

			$this->form_validation->set_rules('nom_religion', 'Nom_religion', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_religion',$id);
					$insert = $this->db->update('gr_religions',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> La religion '.$this->input->post('nom_religion').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la religion '.$this->input->post('nom_religion').' a échoué </div');
					}
				redirect(base_url('datas/Religions/add'));
				}
			$this->render_template('religions/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_religions',array('id_religion'=>$id));

			if($this->db->delete('gr_religions',array('id_religion'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> La religion '.$data->nom_religion.' a été supprimée.</div>');
				redirect(base_url('datas/Religions/add'));
			}
		}
}

			