
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_types_infraction.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold">Ajouter un type d'infraction</h3><br>
		<?=form_open('mouvement/Types_infraction/index')?>
		

			<div class='form-group'><label>Code</label>
			<?=form_input('code_infraction',set_value('code_infraction'),"class='form-control' placeholder='code_infraction'")?>
						<?php echo form_error('code_infraction','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Nom de l'infraction</label>
			<?=form_input('nom_infraction',set_value('nom_infraction'),"class='form-control' placeholder='nom_infraction'")?>
						<?php echo form_error('nom_infraction','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types d'infraction</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Nom d'un infraction</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_infraction?></td>
					<td><?=$data->code_infraction?></td>
					<td><?=$data->nom_infraction?></td>
					<td><a href='<?=base_url('mouvement/Types_infraction/view/'.$data->id_type_infraction);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('mouvement/Types_infraction/edit/0/'.$data->id_type_infraction);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Types_infraction/delete/'.$data->id_type_infraction);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>