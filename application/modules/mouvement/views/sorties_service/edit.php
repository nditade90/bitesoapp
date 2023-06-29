<div class="content-wrapper" style="min-height: 357.039px;">
<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer une sortie de service </h3>
	
					<span class="float-right">
						<?php include_once "menu_sorties_service.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<h3 class="card-title text-bold"></h3><br>
			<?=form_open('mouvement/Sorties_service/edit/',NULL, ['id_sortie'=>$data->id_sortie])?>


			<div class="row">

			<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class='col-md-3'>
				<label>Lieu de sortie</label>
				<?=form_input('lieu_sortie',set_value('lieu_sortie',$data->lieu_sortie),"class='form-control' placeholder='lieu_sortie'")?>
						<?php echo form_error('lieu_sortie','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Date de debut (rappel arme) </label>
				<div class="input-group date" id="date_rappel_arme_debut" data-target-input="nearest">
					<?=form_input('date_rappel_arme_debut',set_value('date_rappel_arme_debut', $data->date_rappel_arme_debut),"class='form-control datetimepicker-input', id='date_rappel_arme_debut',placeholder='Date fin'")?>
					<div class="input-group-append" data-target="#date_rappel_arme_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_rappel_arme_debut','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>Date de fin (rappel arme)</label>
				<div class="input-group date" id="date_rappel_arme_fin" data-target-input="nearest">
					<?=form_input('date_rappel_arme_fin',set_value('date_rappel_arme_fin', $data->date_rappel_arme_fin),"class='form-control datetimepicker-input', id='date_rappel_arme_fin',placeholder='Date fin'")?>
					<div class="input-group-append" data-target="#date_rappel_arme_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_rappel_arme_fin','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Date de sortie</label>
				<div class="input-group date" id="date_sortie" data-target-input="nearest">
					<?=form_input('date_sortie',set_value('date_sortie', $data->date_sortie),"class='form-control datetimepicker-input', id='date_sortie',placeholder='Date fin'")?>
					<div class="input-group-append" data-target="#date_sortie" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_sortie','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Genre de sortie</label>
				<?=form_dropdown('id_genre_sortie',$this->My_model->multi_dropdown('mv_types_sortie_service',['id_type_sortie','type_sortie_service']),set_value('id_genre_sortie',$data->id_genre_sortie),"class='form-control' placeholder='id_genre_sortie'")?>
				<?php echo form_error('id_genre_sortie','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Reference</label>
				<?=form_input('ref_sortie',set_value('ref_sortie',$data->ref_sortie),"class='form-control' placeholder='ref_sortie'")?>
				<?php echo form_error('ref_sortie','<div class="text-danger">', '</div>'); ?></div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></section></div>