
<div class="content-wrapper" style="min-height: 357.039px;">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter une mission</h3>

                <span class="float-right">
                    <?php include_once "menu_missions.php";?>
                </span>

            </div>

		<div class="card-body">
		
		<h3 class="card-title text-bold"></h3><br>
		<?=form_open('mouvement/Missions/add')?>
		


		<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">
			
			<div class='col-md-3'>
				<label>Type de mission</label>
				<?=form_dropdown('id_type_mission',$this->My_model->multi_dropdown('mv_types_missions',['id_type_mission','type_mission']),set_value('id_type_mission'),"class='form-control' placeholder='id_type_mission'")?>
				<?php echo form_error('id_type_mission','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Contingent</label>
				<?=form_input('contingent',set_value('contingent'),"class='form-control' placeholder='contingent'")?>
				<?php echo form_error('contingent','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Bataillon</label>
				<?=form_input('bataillon',set_value('bataillon'),"class='form-control' placeholder='bataillon'")?>
				<?php echo form_error('bataillon','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Fonction</label>
				<?=form_input('fonction',set_value('fonction'),"class='form-control' placeholder='fonction'")?>
				<?php echo form_error('fonction','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Date de debut</label>				
				<div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_debut',placeholder='Date debut'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'>
				<label>Date de fin</label>
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_fin',placeholder='Date fin'")?>
					<div class="input-group-append" data-target="#date_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_fin','<div class="text-danger">', '</div>'); ?></div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?><?=form_close()?>
		</div></section></div>