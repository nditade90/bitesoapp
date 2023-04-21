<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Avancement_grades/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>
<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Ancien Grade</th>
            <th>Nouveau Grade</th>
            <th>Date Grade</th>
            <th>Reference avacement</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) { 
            $data_grade = !empty($data->date_avancement)?(new DateTime($data->date_avancement))->format('d/m/Y'):"";
        ?>
            <tr>
                <td><?=$data->id_avancement_grade?></td>
                <td><?=get_db_value("gr_grades","nom_grade",array("id_grade",$data->id_ancien_grade))?></td> 
                <td><?=get_db_value("gr_grades","nom_grade",array("id_grade",$data->id_nouveau_grade))?></td> 
                <td><?=$data_grade?></td>
                <td><?=$data->ref_avancement?></td>
                <td>
                    <a href="<?php echo base_url('mouvement/Avancement_grades/edit/'.$id_identification.'/'.$data->id_avancement_grade)?>">
                        <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Avancement_grades/delete/'.$id_identification.'/'.$data->id_avancement_grade)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>