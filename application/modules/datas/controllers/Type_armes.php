<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Type_armes extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Type_armes';
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Type_armes/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_type_armes' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id', 'DESC' )->get( 'gr_type_armes', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('code', 'Code', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_type_armes',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le type d\'arme a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du type d\'arme a échoué </div');
				}
			redirect(base_url('datas/Type_armes/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('type_armes/add', $this->data);
			

		}

		
		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'datas/Type_armes/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_type_armes' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id', 'DESC' )->get( 'gr_type_armes', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_type_armes',array('id'=>$id))->row();

			$this->form_validation->set_rules('code', 'Code', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');

			if($this->form_validation->run()){
			$this->db->where('id',$id);
					$insert = $this->db->update('gr_type_armes',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le type d\'arme a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du type d\'arme a échoué </div');
					}
				redirect(base_url('datas/Type_armes/add'));
				}
			$this->render_template('type_armes/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_type_armes',array('id'=>$id));

			if($this->db->delete('gr_type_armes',array('id'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Le type d\'arme a été supprimée.</div>');
				redirect(base_url('datas/Type_armes/add'));
			}
		}
}

			