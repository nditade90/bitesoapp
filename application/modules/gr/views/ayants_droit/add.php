
	<div class="content-wrapper" style="min-height: 357.039px;">
     <section class="content">
	 	
	 	<?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info-cust card-outline">
        	<div class="card-header">
				<h3 class="card-title text-uppercase">Ajouter un ayant droit</h3>
				
				<?=form_open('gr/Ayants_droit/add')?>

				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('gr/Ayants_droits/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a> 
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Ayants_droits/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">		
		

		<div class="row">			
			<input type="hidden" name="id_identification" value="00">
			
			<div class='col-md-3'><label>Categorie</label>
				<?=form_dropdown('id_categorie_ayant_droit',$this->My_model->multi_dropdown('gr_categorie_ayant_droits', ['id_categorie_ayant_droit','nom_categorie']),set_value('id_categorie_ayant_droit'),"class='form-control select2' id='id_categorie_ayant_droit' placeholder='id_categorie_ayant_droit'")?>
				<?php echo form_error('id_categorie_ayant_droit','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'><label>Nom</label>
			<?=form_input('nom',set_value('nom'),"class='form-control' placeholder='nom'")?>
						<?php echo form_error('nom','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>Prenom</label>
			<?=form_input('prenoms',set_value('prenoms'),"class='form-control' placeholder='prenoms'")?>
						<?php echo form_error('prenoms','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Date de Naissance</label>
				
				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_naissance',set_value('date_naissance'),"class='form-control datetimepicker-input', id='inputdate' placeholder='date_naissance'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_naissance','<span class="text-danger">', '</span>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. Extrait de naissance</label>
				<?=form_input('ref_extrait_naissance',set_value('ref_extrait_naissance'),"class='form-control' placeholder='ref_extrait_naissance'")?>
				<?php echo form_error('ref_extrait_naissance','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3' id='date_marriage_div'>
				<label>Date de mariage</label>
				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_marriage',set_value('date_marriage'),"class='form-control datetimepicker-input', id='date_marriage' placeholder='date_marriage'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_marriage','<span class="text-danger">', '</span>'); ?>
			</div>

			<div class='col-md-3' id='ref_extrait_marriage_div' >
				<label>Ref extrait de mariage</label>
				<?=form_input('ref_extrait_marriage',set_value('ref_extrait_marriage'),"class='form-control' placeholder='ref_extrait_marriage'")?>
				<?php echo form_error('ref_extrait_marriage','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3' >
				<label>Date de divorce</label>
				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_divorce',set_value('date_divorce'),"class='form-control datetimepicker-input', id='date_divorce' placeholder='date_marriage'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_divorce','<span class="text-danger">', '</span>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date deces</label>
				<div class="input-group date" id="inputdate" data-target-input="nearest">
				<?=form_input('date_deces',set_value('date_deces'),"class='form-control datetimepicker-input', id='date_deces' placeholder='date_deces'")?>
				<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
					<div class="input-group-text"><i class="fa fa-calendar"></i></div>
				</div>

				<?php echo form_error('date_deces','<span class="text-danger">', '</span>'); ?>
				</div>
			</div>
			

			<div class='col-md-3'><label>Ref. certificat de deces</label>
				<?=form_input('ref_cert_deces',set_value('ref_cert_deces'),"class='form-control' placeholder='ref_cert_deces'")?>
				<?php echo form_error('ref_cert_deces','<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class='col-md-3'>
				<label>Prise en charge</label>
				<?=form_input('prise_en_charge',set_value('prise_en_charge'),"class='form-control' placeholder='prise_en_charge'")?>
				<?php echo form_error('prise_en_charge','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
	
		<div class='row' style="margin:6px">
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust", style="margin-top:20px"')?><?=form_close()?>
		</div>
	</section>
</div>