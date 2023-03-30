<?php /*
Renseignements
  Fiche Identification
    Categories
    Sous categories
    Sexe
    Ethnies
    Corps d'origine
    Etat civil
    Pays
    Provinces
    Communes
    Collines
    Promotions
    Situations
    Religions
    Groupes sanguins
    Types de document
  Carriere
    Departements
    Services
    Unites
    Fonctions
    Grades
    Specialites
    Niveaux Formation
  Ayants droits
    Categories Ayants droits
Mouvements
  Type Distinctions Honorifiques

Parametres
Administration

*/
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">

   <a href="#" class="brand-link">
        <img src="<?=base_url('assets/')?>img/fdnb/logo2.png" alt="FDNB Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><?=$this->lang->line('app_name')?></span>
    </a>
    <div class="sidebar" style="overflow-y: auto;">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-compact nav-child-indent nav-collapse-hide-child text-sm"
                data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?=base_url("gr/Fiche_identification")?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        <?=$this->lang->line('app_menu_renseignement')?> 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Fiche_identification'?>" class="nav-link">
                                <i class="fa fa-regular fa-id-card nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_id')?> </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Categories'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_cat')?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Sous_categories'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_undcat')?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Categorie_ayant_droits'?>" class="nav-link">
                               <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_catdrt')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'datas/Etat_civil'?>" class="nav-link">
                               <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_matri')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/situations'?>" class="nav-link">
                               <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_sts')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Promotions'?>" class="nav-link">
                               <i class="fa fa-users nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_promo')?></p>
                            </a>
                        </li>

                        

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Corps_origine'?>" class="nav-link">
                               <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_crp')?></p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?=base_url().'datas/Ethnies'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_eth')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'datas/Sexes'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_sx')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'datas/Religions'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_rl')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Type_documents'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_tpd')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Groupes_sanguin'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_gs')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Departements'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_dpt')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Services'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_srv')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'gr/Unites'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_renseignement_unt')?></p>
                            </a>
                        </li>

                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         <?=$this->lang->line('app_menu_mvmnt')?>                        
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">                       
                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Type_distiction_honorifiques'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_disthon')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_conges'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tpcong')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_cote'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tpct')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_punition'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tppnt')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_etudes'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tppet')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_infraction'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tpinfra')?> </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_missions'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tpmsn')?> </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_peine'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tppn')?></p>
                            </a>
                        </li> 

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_renforcement'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tprfm')?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url().'mouvement/Types_sortie_service'?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_mvmnt_tpss')?></p>
                            </a>
                        </li>

                    </ul>
                </li>
     
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                        <?=$this->lang->line('app_menu_admin')?>   
                        
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?=base_url('administration/Users');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_admin_users')?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('administration/Role');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_admin_roles')?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('administration/Permission');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?=$this->lang->line('app_menu_admin_permi')?></p>
                            </a>
                        </li>
                    </ul>
                </li>
               
            
            </ul>
        </nav>

    </div>

</aside>