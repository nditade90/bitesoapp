<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">View Sexes</h3>
	
					<span class="float-right">
						<?php include_once "menu_sexes.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class='row'>
							<div class="col-md-3">
								#:<b><?=$data->id_sexe?></b>
							</div>
							<div class="col-md-3">
								Code:<b><?=$data->code_sexe?></b>
							</div>
							<div class="col-md-3">
								Sexe:<b><?=$data->nom_sexe?></b>
							</div>
						
					</div>
			</div>
	</div>
	</section>
</div>