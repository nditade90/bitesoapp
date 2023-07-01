
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Ajouter une fiche de renforcement</h3>
				<span class="float-right"> 
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Renforcements/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-sm' href="<?php echo base_url('mouvement/Renforcements/index')?>"><i class='fa fa-list'></i>
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

		<?=form_open('mouvement/Renforcements/add')?>	


		<div class="row">			
		<input type="hidden" name="id_identification" value="<?=$id_identification?>">


			<div class='col-md-3'>
				<label>Type renforcement</label>
				<?=form_dropdown('id_type_renforcement',$this->My_model->multi_dropdown('mv_types_renforcement', ['id_type_renforcement','type_renforcement']),set_value('id_type_renforcement'),"class='form-control' placeholder='id_type_renforcement'")?>
				<?php echo form_error('id_type_renforcement','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Diplôme obtenu</label>
				<?=form_input('titre_obtenu',set_value('titre_obtenu'),"class='form-control' placeholder='titre_obtenu'")?>
				<?php echo form_error('titre_obtenu','<div class="text-danger">', '</div>'); ?>
			</div>			

			<div class='col-md-3'>
				<label>Date de départ</label>

				<div class="input-group date" id="date_depart" data-target-input="nearest">
					<?=form_input('date_depart',set_value('date_depart', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_depart',placeholder='Date de depart'")?>
					<div class="input-group-append" data-target="#date_depart" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_depart','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nombre de Jours</label>
				<?=form_input('nb_jours',set_value('nb_jours'),"class='form-control' placeholder='nb_jours'")?>
				<?php echo form_error('nb_jours','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Pays</label>
				<?=form_dropdown('id_pays',$this->My_model->multi_dropdown('gr_pays', ['id_pays','nom_pays']),set_value('id_pays'),"class='form-control' placeholder='id_pays'")?>
				<?php echo form_error('id_pays','<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class='col-md-3'>
				<label>Ref. de renforcement</label>
				<?=form_input('ref_renforcement',set_value('ref_renforcement'),"class='form-control' placeholder='ref_renforcement'")?>
				<?php echo form_error('ref_renforcement','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de retour</label>
				<div class="input-group date" id="date_retour" data-target-input="nearest">
					<?=form_input('date_retour',set_value('date_retour', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_retour',placeholder='Date de retour'")?>
					<div class="input-group-append" data-target="#date_retour" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_retour','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>