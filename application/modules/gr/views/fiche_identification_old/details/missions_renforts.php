<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Renforcements/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Type de renforcement</th>
            <th>Titre obtenu</th>
            <th>Pays</th>
            <th>Debut</th>
            <th>Retour</th>
            <th>NB Jours</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    <?php 
          foreach ($datas as $data) { 
            $date_depart = !empty($data->date_depart)?(new DateTime($data->date_depart))->format('d/m/Y'):"";
            $date_retour = !empty($data->date_retour)?(new DateTime($data->date_retour))->format('d/m/Y'):"";
        ?>
            <tr>
                <td><?=$data->id_renforcement?></td>
                <td><?=get_db_value("mv_types_renforcement","type_renforcement",array("id_type_renforcement",$data->id_type_renforcement))?></td>
                <td><?=$data->titre_obtenu?></td>
                <td><?=get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays))?></td>
                <td><?=$date_depart?></td>
                <td><?=$date_retour?></td>
                <td><?=$data->nb_jours?></td>
                <td>
                    <a href="<?php echo base_url('mouvement/Renforcements/edit/'.$id_identification.'/'.$data->id_renforcement)?>">
                            <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Renforcements/delete/'.$id_identification.'/'.$data->id_renforcement)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>