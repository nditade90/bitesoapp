
<div class="content-wrapper" style="min-height: 357.039px;">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un entrée en service</h3>

                <span class="float-right">
                    <?php include_once "menu_entrees_en_service.php";?>
                </span>

            </div>

		<div class="card-body">
		
		<h3 class="card-title text-bold"></h3><br>
		<?=form_open('mouvement/Entrees_en_service/add')?>		


		<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">
			
			<div class='col-md-4'>
				<label>Lieu d'entrée</label>
				<?=form_input('lieu_entree',set_value('lieu_entree'),"class='form-control' placeholder='lieu_entree'")?>
				<?php echo form_error('lieu_entree','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'>
				<label>Date de début</label>
				<div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_debut',placeholder='Date de début'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_debut','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'>
				<label>Date de fin</label>
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin', date('Y-m-d')),"class='form-control datetimepicker-input', id='date_fin',placeholder='Date fin'")?>
					<div class="input-group-append" data-target="#date_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_fin','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'>
				<label>Durée de contrat</label>
				<?=form_input('duree_contrat',set_value('duree_contrat'),"class='form-control' placeholder='duree_contrat'")?>
				<?php echo form_error('duree_contrat','<div class="text-danger">', '</div>'); ?></div>

		</div>
<div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?><?=form_close()?>
		</div></section></div>