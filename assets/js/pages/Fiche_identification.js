
//STATUT MATRIMONIAL 
var id_etat_civil = $('#id_etat_civil').val()
//on load

if(id_etat_civil == 1){
    $("#conjoin_salarie_div").show();
}else{
    $("#conjoin_salarie_div").hide();
}

//on change
$("#id_etat_civil").change(function(){
    var id_etat_civil = $('#id_etat_civil').val()

    if(id_etat_civil == 1){
        $("#conjoin_salarie_div").show();
    }else{
        $("#conjoin_salarie_div").hide();
    }
})


//Get commune
var id_province = $("#id_province").val();
var id_commune = $("#id_commune").val();

$.ajax({
    url: url+"gr/Fiche_identification/get_communes/"+id_province+"/"+id_commune,
    type: 'GET',
    dataType: 'html',
    success: function(response){
        $('#id_commune').html(response);
        }
});

$("#id_province").change(function(){
    var id_province = $("#id_province").val();
    var id_commune = $("#id_commune").val();


    $.ajax({
        url: url+"gr/Fiche_identification/get_communes/"+id_province+"/"+id_commune,
        type: 'GET',
        dataType: 'html',
        success: function(response){
            $('#id_commune').html(response);
            }
    });
});

//Get colline

var id_colline = $("#id_colline").val();
var id_commune = $("#id_commune").val();

$.ajax({
    url: url+"gr/Fiche_identification/get_collines/"+id_colline+"/"+id_commune,
    type: 'GET',
    dataType: 'html',
    success: function(response){
        $('#id_commune').html(response);
        }
});

$("#id_commune").change(function(){
    var id_colline = $("#id_colline").val();
    var id_commune = $("#id_commune").val();


    $.ajax({
        url: url+"gr/Fiche_identification/get_collines/"+id_colline+"/"+id_commune,
        type: 'GET',
        dataType: 'html',
        success: function(response){
            $('#id_colline').html(response);
            }
    });
});