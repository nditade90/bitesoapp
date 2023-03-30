
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_historique_grades.php";?>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Historique_grades</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>Id_grade</th>
			<th>Id_identification</th>
			<th>Date_grade</th>
			<th>Ref_avancement</th><th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_grade?></td>
					<td><?=$data->id_identification?></td>
					<td><?=$data->date_grade?></td>
					<td><?=$data->ref_avancement?></td>
					<td><a href='<?=base_url('gr/Historique_grades/view/'.$data->id_identification);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('gr/Historique_grades/edit/0/'.$data->id_identification);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Historique_grades/delete/'.$data->id_identification);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		