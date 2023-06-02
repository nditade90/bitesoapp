<div class="row" style="margin:10px">
    <a class="btn btn-<?=$this->router->class == "Fiche_identifications"?"primary-cust":"";?> btn-sm" href='<?=base_url('gr/Fiche_identifications/add')?>'>
        <i class="fa fa-file"></i>
        <span class="d-none d-sm-inline">&nbsp;<b>Identifications</b></span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Fiche_carrieres"?"primary-cust":"";?> btn-sm" href="<?=base_url('gr/Fiche_carrieres/add')?>">
        <i class="fa fa-list"></i>
        <span class="d-none d-sm-inline">&nbsp;<b>Carrieres</b></span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Ayants_droits"?"primary-cust":"";?> btn-sm" href="<?=base_url('gr/Ayants_droits/add')?>">
        <i class="fa fa-users"></i>
        <span class="d-none d-sm-inline">&nbsp;<b>Ayants droits</b></span>
    </a>
</div>