<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

			<div class="card card-info-cust card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Modifier une absence</h3>
					<span class="float-right"> 
						<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Absences/add/')?>"><i class='fa fa-file'></i>
							<span class='d-none d-sm-inline'>&nbsp;Nouvelle</span>
						</a>

						<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Fiche_identification/index')?>"><i class='fa fa-list'></i>
							<span class='d-none d-sm-inline'>&nbsp;Liste</span>
						</a>     
					</span>
				</div>
	
			<div class="card-body">
			<?=form_open('mouvement/Absences/edit/',NULL, ['id_absence'=>$data->id_absence])?>


			<div class="row">

			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-3'>
				<label>Date de debut</label>
				<div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_debut',placeholder='Date de début'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de fin</label>
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin', $data->date_fin),"class='form-control datetimepicker-input', id='date_fin',placeholder='Date de début'")?>
					<div class="input-group-append" data-target="#date_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_fin','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nombre de jours</label>
				<?=form_input('nb_jours',set_value('nb_jours',$data->nb_jours),"class='form-control' placeholder='nb_jours'")?>
				<?php echo form_error('nb_jours','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nombre d'heures</label>
				<?=form_input('nb_heures',set_value('nb_heures',$data->nb_heures),"class='form-control' placeholder='nb_heures'")?>
				<?php echo form_error('nb_heures','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Est justifie?</label><?php echo form_error('est_justifie'); ?>
				<?=form_input('est_justifie',set_value('est_justifie',$data->est_justifie),"class='form-control' placeholder='est_justifie'")?>
				<?php echo form_error('est_justifie','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Justification</label>
				<?=form_textarea('justification',set_value('justification',$data->justification),"class='form-control' placeholder='justification'")?>
				<?php echo form_error('justification','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>