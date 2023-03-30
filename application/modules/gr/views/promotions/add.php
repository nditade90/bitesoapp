
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_promotions.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<h3 class="card-title text-bold">Ajouter une promotion</h3><br>
		<?=form_open('gr/Promotions/index')?>
		

			<div class='form-group'><label>Promotion</label>
			<?=form_input('nom_promotion',set_value('nom_promotion'),"class='form-control' ,placeholder='nom_promotion'")?>
			<?php echo form_error('nom_promotion','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Promotions</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Promotion</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_promotion?></td>
					<td><?=$data->nom_promotion?></td>
					<td><a href='<?=base_url('gr/Promotions/view/'.$data->id_promotion);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('gr/Promotions/edit/0/'.$data->id_promotion);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Promotions/delete/'.$data->id_promotion);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>