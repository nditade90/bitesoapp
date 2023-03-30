<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_sortie_service.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold">Editer un type de sortie de service: <?=$data->type_sortie_service?></h3><br>
		<?=form_open('mouvement/Types_sortie_service/edit/',NULL, ['id_type_sortie'=>$data->id_type_sortie])?>

			<div class='form-group'><label>type_sortie_service</label><?php echo form_error('type_sortie_service'); ?>
			<?=form_input('type_sortie_service',set_value('type_sortie_service',$data->type_sortie_service),"class='form-control' placeholder='type_sortie_service'")?>
						<?php echo form_error('type_sortie_service','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de sortie de service</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de sortie de service</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_sortie?></td>
					<td><?=$data->type_sortie_service?></td>
					<td><a href='<?=base_url('mouvement/Types_sortie_service/view/'.$data->id_type_sortie);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('mouvement/Types_sortie_service/edit/0/'.$data->id_type_sortie);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Types_sortie_service/delete/'.$data->id_type_sortie);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>