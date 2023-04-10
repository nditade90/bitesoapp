<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer un groupe sanguin: <?=$data->nom_gpe_sanguin?></h3>
	
					<span class="float-right">
						<?php include_once "menu_groupes_sanguin.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('gr/Groupes_sanguin/edit/',NULL, ['id_gpe_sanguin'=>$data->id_gpe_sanguin])?>

			<div class='form-group'><label>Nom du groupe sanguin</label><?php echo form_error('nom_gpe_sanguin'); ?>
			<?=form_input('nom_gpe_sanguin',set_value('nom_gpe_sanguin',$data->nom_gpe_sanguin),"class='form-control' placeholder='nom_gpe_sanguin'")?>
						<?php echo form_error('nom_gpe_sanguin','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold">Groupes sanguins</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Nom du groupe sanguin</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_gpe_sanguin?></td>
					<td><?=$data->nom_gpe_sanguin?></td>
					<td>
						<a href='<?=base_url('gr/Groupes_sanguin/edit/0/'.$data->id_gpe_sanguin);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Groupes_sanguin/delete/'.$data->id_gpe_sanguin);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>