<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Détail de type d'infraction: <?=$data->nom_infraction?></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_infraction.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<div class='row'>
		<div class='col-md-3'>#: <b><?=$data->id_type_punition?></b></div>
		<div class='col-md-3'>Code: <b><?=$data->code_infraction?></b></div>
		<div class='col-md-3'>Type d'infraction: <b><?=$data->nom_infraction?></b></div>

	</div></div>
	</div>
	</section>
</div>