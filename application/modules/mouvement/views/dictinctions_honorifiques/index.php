
<div class="content-wrapper" style="min-height: 357.039px;">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Dictinctions_honorifiques/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a>

					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('mouvement/Dictinctions_honorifiques/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Dictinctions honorifiques</h3><br>

		<?php echo form_label('','hidden')?>
		<table class='table table-condensed table-hover table-stripped'>
			<thead>
				<tr>
					<th>#</th>
					<th>Type de distinction</th>
					<th>Date</th>
					<th>Reference</th>
					<th>observation</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach ($datas as $data) { 
					$date_distiction = !empty($data->date_distiction)?(new DateTime($data->date_distiction))->format('d/m/Y'):"";
				?>
					<tr>
						<td><?=$data->id_distinction?></td>
						<td><?=get_db_value("mv_type_distiction_honorifiques","type_distiction",array("id_type_distiction",$data->id_type_distiction))?></td>
						<td><?=$date_distiction?></td>
						<td><?=$data->ref_distiction?></td>
						<td><?=$data->observations?></td>
						<td>
							<a href="<?php echo base_url('mouvement/Dictinctions_honorifiques/edit/'.$data->id_distinction)?>">
								<span class="fa fa-edit"></span>
							</a>

							<a href="<?php echo base_url('mouvement/Dictinctions_honorifiques/delete'.$data->id_distinction)?>">
								<span class="fa fa-trash text-danger"></span>
							</a>
						</td>

					</tr>
				<?php } ?>
			</tbody>
		</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		