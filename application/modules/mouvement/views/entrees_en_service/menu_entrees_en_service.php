
	<a class='btn <?php if($this->router->method !== 'index') echo 'btn-primary-cust';?> btn-sm' href="<?php echo base_url('mouvement/Entrees_en_service/add')?>"><i class='fa fa-plus'></i>
		<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
	</a>
	<a class='btn <?php if($this->router->method == 'index') echo 'btn-primary-cust';?> btn-sm' href="<?php echo base_url('mouvement/Entrees_en_service')?>"><i class='fa fa-list'></i>
		<span class='d-none d-sm-inline'>&nbsp;Liste</span>
	</a>
		