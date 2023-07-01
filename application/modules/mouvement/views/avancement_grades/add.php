
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
        <div class="card card-info-cust card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Enregistrer un avancement grade</h3>
					<span class="float-right"> 
						<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Avancement_grades/add/')?>"><i class='fa fa-file'></i>
							<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
						</a>

						<a class='btn btn-sm' href="<?php echo base_url('mouvement/Avancement_grades/index')?>"><i class='fa fa-list'></i>
							<span class='d-none d-sm-inline'>&nbsp;Liste</span>
						</a>     
					</span>
				</div>  

		<div class="card-body">
		
			<?=form_open_multipart('gr/Fiche_identification/search')?>
				<div class="col-md-12">
					<div class="row">                        
						<div class='col-md-3'><label><?=$this->lang->line('identity_form_matricule')?></label>
							<?=form_input('s_matricule','',"class='form-control' placeholder='matricule'")?>
							<?php echo form_error('s_matricule','<span class="text-danger">', '</span>'); ?>
						</div>

						<div class='col-md-3'><label><?=$this->lang->line('identity_form_new_matricule')?></label> 
							<?=form_input('s_nouveau_matricule','',"class='form-control' placeholder='nouveau_matricule'")?>
							<?php echo form_error('s_nouveau_matricule','<span class="text-danger">', '</span>'); ?>
						</div>

						<div class='col-md-3'><label><?=$this->lang->line('identity_form_old_matricule')?></label>
							<?=form_input('s_ancien_matricule','',"class='form-control' placeholder='ancien_matricule'")?>
							<?php echo form_error('ancien_matricule','<span class="text-danger">', '</span>'); ?>
						</div>  
						
						<div class='col-md-3'>
							<?=form_submit('',"Chercher",'class="btn btn-sm btn-primary-cust" style="margin-top:35px"')?>
						</div>                      
					</div>
				</div>
			<?=form_close()?>
			<hr />

		<?=form_open('mouvement/Avancement_grades/add')?>

		<div class="row">
		<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-3'>
				<label>Annee</label>
				<?=form_input('annee',set_value('annee', date('Y')),"class='form-control' placeholder='Annee'")?>
				<?php echo form_error('annee','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date d'avancement</label>
				<div class="input-group date" id="date_avancement" data-target-input="nearest">
					<?=form_input('date_avancement',set_value('date_avancement', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_avancement',placeholder='Date'")?>
					<div class="input-group-append" data-target="#date_avancement" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_avancement','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Catégorie</label>
				<?=form_dropdown('id_categorie',$this->My_model->multi_dropdown('gr_categories',['id_categorie', 'nom_categorie']),set_value('id_categorie', $data->id_categorie),"class='form-control' placeholder='id_categorie'")?>
				<?php echo form_error('id_categorie','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ancien grade</label>
				<?=form_dropdown('id_ancien_grade',$this->My_model->multi_dropdown('gr_grades',['id_grade', 'nom_grade']),set_value('id_ancien_grade', $data->id_nouveau_grade),"class='form-control' placeholder='id_ancien_grade'")?>
				<?php echo form_error('id_ancien_grade','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nouveau grade</label>
				<?=form_dropdown('id_nouveau_grade',$this->My_model->multi_dropdown('gr_grades',['id_grade', 'nom_grade']),set_value('id_nouveau_grade'),"class='form-control' placeholder='id_nouveau_grade'")?>
				<?php echo form_error('id_nouveau_grade','<div class="text-danger">', '</div>'); ?>
			</div>

			

			<div class='col-md-3'>
				<label>Ancien salaire base</label>
				<?=form_input('ancien_salaire_base',set_value('ancien_salaire_base', $data->nouveau_salaire_base),"class='form-control' placeholder='ancien_salaire_base'")?>
				<?php echo form_error('ancien_salaire_base','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nouveau salaire base</label>
				<?=form_input('nouveau_salaire_base',set_value('nouveau_salaire_base'),"class='form-control' placeholder='nouveau_salaire_base'")?>
				<?php echo form_error('nouveau_salaire_base','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. avancement</label>
				<?=form_input('ref_avancement',set_value('ref_avancement'),"class='form-control' placeholder='ref_avancement'")?>
				<?php echo form_error('ref_avancement','<div class="text-danger">', '</div>'); ?>
			</div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div></section></div>