<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer un type de renforcement: <?=$data->type_renforcement?></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_renforcement.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('mouvement/Types_renforcement/edit/',NULL, ['id_type_renforcement'=>$data->id_type_renforcement])?>

			<div class='form-group'><label>Type de renforcement</label><?php echo form_error('type_renforcement'); ?>
			<?=form_input('type_renforcement',set_value('type_renforcement',$data->type_renforcement),"class='form-control' placeholder='type_renforcement'")?>
						<?php echo form_error('type_renforcement','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de renforcement</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de renforcement</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_renforcement?></td>
					<td><?=$data->type_renforcement?></td>
					<td><a href='<?=base_url('mouvement/Types_renforcement/view/'.$data->id_type_renforcement);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('mouvement/Types_renforcement/edit/0/'.$data->id_type_renforcement);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Types_renforcement/delete/'.$data->id_type_renforcement);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>