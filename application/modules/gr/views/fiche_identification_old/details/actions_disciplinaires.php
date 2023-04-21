<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Actions_disciplinaires/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Date Ouverture</th>
            <th>Date Cloture</th>
            <th>Ref. Cloture</th>
            <th>Punition</th>
            <th>NB Jours</th>
            <th>Date levee</th>
            <th>Ref. levee</th>
            <th>Autorite</th>
            <th>Observation</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    <?php 
          foreach ($datas as $data) { 
            $date_ouverture = !empty($data->date_ouverture)?(new DateTime($data->date_ouverture))->format('d/m/Y'):"";
            $date_cloture = !empty($data->date_cloture)?(new DateTime($data->date_cloture))->format('d/m/Y'):"";
            $date_levee = !empty($data->date_levee)?(new DateTime($data->date_levee))->format('d/m/Y'):"";
        ?>
            <tr>
                <td><?=$data->id_action_disciplinaire?></td>
                <td><?=$date_ouverture?></td>
                <td><?=$date_cloture?></td>
                <td><?=$data->ref_cloture?></td>
                <td><?=get_db_value("mv_types_punition","nom_type_punition",array("id_type_punition",$data->id_type_punition))?></td>
                <td><?=$data->nb_jours_punition?></td>
                <td><?=$date_levee?></td>
                <td><?=$data->ref_levee?></td>
                <td><?=$data->autorite_decision?></td>
                <td><?=$data->observation?></td>
                <td>
                    <a href="<?php echo base_url('mouvement/Actions_disciplinaires/edit/'.$id_identification.'/'.$data->id_action_disciplinaire)?>">
                        <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Actions_disciplinaires/delete/'.$id_identification.'/'.$data->id_action_disciplinaire)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td> 

            </tr>
        <?php } ?>
    </tbody>
</table>