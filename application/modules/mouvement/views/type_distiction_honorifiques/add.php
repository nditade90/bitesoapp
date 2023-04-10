
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Un nouveau type de distiction honorifique</h3>

                <span class="float-right">
                    <?php include_once "menu_type_distiction_honorifiques.php";?>
                </span>

            </div>

		<div class="card-body">
		<div class="row">
		<div class="col-md-4">
		<?=form_open('mouvement/Type_distiction_honorifiques/index')?>
		

			<div class='form-group'><label>Type de distiction</label>
			<?=form_input('type_distiction',set_value('type_distiction'),"class='form-control' placeholder='type_distiction'")?>
						<?php echo form_error('type_distiction','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary", style="margin-top:20px"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de distiction honorifique</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de distiction</th><th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_distiction?></td>
					<td><?=$data->type_distiction?></td>
					<td>
						<a href='<?=base_url('mouvement/Type_distiction_honorifiques/edit/0/'.$data->id_type_distiction);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('mouvement/Type_distiction_honorifiques/delete/'.$data->id_type_distiction);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>