<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sorties_service extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Sorties_service';
	}

		public function index(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Sorties_service/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get( 'mv_sorties_service' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by( 'id_sortie', 'DESC' )->get( 'mv_sorties_service', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Sorties_service';
			$this->data['sort'] = '';
			$this->render_template('sorties_service/index', $this->data);

		}

		public function add(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('lieu_sortie', 'Lieu_sortie', 'required');
			$this->form_validation->set_rules('date_rappel_arme_debut', 'Date_rappel_arme_debut', 'required');
			$this->form_validation->set_rules('date_rappel_arme_fin', 'Date_rappel_arme_fin', 'required');
			$this->form_validation->set_rules('date_sortie', 'Date_sortie', 'required');
			$this->form_validation->set_rules('id_genre_sortie', 'Id_genre_sortie', 'required|numeric');
			$this->form_validation->set_rules('ref_sortie', 'Ref_sortie', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_sorties_service',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La sortie de service a été a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour la sortie de service a échoué </div');
				}
			redirect(base_url('mouvement/Sorties_service/index'));
			}
			$this->data[ 'title' ] = 'Sorties_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('sorties_service/add', $this->data);

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_sorties_service',array('id_sortie'=>$id))->row();
			$this->data[ 'title' ] = 'AddSorties_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('sorties_service/view', $this->data);
		}

		public function edit(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
			$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_sortie');
			$this->data['data'] = $this->db->get_where('mv_sorties_service',array('id_sortie'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('lieu_sortie', 'Lieu_sortie', 'required');
			$this->form_validation->set_rules('date_rappel_arme_debut', 'Date_rappel_arme_debut', 'required');
			$this->form_validation->set_rules('date_rappel_arme_fin', 'Date_rappel_arme_fin', 'required');
			$this->form_validation->set_rules('date_sortie', 'Date_sortie', 'required');
			$this->form_validation->set_rules('id_genre_sortie', 'Id_genre_sortie', 'required|numeric');
			$this->form_validation->set_rules('ref_sortie', 'Ref_sortie', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_sortie',$id);
					$insert = $this->db->update('mv_sorties_service',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success">La sortie de service a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour la sortie de service a échoué </div');
					}
				redirect(base_url('mouvement/Sorties_service/index'));
				}
			$this->data[ 'title' ] = 'Edit Sorties_service';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('sorties_service/edit', $this->data);
		
		}

		public function delete($id){
			if($this->db->delete('mv_sorties_service',array('id_sortie'=>$id))){
				$this->session->set_flashdata('msg',"<div class='text-success'>La sortie de service a été supprimée</div>");
				redirect(base_url('mouvement/Sorties_service/index'));
			}
		}
}

			