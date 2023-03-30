<!--
<ul class="nav nav-pills nav-fill justify-content-around rounded shadow m-4">
    <li class="nav-item"><a class="nav-link <?php if(in_array($this->router->method,['nouveau'])) echo 'active';?>"  href="<?=base_url('administration/Role/nouveau/')?>"><i class="fa fa-pencil-square-o"></i>Nouveau</a></li>
    <li class="nav-item"><a class="nav-link <?php if(in_array($this->router->method,['index'])) echo 'active';?>" href="<?=base_url('administration/Role')?>"><i class="fa fa-list"></i>Liste</a></li>
</ul>
-->
<a class="btn btn-info btn-sm" href="<?=base_url('administration/Role/nouveau/')?>"><i class="fa fa-plus"></i>
    <span class="d-none d-sm-inline">&nbsp;Nouveau</span>
</a>
<a class="btn btn-primary btn-sm" href="<?=base_url('administration/Role')?>"><i class="fa fa-list"></i>
    <span class="d-none d-sm-inline">&nbsp;Liste</span>
</a>