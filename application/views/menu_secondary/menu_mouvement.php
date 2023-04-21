<div class="row" style="margin:10px">
    <a class="btn btn-<?=$this->router->class == "Historique_situations"?"primary":"";?> btn-sm" href='<?=base_url('gr/Historique_situations/add')?>'>
        <i class="fa fa-file"></i>
        <span class="d-none d-sm-inline">&nbsp;Situation</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Cotations"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Cotations/add')?>">
        <i class="fa fa-check"></i>
        <span class="d-none d-sm-inline">&nbsp;Cotations</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Formations_stages"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Formations_stages/add')?>">
        <i class="fa fa-school"></i>
        <span class="d-none d-sm-inline">&nbsp;Formations</span>
    </a>
    <a class="btn btn-<?=$this->router->class == "Etudes_faites"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Etudes_faites/add')?>">
        <i class="fa fa-graduation-cap"></i>
        <span class="d-none d-sm-inline">&nbsp;Etudes</span>
    </a>
    <a class="btn btn-<?=$this->router->class == "Avancement_grades"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Avancement_grades/add')?>">
        <i class="fa fa-shield-alt"></i>
        <span class="d-none d-sm-inline">&nbsp;Grades</span>
    </a>
    <a class="btn btn-<?=$this->router->class == "Fiche_mutations"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Fiche_mutations/add')?>">
        <i class="fa fa-street-view"></i>
        <span class="d-none d-sm-inline">&nbsp;Mutations</span>
    </a>
    <a class="btn btn-<?=$this->router->class == "Actions_disciplinaires"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Actions_disciplinaires/add')?>">
        <i class="fa fa-hammer"></i>
        <span class="d-none d-sm-inline">&nbsp;Action Displ.</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Dossiers_penals"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Dossiers_penals/add')?>">
        <i class="fa fa-folder-open"></i>
        <span class="d-none d-sm-inline">&nbsp;Dossier penal.</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Absences"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Absences/add')?>">
        <i class="fa fa-bug"></i>
        <span class="d-none d-sm-inline">&nbsp;Absences</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Renforcements"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Renforcements/add')?>">
        <i class="fa fa-user-nurse"></i>
        <span class="d-none d-sm-inline">&nbsp;Renforcements</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Dictinctions_honorifiques"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Dictinctions_honorifiques/add')?>">
        <i class="fa fa-user-shield"></i>
        <span class="d-none d-sm-inline">&nbsp;Dist. Honor.</span>
    </a>
    <a class="btn btn-<?=$this->router->class == "Accidents_roulage"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Accidents_roulage/add')?>">
        <i class="fa fa-car-crash"></i>
        <span class="d-none d-sm-inline">&nbsp;Acc. roulage</span>
    </a>
    <a class="btn btn-<?=$this->router->class == "Accidents_travail"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Accidents_travail/add')?>">
        <i class="fa fa-user-times"></i>
        <span class="d-none d-sm-inline">&nbsp;Acc. travail</span>
    </a>

    <a class="btn btn-<?=$this->router->class == "Exemptions_service"?"primary":"";?> btn-sm" href="<?=base_url('mouvement/Exemptions_service/add')?>">
        <i class="fa fa-user-slash"></i>
        <span class="d-none d-sm-inline">&nbsp;Exemptions</span>
    </a>
</div>