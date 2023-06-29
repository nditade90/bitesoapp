
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un établissement</h3>

                <span class="float-right">
                    <?php include_once "menu_etablissements.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold"></h3><br>
		<?=form_open('datas/Etablissements/index')?>
		

			<div class='form-group'>
				<label>code</label>
				<?=form_input('code',set_value('code'),"class='form-control' placeholder='code'")?>
						<?php echo form_error('code','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'>
				<label>Lieu</label>
				<?=form_input('lieu',set_value('lieu'),"class='form-control' placeholder='lieu'")?>
						<?php echo form_error('lieu','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'>
				<label>Pays</label>
				<?=form_dropdown('pays_id',$this->My_model->multi_dropdown('gr_pays',['id_pays','nom_pays']),set_value('pays_id'),"class='form-control'")?>
				<?php echo form_error('pays_id','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Etablissements</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Lieu</th>
			<th>Pays</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id?></td>
					<td><?=$data->code?></td>
					<td><?=$data->lieu?></td>
					<td><?=get_db_value("gr_pays","nom_pays",array("id_pays",$data->pays_id))?></td>

					<td>
						<a href='<?=base_url('datas/Etablissements/edit/0/'.$data->id);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('datas/Etablissements/delete/'.$data->id);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>