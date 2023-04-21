<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('/mouvement/Absences/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
    </a>    
</span>

<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Jours</th>
            <th>Heures</th>
            <th>Justifi&eacute;(e)</th>
            <th>Justification</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) { 
            $date_debut = !empty($data->date_debut)?(new DateTime($data->date_debut))->format('d/m/Y'):"";
            $date_fin = !empty($data->date_fin)?(new DateTime($data->date_fin))->format('d/m/Y'):"";
            // $est_justifie = ($data->est_justifie == 1)?"Oui":"Non";
        ?>
        
            <tr>
                <td><?=$data->id_absence?></td>
                <td><?=$date_debut?></td>
                <td><?=$date_fin?></td>
                <td><?=$data->nb_jours?></td>
                <td><?=$data->nb_heures?></td>
                <td><?=$data->est_justifie?></td>
                <td><?=$data->justification?></td>
                <td>
                    <a href="<?php echo base_url('/mouvement/Absences/edit/'.$id_identification.'/'.$data->id_absence)?>">
                            <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('/mouvement/Absences/delete/'.$id_identification.'/'.$data->id_absence)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td> 
            </tr>
        <?php } ?>
    </tbody>
</table>