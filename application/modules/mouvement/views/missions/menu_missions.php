
	<a class='btn btn-sm <?php if($this->router->method != 'index') echo 'btn-primary-cust';?>' href="<?php echo base_url('mouvement/Missions/add')?>"><i class='fa fa-plus'></i>
		<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
	</a>
	<a class='btn btn-sm <?php if($this->router->method == 'index') echo 'btn-primary-cust';?>' href="<?php echo base_url('mouvement/Missions')?>"><i class='fa fa-list'></i>
		<span class='d-none d-sm-inline'>&nbsp;Liste</span>
	</a>
		