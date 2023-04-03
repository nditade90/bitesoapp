<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_cote.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold">Editer un type de cote: </h3><br>
		<?=form_open('mouvement/Types_cote/edit/',NULL, ['id_type_cote'=>$data->id_type_cote])?>

			<div class='form-group'><label>Type de cote</label><?php echo form_error('type_cote'); ?>
			<?=form_input('type_cote',set_value('type_cote',$data->type_cote),"class='form-control' placeholder='type_cote'")?>
						<?php echo form_error('type_cote','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de cote</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de cote</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_cote?></td>
					<td><?=$data->type_cote?></td>
					<td><a href='<?=base_url('mouvement/Types_cote/view/'.$data->id_type_cote);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('mouvement/Types_cote/edit/0/'.$data->id_type_cote);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Types_cote/delete/'.$data->id_type_cote);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>