<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">View Sous_categories</h3>
	
					<span class="float-right">
						<?php include_once "menu_sous_categories.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<table class='table table-border'>

		<?php foreach($data as $k => $v):?>
			<tr><td><?=$k?></td><td><?=$v?></td></tr>
		<?php endforeach;?>
	</table></div>
	</div>
	</section>
</div>