<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
			<div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Editer un niveau d'etudes faite</h3>
				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('mouvement/Formations_stages/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Formations_stages/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>
	
			<div class="card-body">
			<?=form_open('mouvement/Etudes_faites/edit/',NULL, ['id_etudes'=>$data->id_etudes])?>


			<div class="row">

			<input type="hidden" name="id_identification" value="<?=$id_identification?>">
		

			<div class='col-md-3'><label>Type du niveau d'etude</label><?php echo form_error('id_type_etudes'); ?>
				<?=form_dropdown('id_type_etudes',$this->My_model->multi_dropdown('mv_types_etudes',['id_types_etudes','type_etudes']),set_value('id_type_etudes,',$data->id_type_etudes),"class='form-control' placeholder='id_type_etudes'")?>
				<?php echo form_error('id_type_etudes','<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class='col-md-3'><label>Periode d'etude</label><?php echo form_error('periode_etude'); ?>
				<?=form_input('periode_etude',set_value('periode_etude',$data->periode_etude),"class='form-control' placeholder='Periode d-etude'")?>
				<?php echo form_error('periode_etude','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'><label>Pays</label><?php echo form_error('id_pays'); ?>
				<?=form_dropdown('id_pays',$this->My_model->multi_dropdown('gr_pays',['id_pays','nom_pays']),set_value('id_pays,',$data->id_pays),"class='form-control select2' placeholder='id_pays'")?>
				<?php echo form_error('id_pays','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date d'obtention</label><?php echo form_error('date_obtention'); ?>
				
				<div class="input-group date" id="date_obtention" data-target-input="nearest">
					<?=form_input('date_obtention',set_value('date_obtention', $data->date_obtention),"class='form-control datetimepicker-input', id='date_obtention',placeholder='date_obtention'")?>
					<div class="input-group-append" data-target="#date_obtention" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_obtention','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'><label>Etablissement</label><?php echo form_error('etablissement'); ?>
			<?=form_input('etablissement',set_value('etablissement',$data->etablissement),"class='form-control' placeholder='Etablissement'")?>
						<?php echo form_error('etablissement','<div class="text-danger">', '</div>'); ?></div>

			

			<div class='col-md-3'><label>Ref. equivalance</label><?php echo form_error('ref_equivalence'); ?>
			<?=form_input('ref_equivalence',set_value('ref_equivalence',$data->ref_equivalence),"class='form-control' placeholder='Ref. equivalence'")?>
						<?php echo form_error('ref_equivalence','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>Note obtenue</label><?php echo form_error('note_obtenue'); ?>
			<?=form_input('note_obtenue',set_value('note_obtenue',$data->note_obtenue),"class='form-control' placeholder='Note'")?>
						<?php echo form_error('note_obtenue','<div class="text-danger">', '</div>'); ?></div>

			

			

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div></section></div>