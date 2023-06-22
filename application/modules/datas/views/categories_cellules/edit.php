<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer une catégorie cellule: <?=$data->designation?></h3>
	
					<span class="float-right">
						<?php include_once "menu_categories_cellules.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold"></h3><br>
		<?=form_open('datas/Categories_cellules/edit/',NULL, ['id'=>$data->id])?>

			<div class='form-group'>
				<label>Cellule</label>
				<?=form_dropdown('cellule_id',$this->My_model->multi_dropdown('gr_cellules',['id','designation']),set_value('cellule_id', $data->cellule_id),"class='form-control', id='cellule_id'")?>
				<?php echo form_error('cellule_id','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='form-group'>
				<label>Code</label>
				<?=form_input('code',set_value('code',$data->code),"class='form-control' placeholder='Code'")?>
				<?php echo form_error('code','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='form-group'>
				<label>Designation</label>
				<?=form_input('designation',set_value('designation',$data->designation),"class='form-control' placeholder='designation'")?>
				<?php echo form_error('designation','<div class="text-danger">', '</div>'); ?>
			</div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Catégorie cellule</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Cellule</th>
			<th>Code</th>
			<th>Designation</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id?></td>
					<td><?=$data->cellule_id?></td>
					<td><?=$data->code?></td>
					<td><?=$data->designation?></td>
					<td>
					<a href='<?=base_url('datas/Categories_cellules/edit/0/'.$data->id);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Categories_cellules/delete/'.$data->id);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>