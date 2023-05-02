
	<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Ajouter une dictinction honorifique</h3>
				<span class="float-right"> 
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Dictinctions_honorifiques/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Dictinctions_honorifiques/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">
		
		<?=form_open('mouvement/Dictinctions_honorifiques/add')?>
		


		<div class="row">			
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-3'>
				<label>Type distiction</label>
				<?=form_dropdown('id_type_distiction',$this->My_model->multi_dropdown('mv_type_distiction_honorifiques',['id_type_distiction','type_distiction']),set_value('id_type_distiction'),"class='form-control' placeholder='id_type_distiction'")?>
				<?php echo form_error('id_type_distiction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date de distiction</label>
				
				<div class="input-group date" id="date_distiction" data-target-input="nearest">
					<?=form_input('date_distiction',set_value('date_distiction', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_distiction',placeholder='Date de distinction'")?>
					<div class="input-group-append" data-target="#date_distiction" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_distiction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. de distiction</label>
				<?=form_input('ref_distiction',set_value('ref_distiction'),"class='form-control' placeholder='ref_distiction'")?>
				<?php echo form_error('ref_distiction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Observations</label>
				<?=form_input('observations',set_value('observations'),"class='form-control' placeholder='observations'")?>
				<?php echo form_error('observations','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?><?=form_close()?>
		</div>
	</section>
</div>