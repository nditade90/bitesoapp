
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
          
            <div class="card-header">
                    <h3 class="card-title text-uppercase">Ajouter une formation / stage</h3>
                    <span class="float-right"> 
                        <a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Formations_stages/add/')?>"><i class='fa fa-file'></i>
                            <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
                        </a>

                        <a class='btn btn-sm' href="<?php echo base_url('mouvement/Formations_stages/index')?>"><i class='fa fa-list'></i>
                            <span class='d-none d-sm-inline'>&nbsp;Liste</span>
                        </a>     
                    </span>
            </div>
            
            <div class="card-body">
                <?php 
                    if($this->session->flashdata('msg')){
                        echo $this->session->flashdata('msg');
                    }
                ?>
                <table class='table table-condensed table-hover table-stripped'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Stage</th>
                            <th>Specialit&eacute;</th>
                            <th>Pays</th>
                            <th>P&eacute;riode</th>
                            <th>Titre obtenu</th>
                            <th>Note Obtenue</th>
                            <th>Date Obtention</th>
                            <th>Montant prime</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($datas as $data) {      
                            $date_obt = !empty($data->date_specialite)?(new DateTime($data->date_specialite))->format('d/m/Y'):"";      
                            $date_db = !empty($data->date_debut)?(new DateTime($data->date_debut))->format('d/m/Y'):"";      
                            $date_fn = !empty($data->date_fin)?(new DateTime($data->date_fin))->format('d/m/Y'):"";  
                            $periode =  $date_db ." a ". $date_fn;  
                        ?>
                            <tr>
                                <td><?=$data->id_formation_stage?></td>
                                <td><?=get_db_value("mv_stages ","titre_stage",array("id_stage",$data->id_stage))?></td> 
                                <td><?=get_db_value("gr_specialites","nom_specialite",array("id_specialite",$data->id_specialite))?></td> 
                                <td><?=get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays))?></td>            
                                <td><?=$periode?></td>
                                <td><?=$data->titre_obtenu?></td> 
                                <td><?=$data->note_obtenue?></td>
                                <td><?=$date_obt?></td>
                                <td><?=number_format($data->montant_prime,0,' ','.')?></td>
                                <td>
                                    <a href="<?php echo base_url('mouvement/Formations_stages/edit/'.$data->id_formation_stage)?>">
                                        <span class="fa fa-edit"></span>
                                    </a>

                                    <a href="<?php echo base_url('mouvement/Formations_stages/delete/'.$data->id_formation_stage)?>">
                                        <span class="fa fa-trash text-danger"></span>
                                    </a>
                                </td>           
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>