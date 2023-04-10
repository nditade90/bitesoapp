
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter une catégorie</h3>

                <span class="float-right">
                    <?php include_once "menu_categories.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('gr/Categories/index')?>
		

			<div class='form-group'><label>Code</label>
			<?=form_input('code_categorie',set_value('code_categorie'),"class='form-control' ,placeholder='code_categorie'")?>
			<?php echo form_error('code_categorie','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Catégorie</label>
			<?=form_input('nom_categorie',set_value('nom_categorie'),"class='form-control' ,placeholder='nom_categorie'")?>
			<?php echo form_error('nom_categorie','<div class="text-danger">', '</div>'); ?></div>

        <div class='row'>
		<?=form_submit('','Enregister','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Catégories</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Catégorie</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_categorie?></td>
					<td><?=$data->code_categorie?></td>
					<td><?=$data->nom_categorie?></td>
					<td>
						<a href='<?=base_url('gr/Categories/edit/0/'.$data->id_categorie);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Categories/delete/'.$data->id_categorie);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>