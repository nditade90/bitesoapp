<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer d'un type peine: <?=$data->nom_type_peine?></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_peine.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('mouvement/Types_peine/edit/',NULL, ['id_type_peine'=>$data->id_type_peine])?>

			<div class='form-group'><label>Code</label><?php echo form_error('code_type_peine'); ?>
			<?=form_input('code_type_peine',set_value('code_type_peine',$data->code_type_peine),"class='form-control' placeholder='code_type_peine'")?>
						<?php echo form_error('code_type_peine','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Nom du type de peine</label><?php echo form_error('nom_type_peine'); ?>
			<?=form_input('nom_type_peine',set_value('nom_type_peine',$data->nom_type_peine),"class='form-control' placeholder='nom_type_peine'")?>
						<?php echo form_error('nom_type_peine','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de peine</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Nom type</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_peine?></td>
					<td><?=$data->code_type_peine?></td>
					<td><?=$data->nom_type_peine?></td>
					<td>
						<a href='<?=base_url('mouvement/Types_peine/edit/0/'.$data->id_type_peine);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('mouvement/Types_peine/delete/'.$data->id_type_peine);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>