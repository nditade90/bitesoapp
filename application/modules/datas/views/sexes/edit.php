<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold"></h3>
	
					<span class="float-right">
						<?php include_once "menu_sexes.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold">Editer une Sexe: <?=$data->nom_sexe?></h3><br>
		<?=form_open('datas/Sexes/edit/', NULL, ['id_sexe'=>$data->id_sexe])?>
		    <div class='form-group'><label>code</label>
			<?=form_input('code_sexe',set_value('code_sexe', $data->code_sexe),"class='form-control' ,placeholder='Code '")?>
			<?php echo form_error('code_sexe','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Sexe</label>
			<?=form_input('nom_sexe',set_value('nom_sexe', $data->nom_sexe),"class='form-control' ,placeholder='Sexe'")?>
			<?php echo form_error('nom_sexe','<div class="text-danger">', '</div>'); ?></div>

		<div class='row'>
		<?=form_submit('','Enregistrer les modifications','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
		<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Sexes</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Sexe</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_sexe?></td>
					<td><?=$data->code_sexe?></td>
					<td><?=$data->nom_sexe?></td>
					<td><a href='<?=base_url('datas/Sexes/view/'.$data->id_sexe);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('datas/Sexes/edit/0/'.$data->id_sexe);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Sexes/delete/'.$data->id_sexe);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>