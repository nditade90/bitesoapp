
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Ajouter un état civil</h3>

                <span class="float-right">
                    <?php include_once "menu_etat_civil.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('datas/Etat_civil/index')?>
		

			<div class='form-group'><label>état civil</label>
			<?=form_input('nom_etat_civil',set_value('nom_etat_civil'),"class='form-control' ,placeholder='Etat civil'")?>
			<?php echo form_error('nom_etat_civil','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Etat civils</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Etat civil</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_etat_civil?></td>
					<td><?=$data->nom_etat_civil?></td>
					<td>
						<a href='<?=base_url('datas/Etat_civil/edit/0/'.$data->id_etat_civil);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('datas/Etat_civil/delete/'.$data->id_etat_civil);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>