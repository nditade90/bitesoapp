<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cotations extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Cotations';
		$this->data['url_list'] = "";
	}

	public function index(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$this->load->library( 'pagination' );
		$config[ 'base_url' ]      = base_url( 'mouvement/Cotations/index' );
		$config[ 'per_page' ]      = 10;
		$config[ 'num_links' ]     = 2;
		$config[ 'total_rows' ] = $this->db->get( 'mv_cotations' )->num_rows();
		$this->pagination->initialize( $config );
		$this->data[ 'listing' ] = true;
		$this->data[ 'datas' ]   = $this->db->order_by( 'id_cotation', 'DESC' )->get( 'mv_cotations', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
		$this->data[ 'title' ] = 'Cotations';
		$this->data['sort'] = '';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('cotations/index', $this->data);

	}

	public function add(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');
		
		$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		$this->form_validation->set_rules('id_type_cote', 'Id_type_cote', 'required|numeric');
		$this->form_validation->set_rules('code', 'Code', 'required');
		$this->form_validation->set_rules('annee', 'Annee', 'required|numeric');
		$this->form_validation->set_rules('points1', 'Points1', 'required');
		$this->form_validation->set_rules('points2', 'Points2', 'required');
		$this->form_validation->set_rules('note_obtenue', 'Note_obtenue', 'required');

		if($this->form_validation->run()){

			$insert = $this->db->insert('mv_cotations',$this->input->post());
			if(!empty($insert)){
				$this->session->set_flashdata('msg','<div class="text-success"> La cotation '.get_db_value("mv_types_cote","type_cote",array("id_type_cote",$this->input->post('id_type_cote'))).' a été mis a jour avec succès.</div>');
			}else{
				$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la '.get_db_value("mv_types_cote","type_cote",array("id_type_cote",$this->input->post('id_type_cote'))).' a échoué </div');
			}
			redirect(base_url('mouvement/Cotations/index'));
		}
		$this->data[ 'title' ] = 'Ajouter une cotation';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('cotations/add', $this->data);		
	}

	public function edit(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_cotation');
		$this->data['data'] = $this->db->get_where('mv_cotations',array('id_cotation'=>$id))->row();

		$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		$this->form_validation->set_rules('id_type_cote', 'Id_type_cote', 'required|numeric');
		$this->form_validation->set_rules('code', 'Code', 'required');
		$this->form_validation->set_rules('annee', 'Annee', 'required|numeric');
		$this->form_validation->set_rules('points1', 'Points1', 'required');
		$this->form_validation->set_rules('points2', 'Points2', 'required');
		$this->form_validation->set_rules('note_obtenue', 'Note_obtenue', 'required');

		if($this->form_validation->run()){
		$this->db->where('id_cotation',$id);
				$insert = $this->db->update('mv_cotations',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success">La mis a jour de la cotation '.get_db_value("mv_types_cote","type_cote",array("id_type_cote",$this->input->post('id_type_cote'))).' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la cotation '.get_db_value("mv_types_cote","type_cote",array("id_type_cote",$this->input->post('id_type_cote'))).' a échoué </div');
				}
				redirect(base_url('mouvement/Cotations/index'));

			}
		$this->data[ 'title' ] = 'Editer une cotation';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('cotations/edit', $this->data);
	
	}

	public function delete(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$id = $this->uri->segment(4);
		$identification = get_db_occurency('gr_fiche_identification',  ['id_identification',$id_identification]);

		if($this->db->delete('mv_cotations',array('id_cotation'=>$id))){
			$this->session->set_flashdata('msg','<div class="text-success">La cotation '.get_db_value("mv_types_cote","type_cote",array("id_type_cote",$id)).' a été supprimé.</div>');
			redirect(base_url('mouvement/Cotations/index/'));

		}
	}
}

			