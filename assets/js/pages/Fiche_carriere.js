

//Gestion des niveaux de formation
var id_niveau_formation = $("#id_niveau_formation").val();

if(id_niveau_formation != 8){
    $("#niveau_autre").hide();
}else{
    $("#niveau_autre").show();
}

$("#id_niveau_formation").change(function(){
    var id_niveau_formation = $("#id_niveau_formation").val();

    if(id_niveau_formation != 8){
        $("#niveau_autre").hide();
    }else{
        $("#niveau_autre").show();
    }
});

//Gestion des sous-categorie

var id_categorie = $("#id_categorie").val();
var id_sous_categorie = $("#id_sous_categorie").val();

$.ajax({
    url: url+"gr/Fiche_carriere/get_sous_categories/"+id_categorie+"/"+id_sous_categorie,
    type: 'GET',
    dataType: 'html',
    success: function(response){
        $('#id_sous_categorie').html(response);
        console.log(response);
        }
});

$("#id_categorie").change(function(){
    var id_categorie = $("#id_categorie").val();
    var id_sous_categorie = $("#id_sous_categorie").val();


    $.ajax({
        url: url+"gr/Fiche_carriere/get_sous_categories/"+id_categorie+"/"+id_sous_categorie,
        type: 'GET',
        dataType: 'html',
        success: function(response){
           $('#id_sous_categorie').html(response);
           console.log(response);
         }
    });
});


