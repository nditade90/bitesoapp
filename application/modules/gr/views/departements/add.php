
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_departements.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold">Ajouter un département</h3><br>
		<?=form_open('gr/Departements/index')?>
		

			<div class='form-group'><label>Code</label>
			<?=form_input('code_departement',set_value('code_departement'),"class='form-control' placeholder='code_departement'")?>
						<?php echo form_error('code_departement','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Département</label>
			<?=form_input('nom_departement',set_value('nom_departement'),"class='form-control' placeholder='nom_departement'")?>
						<?php echo form_error('nom_departement','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Départements</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Département</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_departement?></td>
					<td><?=$data->code_departement?></td>
					<td><?=$data->nom_departement?></td>
					<td><a href='<?=base_url('gr/Departements/view/'.$data->id_departement);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('gr/Departements/edit/0/'.$data->id_departement);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Departements/delete/'.$data->id_departement);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>