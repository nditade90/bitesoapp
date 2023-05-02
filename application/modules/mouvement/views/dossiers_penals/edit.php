<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

			<div class="card card-info-cust card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Editer un dossier penal</h3>
					<span class="float-right"> 
						<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Dossiers_penals/add/'.$id_identification)?>"><i class='fa fa-file'></i>
							<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
						</a>

						<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Dossiers_penals//index')?>"><i class='fa fa-list'></i>
							<span class='d-none d-sm-inline'>&nbsp;Liste</span>
						</a>     
					</span>
				</div>
	
			<div class="card-body">
			<?=form_open('mouvement/Dossiers_penals/edit/',NULL, ['id_dossier_penal'=>$data->id_dossier_penal])?>

			<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class="row">			
				<div class='col-md-3'><label>Date de début</label><?php echo form_error('date_debut'); ?>
			   
			   <div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut', $data->date_debut),"class='form-control datetimepicker-input', id='date_debut',placeholder='Date de début'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Type de peine</label>
				<?=form_dropdown('id_type_peine',$this->My_model->multi_dropdown('mv_types_peine', ['id_type_peine','nom_type_peine']),set_value('id_type_peine,',$data->id_type_peine),"class='form-control' placeholder='id_type_peine'")?>
				<?php echo form_error('id_type_peine','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Infraction</label>
				<?=form_dropdown('id_type_infraction',$this->My_model->multi_dropdown('mv_types_infraction', ['id_type_infraction', 'nom_infraction']),set_value('id_type_infraction,',$data->id_type_infraction),"class='form-control' placeholder='id_type_infraction'")?>
				<?php echo form_error('id_type_infraction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nombre</label>
				<?=form_input('nbre',set_value('nbre',$data->nbre),"class='form-control' placeholder='nbre'")?>
				<?php echo form_error('nbre','<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class='col-md-3'>
				<label>Date fin</label>
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin', $data->date_fin),"class='form-control datetimepicker-input', id='date_fin',placeholder='Date de début'")?>
					<div class="input-group-append" data-target="#date_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_fin','<div class="text-danger">', '</div>'); ?>
			</div>			

			<div class='col-md-3'>
				<label>Juridiction</label>
				<?=form_input('juridiction',set_value('juridiction',$data->juridiction),"class='form-control' placeholder='juridiction'")?>
				<?php echo form_error('juridiction','<div class="text-danger">', '</div>'); ?>
			</div>			

			<div class='col-md-3'>
				<label>Chef</label>
				<?=form_input('chef',set_value('chef',$data->chef),"class='form-control' placeholder='chef'")?>
				<?php echo form_error('chef','<div class="text-danger">', '</div>'); ?>
			</div>

			
			<div class='col-md-3'>
				<label>Unité</label>
				<?=form_dropdown('id_unite_nbre',$this->My_model->multi_dropdown('mv_unites_nbre',['id_unite_nbre','nom_unite_nb']),set_value('id_unite_nbre,',$data->id_unite_nbre),"class='form-control' placeholder='id_unite_nbre'")?>
				<?php echo form_error('id_unite_nbre','<div class="text-danger">', '</div>'); ?>
			</div>


		</div>
		
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>