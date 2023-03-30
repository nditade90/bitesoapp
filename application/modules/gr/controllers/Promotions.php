<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Promotions extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Promotions';
	// $this->load->model('Promotions_model');
	}
	public function index(){
		$this->add();
	}

		public function add(){
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Promotions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_promotions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_promotion', 'DESC' )->get( 'gr_promotions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';			$this->form_validation->set_rules('nom_promotion', 'Nom_promotion', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_promotions',$this->input->post());
				
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La promotion '.$this->input->post('nom_promotion').' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la promotion '.$this->input->post('nom_promotion').'  a échoué </div');
				}
			redirect(base_url('gr/Promotions/add'));
			}
				$this->data[ 'title' ] = 'Enregister';
			$this->render_template('promotions/add', $this->data);
			

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_promotions',array('id_promotion'=>$id))->row();
			$this->data[ 'title' ] = 'AddPromotions';
			$this->render_template('promotions/view', $this->data);
		}

		public function edit(){
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_promotion');
			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'gr/Promotions/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'gr_promotions' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_promotion', 'DESC' )->get( 'gr_promotions', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data['sort'] = '';
			$this->data['data'] = $this->db->get_where('gr_promotions',array('id_promotion'=>$id))->row();

			$this->form_validation->set_rules('nom_promotion', 'Promotion', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_promotion',$id);
					$insert = $this->db->update('gr_promotions',$this->input->post());


					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La promotion '.$this->input->post('nom_promotion').'a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la promotion '.$this->input->post('nom_promotion').'  a échoué </div');
					}
				redirect(base_url('gr/Promotions/add'));
				}
			$this->render_template('promotions/edit', $this->data);
		
		}

		public function delete($id){
			$data = $this->My_model->get_one('gr_promotions',array('id_promotion'=>$id));

			if($this->db->delete('gr_promotions',array('id_promotion'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success">La promotion '.$data->nom_promotion.' a été supprimée.</div>');
				redirect(base_url('gr/Promotions/add'));
			}
		}
}

			