<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Services';
	$this->data['url_list'] = "";
	// $this->load->model('Services_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Services/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_services' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_service', 'DESC' )->get( 'gr_services', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_service', 'Code_service', 'required');
			$this->form_validation->set_rules('nom_service', 'Nom_service', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_services',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le service '.$this->input->post('nom_service').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du service '.$this->input->post('nom_service').' a échoué </div');
				}
			redirect(base_url('gr/Services/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('services/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_services',array('id_service'=>$id))->row();
			$this->data[ 'title' ] = 'AddServices';
			$this->render_template('services/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_service');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Services/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_services' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_service', 'DESC' )->get( 'gr_services', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_services',array('id_service'=>$id))->row();

			$this->form_validation->set_rules('code_service', 'Code_service', 'required');
			$this->form_validation->set_rules('nom_service', 'Nom_service', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_service',$id);
					$insert = $this->db->update('gr_services',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">Le service '.$this->input->post('nom_service').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du service '.$this->input->post('nom_service').' a échoué </div');
					}
				redirect(base_url('gr/Services/add'));
				}
			$this->render_template('services/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_services',array('id_service'=>$id));

			if($this->db->delete('gr_services',array('id_service'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Le service '.$data->nom_service.' a été supprimée.</div>');
				redirect(base_url('gr/Services/add'));
			}
		}
}

			