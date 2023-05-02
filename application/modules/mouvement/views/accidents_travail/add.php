
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info_cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Enregistrement d'un accident de travail</h3>
				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Accidents_travail/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Accidents_travail/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">
		<?=form_open('mouvement/Accidents_travail/add')?>
		


		<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class='col-md-3'>
				<label>Date de l'accident</label>
				<div class="input-group date" id="date_accident" data-target-input="nearest">
					<?=form_input('date_accident',set_value('date_accident', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_accident',placeholder='Date de distinction'")?>
					<div class="input-group-append" data-target="#date_accident" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_accident','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nature</label>
				<?=form_input('nature',set_value('nature'),"class='form-control' placeholder='nature'")?>
				<?php echo form_error('nature','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Décision</label>
				<?=form_input('decision',set_value('decision'),"class='form-control' placeholder='decision'")?>
				<?php echo form_error('decision','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>