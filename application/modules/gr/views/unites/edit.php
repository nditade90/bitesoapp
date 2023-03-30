<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_unites.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold">Editer d'une Unites: <?=$data->nom_unite?></h3><br>
		<?=form_open('gr/Unites/edit/',NULL, ['id_unite'=>$data->id_unite])?>

			<div class='form-group'><label>Code</label><?php echo form_error('code_unite'); ?>
			<?=form_input('code_unite',set_value('code_unite',$data->code_unite),"class='form-control' placeholder='code_unite'")?>
						<?php echo form_error('code_unite','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Unité</label><?php echo form_error('nom_unite'); ?>
			<?=form_input('nom_unite',set_value('nom_unite',$data->nom_unite),"class='form-control' placeholder='nom_unite'")?>
						<?php echo form_error('nom_unite','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Unités</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
	    <thead>
			<th>#</th>
			<th>Code</th>
			<th>Unité</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_unite?></td>
					<td><?=$data->code_unite?></td>
					<td><?=$data->nom_unite?></td>
					<td><a href='<?=base_url('gr/Unites/view/'.$data->id_unite);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('gr/Unites/edit/0/'.$data->id_unite);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Unites/delete/'.$data->id_unite);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>