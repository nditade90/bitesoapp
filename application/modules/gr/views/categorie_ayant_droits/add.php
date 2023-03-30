
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_categorie_ayant_droits.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold">Ajouter une catégorie des ayant droits</h3><br>
		<?=form_open('gr/Categorie_ayant_droits/index')?>
		

			<div class='form-group'><label>Catégorie</label>
			<?=form_input('nom_categorie',set_value('nom_categorie'),"class='form-control' placeholder='nom_categorie'")?>
						<?php echo form_error('nom_categorie','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Catégorie des ayant droits</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Catégorie</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_categorie_ayant_droit?></td>
					<td><?=$data->nom_categorie?></td>
					<td><a href='<?=base_url('gr/Categorie_ayant_droits/view/'.$data->id_categorie_ayant_droit);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('gr/Categorie_ayant_droits/edit/0/'.$data->id_categorie_ayant_droit);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Categorie_ayant_droits/delete/'.$data->id_categorie_ayant_droit);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>