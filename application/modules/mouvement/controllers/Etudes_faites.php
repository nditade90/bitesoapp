<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Etudes_faites extends Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Etudes_faites';
		// $this->load->model('Etudes_faites_model');
		$this->data['url_list'] = "";
	}

	public function index(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$this->load->library( 'pagination' );
		$config[ 'base_url' ]      = base_url( 'mouvement/Etudes_faites/index' );
		$config[ 'per_page' ]      = 10;
		$config[ 'num_links' ]     = 2;
		$config[ 'total_rows' ] = $this->db->get( 'mv_etudes_faites' )->num_rows();
		$this->pagination->initialize( $config );
		$this->data[ 'listing' ] = true;
		$this->data[ 'datas' ]   = $this->db->order_by( 'id_etudes', 'DESC' )->get( 'mv_etudes_faites', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
		$this->data[ 'title' ] = 'Etudes faites';
		$this->data['sort'] = '';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('etudes_faites/index', $this->data);

	}
	
	public function add(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		$this->form_validation->set_rules('id_type_etudes', 'Id_type_etudes', 'required|numeric');
		$this->form_validation->set_rules('etablissement', 'Etablissement', 'required');
		$this->form_validation->set_rules('periode_etude', 'Periode_etude', 'required');
		$this->form_validation->set_rules('ref_equivalence', 'Ref_equivalence', 'required');
		$this->form_validation->set_rules('note_obtenue', 'Note_obtenue', 'required');
		$this->form_validation->set_rules('date_obtention', 'Date_obtention', 'required');
		$this->form_validation->set_rules('id_pays', 'Id_pays', 'required|numeric');
		$this->form_validation->set_rules('note', 'Note', 'required');

		if($this->form_validation->run()){

			$insert = $this->db->insert('mv_etudes_faites',$this->input->post());
			if(!empty($insert)){
				$this->session->set_flashdata('msg','<div class="text-success"> Le niveau d\'etude '.get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$this->input->post('id_type_etudes'))).' a été mis a jour avec succès.</div>');
			}else{
				$this->session->set_flashdata('msg','<div class="text-danger">Le niveau d\'etude '.get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$this->input->post('id_type_etudes'))).' a échoué </div');
			}
		redirect(base_url('mouvement/Etudes_faites/index'));
		}
		$this->data[ 'title' ] = 'Etudes_faites';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('etudes_faites/add', $this->data);

	}

	public function edit(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$id = $this->uri->segment(4) > 0 ? $this->uri->segment(4) : $this->input->post('id_etudes');
		$this->data['data'] = $this->db->get_where('mv_etudes_faites',array('id_etudes'=>$id))->row();

		$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
		$this->form_validation->set_rules('id_type_etudes', 'Id_type_etudes', 'required|numeric');
		$this->form_validation->set_rules('etablissement', 'Etablissement', 'required');
		$this->form_validation->set_rules('periode_etude', 'Periode_etude', 'required');
		$this->form_validation->set_rules('ref_equivalence', 'Ref_equivalence', 'required');
		$this->form_validation->set_rules('note_obtenue', 'Note_obtenue', 'required');
		$this->form_validation->set_rules('date_obtention', 'Date_obtention', 'required');
		$this->form_validation->set_rules('id_pays', 'Id_pays', 'required|numeric');

		if($this->form_validation->run()){
		$this->db->where('id_etudes',$id);
				$insert = $this->db->update('mv_etudes_faites',$this->input->post());

				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> Le niveau d\'etude '.get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$this->input->post('id_type_etudes'))).' a été mis a jour avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger"> La mis a jour '.get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$this->input->post('id_type_etudes'))).' a échoué.</div');
				}
			redirect(base_url('mouvement/Etudes_faites/index'));
			}
		$this->data[ 'title' ] = 'Edit Etudes_faites';
		$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
		$this->data['id_identification'] = $id_identification;
		$this->render_template('etudes_faites/edit', $this->data);
	
	}

	public function delete(){
		$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

		$id = $this->uri->segment(4);
		$etude = get_db_occurency('mv_etudes_faites',  ['id_etudes',$id]);

		if($this->db->delete('mv_etudes_faites',array('id_etudes'=>$id))){
			$this->session->set_flashdata('msg','<div class="text-success">Le niveau d\'etude '.get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$etude->id_type_etudes)).' a été supprimé.</div>');
			redirect(base_url('mouvement/Etudes_faites/index'));
		}
	}
}

			