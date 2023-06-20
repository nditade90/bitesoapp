<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		
		<?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Fiches de carriere</h3>

				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('gr/Fiche_carrieres/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Fiche_carrieres/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">
		    <div class="col-md-12">
            <?php 
                // echo "<pre>";
                // print_r($datas->result());
                // echo "</pre>";
            ?>
            <table class='table table-condensed table-hover table-stripped'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Departement</th>
                        <th>Categorie</th>
                        <th>Statut</th>
                        <th>Fonction</th>
                        <th>Salaire de base</th>
                        <th>Formation</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($datas->result() as $data) {
                        ?>
                        <tr>
                            <td><?=$data->id_fiche_carriere?></td>
                            <td><?=get_db_value("gr_departements","nom_departement",array("id_departement",$data->id_departement))?></td>
                            <td><?=get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie))?></td>
                            <td><?=get_db_value("gr_statuts","nom_statut",array("id_statut",$data->id_statut))?></td>
                            <td><?=get_db_value("gr_fonctions","nom_fonction",array("id_fonction",$data->id_fonction))?></td>  
                            <td><?=number_format($data->salaire_base,2, '.',' ')?></td>                           
                            <td><?=get_db_value("gr_niveaux_formation","nom_niveau_formation",array("id_niveau_formation",$data->id_niveau_formation))?></td>                             
                            <td>
                                <a href="<?php echo base_url('gr/Fiche_carrieres/edit/'.$data->id_fiche_carriere)?>">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <a href="<?php echo base_url('gr/Fiche_carrieres/delete/'.$data->id_fiche_carriere)?>">
                                    <span class="fa fa-trash text-danger"></span>
                                </a>
                            </td>                
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
			</div>
	    </div>
    </section>
</div>