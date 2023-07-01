
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Dossiers penals</h3>
				<span class="float-right"> 
					<a class='btn  btn-sm' href="<?php echo base_url('mouvement/Dossiers_penals/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Dossiers_penals/index')?>"><i class='fa fa-list'></i>
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
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Peine</th>
                        <th>Punition</th>
                        <th>Infraction</th>
                        <th>Chef</th>
                        <th>Nombre</th>
                        <th>Unite nombre</th>
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
                            <td><?=$data->id_dossier_penal?></td>
                            <td><?=$date_debut?></td>
                            <td><?=$date_fin?></td>
                            <td><?=get_db_value("mv_types_peine","nom_type_peine",array("id_type_peine",$data->id_type_peine))?></td>
                            <td><?=$data->juridiction?></td>
                            <td><?=get_db_value("mv_types_infraction","nom_infraction",array("id_type_infraction",$data->id_type_infraction))?></td>
                            <td><?=$data->chef?></td>
                            <td><?=$data->nbre?></td>
                            <td><?=get_db_value("mv_unites_nbre","nom_unite_nb",array("id_unite_nbre",$data->id_unite_nbre))?></td>
                            <td>
                            <a href="<?php echo base_url('mouvement/Dossiers_penals/edit/'.$data->id_dossier_penal)?>">
                                            <span class="fa fa-edit"></span>
                                        </a>

                                        <a href="<?php echo base_url('mouvement/Dossiers_penals/delete/'.$data->id_dossier_penal)?>">
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