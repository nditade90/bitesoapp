<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Formations_stages extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Formations_stages';
	$this->data['js'] = base_url()."assets/js/pages/Formations_stages.js";
	}

		public function index(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Formations_stages/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->get( 'mv_formations_stages' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->order_by( 'id_formation_stage', 'DESC' )->get( 'mv_formations_stages', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Formations & stages';
			$this->data['sort'] = '';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('formations_stages/index', $this->data);

		}

		public function add(){

			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
		
			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_stage', 'Id_stage', 'required|numeric');
			$this->form_validation->set_rules('id_specialite', 'Id_specialite', 'required|numeric');
			$this->form_validation->set_rules('titre_obtenu', 'Titre_obtenu', 'required');
			$this->form_validation->set_rules('id_pays', 'Id_pays', 'required|numeric');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('nb_mois', 'Nb_mois', 'required|numeric');
			$this->form_validation->set_rules('montant_prime', 'Montant_prime', 'required');
			$this->form_validation->set_rules('ref_stage', 'Ref_stage', 'required');
			$this->form_validation->set_rules('note_obtenue', 'Note_obtenue', 'required');
			$this->form_validation->set_rules('date_specialite', 'Date_specialite', 'required');
			$this->form_validation->set_rules('ref_specialite', 'Ref_specialite', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_formations_stages',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> La formation/stage a été enregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la formation/stage a échoué </div');
				}
				redirect(base_url('mouvement/Formations_stages/index/'));
			}
			$this->data[ 'title' ] = 'Formations_stages';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('formations_stages/add', $this->data);

		}

		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_formation_stage');
			$this->data['data'] = $this->db->get_where('mv_formations_stages',array('id_formation_stage'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_stage', 'Id_stage', 'required|numeric');
			$this->form_validation->set_rules('id_specialite', 'Id_specialite', 'required|numeric');
			$this->form_validation->set_rules('titre_obtenu', 'Titre_obtenu', 'required');
			$this->form_validation->set_rules('id_pays', 'Id_pays', 'required|numeric');
			$this->form_validation->set_rules('date_debut', 'Date_debut', 'required');
			$this->form_validation->set_rules('date_fin', 'Date_fin', 'required');
			$this->form_validation->set_rules('nb_mois', 'Nb_mois', 'required|numeric');
			$this->form_validation->set_rules('montant_prime', 'Montant_prime', 'required');
			$this->form_validation->set_rules('ref_stage', 'Ref_stage', 'required');
			$this->form_validation->set_rules('note_obtenue', 'Note_obtenue', 'required');
			$this->form_validation->set_rules('date_specialite', 'Date_specialite', 'required');
			$this->form_validation->set_rules('ref_specialite', 'Ref_specialite', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_formation_stage',$id);
					$insert = $this->db->update('mv_formations_stages',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> La formation/stage a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mise a jour formation/stage a échoué </div');
					}
					redirect(base_url('mouvement/Formations_stages/index/'));
				}
			$this->data[ 'title' ] = 'Edit Formations_stages';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('formations_stages/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$id = $this->uri->segment(4);

			if($this->db->delete('mv_formations_stages',array('id_formation_stage'=>$id))){
				$this->session->set_flashdata('msg','<div class="text-success"> La formation/stage a été enregistré</div>');
				redirect(base_url('mouvement/Formations_stages/index/'));
			}
		}
}

			