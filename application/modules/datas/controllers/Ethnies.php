<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ethnies extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Ethnies';
	$this->load->model('Ethnies_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Ethnies/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_ethnies' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_ethnie', 'DESC' )->get( 'gr_ethnies', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_ethnie', 'Code_ethnie', 'required');
			$this->form_validation->set_rules('nom_ethnie', 'Nom_ethnie', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_ethnies',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg',"<div class='text-success'>L'éthinie ".$this->input->post('nom_ethnie')." a été enregistrée avec succès.</div>");
				}else{
					$this->session->set_flashdata('msg',"<div class='text-danger'>L'enregistrement de l'éthinie ".$this->input->post('nom_ethnie')." a échoué </div");
				}
			redirect(base_url('datas/Ethnies/add'));
			}
			$this->render_template('ethnies/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_ethnies',array('id_ethnie'=>$id))->row();
			$this->render_template('ethnies/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_ethnie');
			
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url('datas/Ethnies/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get('gr_ethnies')->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by('id_ethnie', 'DESC' )->get('gr_ethnies', $config[ 'per_page' ],$this->uri->segment(4))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_ethnies',array('id_ethnie'=>$id))->row();

			$this->form_validation->set_rules('code_ethnie', 'Code', 'required');
			$this->form_validation->set_rules('nom_ethnie', 'Ethnie', 'required');

			if($this->form_validation->run()){
				
				$this->db->where('id_ethnie',$id);
				$insert = $this->db->update('gr_ethnies',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg',"<div class='text-success'>L'éthinie ".$this->input->post('nom_ethnie')." a été mis a jour avec succès.</div>");
				}else{
					$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour de l'éthinie ".$this->input->post('nom_ethnie')." a échoué </div");
				}
			redirect(base_url('datas/Ethnies/add'));
			}
			$this->render_template('ethnies/edit', $this->data);
		
		}

		public function delete($id){
			$ethnie = $this->My_model->get_one('gr_ethnies',array('id_ethnie'=>$id));

			if($this->db->delete('gr_ethnies',array('id_ethnie'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> L\'éthnie '.$ethnie->nom_ethnie.' a été supprimée.</div>');
				redirect(base_url('datas/Ethnies/add'));
			}
		}
}

			