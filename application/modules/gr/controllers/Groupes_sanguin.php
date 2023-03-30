<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Groupes_sanguin extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Groupes_sanguin';
	// $this->load->model('Groupes_sanguin_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Groupes_sanguin/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_groupes_sanguin' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_gpe_sanguin', 'DESC' )->get( 'gr_groupes_sanguin', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			
			$this->form_validation->set_rules('nom_gpe_sanguin', 'Nom_gpe_sanguin', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_groupes_sanguin',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">Le groupe sanguin '.$this->input->post('nom_gpe_sanguin').' a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du groupe sanguin'.$this->input->post('nom_gpe_sanguin').' a échoué </div');
				}
			redirect(base_url('gr/Groupes_sanguin/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('groupes_sanguin/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_groupes_sanguin',array('id_gpe_sanguin'=>$id))->row();
			$this->data[ 'title' ] = 'AddGroupes_sanguin';
			$this->render_template('groupes_sanguin/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_gpe_sanguin');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Groupes_sanguin/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_groupes_sanguin' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_gpe_sanguin', 'DESC' )->get( 'gr_groupes_sanguin', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_groupes_sanguin',array('id_gpe_sanguin'=>$id))->row();

			$this->form_validation->set_rules('nom_gpe_sanguin', 'Nom_gpe_sanguin', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_gpe_sanguin',$id);
					$insert = $this->db->update('gr_groupes_sanguin',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le groupe sanguin '.$this->input->post('nom_gpe_sanguin').' a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du groupe sanguin '.$this->input->post('nom_gpe_sanguin').' a échoué </div');
					}
				redirect(base_url('gr/Groupes_sanguin/add'));
				}
			$this->render_template('groupes_sanguin/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_groupes_sanguin',array('id_gpe_sanguin'=>$id));

			if($this->db->delete('gr_groupes_sanguin',array('id_gpe_sanguin'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">Le groupe sanguin '.$data->nom_gpe_sanguin.' a été supprimée.</div>');
				redirect(base_url('gr/Groupes_sanguin/add'));
			}
		}
}

			