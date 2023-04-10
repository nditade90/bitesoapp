
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter d'un service</h3>

                <span class="float-right">
                    <?php include_once "menu_services.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('gr/Services/index')?>
		

			<div class='form-group'><label>Code</label>
			<?=form_input('code_service',set_value('code_service'),"class='form-control' placeholder='code_service'")?>
						<?php echo form_error('code_service','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'><label>Service</label>
			<?=form_input('nom_service',set_value('nom_service'),"class='form-control' placeholder='nom_service'")?>
						<?php echo form_error('nom_service','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Services</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Service</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_service?></td>
					<td><?=$data->code_service?></td>
					<td><?=$data->nom_service?></td>
					<td>
						<a href='<?=base_url('gr/Services/edit/0/'.$data->id_service);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('gr/Services/delete/'.$data->id_service);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>