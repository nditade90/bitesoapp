<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Recherche';
		$this->data['js'] = base_url()."assets/js/pages/Search.js";
        $this->is_auth();
    }
  
    public function is_auth()
    {
      if(empty($this->session->userdata('user'))){     
        redirect(base_url('Authentification'));   
      }
    }

    public function index()
    {

        $donnees = array();

        if($this->input->method() == 'post'){

            $criteres = [];

            $matricule = $this->input->post('matricule');
            if(!empty($matricule)){
                $criteres['fh.matricule'] = $matricule;
            }

            $nouveau_matricule = $this->input->post('nouveau_matricule');
            if(!empty($nouveau_matricule)){
                $criteres['fh.nouveau_matricule'] = $nouveau_matricule;
            }

            $ancien_matricule = $this->input->post('ancien_matricule');
            if(!empty($ancien_matricule)){
                $criteres['fh.ancien_matricule'] = $ancien_matricule;
            }

            $id_categorie = $this->input->post('id_categorie');
            if(!empty($id_categorie)){
                $criteres['fh.id_categorie'] = $id_categorie;
            }

            $id_corps_origine = $this->input->post('id_corps_origine');
            if(!empty($id_corps_origine)){
                $criteres['fh.id_corps_origine'] = $id_corps_origine;
            }

            $id_sexe = $this->input->post('id_sexe');
            if(!empty($id_sexe)){
                $criteres['fh.id_sexe'] = $id_sexe;
            }


            $id_promotion = $this->input->post('id_promotion');
            if(!empty($id_promotion)){
                $criteres['fh.id_promotion'] = $id_promotion;
            }
            

            $donnees = $this->db->select("fh.*")
                                ->from('gr_fiche_identification fh')
                                ->join('gr_categories ct','ct.id_categorie=fh.id_categorie')
                                ->join('gr_corps_origine co','co.id_corps_origine=fh.id_corps_origine')
                                ->join('gr_sexes sx','sx.id_sexe=fh.id_sexe')
                                ->join('gr_promotions pm','pm.id_promotion=fh.id_promotion')
                                ->where($criteres)
                                ->get()
                                ->result();
        }
        $data['donnees'] = $donnees;
        $data['title'] = "Critères de rechercher";   
        $this->page = 'Search_View';
        
        $this->render_template($this->page, $data); 
    }
}

/* End of file Search.php and path \application\modules\search\controllers\Search.php */
