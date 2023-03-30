<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_conges.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold">Editer un type  de conge: <?=$data->type_conge?></h3><br>
		<?=form_open('mouvement/Types_conges/edit/',NULL, ['id_type_conge'=>$data->id_type_conge])?>

			<div class='form-group'><label>type_conge</label><?php echo form_error('type_conge'); ?>
			<?=form_input('type_conge',set_value('type_conge',$data->type_conge),"class='form-control' placeholder='type_conge'")?>
						<?php echo form_error('type_conge','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types_conges</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de conge</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_conge?></td>
					<td><?=$data->type_conge?></td>
					<td><a href='<?=base_url('mouvement/Types_conges/view/'.$data->id_type_conge);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('mouvement/Types_conges/edit/0/'.$data->id_type_conge);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Types_conges/delete/'.$data->id_type_conge);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>