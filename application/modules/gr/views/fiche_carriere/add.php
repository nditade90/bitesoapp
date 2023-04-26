<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		
		<?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Ajout d'une fiche de carriere</h3>

				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('gr/Fiche_carrieres/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Fiche_carrieres/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">
		    <div class="col-md-12">
			 	<?=form_open('gr/Fiche_carriere/add')?>
				<div class="row mb-4">
					<div class='form-group col-md-3'>
						<label>Recensée</label>
						<?php 
						$data_est_recense =[
							'name'=>'est_recensee',
							'checked'=>set_value('est_recensee', $data->est_recensee) == 1? TRUE:FALSE,
							'value' => '1', 
							]; 
						?>
						<?= form_checkbox($data_est_recense);?> Oui
						<?php echo form_error('est_recensee','<span class="text-danger">', '</span>'); ?>
					</div>
				</div>
				<div class="row mb-4">
					<div class='form-group col-md-3'>
						<input type="hidden" name="id_identification" value="<?=$id_identification?>">

						<label>Niveau de formation</label>
						<?=form_dropdown('id_niveau_formation',$this->My_model->multi_dropdown('gr_niveaux_formation',['id_niveau_formation','nom_niveau_formation']),set_value('id_niveau_formation', $data->id_niveau_formation),"class='form-control select2', id= 'id_niveau_formation' ,placeholder='id_niveau_formation'")?>
						<?php echo form_error('id_niveau_formation','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3' id="niveau_autre">
						<label>Autre niveau</label>
						<?=form_input('niveau_autre',set_value('niveau_autre', $data->niveau_autre),"class='form-control' ,placeholder='niveau_autre'")?>
						<?php echo form_error('niveau_autre','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'><label>Departement</label>
					<?=form_dropdown('id_departement',$this->My_model->multi_dropdown('gr_departements',['id_departement','nom_departement']),set_value('id_departement', $data->id_departement),"class='form-control select2' ,placeholder='id_departement'")?>
					<?php echo form_error('id_departement','<span class="text-danger">', '</span>'); ?></div>
				
					<div class='form-group col-md-3'><label>Service</label>
					<?=form_dropdown('id_service',$this->My_model->multi_dropdown('gr_services',['id_service','nom_service']),set_value('id_service', $data->id_service),"class='form-control select2' ,placeholder='id_service'")?>
					<?php echo form_error('id_service','<span class="text-danger">', '</span>'); ?></div>
				
					<div class='form-group col-md-3'><label>Unite</label>
					<?=form_dropdown('id_unite',$this->My_model->multi_dropdown('gr_unites',['id_unite','nom_unite']),set_value('id_unite', $data->id_unite),"class='form-control select2' ,placeholder='id_unite'")?>
					<?php echo form_error('id_unite','<span class="text-danger">', '</span>'); ?></div>
				</div>
				
				<div class="row mb-4">
					<div class='form-group col-md-3'><label>Categorie</label>
					<?php 
					  $js_categorie = array(
						'id'       => 'id_categorie',
						'class'=>'form-control select2'
					  );
					?>
					<?=form_dropdown('id_categorie',$this->My_model->multi_dropdown('gr_categories',['id_categorie','nom_categorie']), set_value('id_categorie'), $js_categorie)?>
					<?php echo form_error('id_categorie','<span class="text-danger">', '</span>'); ?></div>

					<div class='form-group col-md-3' ><label>Sous categorie</label>
					<?=form_dropdown('id_sous_categorie',$this->My_model->multi_dropdown('gr_sous_categories',['id_sous_categorie','nom_sous_categorie']),set_value('id_sous_categorie', $data->id_sous_categorie),"class='form-control select2', id='id_sous_categorie'")?>
					<?php echo form_error('id_sous_categorie','<span class="text-danger">', '</span>'); ?></div>

					<div class='form-group col-md-3'><label>Statut</label>
					<?=form_dropdown('id_statut',$this->My_model->multi_dropdown('gr_statuts',['id_statut','nom_statut']),set_value('id_statut', $data->id_statut),"class='form-control' ,placeholder='id_statut'")?>
					<?php echo form_error('id_statut','<span class="text-danger">', '</span>'); ?></div>

					<div class='form-group col-md-3'><label>Fonction</label>
						<?=form_dropdown('id_fonction',$this->My_model->multi_dropdown('gr_fonctions',['id_fonction','nom_fonction']),set_value('id_fonction',  $data->id_fonction),"class='form-control select2' ,placeholder='id_fonction'")?>
						<?php echo form_error('id_fonction','<span class="text-danger">', '</span>'); ?>
					</div>
				</div>

				<div class="row mb-4">
					<div class='form-group col-md-3'>
						<label>Est candidat (Recrue)?</label> <br />
					<?php 
					  $data_candidat =[
						'name'=>'est_candidat',
						'checked'=> set_value('est_candidat', $data->est_candidat) == 1? TRUE:FALSE,
						'value' => '1', 
						]; 
					?>
					<?= form_checkbox($data_candidat);?> Oui
					<?php echo form_error('est_candidat','<span class="text-danger">', '</span>'); ?></div>

					<div class='form-group col-md-3'><label>Code Indemnite de risque des candidats</label>
					<?=form_input('code_indemnite_risque',set_value('code_indemnite_risque', $data->code_indemnite_risque),"class='form-control' ,placeholder='code_indemnite_risque'")?>
					<?php echo form_error('code_indemnite_risque','<span class="text-danger">', '</span>'); ?></div>

					<div class='form-group col-md-3'>
						<label>Est handicappe ?</label><br />
					<?php 
					  $data_handicape =[
						'name'=>'est_handicappe',
						'checked'=>set_value('est_handicappe', $data->est_handicappe) == 1? TRUE:FALSE,
						'value' => '1', 
						]; 
					?>
					<?= form_checkbox($data_handicape);?> Oui
					<?php echo form_error('est_handicappe','<span class="text-danger">', '</span>'); ?></div>

					<div class='form-group col-md-3'>
						<label>Paye MFP ?</label> <br />
						<?php 
						$data_use_mfp =[
							'name'=>'utilise_mfp',
							'checked'=>set_value('utilise_mfp', $data->utilise_mfp) == 1? TRUE:FALSE,
							'value' => '1', 
							]; 
						?>
						<?= form_checkbox($data_use_mfp);?> Oui
						<?php echo form_error('utilise_mfp','<span class="text-danger">', '</span>'); ?>
					</div>
				</div>


				<div class='row mb-4'>
					<div class='form-group col-md-3'><label>Grade </label>
						<?=form_dropdown('id_grade',$this->My_model->multi_dropdown('gr_grades',['id_grade','nom_grade']),set_value('id_grade',  $data->id_grade),"class='form-control select2' ,placeholder='Grade'")?>
						<?php echo form_error('id_grade','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'>
						<label>Obtenu le </label>

						<div class="input-group date" id="grade_obtenu_date" data-target-input="nearest">
							<?=form_input('grade_obtenu_date',set_value('grade_obtenu_date', $data->grade_obtenu_date),"class='form-control datetimepicker-input', id='grade_obtenu_date',placeholder='obtenu le'")?>
							<div class="input-group-append" data-target="#grade_obtenu_date" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
						</div>

						<?php echo form_error('grade_obtenu_date','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'>
						<label>Date d'embauche</label>

						<div class="input-group date" id="inputdate" data-target-input="nearest">
							<?=form_input('date_embauche',set_value('date_embauche', $data->date_embauche),"class='form-control datetimepicker-input', id='inputdate',placeholder='date_embauche'")?>
							<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
						</div>

						<?php echo form_error('date_embauche','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'>
						<label>Prime-sante-Accordee</label>
						<?=form_input('prime_sante',set_value('prime_sante', $data->prime_sante),"class='form-control' ,placeholder='prime_sante'")?>
						<?php echo form_error('prime_sante','<span class="text-danger">', '</span>'); ?>
					</div>					
				</div>

				<div class='row mb-4'>	
					<div class='form-group col-md-3'>
						<label>Salaire de base</label>
						<?=form_input('salaire_base',set_value('salaire_base', $data->salaire_base),"class='form-control' ,placeholder='salaire_base'")?>
						<?php echo form_error('salaire_base','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'>
						<label>Specialite</label>
						<?=form_dropdown('id_specialite',$this->My_model->multi_dropdown('gr_specialites', ['id_specialite','nom_specialite']),set_value('id_specialite', $data->id_specialite),"class='form-control select2' ,placeholder='id_specialite'")?>
						<?php echo form_error('id_specialite','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'>
						<label>Ref. avancement de grade</label>
						<?=form_input('ref_avancement_grade',set_value('ref_avancement_grade', $data->ref_avancement_grade),"class='form-control' ,placeholder='ref_avancement_grade'")?>
						<?php echo form_error('ref_avancement_grade','<span class="text-danger">', '</span>'); ?>
					</div>

					<div class='form-group col-md-3'>
						<label>Ref. de l'affectation</label>
						<?=form_input('ref_affectation',set_value('ref_affectation', $data->ref_affectation),"class='form-control' ,placeholder='ref_affectation'")?>
						<?php echo form_error('ref_affectation','<span class="text-danger">', '</span>'); ?>
					</div>
				</div>

				<div class='row' style="margin:6px">
					<?=form_submit('','Ajouter une Fiche de carriere','class="btn btn-sm btn-primary-cust"')?>
				</div>
		  	 </div>
			</div>
	    </div>
      </div>
    </section>
</div>