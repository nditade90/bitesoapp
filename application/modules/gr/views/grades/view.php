<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Détail de Grades: </h3>
	
					<span class="float-right">
						<?php include_once "menu_grades.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<div class='row'>

		<?php foreach($data as $k => $v):?>
			<div class='col-md-3'><?=$k?>:<b><?=$v?></b></div>
		<?php endforeach;?>
	</div></div>
	</div>
	</section>
</div>