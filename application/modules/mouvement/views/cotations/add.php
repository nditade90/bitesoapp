
	<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
        
		<div class="card card-info-cust card-outline">

			<div class="card-header">
				<h3 class="card-title text-uppercase">Faire une Cotation</h3>
				<span class="float-right"> 
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Cotations/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-sm' href="<?php echo base_url('mouvement/Cotations/index')?>"><i class='fa fa-list'></i>
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

		
		<?=form_open('mouvement/Cotations/add')?>	


		<div class="row">			
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-4'><label>Type cote</label>
			<?=form_dropdown('id_type_cote',$this->My_model->multi_dropdown('mv_types_cote', ['id_type_cote','type_cote']),set_value('id_type_cote'),"class='form-control' placeholder='id_type_cote'")?>
					<?php echo form_error('id_type_cote','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Code</label>
				<?=form_input('code',set_value('code'),"class='form-control' placeholder='Code'")?>
				<?php echo form_error('code','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Annee</label>
				<?=form_input('annee',set_value('annee', date('Y')),"class='form-control' placeholder='annee'")?>
				<?php echo form_error('annee','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Point 1</label>
				<?=form_input('points1',set_value('points1',0),"class='form-control' placeholder='points1'")?>
				<?php echo form_error('points1','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Point 2</label>
				<?=form_input('points2',set_value('points2',0),"class='form-control' placeholder='points2'")?>
				<?php echo form_error('points2','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Note obtenue</label>
				<?=form_input('note_obtenue',set_value('note_obtenue'),"class='form-control' placeholder='note_obtenue'")?>
				<?php echo form_error('note_obtenue','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div>

		<?=form_close()?>
	</section>
</div>