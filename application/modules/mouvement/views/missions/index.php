
<div class="content-wrapper" style="min-height: 357.039px;">
	<?php include VIEWPATH."menu_secondary/menu_mouvement.php"; ?>

	<section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_missions.php";?>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Missions</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de mission</th>
			<th>Contingent</th>
			<th>Bataillon</th>
			<th>Fonction</th>
			<th>Date debut</th>
			<th>Date fin</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_mission?></td>
					<td><?=get_db_value("mv_types_missions","type_mission",array("id_type_mission",$data->id_type_mission))?></td>
					<td><?=$data->contingent?></td>
					<td><?=$data->bataillon?></td>
					<td><?=$data->fonction?></td>
					<td><?=$data->date_debut?></td>
					<td><?=$data->date_fin?></td>
					<td>
					<a href='<?=base_url('mouvement/Missions/edit/'.$data->id_mission);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('mouvement/Missions/delete/'.$data->id_mission);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		