<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Détail du type de peine: <?=$data->nom_type_peine?></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_peine.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<div class='row'>

		<div class='col-md-3'>#: <b><?=$data->id_type_peine?></b></div>
		<div class='col-md-3'>Code: <b><?=$data->code_type_peine?></b></div>
		<div class='col-md-3'>Nom du type de peine: <b><?=$data->nom_type_peine?></b></div>
	</div></div>
	</div>
	</section>
</div>