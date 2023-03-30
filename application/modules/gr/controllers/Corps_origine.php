<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Corps_origine extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Corps_origine';
	// $this->load->model('Corps_origine_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Corps_origine/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_corps_origine' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_corps_origine', 'DESC' )->get( 'gr_corps_origine', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('code_corps_origine', 'Code_corps_origine', 'required');
			$this->form_validation->set_rules('nom_corps_origine', 'nom_corps_origine', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_corps_origine',$_POST);

				if(!empty($insert)){
					$this->session->set_flashdata('msg',"<div class='text-success'>Le corps d'origine : ".$this->input->post('nom_corps_origine')." a été mis a jour avec succès.</div>");
				}else{
					$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour du corps d'origine ".$this->input->post('nom_corps_origine')." a échoué </div");
				}
			redirect(base_url('gr/Corps_origine/add'));
			}
			$this->render_template('corps_origine/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_corps_origine',array('id_corps_origine'=>$id))->row();
			$this->render_template('corps_origine/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_corps_origine');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Corps_origine/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_corps_origine' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_corps_origine', 'DESC' )->get( 'gr_corps_origine', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_corps_origine',array('id_corps_origine'=>$id))->row();

			$this->form_validation->set_rules('code_corps_origine', 'Code_corps_origine', 'required');
			$this->form_validation->set_rules('nom_corps_origine', 'nom_corps_origine', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_corps_origine',$id);
					$insert = $this->db->update('gr_corps_origine',$_POST);

					if(!empty($insert)){
						$this->session->set_flashdata('msg',"<div class='text-success'>Le corps d'origine : ".$this->input->post('nom_corps_origine')." a été mis a jour avec succès.</div>");
					}else{
						$this->session->set_flashdata('msg',"<div class='text-danger'>La mis a jour du corps d'origine ".$this->input->post('nom_corps_origine')." a échoué </div");
					}
				redirect(base_url('gr/Corps_origine/add'));
				}
			$this->render_template('corps_origine/edit', $this->data);
		
		}

		public function delete($id){
			$corps = $this->My_model->get_one('gr_corps_origine',array('id_corps_origine'=>$id));
			if($this->db->delete('gr_corps_origine',array('id_corps_origine'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Le corps d\'origine : : '.$corps->nom_corps_origine.' a été supprimée.</div>');
				redirect(base_url('gr/Corps_origine/add'));
			}
		}
}

			