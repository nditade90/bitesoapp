<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer une grade: </h3>
	
					<span class="float-right">
						<?php include_once "menu_grades.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
			<h3 class="card-title text-bold"></h3><br>
		<?=form_open('gr/Grades/edit/',NULL, ['id_grade'=>$data->id_grade])?>

			<div class='form-group'>
				<label>Code</label>
				<?=form_input('code_grade',set_value('code_grade',$data->code_grade),"class='form-control' placeholder='Code'")?>
				<?php echo form_error('code_grade','<div class="text-danger">', '</div>'); ?></div>

			<div class='form-group'>
				<label>Grade</label>
				<?=form_input('nom_grade',set_value('nom_grade',$data->nom_grade),"class='form-control' placeholder='Grade'")?>
				<?php echo form_error('nom_grade','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Grades</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Code</th>
			<th>Grade</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_grade?></td>
					<td><?=$data->code_grade?></td>
					<td><?=$data->nom_grade?></td>
					<td>
					<a href='<?=base_url('gr/Grades/edit/0/'.$data->id_grade);?>'><span class="fa fa-edit"></span></a>
					<a href='<?=base_url('gr/Grades/delete/'.$data->id_grade);?>' class='text-danger'><span class="fa fa-trash"></span></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>