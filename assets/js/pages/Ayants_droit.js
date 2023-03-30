//STATUT MATRIMONIAL 
var id_categorie_ayant_droit = $('#id_categorie_ayant_droit').val()
//on load

if(id_categorie_ayant_droit == 1){ 
    $("#date_marriage_div").show();
    $("#ref_extrait_marriage_div").show();
}else{
    $("#date_marriage_div").hide();
    $("#ref_extrait_marriage_div").hide();
}

//on change
$("#id_categorie_ayant_droit").change(function(){
    var id_categorie_ayant_droit = $('#id_categorie_ayant_droit').val()

    if(id_categorie_ayant_droit == 1){
        $("#date_marriage_div").show();
        $("#ref_extrait_marriage_div").show();
    }else{
        $("#date_marriage_div").hide();
        $("#ref_extrait_marriage_div").hide();
    }
})