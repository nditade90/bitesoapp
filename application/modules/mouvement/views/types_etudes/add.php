
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un type d'étude</h3>

                <span class="float-right">
                    <?php include_once "menu_types_etudes.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('mouvement/Types_etudes/index')?>
		

			<div class='form-group'><label>Type d'étude</label>
			<?=form_input('type_etudes',set_value('type_etudes'),"class='form-control' placeholder='type_etudes'")?>
						<?php echo form_error('type_etudes','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types d'études</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type d'étude</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_types_etudes?></td>
					<td><?=$data->type_etudes?></td>
					<td>
						<a href='<?=base_url('mouvement/Types_etudes/edit/0/'.$data->id_types_etudes);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('mouvement/Types_etudes/delete/'.$data->id_types_etudes);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>