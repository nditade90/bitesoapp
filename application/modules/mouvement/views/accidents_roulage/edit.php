<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
			<div class="card card-info-cust card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Editer un accident de roulage</h3>
					<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Accidents_roulage/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Retour sur détail</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Accidents_roulage/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste des fiches</span>
					</a>     
				</span>
				</div>
	
			<div class="card-body">
	
			<?=form_open('mouvement/Accidents_roulage/edit/',NULL, ['id_accident'=>$data->id_accident])?>


			<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class='col-md-3'>
				<label>Date d'accident</label>
				
				<div class="input-group date" id="date_accident" data-target-input="nearest">
					<?=form_input('date_accident',set_value('date_accident', $data->date_accident),"class='form-control datetimepicker-input', id='date_accident',placeholder='Date de distinction'")?>
					<div class="input-group-append" data-target="#date_accident" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_accident','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Responsable</label>
				<?=form_input('responsable',set_value('responsable',$data->responsable),"class='form-control' placeholder='responsable'")?>
				<?php echo form_error('responsable','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Observation</label>
				<?=form_input('observation',set_value('observation',$data->observation),"class='form-control' placeholder='observation'")?>
				<?php echo form_error('observation','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Chargé de dégât</label>
				<?=form_input('degat_charge',set_value('degat_charge',$data->degat_charge),"class='form-control' placeholder='degat_charge'")?>
				<?php echo form_error('degat_charge','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Causé de dégât</label>
				<?=form_input('degat_cause',set_value('degat_cause',$data->degat_cause),"class='form-control' placeholder='degat_cause'")?>
				<?php echo form_error('degat_cause','<div class="text-danger">', '</div>'); ?>
			</div>			

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>