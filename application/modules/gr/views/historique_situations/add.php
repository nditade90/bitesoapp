
	<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
		
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Ajouter un historique de situation</h3>  
				
				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('gr/Historique_situations/add/')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Historique_situations/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>
		<div class="card-body">
		
		<?=form_open('gr/Historique_situations/add')?>
		
		<div class="row">			
			<div class='col-md-6'>
				<input type="hidden" name="id_identification" value="<?=$id_identification?>">
				<label>Situation</label>
				<?=form_dropdown('id_situation',$this->My_model->multi_dropdown('gr_situations', ['id_situation','nom_situation']),set_value('id_situation'),"class='form-control select2' placeholder='id_situation'")?>
				<?php echo form_error('id_situation','<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">			
			<div class='col-md-3'>
				<label>Date debut</label>
				<?=form_input('date_debut',set_value('date_debut'),"class='form-control' placeholder='date_debut'")?>
				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date fin</label>
				<?=form_input('date_fin',set_value('date_fin'),"class='form-control' placeholder='date_fin'")?>
				<?php echo form_error('date_fin','<div class="text-danger">', '</div>'); ?>
			</div>
		</div>
		<div class="row">			
			<div class='col-md-6'>
				<label>Observation</label>
				<?=form_textarea('observation',set_value('observation'),"class='form-control' placeholder='observation'")?>
				<?php echo form_error('observation','<div class="text-danger">', '</div>'); ?>
			</div>			
		</div>
			<div class='row' style="margin:6px">
				<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
			</div>
	</section>
</div>