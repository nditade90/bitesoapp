<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Détail de type de document: <?=$data->nom_type_document?></h3>
	
					<span class="float-right">
						<?php include_once "menu_type_documents.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<div class='row'>
	  <div class='col-md-3'>#: <b><?=$data->id_type_document?></b></div>
	  <div class='col-md-3'>Code: <b><?=$data->code_type_document?></b></div>
	  <div class='col-md-3'>Nom du type: <b><?=$data->nom_type_document?></b></div>
	</div></div>
	</div>
	</section>
</div>