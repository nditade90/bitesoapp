$('#date_mutation').datetimepicker({
    format:'YYYY-MM-DD'
});

//Get get service
var id_ancien_service = $("#id_ancien_service").val();
console.log("SR ".id_ancien_service);
$.ajax({
    url: url+"mouvement/Fiche_mutations/get_service/"+id_ancien_service,
    type: 'GET',
    dataType: 'html',
    success: function(response){
        $('#id_nouveau_service').html(response);
        }
});

//Get get unite
var id_ancienne_unite = $("#id_ancienne_unite").val();

$.ajax({
    url: url+"mouvement/Fiche_mutations/get_unite/"+id_ancienne_unite,
    type: 'GET',
    dataType: 'html',
    success: function(response){
        $('#id_nouvelle_unite').html(response);
        }
});

//Get get fonction
var id_ancienne_fonction = $("#id_ancienne_fonction").val();
console.log("FN".id_ancienne_fonction);
$.ajax({
    url: url+"mouvement/Fiche_mutations/get_fonction/"+id_ancienne_fonction,
    type: 'GET',
    dataType: 'html',
    success: function(response){
        $('#id_nouvelle_fonction').html(response);
        }
});