
<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Accidents_travail/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Date d'accident</th>
            <th>Nature</th>
            <th>Decision</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    <?php 
          foreach ($datas as $data) { 
            $date_accident = !empty($data->date_accident)?(new DateTime($data->date_accident))->format('d/m/Y'):"";
        ?>
            <tr>
                <td><?=$data->id_accident?></td>
                <td><?=$date_accident?></td>
                <td><?=$data->nature?></td>
                <td><?=$data->decision ?></td>
                <td>
                    <a href="<?php echo base_url('mouvement/Accidents_travail/edit/'.$id_identification.'/'.$data->id_accident)?>">
                            <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Accidents_travail/delete/'.$id_identification.'/'.$data->id_accident)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>