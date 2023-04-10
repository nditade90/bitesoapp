<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer un type de punition</h3>
	
					<span class="float-right">
						<?php include_once "menu_types_punition.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('mouvement/Types_punition/edit/',NULL, ['id_type_punition'=>$data->id_type_punition])?>

			<div class='form-group'><label>Code</label><?php echo form_error('code_type_punition'); ?>
			<?=form_input('code_type_punition',set_value('code_type_punition',$data->code_type_punition),"class='form-control' placeholder='code_type_punition'")?>
			<?php echo form_error('code_type_punition','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Nom du type</label><?php echo form_error('nom_type_punition'); ?>
			<?=form_input('nom_type_punition',set_value('nom_type_punition',$data->nom_type_punition),"class='form-control' placeholder='nom_type_punition'")?>
						<?php echo form_error('nom_type_punition','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de punition</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Nom du type</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_punition?></td>
					<td><?=$data->code_type_punition?></td>
					<td><?=$data->nom_type_punition?></td>
					<td>
						<a href='<?=base_url('mouvement/Types_punition/edit/0/'.$data->id_type_punition);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('mouvement/Types_punition/delete/'.$data->id_type_punition);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>