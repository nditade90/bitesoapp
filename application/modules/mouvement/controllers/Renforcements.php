<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Renforcements extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Renforcements';
		$this->data['js'] = base_url()."assets/js/pages/Renforcements.js";
		$this->data['url_list'] = "";

	}
		public function index(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Renforcements/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get('mv_renforcements')->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by('id_renforcement', 'DESC' )->get('mv_renforcements', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Dossiers penals';
			$this->data['sort'] = '';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('renforcements/index', $this->data);
		}
		

		public function add(){

			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_type_renforcement', 'Id_type_renforcement', 'required|numeric');
			$this->form_validation->set_rules('ref_renforcement', 'Ref_renforcement', 'required');
			$this->form_validation->set_rules('titre_obtenu', 'Titre_obtenu', 'required');
			$this->form_validation->set_rules('id_pays', 'Id_pays', 'required|numeric');
			$this->form_validation->set_rules('date_depart', 'Date_depart', 'required');
			$this->form_validation->set_rules('date_retour', 'Date_retour', 'required');
			$this->form_validation->set_rules('nb_jours', 'Nb_jours', 'required|numeric');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_renforcements',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Le renforcement a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement du renforcement a échoué </div');
				}
				redirect(base_url('mouvement/Renforcements/index'));

			}
			$this->data[ 'title' ] = 'Renforcements';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('renforcements/add', $this->data);

		}


		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_renforcement');
			$this->data['data'] = $this->db->get_where('mv_renforcements',array('id_renforcement'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_type_renforcement', 'Id_type_renforcement', 'required|numeric');
			$this->form_validation->set_rules('ref_renforcement', 'Ref_renforcement', 'required');
			$this->form_validation->set_rules('titre_obtenu', 'Titre_obtenu', 'required');
			$this->form_validation->set_rules('id_pays', 'Id_pays', 'required|numeric');
			$this->form_validation->set_rules('date_depart', 'Date_depart', 'required');
			$this->form_validation->set_rules('date_retour', 'Date_retour', 'required');
			$this->form_validation->set_rules('nb_jours', 'Nb_jours', 'required|numeric');

			if($this->form_validation->run()){
			$this->db->where('id_renforcement',$id);
					$insert = $this->db->update('mv_renforcements',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> Le renforcement a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour du renforcement a échoué </div');
					}
					redirect(base_url('mouvement/Renforcements/index'));

				}
			$this->data[ 'title' ] = 'Edit Renforcements';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('renforcements/edit', $this->data);
		
		}

		public function delete($id){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4);

			if($this->db->delete('mv_renforcements',array('id_renforcement'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> Le renforcement a été supprimé</div>');
				redirect(base_url('mouvement/Renforcements/index'));

			}
		}
}

			