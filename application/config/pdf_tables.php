<?php
/**
 * CodeIgniter customazition settings of pdf of differents pdf
 *
 * Version 1.0, October - 2017
 * Author: THADDEE NDAYIZEYE <...@gmail.com>
 *
 * Copyright (c) 2023 THADDEE NDAYIZEYE
 * Released under the MIT license

 */

defined('BASEPATH') OR exit('No direct script access allowed');

/*
    Table: gr_fiche_identification
*/
$config['gr_fiche_identification'] = array(
    'fields'=>array('id_identification','matricule','nouveau_matricule','ancien_matricule','nom','prenom','id_categorie','id_promotion','id_sexe','id_ethnie','id_corps_origine','date_naissance','id_etat_civil','id_colline','id_commune','id_province','ville_naissance'),
    'order'=>array('id_identification','matricule','id_categorie','nom','prenom','id_sexe','id_ethnie','id_corps_origine','id_etat_civil','date_naissance','ville_naissance','id_province','id_promotion'),
    'search'=>array('id_identification','matricule','nom','prenom','date_naissance','ville_naissance'),
    'columns'=>array("#",'Matricule','Nom','Prenom','Categorie','Sexe','Ethnie','Corps d\'origine','Nee','Etat civil'),
    'sizes'=>array('5','18','25','25','21','13','20','30','20','18'),
    'orientation' => "P",
    'primary'=>"id_identification"
);

/*
    Table: gr_fiche_carriere
*/
$config['gr_fiche_carriere'] = array(
    'fields'=>array('id_identification','id_departement','id_service','id_categorie','id_grade','id_niveau_formation'),
    'order'=>array('id_identification','id_departement','id_service','id_categorie','id_grade','id_niveau_formation'),
    'search'=>array('id_identification'),
    'columns'=>array("#",'Nom','Departement','Service','Categorie','Grade','Niveau formation'),
    'sizes'=>array('5','40','20','30','30','30','30'),
    'orientation' => "P",
    'primary'=>"id_fiche_carriere"
);

/*
    gr_ayants_droit
*/ 

$config['gr_ayants_droit'] = array(
    'fields'=>array('id_identification','id_categorie_ayant_droit','nom','prenoms','date_naissance','ref_extrait_naissance','date_marriage','ref_extrait_marriage','date_divorce','date_deces','ref_cert_deces','prise_en_charge'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Categorie','Ayant droit','Naissance','Prise en charge'),
    'sizes'=>array('5','55','25','50','20','35'),
    'orientation' => "P",
    'primary'=>""
);

// gr_historique_situations
$config['gr_historique_situations'] = array(
    'fields'=>array('id_identification','id_situation','date_debut','date_fin','observation'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Situation','D.Debut','D.Fin','Observation'),
    'sizes'=>array('5','50','20','20','20','75'),
    'orientation' => "P",
    'primary'=>""
);

// mv_cotations
$config['mv_cotations'] = array(
    'fields'=>array('id_cotation','id_type_cote','id_identification','code','annee','points1','points2','note_obtenue'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Type code','Code','Annee','Point 1','Point 2','Note obtenue'),
    'sizes'=>array('5','50','30','20','20','20','20','25'),
    'orientation' => "P",
    'primary'=>""
);


// mv_etudes_faites
$config['mv_etudes_faites'] = array(
    'fields'=>array('id_etudes','id_identification','id_type_etudes','etablissement','periode_etude','ref_equivalence','note_obtenue','date_obtention','id_pays'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Etudes','Etablissement','Periode','Note','Date','Pays'),
    'sizes'=>array('5','50','20','40','20','15','20','20'),
    'orientation' => "P",
    'primary'=>""
);


// mv_formations_stages
$config['mv_formations_stages'] = array(
    'fields'=>array('id_formation_stage','id_identification','id_stage','id_specialite','titre_obtenu','date_debut','date_fin','montant_prime','note_obtenue'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Stage','Specialite','Titre','Note','D.Debut','D.Fin','Prime'),
    'sizes'=>array('5','45','17','28','35','12','20','20','15'),
    'orientation' => "P",
    'primary'=>'id_formation_stage'
);

// mv_avancement_grades
$config['mv_avancement_grades'] = array(
    'fields'=>array('id_avancement_grade','id_identification','id_categorie','id_ancien_grade','id_nouveau_grade','date_avancement','annee','ancien_salaire_base','nouveau_salaire_base'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Categorie','Ancien Grd','Nouveau Grd','Date','Ac. Salaire','Nv Salaire'),
    'sizes'=>array('5','45','25','23','23','20','20','20'),
    'orientation' => "P",
    'primary'=>'id_avancement_grade'
);

// mv_fiche_mutations
$config['mv_fiche_mutations'] = array(
    'fields'=>array('id_mutation','id_identification','date_mutation','id_ancien_service','id_nouveau_service','id_ancienne_fonction','id_nouvelle_fonction'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','D.Mutation','Ancien Srv','Nouveau Srv','Ancienne Fonct', 'Nouvelle Fonct'),
    'sizes'=>array('5','45','25','25','25','30','30'),
    'orientation' => "P",
    'primary'=>'id_mutation'
);

// mv_actions_disciplinaires
$config['mv_actions_disciplinaires'] = array(
    'fields'=>array('id_action_disciplinaire','id_identification','date_ouverture','id_type_punition','nb_jours_punition','date_cloture','date_levee','autorite_decision'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Ouvert','Cloture','Levee','Jours','Punition','Autorite'),
    'sizes'=>array('5','45','25','25','25','15','20','20'),
    'orientation' => "P",
    'primary'=>'id_action_disciplinaire'
);

// mv_dossiers_penals
$config['mv_dossiers_penals'] = array(
    'fields'=>array('id_dossier_penal','id_identification','date_debut','date_fin','id_type_peine','juridiction','id_type_infraction','nbre'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Debut','Fin','Infraction','Peine','Jurdiction','Jour'),
    'sizes'=>array('5','45','20','20','25','25','35','15'),
    'orientation' => "P",
    'primary'=>'id_dossier_penal'
);

// mv_absences
$config['mv_absences'] = array(
    'fields'=>array('id_absence','id_identification','date_debut','date_fin','nb_jours','nb_heures','est_justifie'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Debut','Fin','NB Jours','NB Heures','Justifie'),
    'sizes'=>array('5','55','30','30','25','25','20'),
    'orientation' => "P",
    'primary'=>'id_absence'
);

// mv_renforcements
$config['mv_renforcements'] = array(
    'fields'=>array('id_renforcement','id_identification','id_type_renforcement','titre_obtenu','id_pays','date_depart','date_retour','nb_jours'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Renforcement','Titre','Pays','Depart','Retour','Jours'),
    'sizes'=>array('5','45','35','40','20','20','20','10'),
    'orientation' => "P",
    'primary'=>'id_renforcement'
);

// mv_dictinctions_honorifiques
$config['mv_dictinctions_honorifiques'] = array(
    'fields'=>array('id_distinction','id_identification','id_type_distiction','date_distiction','ref_distiction','observations'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Distinction','Distingue','Reference','Obervations'),
    'sizes'=>array('5','55','30','20','30','50'),
    'orientation' => "P",
    'primary'=>'id_distinction'
);

// mv_accidents_roulage
$config['mv_accidents_roulage'] = array(
    'fields'=>array('id_accident','id_identification','date_accident','degat_charge','degat_cause','responsable'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Date','Degat','Cause','Responsable'),
    'sizes'=>array('5','40','20','50','45','32'),
    'orientation' => "P",
    'primary'=>'id_accident'
);

// mv_accidents_travail
$config['mv_accidents_travail'] = array(
    'fields'=>array('id_accident','id_identification','date_accident','nature','decision'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Date','Nature','Decision'),
    'sizes'=>array('5','45','20','60','65'),
    'orientation' => "P",
    'primary'=>'id_accident'
);

// mv_exemptions_service
$config['mv_exemptions_service'] = array(
    'fields'=>array('id_exemption','id_identification','annee','date_debut','date_fin','nb_jours'),
    'order'=>array(),
    'search'=>array(),
    'columns'=>array('#','Soldat','Annee','Debut','Fin','Jours'),
    'sizes'=>array('5','45','20','30','30','30'),
    'orientation' => "P",
    'primary'=>'id_exemption'
);