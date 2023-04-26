<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

			<div class="card card-info-cust card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Editer un ayant droit:<b><?=$data->nom .' '.$data->prenoms?></h3>

					<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('gr/Fiche_identification/view/'.$id_identification)?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Retour sur détail</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Fiche_identification/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste des fiches</span>
					</a>     
				</span>
				</div>
					
			<div class="card-body">
			<?=form_open('gr/Ayants_droit/edit/',NULL, ['id_ayant_droit'=>$data->id_ayant_droit])?>


			<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">
				
			<div class='col-md-3'>
				<label>Categorie</label>
				<?php echo form_error('id_categorie_ayant_droit'); ?>
				<?=form_dropdown('id_categorie_ayant_droit',$this->My_model->multi_dropdown('gr_categorie_ayant_droits', ['id_categorie_ayant_droit','nom_categorie']),set_value('id_categorie_ayant_droit,',$data->id_categorie_ayant_droit),"class='form-control select2' id='id_categorie_ayant_droit' placeholder='id_categorie_ayant_droit'")?>
				<?php echo form_error('id_categorie_ayant_droit','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nom</label>
				<?php echo form_error('nom'); ?>
				<?=form_input('nom',set_value('nom',$data->nom),"class='form-control' placeholder='nom'")?>
				<?php echo form_error('nom','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Prenom</label>
				<?php echo form_error('prenoms'); ?>
				<?=form_input('prenoms',set_value('prenoms',$data->prenoms),"class='form-control' placeholder='prenoms'")?>
				<?php echo form_error('prenoms','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de naissance</label>

				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_naissance',set_value('date_naissance', $data->date_naissance),"class='form-control datetimepicker-input', id='inputdate' placeholder='date_naissance'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_naissance','<span class="text-danger">', '</span>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. de l'extrait de naissance</label>
				<?php echo form_error('ref_extrait_naissance'); ?>
				<?=form_input('ref_extrait_naissance',set_value('ref_extrait_naissance',$data->ref_extrait_naissance),"class='form-control' placeholder='ref_extrait_naissance'")?>
				<?php echo form_error('ref_extrait_naissance','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3' id='date_marriage_div'>
				<label>Date de marriage</label>

				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_marriage',set_value('date_marriage',$data->date_marriage),"class='form-control datetimepicker-input', id='date_marriage' placeholder='date_marriage'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_marriage','<span class="text-danger">', '</span>'); ?>

			</div>

			<div class='col-md-3' id='ref_extrait_marriage_div'>
				<label>Ref. de l'extrait de marriage</label>
				<?php echo form_error('ref_extrait_marriage'); ?>
				<?=form_input('ref_extrait_marriage',set_value('ref_extrait_marriage',$data->ref_extrait_marriage),"class='form-control' placeholder='ref_extrait_marriage'")?>
				<?php echo form_error('ref_extrait_marriage','<div class="text-danger">', '</div>'); ?></div>

			<?php if($identification->id_etat_civil == 3){ ?>
				<div class='col-md-3'><label>Date de divorce</label>

				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_divorce',set_value('date_divorce',$data->date_divorce),"class='form-control datetimepicker-input', id='date_divorce' placeholder='date_marriage'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_divorce','<span class="text-danger">', '</span>'); ?>

				</div>
			<?php } ?>

			<?php if($identification->id_etat_civil == 6){ ?>
				<div class='col-md-3'>
					<label>Date de deces</label><?php echo form_error('date_deces'); ?>

					<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_deces',set_value('date_deces',$data->date_deces),"class='form-control datetimepicker-input', id='date_deces' placeholder='date_deces'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>

					<?php echo form_error('date_deces','<span class="text-danger">', '</span>'); ?>

				</div>
			<?php } ?>

			<?php if($identification->id_etat_civil == 6){ ?>
				<div class='col-md-3'>
					<label>Ref. de certificat de deces</label><?php echo form_error('ref_cert_deces'); ?>
					<?=form_input('ref_cert_deces',set_value('ref_cert_deces',$data->ref_cert_deces),"class='form-control' placeholder='ref_cert_deces'")?>
					<?php echo form_error('ref_cert_deces','<div class="text-danger">', '</div>'); ?>
				</div>
			<?php } ?>

			<div class='col-md-3'><label>Prise en charge</label><?php echo form_error('prise_en_charge'); ?>
			<?=form_input('prise_en_charge',set_value('prise_en_charge',$data->prise_en_charge),"class='form-control' placeholder='prise_en_charge'")?>
						<?php echo form_error('prise_en_charge','<div class="text-danger">', '</div>'); ?></div>
	   </div>
		<div class='row' style="margin:6px">
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary-cust"')?><?=form_close()?>
		</div></section></div>