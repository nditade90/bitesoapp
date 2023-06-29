<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer un type de stage</h3>
	
					<span class="float-right">
						<?php include_once "menu_type_stages.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold"></h3><br>
		<?=form_open('datas/Type_stages/edit/',NULL, ['id'=>$data->id])?>

			<div class='form-group'>
				<label>Catégorie</label>
				<?=form_dropdown('categorie_id',$this->My_model->multi_dropdown('gr_categories',['id_categorie','nom_categorie']),set_value('categorie_id'),"class='form-control'")?>
				<?php echo form_error('categorie_id','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'>
				<label>Description</label>
				<?=form_textarea('description',set_value('description',$data->description),"class='form-control' placeholder='description'")?>
				<?php echo form_error('description','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Type de stages</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Catégorie</th>
			<th>Description</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id?></td>
					<td><?=get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->categorie_id))?></td>
					<td><?=$data->description?></td>
					<td>
					<a href='<?=base_url('datas/Type_stages/edit/'.$data->id);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Type_stages/delete/'.$data->id);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>