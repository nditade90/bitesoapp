
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter une sous-catégorie</h3>

                <span class="float-right">
                    <?php include_once "menu_sous_categories.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('gr/Sous_categories/index')?>
		

			<div class='form-group'><label>catégorie</label>
			<?=form_dropdown('id_categorie',$this->My_model->multi_dropdown('gr_categories',['id_categorie','nom_categorie']),set_value('id_categorie'),"class='form-control' ,placeholder='id_categorie'")?>
			<?php echo form_error('id_categorie','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Code</label>
			<?=form_input('code_sous_categorie',set_value('code_sous_categorie'),"class='form-control' ,placeholder='code_sous_categorie'")?>
						<?php echo form_error('code_sous_categorie','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Sous-catégorie</label>
			<?=form_input('nom_sous_categorie',set_value('nom_sous_categorie'),"class='form-control' ,placeholder='nom_sous_categorie'")?>
						<?php echo form_error('nom_sous_categorie','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregister','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Sous-catégories</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Catégorie</th>
			<th>Code</th>
			<th>Sous-catégorie</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_sous_categorie?></td>
					<td><?=$data->nom_categorie?></td>
					<td><?=$data->code_sous_categorie?></td>
					<td><?=$data->nom_sous_categorie?></td>
					<td>
						<a href='<?=base_url('gr/Sous_categories/edit/0/'.$data->id_sous_categorie);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Sous_categories/delete/'.$data->id_sous_categorie);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>