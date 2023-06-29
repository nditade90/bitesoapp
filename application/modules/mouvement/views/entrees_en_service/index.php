
<div class="content-wrapper" style="min-height: 357.039px;">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_entrees_en_service.php";?>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Entrées en service</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Lieu_entree</th>
			<th>Date début</th>
			<th>Date fin</th>
			<th>Durée contrat</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_entree_service?></td>
					<td><?=$data->lieu_entree?></td>
					<td><?=$data->date_debut?></td>
					<td><?=$data->date_fin?></td>
					<td><?=$data->duree_contrat?></td>
					<td>
						<a href='<?=base_url('mouvement/Entrees_en_service/edit/'.$data->id_entree_service);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Entrees_en_service/delete/'.$data->id_entree_service);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		