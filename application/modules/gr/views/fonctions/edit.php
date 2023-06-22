<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer une fonction: <?=$data->nom_fonction?></h3>
	
					<span class="float-right">
						<?php include_once "menu_fonctions.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold"></h3><br>
		<?=form_open('gr/Fonctions/edit/',NULL, ['id_fonction'=>$data->id_fonction])?>

			<div class='form-group'>
				<label>Code</label>
				<?=form_input('code_fonction',set_value('code_fonction',$data->code_fonction),"class='form-control' placeholder='code_fonction'")?>
				<?php echo form_error('code_fonction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='form-group'>
				<label>Fonction</label>
				<?=form_input('nom_fonction',set_value('nom_fonction',$data->nom_fonction),"class='form-control' placeholder='nom_fonction'")?>
				<?php echo form_error('nom_fonction','<div class="text-danger">', '</div>'); ?>
			</div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Fonctions</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Fonction</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_fonction?></td>
					<td><?=$data->code_fonction?></td>
					<td><?=$data->nom_fonction?></td>
					<td>
						<a href='<?=base_url('gr/Fonctions/edit/0/'.$data->id_fonction);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Fonctions/delete/'.$data->id_fonction);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>