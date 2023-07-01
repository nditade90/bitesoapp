
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
           
		    <div class="card-header">
				<h3 class="card-title text-uppercase">Les avancement de grades</h3>
				<span class="float-right"> 
					<a class='btn  btn-sm' href="<?php echo base_url('mouvement/Avancement_grades/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Avancement_grades/index')?>"><i class='fa fa-list'></i>
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
                                <a href="<?php echo base_url('mouvement/Avancement_grades/edit/'.$data->id_avancement_grade)?>">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <a href="<?php echo base_url('mouvement/Avancement_grades/delete/'.$data->id_avancement_grade)?>">
                                    <span class="fa fa-trash text-danger"></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>