<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_historique_grades.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<h3 class="card-title text-bold">Editer un/une Historique_grades: </h3><br>
			<?=form_open('gr/Historique_grades/edit/',NULL, [''=>$data->id_identification])?>


			<div class="row">			<div class='col-md-3'><label>date_grade</label><?php echo form_error('date_grade'); ?>
			<?=form_input('date_grade',set_value('date_grade',$data->date_grade),"class='form-control' placeholder='date_grade'")?>
						<?php echo form_error('date_grade','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>ref_avancement</label><?php echo form_error('ref_avancement'); ?>
			<?=form_input('ref_avancement',set_value('ref_avancement',$data->ref_avancement),"class='form-control' placeholder='ref_avancement'")?>
						<?php echo form_error('ref_avancement','<div class="text-danger">', '</div>'); ?></div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></section></div>