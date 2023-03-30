
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            

		<div class="card-body">
		
		<h3 class="card-title text-bold">Ajouter une Grade</h3><br>
		<?=form_open('gr/Grades/add')?>
		


		<div class="row">			
			<div class='col-md-3'><label>Code</label>
			<?=form_input('code_grade',set_value('code_grade'),"class='form-control' placeholder='code_grade'")?>
						<?php echo form_error('code_grade','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>Nom du grade</label>
			<?=form_input('nom_grade',set_value('nom_grade'),"class='form-control' placeholder='nom_grade'")?>
						<?php echo form_error('nom_grade','<div class="text-danger">', '</div>'); ?></div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?><?=form_close()?>
		</div></section></div>