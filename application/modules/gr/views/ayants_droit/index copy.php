<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('gr/Ayants_droit/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>

<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom complet</th>
            <th>Categorie</th>
            <th>Date de naissance</th>
            <th>Prise en charge</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(!empty($datas)){ 
                foreach ($datas as $data) {
                    ?>
                    <tr>
                        <td><?=$data->id_ayant_droit?></td>
                        <td><?=get_db_value("gr_categorie_ayant_droits","nom_categorie",array("id_categorie_ayant_droit",$data->id_categorie_ayant_droit))?></td>
                        <td><?=$data->nom.' '.$data->prenoms?></td>
                        <td><?=$data->date_naissance?></td>
                        <td><?=$data->prise_en_charge?></td>                
                        <td>
                            <a href="<?php echo base_url('gr/Ayants_droit/edit/'.$id_identification.'/'.$data->id_ayant_droit)?>">
                                <span class="fa fa-edit"></span>
                            </a>

                            <a href="<?php echo base_url('gr/Ayants_droit/delete/'.$id_identification.'/'.$data->id_ayant_droit)?>">
                                <span class="fa fa-trash text-danger"></span>
                            </a>
                        </td>                  
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>
</table>