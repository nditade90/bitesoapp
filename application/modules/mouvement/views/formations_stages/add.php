
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
          
		<div class="card-header">
				<h3 class="card-title text-uppercase">Ajouter une formation / stage</h3>
				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Formations_stages/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Formations_stages/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">
		
		<?=form_open('mouvement/Formations_stages/add')?>
		


		<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class='col-md-3'>
				<label>Stage</label>
				<?=form_dropdown('id_stage',$this->My_model->multi_dropdown('mv_stages',['id_stage','titre_stage']),set_value('id_stage'),"class='form-control' placeholder='id_stage'")?>
				<?php echo form_error('id_stage','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Diplome obtenu</label>
				<?=form_input('titre_obtenu',set_value('titre_obtenu'),"class='form-control' placeholder='titre_obtenu'")?>
				<?php echo form_error('titre_obtenu','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date debut</label>				
				<div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_debut',placeholder='Date de debut'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. stage</label>
				<?=form_input('ref_stage',set_value('ref_stage'),"class='form-control' placeholder='ref_stage'")?>
				<?php echo form_error('ref_stage','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nombre du mois</label>
				
				<?=form_input('nb_mois',set_value('nb_mois'),"class='form-control' placeholder='nb_mois'")?>
				<?php echo form_error('nb_mois','<div class="text-danger">', '</div>'); ?>
			</div>					

			<div class='col-md-3'>
				<label>Pays</label>
				<?=form_dropdown('id_pays',$this->My_model->multi_dropdown('gr_pays',['id_pays','nom_pays']),set_value('id_pays'),"class='form-control' placeholder='id_pays'")?>
				<?php echo form_error('id_pays','<div class="text-danger">', '</div>'); ?>
			</div>			

			<div class='col-md-3'>
				<label>Date fin</label>
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_fin',placeholder='Date de fin'")?>
					<div class="input-group-append" data-target="#date_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_fin','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Note obtenue</label>
				<?=form_input('note_obtenue',set_value('note_obtenue'),"class='form-control' placeholder='note_obtenue'")?>
				<?php echo form_error('note_obtenue','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Spécialité</label>
				<?=form_dropdown('id_specialite',$this->My_model->multi_dropdown('gr_specialites',['id_specialite', 'nom_specialite']),set_value('id_specialite'),"class='form-control' placeholder='id_specialite'")?>
				<?php echo form_error('id_specialite','<div class="text-danger">', '</div>'); ?>
			</div>	

			<div class='col-md-3'>
				<label>Montant prime</label>
				<?=form_input('montant_prime',set_value('montant_prime'),"class='form-control' placeholder='montant_prime'")?>
				<?php echo form_error('montant_prime','<div class="text-danger">', '</div>'); ?>
			</div>			

			<div class='col-md-3'>
				<label>Date de Spécialité</label>
				<div class="input-group date" id="date_specialite" data-target-input="nearest">
					<?=form_input('date_specialite',set_value('date_specialite', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_specialite',placeholder='Date de spécialité'")?>
					<div class="input-group-append" data-target="#date_specialite" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_specialite','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. spécialité</label>
				<?=form_input('ref_specialite',set_value('ref_specialite'),"class='form-control' placeholder='ref_specialite'")?>
				<?php echo form_error('ref_specialite','<div class="text-danger">', '</div>'); ?>
			</div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div></section></div>