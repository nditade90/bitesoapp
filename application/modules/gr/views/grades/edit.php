<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_grades.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<h3 class="card-title text-bold">Editer une grade </h3><br>
			<?=form_open('gr/Grades/edit/',NULL, ['id_grade'=>$data->id_grade])?>


			<div class="row">			<div class='col-md-3'><label>code</label><?php echo form_error('code_grade'); ?>
			<?=form_input('code_grade',set_value('code_grade',$data->code_grade),"class='form-control' placeholder='code_grade'")?>
						<?php echo form_error('code_grade','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>Nom du grade</label><?php echo form_error('nom_grade'); ?>
			<?=form_input('nom_grade',set_value('nom_grade',$data->nom_grade),"class='form-control' placeholder='nom_grade'")?>
						<?php echo form_error('nom_grade','<div class="text-danger">', '</div>'); ?></div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></section></div>