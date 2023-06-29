
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un type de congé</h3>

                <span class="float-right">
                    <?php include_once "menu_types_conges.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold"></h3><br>
		<?=form_open('datas/Types_conges/index')?>
		

			<div class='form-group'>
				<label>Code</label>
			<?=form_input('code',set_value('code'),"class='form-control' placeholder='code'")?>
						<?php echo form_error('code','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Type de congé</label>
			<?=form_input('type_conge',set_value('type_conge'),"class='form-control' placeholder='type_conge'")?>
						<?php echo form_error('type_conge','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Nombre de jours</label>
			<?=form_input('nb_jour',set_value('nb_jour'),"class='form-control' placeholder='nb_jour'")?>
						<?php echo form_error('nb_jour','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de congé</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Type de congé</th>
			<th>Nombre jours</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_conge?></td>
					<td><?=$data->code?></td>
					<td><?=$data->type_conge?></td>
					<td><?=$data->nb_jour?></td>
					<td>
						<a href='<?=base_url('datas/Types_conges/edit/0/'.$data->id_type_conge);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Types_conges/delete/'.$data->id_type_conge);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>