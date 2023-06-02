<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('render_fragment'))
{
    function render_fragment($viewFragment,$data,$id_identification = 0, $title=""){
        $ci = & get_instance();        
        $datas["fragmentTitle"]= $title;
        $datas["datas"]= $data;
        $datas["id_identification"]= $id_identification;
        $ci->load->view("../modules/".$viewFragment,$datas);
    }
}

if ( ! function_exists('get_db_value'))
{
    function get_db_value($table_name,$column,$criteria = array()){
        $valuesPresent = (count($criteria) >= 2 && count($criteria)%2 == 0);
        if(!$valuesPresent) return;

        $ci = & get_instance();
        $query = $ci->db->query("SELECT $column FROM $table_name WHERE $criteria[0]= $criteria[1]")->row();
        return !empty($query) ? $query->$column : ""; 
    }
}

if ( ! function_exists('get_db_occurency'))
{
    function get_db_occurency($table_name,$criteria = array()){
        $valuesPresent = (count($criteria) >= 2 && count($criteria)%2 == 0);
        if(!$valuesPresent) return;

        $ci = & get_instance();
        $query = $ci->db->query("SELECT * FROM $table_name WHERE $criteria[0]= $criteria[1]")->row();

        return !empty($query) ? $query : ""; 
    }
}

if ( ! function_exists('get_db_soldat_titre'))
{
    function get_db_soldat_titre($id_identification){
         if(!$id_identification) return;

        $ci = & get_instance();
        $query = $ci->db->query("SELECT * FROM gr_fiche_identification WHERE id_identification = $id_identification")->row();
        $categorie = $ci->db->query("SELECT * FROM gr_categories WHERE id_categorie = $query->id_categorie")->row();

        $link = "<a href='".base_url('gr/Fiche_identification/view/'.$id_identification)."' class='nav-link'>Soldat :".$categorie->nom_categorie." ".$query->nom ." ".$query->prenom."| Matricule : ".$query->matricule.(!empty($query->telephone)?" | Telephone:".$query->telephone:" ")."</a>";
        return !empty($query) ? $link : ""; 
    }
}

if ( ! function_exists('get_db_values'))
{
    function get_db_values($table_name,$columns = array(),$criteria = array(), $separator="&nbsp;"){
        $valuesPresent = (count($criteria) >= 2 && count($criteria)%2 == 0);
        if(!$valuesPresent) return;

        $column = $columns[0];

        for($i = 1 ; $i < count($columns); $i++){
            $column .=",".$columns[$i];
        }

        $ci = & get_instance();
        $query = $ci->db->query("SELECT $column FROM $table_name WHERE $criteria[0]= $criteria[1]")->result();
        $returnValue = "";
        
        /*if(!empty($query)){
            foreach($columns as $col){
                $returnValue .=$query->$col.$separator;
            }
        }*/

        return $query; 
    }
}