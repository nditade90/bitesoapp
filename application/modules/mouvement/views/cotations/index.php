<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
        
		<div class="card card-info-cust card-outline">

			<div class="card-header">
				<h3 class="card-title text-uppercase">Faire une Cotation</h3>
				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Cotations/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Cotations/index')?>"><i class='fa fa-list'></i>
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
                                <a href="<?php echo base_url('mouvement/Cotations/edit/'.$data->id_cotation)?>">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <a href="<?php echo base_url('mouvement/Cotations/delete/'.$data->id_cotation)?>">
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