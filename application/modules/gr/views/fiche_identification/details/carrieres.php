<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('gr/Fiche_carriere/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>

<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Departement</th>
            <th>Categorie</th>
            <th>Statut</th>
            <th>Fonction</th>
            <th>Salaire de base</th>
            <th>Formation</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) {
            ?>
              <tr>
                <td><?=$data->id_fiche_carriere?></td>
                <td><?=get_db_value("gr_departements","nom_departement",array("id_departement",$data->id_departement))?></td>
                <td><?=get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie))?></td>
                <td><?=get_db_value("gr_statuts","nom_statut",array("id_statut",$data->id_statut))?></td>
                <td><?=get_db_value("gr_fonctions","nom_fonction",array("id_fonction",$data->id_fonction))?></td>  
                <td><?=number_format($data->salaire_base,2, '.',' ')?></td>                           
                <td><?=get_db_value("gr_niveaux_formation","nom_niveau_formation",array("id_niveau_formation",$data->id_niveau_formation))?></td>                             
                <td>
                    <a href="<?php echo base_url('gr/Fiche_carriere/edit/'.$id_identification.'/'.$data->id_fiche_carriere)?>">
                        <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('gr/Fiche_carriere/delete/'.$id_identification.'/'.$data->id_fiche_carriere)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                  </td>                
              </tr>
            <?php
          }
        ?>
    </tbody>
</table>