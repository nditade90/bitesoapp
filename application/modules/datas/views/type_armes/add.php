
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un type d'arme</h3>

                <span class="float-right">
                    <?php include_once "menu_type_armes.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold"></h3><br>
		<?=form_open('datas/Type_armes/index')?>
		

			<div class='form-group'>
				<label>Code</label>
				<?=form_input('code',set_value('code'),"class='form-control' placeholder='Code'")?>
				<?php echo form_error('code','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'>
				<label>Designation</label>
				<?=form_input('designation',set_value('designation'),"class='form-control' placeholder='designation'")?>
				<?php echo form_error('designation','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Type armes</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Designation</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id?></td>
					<td><?=$data->code?></td>
					<td><?=$data->designation?></td>
					<td>
					<a href='<?=base_url('datas/Type_armes/edit/0/'.$data->id);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Type_armes/delete/'.$data->id);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>