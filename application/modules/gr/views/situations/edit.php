<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer une situation: <?=$data->nom_situation?></h3>
	
					<span class="float-right">
						<?php include_once "menu_situations.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('gr/Situations/edit/', NULL, ['id_situation'=>$data->id_situation])?>

			<div class='form-group'><label>Situation</label><?php echo form_error('nom_situation'); ?>
			<?=form_input('nom_situation',set_value('nom_situation',$data->nom_situation),"class='form-control' ,placeholder='nom_situation'")?>
						<?php echo form_error('nom_situation','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Situations</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Situation</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_situation?></td>
					<td><?=$data->nom_situation?></td>
					<td>
						<a href='<?=base_url('gr/Situations/edit/0/'.$data->id_situation);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Situations/delete/'.$data->id_situation);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>