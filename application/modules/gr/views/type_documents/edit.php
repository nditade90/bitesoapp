<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer un type document: <?=$data->nom_type_document?></h3>
	
					<span class="float-right">
						<?php include_once "menu_type_documents.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('gr/Type_documents/edit/',NULL, ['id_type_document'=>$data->id_type_document])?>

			<div class='form-group'><label>Code</label><?php echo form_error('code_type_document'); ?>
			<?=form_input('code_type_document',set_value('code_type_document',$data->code_type_document),"class='form-control' placeholder='Code'")?>
						<?php echo form_error('code_type_document','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Nom du type</label><?php echo form_error('nom_type_document'); ?>
			<?=form_input('nom_type_document',set_value('nom_type_document',$data->nom_type_document),"class='form-control' placeholder='Nom du type'")?>
						<?php echo form_error('nom_type_document','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Description</label><?php echo form_error('description'); ?>
			<?=form_input('description',set_value('description',$data->description),"class='form-control' placeholder='Description'")?>
						<?php echo form_error('description','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Type de documents</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Nom du type</th>
			<th>Description</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_document?></td>
					<td><?=$data->code_type_document?></td>
					<td><?=$data->nom_type_document?></td>
					<td><?=$data->description?></td>
					<td>
						<a href='<?=base_url('gr/Type_documents/edit/0/'.$data->id_type_document);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Type_documents/delete/'.$data->id_type_document);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>