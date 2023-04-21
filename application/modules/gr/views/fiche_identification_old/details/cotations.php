<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Cotations/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
    </a>    
</span>

<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Cote</th>
            <th>Code</th>
            <th>Ann&eacute;e</th>
            <th>Points 1</th>
            <th>Points 2</th>
            <th>Note Obtenue</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) {        
        ?>
            <tr>
                <td><?=$data->id_cotation?></td>
                <td><?=get_db_value("mv_types_cote ","type_cote",array("id_type_cote",$data->id_type_cote))?></td>
                <td><?=$data->code?></td>
                <td><?=$data->annee?></td>
                <td><?=$data->points1?></td>
                <td><?=$data->points2?></td>
                <td><?=$data->note_obtenue?></td> 
                <td>
                    <a href="<?php echo base_url('mouvement/Cotations/edit/'.$id_identification.'/'.$data->id_cotation)?>">
                        <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Cotations/delete/'.$id_identification.'/'.$data->id_cotation)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td>            
            </tr>
        <?php } ?>
    </tbody>
</table>