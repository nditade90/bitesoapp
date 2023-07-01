
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Enregistrer une action disciplinaire</h3>
				<span class="float-right"> 
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Actions_disciplinaires/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-sm' href="<?php echo base_url('mouvement/Actions_disciplinaires/index')?>"><i class='fa fa-list'></i>
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

		<?=form_open('mouvement/Actions_disciplinaires/add')?>	


		<div class="row">	
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-3'>
				<label>Date d'ouverture</label>
				<div class="input-group date" id="date_ouverture" data-target-input="nearest">
					<?=form_input('date_ouverture',set_value('date_ouverture'),"class='form-control datetimepicker-input', id='date_ouverture' placeholder='date_ouverture'")?>
					<div class="input-group-append" data-target="#date_ouverture" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_ouverture','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Type de la punition</label>
				<?=form_dropdown('id_type_punition',$this->My_model->multi_dropdown('mv_types_punition',['id_type_punition','nom_type_punition']),set_value('id_type_punition'),"class='form-control' placeholder='id_type_punition'")?>
				<?php echo form_error('id_type_punition','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nombre de jours</label>
				<?=form_input('nb_jours_punition',set_value('nb_jours_punition'),"class='form-control' placeholder='nb_jours_punition'")?>
				<?php echo form_error('nb_jours_punition','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de cloture</label>
				<div class="input-group date" id="date_cloture" data-target-input="nearest">
					<?=form_input('date_cloture',set_value('date_cloture'),"class='form-control datetimepicker-input', id='date_cloture' placeholder='date_cloture'")?>
					<div class="input-group-append" data-target="#date_cloture" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_cloture','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. de la cloture</label>
				<?=form_input('ref_cloture',set_value('ref_cloture'),"class='form-control' placeholder='ref_cloture'")?>
				<?php echo form_error('ref_cloture','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de levée</label>
				<div class="input-group date" id="date_levee" data-target-input="nearest">
					<?=form_input('date_levee',set_value('date_levee'),"class='form-control datetimepicker-input', id='date_levee' placeholder='date_levee'")?>
					<div class="input-group-append" data-target="#date_levee" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_levee','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Autorité de décision</label>
				<?=form_input('autorite_decision',set_value('autorite_decision'),"class='form-control' placeholder='autorite_decision'")?>
				<?php echo form_error('autorite_decision','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. de levée</label>
				<?=form_input('ref_levee',set_value('ref_levee'),"class='form-control' placeholder='ref_levee'")?>
				<?php echo form_error('ref_levee','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Observation</label>
				<?php 
					$options = array(
						'name' => 'observation',
						'rows' => '3',
						'class' => 'form-control',
						'placeholder' => 'Observation',
						'value'=> set_value('observation')
					);
				?>
				<?=form_textarea($options)?>
				<?php echo form_error('observation','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>