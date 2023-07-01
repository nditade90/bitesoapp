
<div class="content-wrapper" style="min-height: 357.039px;">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
    <section class="content">
        <div class="card card-info-cust card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
					<a class='btn btn-sm' href="<?php echo base_url('mouvement/Renforcements/add')?>"><i class='fa fa-plus'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Renforcements')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Renforcements</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de renforcement</th>
			<th>Reference</th>
			<th>Titre obtenu</th>
			<th>Pays</th>
			<th>Date depart</th>
			<th>Date retour</th>
			<th>Nb jours</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_renforcement?></td>
					<td><?=get_db_value("mv_types_renforcement","type_renforcement",array("id_type_renforcement ",$data->id_type_renforcement))?></td>					
					<td><?=$data->id_type_renforcement?></td>
					<td><?=$data->ref_renforcement?></td>
					<td><?=$data->titre_obtenu?></td>
					<td><?=get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays))?></td>
					<td><?=$data->date_depart?></td>
					<td><?=$data->date_retour?></td>
					<td><?=$data->nb_jours?></td>
					<td>
					<a href='<?=base_url('mouvement/Renforcements/edit/'.$data->id_renforcement);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Renforcements/delete/'.$data->id_renforcement);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		