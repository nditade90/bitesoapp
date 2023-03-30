<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fiche_mutations extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	$this->data['page_title'] = 'Fiche_mutations';
	$this->data['js'] = base_url()."assets/js/pages/Fiche_mutations.js";
	}


		public function add(){

		    $id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$mutation = $this->db->where(array('id_identification'=>$id_identification))->order_by('id_mutation ','DESC')->get('mv_fiche_mutations')->row();	

			$this->data['mutation'] = new stdClass();
			if(!empty($mutation)){
				$this->data['mutation']  = $mutation;
			}

			// $this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('date_mutation', 'Date_mutation', 'required');
			$this->form_validation->set_rules('ref_mutation', 'Ref_mutation', 'required');
			$this->form_validation->set_rules('id_ancien_service', 'Id_ancien_service', 'required|numeric');
			$this->form_validation->set_rules('id_nouveau_service', 'Id_nouveau_service', 'required|numeric');
			$this->form_validation->set_rules('id_ancienne_unite', 'Id_ancienne_unite', 'required|numeric');
			$this->form_validation->set_rules('id_nouvelle_unite', 'Id_nouvelle_unite', 'required|numeric');
			$this->form_validation->set_rules('id_ancienne_fonction', 'Id_ancienne_fonction', 'required|numeric');
			$this->form_validation->set_rules('id_nouvelle_fonction', 'Id_nouvelle_fonction', 'required|numeric');
			$this->form_validation->set_rules('observations', 'Observations', 'required');
			$this->form_validation->set_rules('bp', 'Bp', 'required');

			if($this->form_validation->run()){

				$insert = $this->db->insert('mv_fiche_mutations',$this->input->post());
				if(!empty($insert)){
					$this->session->set_flashdata('msg','<div class="text-success"> La mutation  a été enregistré.</div>');
				}else{
					$this->session->set_flashdata('msg','<div class="text-danger">L\'enregistrement de la mutation  a échoué </div');
				}
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
			$this->data[ 'title' ] = 'Fiche_mutations';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('fiche_mutations/add', $this->data);

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('mv_fiche_mutations',array('id_mutation'=>$id))->row();
			$this->data[ 'title' ] = 'AddFiche_mutations';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('fiche_mutations/view', $this->data);
		}

		public function edit(){
			$id_identification = !empty($this->uri->segment(4))?$this->uri->segment(4):$this->input->post('id_identification');
			$id = $this->uri->segment(5) > 0 ? $this->uri->segment(5) : $this->input->post('id_mutation');
			$this->data['data'] = $this->db->get_where('mv_fiche_mutations',array('id_mutation'=>$id))->row();

			$this->form_validation->set_rules('id_identification', 'Id_identification', 'required|numeric');
			$this->form_validation->set_rules('date_mutation', 'Date_mutation', 'required');
			$this->form_validation->set_rules('ref_mutation', 'Ref_mutation', 'required');
			$this->form_validation->set_rules('id_ancien_service', 'Id_ancien_service', 'required|numeric');
			$this->form_validation->set_rules('id_nouveau_service', 'Id_nouveau_service', 'required|numeric');
			$this->form_validation->set_rules('id_ancienne_unite', 'Id_ancienne_unite', 'required|numeric');
			$this->form_validation->set_rules('id_nouvelle_unite', 'Id_nouvelle_unite', 'required|numeric');
			$this->form_validation->set_rules('id_ancienne_fonction', 'Id_ancienne_fonction', 'required|numeric');
			$this->form_validation->set_rules('id_nouvelle_fonction', 'Id_nouvelle_fonction', 'required|numeric');
			$this->form_validation->set_rules('observations', 'Observations', 'required');
			$this->form_validation->set_rules('bp', 'Bp', 'required');

			if($this->form_validation->run()){
			$this->db->where('id_mutation',$id);
					$insert = $this->db->update('mv_fiche_mutations',$this->input->post());

					if(!empty($insert)){
						$this->session->set_flashdata('msg','<div class="text-success"> La mutation été mis a jour avec succès.</div>');
					}else{
						$this->session->set_flashdata('msg','<div class="text-danger">La mis a jour de la mutation a échoué </div');
					}
					redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
				}
			$this->data[ 'title' ] = 'Edit Fiche_mutations';
			$this->data['title_top_bar'] = get_db_soldat_titre($id_identification);
			$this->data['id_identification'] = $id_identification;
			$this->render_template('fiche_mutations/edit', $this->data);
		
		}

		public function delete(){
			$id_identification = $this->uri->segment(4);
			$id = $this->uri->segment(5);
			
			if($this->db->delete('mv_fiche_mutations',array('id_mutation'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/view/'.$id_identification));
			}
		}

		public function get_unite()
		{
			$id_ancienne_unite = $this->uri->segment(4);

			$unites = $this->db->get('gr_unites')->result();
			$options = "<option value='0'> - </option>";

			foreach ($unites as $unite) {
				# code...
				if($id_ancienne_unite != $unite->id_unite){
					$options .= "<option value='".$unite->id_unite ."'> ".$unite->nom_unite ." </option>";
				}
			}

			echo $options;
		}

		public function get_service()
		{
			$id_ancien_service = $this->uri->segment(4);

			$services = $this->db->get('gr_services')->result();
			$options = "<option value='0'> - </option>";

			foreach ($services as $service) {
				# code...
				if($id_ancien_service != $service->id_service){
					$options .= "<option value='".$service->id_service ."'> ".$service->nom_service ." </option>";
				}
			}

			echo $options;
		}


		public function get_fonction()
		{
			$id_ancienne_fonction = $this->uri->segment(4);

			$fonctions = $this->db->get('gr_fonctions')->result();
			$options = "<option value='0'> - </option>";

			foreach ($fonctions as $fonction) {
				# code...
				if($id_ancienne_fonction != $fonction->id_fonction){
					$options .= "<option value='".$fonction->id_fonction ."'> ".$fonction->nom_fonction ." </option>";
				}
			}

			echo $options;
		}
}

			