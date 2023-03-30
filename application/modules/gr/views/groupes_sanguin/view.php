<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Détail du groupe sanguin: <?=$data->nom_gpe_sanguin?></h3>
	
					<span class="float-right">
						<?php include_once "menu_groupes_sanguin.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<div class='row'>
	<div class='col-md-3'>#:<b><?=$data->id_gpe_sanguin?></b></div>
	<div class='col-md-3'>Nom du groupe sanguin:<b><?=$data->nom_gpe_sanguin?></b></div>
	
		<?php foreach($data as $k => $v):?>
		<?php endforeach;?>
	</div></div>
	</div>
	</section>
</div>