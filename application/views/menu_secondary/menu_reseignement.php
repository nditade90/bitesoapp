<div class="row" style="margin:10px">
    <a class="btn btn-<?=$this->router->class == "Fiche_identifications"?"primary":"";?> btn-sm" href='<?=base_url('gr/Fiche_identifications/add')?>'>
        <i class="fa fa-file"></i>
        <span class="d-none d-sm-inline">&nbsp;Identifications</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Fiche_carrieres"?"primary":"";?> btn-sm" href="<?=base_url('gr/Fiche_carrieres/add')?>">
        <i class="fa fa-list"></i>
        <span class="d-none d-sm-inline">&nbsp;Carrieres</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Ayants_droits"?"primary":"";?> btn-sm" href="<?=base_url('gr/Ayants_droits/add')?>">
        <i class="fa fa-users"></i>
        <span class="d-none d-sm-inline">&nbsp;Ayants droits</span>
    </a>
</div>