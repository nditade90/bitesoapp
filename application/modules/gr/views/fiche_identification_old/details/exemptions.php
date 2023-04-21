
<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Exemptions_service/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Annee</th>
            <th>Debut</th>
            <th>Fin</th>
            <th>NB. jours</th>
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
                <td><?=$data->id_exemption?></td>
                <td><?=$data->annee?></td>
                <td><?=$date_debut?></td>
                <td><?=$date_fin?></td>
                <td><?=$data->nb_jours ?></td>
                <td>
                <a href="<?php echo base_url('mouvement/Exemptions_service/edit/'.$id_identification.'/'.$data->id_exemption)?>">
                            <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Exemptions_service/delete/'.$id_identification.'/'.$data->id_exemption)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>