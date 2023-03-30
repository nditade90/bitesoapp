<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Dossiers_penals/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Date Debut</th>
            <th>Date Fin</th>
            <th>Peine</th>
            <th>Punition</th>
            <th>Infraction</th>
            <th>Chef</th>
            <th>Nombre</th>
            <th>Unite nombre</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) { 
            $date_debut = !empty($data->date_debut)?(new DateTime($data->date_debut))->format('d/m/Y'):"";
            $date_fin = !empty($data->date_fin)?(new DateTime($data->date_fin))->format('d/m/Y'):"";
        ?>
            <tr>
                <td><?=$data->id_dossier_penal?></td>
                <td><?=$date_debut?></td>
                <td><?=$date_fin?></td>
                <td><?=get_db_value("mv_types_peine","nom_type_peine",array("id_type_peine",$data->id_type_peine))?></td>
                <td><?=$data->juridiction?></td>
                <td><?=get_db_value("mv_types_infraction","nom_infraction",array("id_type_infraction",$data->id_type_infraction))?></td>
                <td><?=$data->chef?></td>
                <td><?=$data->nbre?></td>
                <td><?=get_db_value("mv_unites_nbre","nom_unite_nb",array("id_unite_nbre",$data->id_unite_nbre))?></td>
                <td>
                <a href="<?php echo base_url('mouvement/Dossiers_penals/edit/'.$id_identification.'/'.$data->id_dossier_penal)?>">
                                <span class="fa fa-edit"></span>
                            </a>

                            <a href="<?php echo base_url('mouvement/Dossiers_penals/delete/'.$id_identification.'/'.$data->id_dossier_penal)?>">
                                <span class="fa fa-trash text-danger"></span>
                            </a>
                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>