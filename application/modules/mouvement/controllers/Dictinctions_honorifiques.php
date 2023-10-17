<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dictinctions_honorifiques extends Admin_Controller{

		public function __construct(){
			parent::__construct();
			$this->data['page_title'] = 'Dictinctions_honorifiques';
			$this->data['js'] = base_url()."assets/js/pages/Distinctions_honorifiques.js";
			$this->data['url_list'] = "";
		}

		public function index(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->load->library( 'pagination' );
			$config[ 'base_url' ]      = base_url( 'mouvement/Dictinctions_honorifiques/index' );
			$config[ 'per_page' ]      = 10;
			$config[ 'num_links' ]     = 2;
			$config[ 'total_rows' ] = $this->db->where(['id_identification'=>$id_identification])->get( 'mv_dictinctions_honorifiques' )->num_rows();
			$this->pagination->initialize( $config );
			$this->data[ 'listing' ] = true;
			$this->data[ 'datas' ]   = $this->db->where(['id_identification'=>$id_identification])->order_by( 'id_sortie', 'DESC' )->get( 'mv_dictinctions_honorifiques', $config[ 'per_page' ],$this->uri->segment( 4 ))->result();
			$this->data[ 'title' ] = 'Distinction honorifique';
			$this->data['sort'] = '';
			$this->render_template('dictinctions_honorifiques/index', $this->data);

		}
		public function add(){
			$id_identification = !empty($this->session->userdata('id_identification'))?$this->session->userdata('id_identification'):$this->input->post('id_identification');

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_type_distiction', 'Id_type_distiction', 'required|numeric');
			$this->form_validation->set_rules('date_distiction', 'Date_distiction', 'required');
			$this->form_validation->set_rules('ref_distiction', 'Ref_distiction', 'required');
			// $this->form_validation->set_rules('observations', 'Observations', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_dictinctions_honorifiques',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> La distinction honoriique a été ebregistré avec succès.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la distinction honoriique a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
			$this->data[ 'title' ] = 'Dictinctions_honorifiques';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('dictinctions_honorifiques/add', $this->data);

		}

		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_distinction');
			$this->data['data'] = $this->db->get_where('mv_dictinctions_honorifiques',array('id_distinction'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('id_type_distiction', 'Id_type_distiction', 'required|numeric');
			$this->form_validation->set_rules('date_distiction', 'Date_distiction', 'required');
			$this->form_validation->set_rules('ref_distiction', 'Ref_distiction', 'required');
			// $this->form_validation->set_rules('observations', 'Observations', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_distinction',$id);
					$insert = $this->db->update('mv_dictinctions_honorifiques',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> La distinction honoriique a été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la distinction honoriique a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
				}
			$this->data[ 'title' ] = 'Edit Dictinctions_honorifiques';
			$this->data['title_top_bar'] = $this->session->userdata('id_identification') > 0?get_db_soldat_titre($this->session->userdata('id_identification')):"";
			$this->data['id_identification'] = $id_identification;
			$this->render_template('dictinctions_honorifiques/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = $this->uri->segment(4);
			$id = $this->uri->segment(5);

			if($this->db->delete('mv_dictinctions_honorifiques',array('id_distinction'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
		}
}

			