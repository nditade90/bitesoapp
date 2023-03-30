
		<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"></h3>

                <span class="float-right">
                    <?php include_once "menu_grades.php";?>
                </span>

            </div>

		<div class="card-body">
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Grades</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>Id_grade</th>
			<th>Code_grade</th>
			<th>Nom_grade</th><th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_grade?></td>
					<td><?=$data->code_grade?></td>
					<td><?=$data->nom_grade?></td>
					<td><a href='<?=base_url('gr/Grades/view/'.$data->id_grade);?>'><span class="fa fa-eye"></span></a>
					<a href='<?=base_url('gr/Grades/edit/0/'.$data->id_grade);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Grades/delete/'.$data->id_grade);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			</div></div></section></div>
		