
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
           

		<div class="card-body">
		
		<h3 class="card-title text-bold">Avancement de grade</h3><br>
		<?=form_open('gr/Historique_grades/add')?>
		


		<div class="row">			
			<div class='col-md-3'><label>date_grade</label>
			<?=form_input('date_grade',set_value('date_grade'),"class='form-control' placeholder='date_grade'")?>
						<?php echo form_error('date_grade','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-3'><label>Ref avancement</label>
			<?=form_input('ref_avancement',set_value('ref_avancement'),"class='form-control' placeholder='ref_avancement'")?>
						<?php echo form_error('ref_avancement','<div class="text-danger">', '</div>'); ?></div>

</div><div class='row' style='margin:6px'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?><?=form_close()?>
		</div></section></div>