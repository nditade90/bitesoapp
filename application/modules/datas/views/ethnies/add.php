
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_ethnies.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold">Ajouter une éthnie</h3><br>
		<?=form_open('datas/Ethnies/index')?>
		

			<div class='form-group'><label>Code</label>
			<?=form_input('code_ethnie',set_value('code_ethnie'),"class='form-control' ,placeholder='Code'")?>
			<?php echo form_error('code_ethnie','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Ethnie</label>
			<?=form_input('nom_ethnie',set_value('nom_ethnie'),"class='form-control' ,placeholder='Nom de l\'ethinie '")?>
			<?php echo form_error('nom_ethnie','<div class="text-danger">', '</div>'); ?></div>
			
			<div class='row'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
			</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?=$sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Ethnies</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Ethnie</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_ethnie?></td>
					<td><?=$data->code_ethnie?></td>
					<td><?=$data->nom_ethnie?></td>
					<td><a href='<?=base_url('datas/Ethnies/view/'.$data->id_ethnie);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('datas/Ethnies/edit/0/'.$data->id_ethnie);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Ethnies/delete/'.$data->id_ethnie);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>