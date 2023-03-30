<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Dictinctions_honorifiques/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Type de distinction</th>
            <th>Date</th>
            <th>Reference</th>
            <th>observation</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    <?php 
          foreach ($datas as $data) { 
            $date_distiction = !empty($data->date_distiction)?(new DateTime($data->date_distiction))->format('d/m/Y'):"";
        ?>
            <tr>
                <td><?=$data->id_distinction?></td>
                <td><?=get_db_value("mv_type_distiction_honorifiques","type_distiction",array("id_type_distiction",$data->id_type_distiction))?></td>
                <td><?=$date_distiction?></td>
                <td><?=$data->ref_distiction?></td>
                <td><?=$data->observations?></td>
                <td>
                    <a href="<?php echo base_url('mouvement/Dictinctions_honorifiques/edit/'.$id_identification.'/'.$data->id_distinction)?>">
                        <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Dictinctions_honorifiques/delete/'.$id_identification.'/'.$data->id_distinction)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                  </td>

            </tr>
        <?php } ?>
    </tbody>
</table>