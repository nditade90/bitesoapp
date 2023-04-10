
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un corps d'origine</h3>

                <span class="float-right">
                    <?php include_once "menu_corps_origine.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('gr/Corps_origine/index')?>
		

			<div class='form-group'><label>Code</label>
			<?=form_input('code_corps_origine',set_value('code_corps_origine'),"class='form-control' ,placeholder='Code'")?>
			<?php echo form_error('code_corps_origine','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Corps d'origine</label>
			<?=form_input('nom_corps_origine',set_value('nom_corps_origine'),"class='form-control' ,placeholder='nom_corps_origine'")?>
			<?php echo form_error('nom_corps_origine','<div class="text-danger">', '</div>'); ?></div>

		<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Corps d'origine</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Corps d'origine</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_corps_origine?></td>
					<td><?=$data->code_corps_origine?></td>
					<td><?=$data->nom_corps_origine?></td>
					<td>
						<a href='<?=base_url('gr/Corps_origine/edit/0/'.$data->id_corps_origine);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Corps_origine/delete/'.$data->id_corps_origine);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>