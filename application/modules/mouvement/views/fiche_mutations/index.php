<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Fiches mutation</h3>
				<span class="float-right"> 
					<a class='btn  btn-sm' href="<?php echo base_url('mouvement/Fiche_mutations/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Fiche_mutations/index')?>"><i class='fa fa-list'></i>
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
                        <th>Ref. mutation</th>
                        <th>Date mutation</th>
                        <th>Service(A->N)</th>
                        <th>Unit&eacute;(A->N)</th>
                        <th>Fonction(A->N)</th>
                        <th>Observations</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($datas as $data) { 
                        $data_mutation = !empty($data->date_mutation)?(new DateTime($data->date_mutation))->format('d/m/Y'):"";
                    ?>
                        <tr>
                            <td><?=$data->id_mutation?></td>
                            <td><?=$data->ref_mutation?></td>
                            <td><?=$data_mutation?></td>
                            <td><?=get_db_value("gr_services","nom_service",array("id_service",$data->id_ancien_service))."->".get_db_value("gr_services","nom_service",array("id_service",$data->id_nouveau_service ))?></td>
                            <td><?=get_db_value("gr_unites","nom_unite",array("id_unite",$data->id_ancienne_unite ))."->".get_db_value("gr_unites","nom_unite",array("id_unite",$data->id_nouvelle_unite))?></td>
                            <td><?=get_db_value("gr_fonctions","nom_fonction",array("id_fonction",$data->id_ancienne_fonction))."->".get_db_value("gr_fonctions","nom_fonction",array("id_fonction",$data->id_nouvelle_fonction))?></td>
                            <td><?=$data->observations?></td>
                            <td>
                                <a href="<?php echo base_url('mouvement/Fiche_mutations/edit/'.$data->id_mutation)?>">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <a href="<?php echo base_url('mouvement/Fiche_mutations/delete/'.$data->id_mutation)?>">
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