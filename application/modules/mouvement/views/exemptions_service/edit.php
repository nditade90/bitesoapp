<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

			<div class="card card-info-cust card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Editer une exemption de service</h3>
					<span class="float-right"> 
						<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Exemptions_service/add')?>"><i class='fa fa-file'></i>
							<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
						</a>

						<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Exemptions_service/index')?>"><i class='fa fa-list'></i>
							<span class='d-none d-sm-inline'>&nbsp;Liste</span>
						</a>     
					</span>
				</div>	
			<div class="card-body">
			
			<?=form_open('mouvement/Exemptions_service/edit/',NULL, ['id_exemption'=>$data->id_exemption])?>


			<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class='col-md-3'>
				<label>Année</label>
				<?=form_input('annee',set_value('annee',$data->annee),"class='form-control' placeholder='annee'")?>
				<?php echo form_error('annee','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de début</label>
				<div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut', $data->date_debut),"class='form-control datetimepicker-input', id='date_debut'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de fin</label>
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin', $data->date_fin),"class='form-control datetimepicker-input', id='date_fin'")?>
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

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>