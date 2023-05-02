<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

			<div class="card card-info-cust card-outline">
				
			<div class="card-header">
				<h3 class="card-title text-uppercase">Editer une Cotation</h3>
				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Cotations/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Cotations/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

			<div class="card-body">
			<?=form_open('mouvement/Cotations/edit/',NULL, ['id_cotation'=>$data->id_cotation])?>


			<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-4'><label>Type cote</label><?php echo form_error('id_type_cote'); ?>
			<?=form_dropdown('id_type_cote',$this->My_model->multi_dropdown('mv_types_cote',['id_type_cote','type_cote']),set_value('id_type_cote,',$data->id_type_cote),"class='form-control' placeholder='id_type_cote'")?>
					<?php echo form_error('id_type_cote','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Code</label><?php echo form_error('code'); ?>
			<?=form_input('code',set_value('code', $data->code),"class='form-control' placeholder='Code'")?>
			<?php echo form_error('code','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Annee</label><?php echo form_error('annee'); ?>
			<?=form_input('annee',set_value('annee',$data->annee),"class='form-control' placeholder='annee'")?>
						<?php echo form_error('annee','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Point 1</label><?php echo form_error('points1'); ?>
			<?=form_input('points1',set_value('points1',$data->points1),"class='form-control' placeholder='points1'")?>
						<?php echo form_error('points1','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Point 2</label><?php echo form_error('points2'); ?>
			<?=form_input('points2',set_value('points2',$data->points2),"class='form-control' placeholder='points2'")?>
						<?php echo form_error('points2','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Note obtenue</label><?php echo form_error('note_obtenue'); ?>
			<?=form_input('note_obtenue',set_value('note_obtenue',$data->note_obtenue),"class='form-control' placeholder='note_obtenue'")?>
						<?php echo form_error('note_obtenue','<div class="text-danger">', '</div>'); ?></div>

		</div>
		
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>