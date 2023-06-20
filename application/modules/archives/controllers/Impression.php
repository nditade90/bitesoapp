<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Impression extends Admin_Controller{

	public function __construct(){
        parent::__construct();
        $this->data['page_title'] = 'Impression';
        $this->data['js'] = "";
        $this->load->library('Pdf');
        $this->load->library('Excel');
        // include APPPATH.'third_party/fpdf/fpdf.php';
	}

	public function index(){

        $table = $this->uri->segment(4);

        $titles = [];
        $titles['gr_fiche_identification'] = "Indentification";
        $titles['gr_fiche_carriere'] = "carriere";
        $titles['gr_ayants_droit'] = "Ayants droits";
        $titles['gr_historique_situations'] = "Historique de situations";
        $titles['mv_cotations'] = "Cotations";
        $titles['mv_etudes_faites'] = "Etudes faites";
        $titles['mv_formations_stages'] = "Formations & stages";
        $titles['mv_avancement_grades'] = "Avancement de grades";
        $titles['mv_fiche_mutations'] = "Mutations";
        $titles['mv_actions_disciplinaires'] = "Actions disciplinaires";
        $titles['mv_dossiers_penals'] = "Dossiers penals";
        $titles['mv_absences'] = "Absences";
        $titles['mv_renforcements'] = "Renforcements";
        $titles['mv_dictinctions_honorifiques'] = "Distinctions honorifiques";
        $titles['mv_accidents_roulage'] = "Accidents de roulage";
        $titles['mv_accidents_travail'] = "Accidents de travail";
        $titles['mv_exemptions_service'] = "Exemption de service";      
        
        $function = 'data_'.$table;
        $this->imprimer(
            $titles[$table],
            $this->config->item($table)['columns'], 
            $this->$function()
        );
	}

    public function imprimer($title = "", $thead = array(),$tbody = array())
    {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle($title)
							 ->setSubject($title)
							 ->setDescription($title)
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
        
       $lettres = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','AA');
       
        //Add head
        $number = 3;
        for ($j=0; $j < count($thead) ; $j++) { 
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($lettres[$j].$number, utf8_encode($thead[$j]));   
        }

        //Add data from tbody
        $index = 4;
        foreach ($tbody as $data) {
            for ($i=0; $i < count($data) ; $i++) { 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($lettres[$i].$index, utf8_decode($data[$i]));   
            }
            // echo "<br >";

            $index ++;
        }

        // $objPHPExcel->setActiveSheetIndex(0).$string;

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
   

    public function data_gr_fiche_identification($criteres=[])
    {
        $datas = $this->db->select($this->config->item('gr_fiche_identification')['fields'])->where($criteres)->get('gr_fiche_identification')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = $data->nouveau_matricule;
                $sub_array[] = $data->nom;
                $sub_array[] = $data->prenom;
                $sub_array[] = get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie));
                $sub_array[] = get_db_value("gr_sexes","nom_sexe",array("id_sexe",$data->id_sexe));
                $sub_array[] = get_db_value("gr_ethnies","nom_ethnie",array("id_ethnie",$data->id_ethnie));
                $sub_array[] = get_db_value("gr_corps_origine","code_corps_origine",array("id_corps_origine",$data->id_corps_origine));
                $sub_array[] = $data->date_naissance;
                $sub_array[] = get_db_value("gr_etat_civil","nom_etat_civil",array("id_etat_civil",$data->id_etat_civil));

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_gr_fiche_carriere($criteres=[])
    {
        $datas = $this->db->select($this->config->item('gr_fiche_carriere')['fields'])->where($criteres)->get('gr_fiche_carriere')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_departement >0 ? get_db_value("gr_departements","nom_departement",array("id_departement",$data->id_departement)):"";                
                $sub_array[] = $data->id_service > 0? get_db_value("gr_services","nom_service",array("id_service",$data->id_service)):" ";
                $sub_array[] = $data->id_categorie > 0?get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie)):" ";
                $sub_array[] = $data->id_grade > 0 ?get_db_value("gr_grades","nom_grade",array("id_grade",$data->id_grade)):" ";
                $sub_array[] = $data->id_niveau_formation > 0 ?get_db_value("gr_niveaux_formation","nom_niveau_formation",array("id_niveau_formation",$data->id_niveau_formation)):" ";
                
                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_gr_ayants_droit($criteres =[])
    {
        $datas = $this->db->select($this->config->item('gr_ayants_droit')['fields'])->where($criteres)->get('gr_ayants_droit')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_categorie_ayant_droit > 0?get_db_value("gr_categorie_ayant_droits","nom_categorie",array("id_categorie_ayant_droit ",$data->id_categorie_ayant_droit)):"";
                $sub_array[] = $data->nom." ".$data->prenoms;
                $sub_array[] = $data->date_naissance;
                $sub_array[] = $data->prise_en_charge;

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_gr_historique_situations($criteres =[])
    {
        $datas = $this->db->select($this->config->item('gr_historique_situations')['fields'])->where($criteres)->get('gr_historique_situations')->result();

        $retours = [];
        if(!empty($datas)){
            $i =1;
            foreach($datas as $data){
                
                $date_d = new DateTime($data->date_debut);
                $date_f = new DateTime($data->date_fin);

                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_situation  > 0?get_db_value("gr_situations","nom_situation",array("id_situation",$data->id_situation)):"";
                $sub_array[] = $date_d->format('Y-m-d');
                $sub_array[] = $date_f->format('Y-m-d');
                $sub_array[] = $data->observation;

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_cotations($criteres =[])
    {
        $datas = $this->db->select($this->config->item('mv_cotations')['fields'])->where($criteres)->get('mv_cotations')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_type_cote  > 0?get_db_value("mv_types_cote","type_cote",array("id_type_cote",$data->id_type_cote)):"";
                $sub_array[] = $data->code;
                $sub_array[] = $data->annee;
                $sub_array[] = $data->points1;
                $sub_array[] = $data->points2;
                $sub_array[] = $data->note_obtenue;

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_etudes_faites($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_etudes_faites')['fields'])->where($criteres)->get('mv_etudes_faites')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_type_etudes  > 0?get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$data->id_type_etudes)):"";
                $sub_array[] = $data->etablissement;
                $sub_array[] = $data->periode_etude;
                // $sub_array[] = $data->ref_equivalence;
                $sub_array[] = $data->note_obtenue;
                $sub_array[] = $data->date_obtention;
                $sub_array[] = $data->id_pays  > 0?get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays)):"";

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_formations_stages($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_formations_stages')['fields'])->where($criteres)->get('mv_formations_stages')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_stage  > 0?get_db_value("mv_stages","titre_stage",array("id_stage",$data->id_stage)):"";
                $sub_array[] = $data->id_specialite  > 0?get_db_value("gr_specialites","nom_specialite",array("id_specialite",$data->id_specialite)):"";
                $sub_array[] = $data->titre_obtenu;
                $sub_array[] = $data->note_obtenue;
                $sub_array[] = $data->date_debut;
                $sub_array[] = $data->date_fin;
                $sub_array[] = $data->montant_prime;
                

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_avancement_grades($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_avancement_grades')['fields'])->where($criteres)->get('mv_avancement_grades')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_categorie  > 0?get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie)):"";
                $sub_array[] = $data->id_ancien_grade  > 0?get_db_value("gr_grades","code_grade",array("id_grade",$data->id_ancien_grade)):"";
                $sub_array[] = $data->id_nouveau_grade  > 0?get_db_value("gr_grades","code_grade",array("id_grade",$data->id_nouveau_grade)):"";
                $sub_array[] = $data->date_avancement;
                $sub_array[] = $data->ancien_salaire_base;
                $sub_array[] = $data->nouveau_salaire_base;                

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    

    public function data_mv_fiche_mutations($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_fiche_mutations')['fields'])->where($criteres)->get('mv_fiche_mutations')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->date_mutation;
                $sub_array[] = $data->id_ancien_service  > 0?get_db_value("gr_services","nom_service",array("id_service",$data->id_ancien_service)):"";
                $sub_array[] = $data->id_nouveau_service  > 0?get_db_value("gr_services","nom_service",array("id_service",$data->id_nouveau_service)):"";
                $sub_array[] = $data->id_ancienne_fonction  > 0?get_db_value("gr_fonctions","nom_fonction",array("id_fonction",$data->id_ancienne_fonction)):"";
                $sub_array[] = $data->id_nouvelle_fonction  > 0?get_db_value("gr_fonctions","nom_fonction",array("id_fonction",$data->id_nouvelle_fonction)):"";
            

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }


    public function data_mv_actions_disciplinaires($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_actions_disciplinaires')['fields'])->where($criteres)->get('mv_actions_disciplinaires')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->date_ouverture;
                $sub_array[] = $data->date_cloture;
                $sub_array[] = $data->date_levee;
                $sub_array[] = $data->nb_jours_punition;
                $sub_array[] = $data->id_type_punition  > 0?get_db_value("mv_types_punitions","nom_type_punition",array("id_type_punition",$data->id_type_punition)):"";
                $sub_array[] = $data->autorite_decision;               

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_dossiers_penals($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_dossiers_penals')['fields'])->where($criteres)->get('mv_dossiers_penals')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->date_debut;
                $sub_array[] = $data->date_fin;
                $sub_array[] = $data->id_type_infraction > 0?get_db_value("mv_types_infraction","nom_infraction",array("id_type_infraction",$data->id_type_infraction)):"";
                $sub_array[] = $data->id_type_peine > 0?get_db_value("mv_types_peine","nom_type_peine",array("id_type_peine",$data->id_type_peine)):"";
                $sub_array[] = $data->juridiction;
                $sub_array[] = $data->nbre;             

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }
   
    public function data_mv_absences($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_absences')['fields'])->where($criteres)->get('mv_absences')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->date_debut;
                $sub_array[] = $data->date_fin;
                $sub_array[] = $data->nb_jours;
                $sub_array[] = $data->nb_heures;             
                $sub_array[] = $data->est_justifie;             

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_renforcements($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_renforcements')['fields'])->where($criteres)->get('mv_renforcements')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_type_renforcement > 0?get_db_value("mv_types_renforcement","type_renforcement",array("id_type_renforcement",$data->id_type_renforcement)):"";
                $sub_array[] = $data->titre_obtenu;                
                $sub_array[] = $data->id_pays > 0?get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays)):"";
                $sub_array[] = $data->date_depart;
                $sub_array[] = $data->date_retour;
                $sub_array[] = $data->nb_jours;          

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_dictinctions_honorifiques($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_dictinctions_honorifiques')['fields'])->where($criteres)->get('mv_dictinctions_honorifiques')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->id_type_distiction > 0?get_db_value("mv_type_distiction_honorifiques","type_distiction",array("id_type_distiction",$data->id_type_distiction)):"";
                $sub_array[] = $data->date_distiction;                
                $sub_array[] = $data->ref_distiction;         
                $sub_array[] = $data->observations;         

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_accidents_roulage($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_accidents_roulage')['fields'])->where($criteres)->get('mv_accidents_roulage')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->date_accident;
                $sub_array[] = $data->degat_charge;                
                 $sub_array[] = $data->degat_cause;         
                 $sub_array[] = $data->responsable;         

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }

    public function data_mv_accidents_travail($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_accidents_travail')['fields'])->where($criteres)->get('mv_accidents_travail')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->date_accident;
                $sub_array[] = $data->nature;                
                 $sub_array[] = $data->decision;          

                $retours[] = $sub_array;
                $i ++;
            }
        }

        return $retours;
    }


    public function data_mv_exemptions_service($criteres = [])
    {
        $datas = $this->db->select($this->config->item('mv_exemptions_service')['fields'])->where($criteres)->get('mv_exemptions_service')->result();

        $retours = [];
        if(!empty($datas)){
            $i = 1;
            foreach($datas as $data){
                
                $sub_array = array();
                $sub_array[] = $i;
                $sub_array[] = get_db_value("gr_fiche_identification","nom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","prenom",array("id_identification",$data->id_identification))." ".get_db_value("gr_fiche_identification","matricule",array("id_identification",$data->id_identification));
                $sub_array[] = $data->annee;
                $sub_array[] = $data->date_debut;                
                $sub_array[] = $data->date_fin;          
                $sub_array[] = $data->nb_jours;          

                $retours[] = $sub_array;

                
                $i ++;
            }
        }

        return $retours;
    }
}
        