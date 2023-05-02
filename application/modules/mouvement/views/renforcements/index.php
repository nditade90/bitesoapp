
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info-cust card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_renforcements.php";?>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Renforcements</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>Id_renforcement</th>
			<th>Id_identification</th>
			<th>Id_type_renforcement</th>
			<th>Ref_renforcement</th>
			<th>Titre_obtenu</th>
			<th>Id_pays</th>
			<th>Date_depart</th>
			<th>Date_retour</th>
			<th>Nb_jours</th><th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_renforcement?></td>
					<td><?=$data->id_identification?></td>
					<td><?=$data->id_type_renforcement?></td>
					<td><?=$data->ref_renforcement?></td>
					<td><?=$data->titre_obtenu?></td>
					<td><?=$data->id_pays?></td>
					<td><?=$data->date_depart?></td>
					<td><?=$data->date_retour?></td>
					<td><?=$data->nb_jours?></td>
					<td><a href='<?=base_url('mouvement/Renforcements/view/'.$data->id_renforcement);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('mouvement/Renforcements/edit/0/'.$data->id_renforcement);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Renforcements/delete/'.$data->id_renforcement);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		