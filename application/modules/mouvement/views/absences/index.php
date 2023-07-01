
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Absences</h3>
				<span class="float-right"> 
					<a class='btn  btn-sm' href="<?php echo base_url('mouvement/Absences/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Absences/index')?>"><i class='fa fa-list'></i>
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
                            <th>Date debut</th>
                            <th>Date fin</th>
                            <th>Jours</th>
                            <th>Heures</th>
                            <th>Justifi&eacute;(e)</th>
                            <th>Justification</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($datas as $data) { 
                            $date_debut = !empty($data->date_debut)?(new DateTime($data->date_debut))->format('d/m/Y'):"";
                            $date_fin = !empty($data->date_fin)?(new DateTime($data->date_fin))->format('d/m/Y'):"";
                            // $est_justifie = ($data->est_justifie == 1)?"Oui":"Non";
                        ?>
                        
                            <tr>
                                <td><?=$data->id_absence?></td>
                                <td><?=$date_debut?></td>
                                <td><?=$date_fin?></td>
                                <td><?=$data->nb_jours?></td>
                                <td><?=$data->nb_heures?></td>
                                <td><?=$data->est_justifie?></td>
                                <td><?=$data->justification?></td>
                                <td>
                                    <a href="<?php echo base_url('/mouvement/Absences/edit/'.$data->id_absence)?>">
                                            <span class="fa fa-edit"></span>
                                    </a>

                                    <a href="<?php echo base_url('/mouvement/Absences/delete/'.$data->id_absence)?>">
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