
<div class="content-wrapper" style="min-height: 357.039px;">
<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_sorties_service.php";?>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Sorties_service</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Lieu de sortie</th>
			<th>Date debut (rappel arme)</th>
			<th>Date fin (rappel arme)</th>
			<th>Date</th>
			<th>Genre</th>
			<th>Reference</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_sortie?></td>
					<td><?=$data->lieu_sortie?></td>
					<td><?=$data->date_rappel_arme_debut?></td>
					<td><?=$data->date_rappel_arme_fin?></td>
					<td><?=$data->date_sortie?></td>
					<td><?=get_db_value("mv_types_sortie_service","type_sortie_service",array("id_type_sortie",$data->id_genre_sortie))?> </td>
					<td><?=$data->ref_sortie?></td>
					<td><a href='<?=base_url('mouvement/Sorties_service/edit/'.$data->id_sortie);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Sorties_service/delete/'.$data->id_sortie);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		