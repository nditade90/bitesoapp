<header class="d-flex flex-wrap justify-content py-3 mb-4 border-bottom" style="margin-left:20px">
        <a href="<?=base_url();?>" class="navbar-brand">
            <img src="<?=base_url('assets/');?>img/fdnb/logo2.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8; height:38px">
            <span class="brand-text font-weight-light"></span>
        </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="<?=base_url().'gr/Fiche_identifications/add'?>" class="nav-link <?php if(in_array($this->router->class, ['Fiche_identifications','Fiche_carrieres','Ayants_droits'])) echo "active-cust";?>"><i class="fas fa-file"></i><?=$this->lang->line('app_menu_renseignement')?></a>
            </li>

            <?php 
              $mouvement_array= ['Historique_situations', 'Cotations','Formations_stages', 'Etudes_faites','Avancement_grades','Fiche_mutations','Actions_disciplinaires'];
            ?>
            <li class="nav-item ">
                <a href="<?=base_url().'gr/Historique_situations/add'?>" class="nav-link <?php if(in_array($this->router->class ,$mouvement_array)) echo "active-cust";?>"><i class="fas fa-file"></i>Mouvements</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-edit"></i>Modifications</a>
            </li>

            <li class="nav-item <?php if($this->router->class =='Search') echo "active-cust";?>">
                <a href="<?=base_url().'search/Search'?>" class="nav-link"><i class="fas fa-search"></i>Chercher</a>
            </li>


            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fas fa-cog"></i>Parmetrages</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?=base_url().'gr/Categories'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_cat')?></a></li>
                    <li><a href="<?=base_url().'gr/Sous_categories'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_undcat')?></a></li>
                    <li><a href="<?=base_url().'gr/Categorie_ayant_droits'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_catdrt')?></a></li>
                    <li><a href="<?=base_url().'gr/situations'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_sts')?></a></li>
                    <li><a href="<?=base_url().'gr/Promotions'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_promo')?></a></li>
                    <li><a href="<?=base_url().'gr/Type_documents'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_tpd')?></a></li>             
                    <li><a href="<?=base_url().'gr/Groupes_sanguin'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_gs')?></a></li>             
                    <li><a href="<?=base_url().'gr/Departements'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_dpt')?></a></li>             
                    <li><a href="<?=base_url().'gr/Services'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_srv')?></a></li>             
                    <li><a href="<?=base_url().'gr/Unites'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_unt')?></a></li>             
                    
                    <li class="dropdown-divider"></li>

                    <li class="dropdown-submenu dropdown-hover">
                      <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Donnees</a>
                      <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?=base_url().'datas/Religions'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_rl')?></a></li>             
                        <li><a href="<?=base_url().'gr/Corps_origine'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_crp')?></a></li>
                        <li><a href="<?=base_url().'datas/Sexes'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_sx')?></a></li>
                        <li><a href="<?=base_url().'datas/Etat_civil'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_matri')?></a></li>
                        <li><a href="<?=base_url().'datas/Ethnies'?>" class="dropdown-item"><?=$this->lang->line('app_menu_renseignement_eth')?></a></li>
                      
                      </ul>
                    </li>

                    <li class="dropdown-divider"></li>

                    <li class="dropdown-submenu dropdown-hover">
                      <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Mouvements</a>
                      <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li><a href="<?=base_url().'mouvement/Type_distiction_honorifiques'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_disthon')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_conges'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tpcong')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_cote'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tpct')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_punition'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tppnt')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_etudes'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tppet')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_infraction'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tpinfra')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_missions'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tpmsn')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_peine'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tppn')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_renforcement'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tprfm')?></a></li>             
                        <li><a href="<?=base_url().'mouvement/Types_sortie_service'?>" class="dropdown-item"><?=$this->lang->line('app_menu_mvmnt_tpss')?></a></li>             
                      </ul>
                    </li>
                  </ul>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fas fa-users"></i><?=$this->lang->line('app_menu_admin')?></a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="<?=base_url('administration/Users');?>" class="dropdown-item"><?=$this->lang->line('app_menu_admin_users')?></a></li>
                    <li><a href="<?=base_url('administration/Role');?>" class="dropdown-item"><?=$this->lang->line('app_menu_admin_roles')?></a></li>
                    <li><a href="<?=base_url('administration/Permission');?>" class="dropdown-item"><?=$this->lang->line('app_menu_admin_permi')?></a></li>
                </ul>
            </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->  
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
            <span class="badge badge-danger navbar-badge"></span>            
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
             
            <a href="#" class="dropdown-item"> 
              <div class="media">
                <img src="<?=base_url()?>assets/img/user1-128x128.jpg" class="img-size-50 mr-3 img-circle">
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>

            <div class="dropdown-item">
                  <h3 class="row">
                      <a href="#" class='col-md-8 text-md'><?=$this->auth_library->get()->usr_lname.' '.$this->auth_library->get()->usr_fname?></a>
                      <a class="col-md-4 text-md text-danger" href="<?=base_url('Authentification/logout')?>"?><i class="fas fa-close"></i>Logout</a>
                  </h3>
              </div>

          </div>
        </li>      
        
      </ul>
    </header>