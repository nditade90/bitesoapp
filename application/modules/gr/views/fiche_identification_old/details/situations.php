 <?=$fragmentTitle?> 
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('gr/Historique_situations/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>

<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Situation</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Observations</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) {
            $date_db = !empty($data->date_debut)?(new DateTime($data->date_debut))->format('d/m/Y'):"";
            $date_fn = !empty($data->date_fin)?(new DateTime($data->date_fin))->format('d/m/Y'):"";
            ?>
                <tr>
                    <td><?=$data->id_historique?></td>
                    <td><?=get_db_value("gr_situations","nom_situation",array("id_situation",$data->id_situation))?></td>
                    <td><?=$date_db?></td>
                    <td><?=$date_fn?></td>
                    <td><?=$data->observation?></td>
                    <td>
                        <a href="<?php echo base_url('gr/Historique_situations/edit/'.$id_identification.'/'.$data->id_historique)?>">
                            <span class="fa fa-edit"></span>
                        </a>

                        <a href="<?php echo base_url('gr/Historique_situations/delete/'.$id_identification.'/'.$data->id_historique)?>">
                            <span class="fa fa-trash text-danger"></span>
                        </a>
                    </td>               
                </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>