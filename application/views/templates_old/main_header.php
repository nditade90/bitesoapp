<nav class="main-header navbar navbar-expand navbar-white navbar-light dropdown-legacy border-bottom-0 text-sm">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <?php 
           if(isset($title_top_bar)){
             echo "<li class='nav-item d-none d-sm-inline-block'>".$title_top_bar."</li>";
           }
        ?>
       <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline" autocomplete="off">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search" autocomplete="off" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" autocomplete="off">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search" autocomplete="off">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Language Dropdown Menu -->

        <?php $currentLocale=$this->session->userdata("site_lang");?>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="flag-icon flag-icon-<?=($currentLocale=='bi') ? 'us':$currentLocale?>"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0"> 
                <a href="<?=base_url("Language/index/fr")?>" class="dropdown-item <?=($currentLocale=='fr') ? 'active':''?>">
                    <i class="flag-icon flag-icon-fr mr-2"></i> <?=$this->lang->line('lang_fr')?>
                </a>
                <a href="<?=base_url("Language/index/bi")?>" class="dropdown-item <?=($currentLocale=='bi') ? 'active':''?>">
                    <i class="flag-icon flag-icon-bi mr-2"></i> <?=$this->lang->line('lang_bi')?>
                </a>
                <a href="<?=base_url("Language/index/en")?>" class="dropdown-item <?=($currentLocale=='en') ? 'active':''?>">
                    <i class="flag-icon flag-icon-us mr-2"></i> <?=$this->lang->line('lang_en')?>
                </a>
                <a href="<?=base_url("Language/index/tz")?>" class="dropdown-item <?=($currentLocale=='tz') ? 'active':''?>">
                    <i class="flag-icon flag-icon-tz mr-2"></i> <?=$this->lang->line('lang_sw')?>
                </a>           
            </div>
        </li>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?=base_url('assets/')?>img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?php echo $this->user->usr_fname.' '.$this->user->usr_lname; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">
                    <img src="<?=base_url('assets/')?>img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    <p>
                    <?php echo $this->user->usr_fname.' '.$this->user->usr_lname; ?>
                        <small><?php echo $this->user->usr_description; ?></small>
                    </p>
                </li>

               <!-- 
                <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>

                </li> 
               -->

                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat"><?=$this->lang->line('pfl_profil')?></a>
                    <a href="<?php echo base_url('Authentification/logout');?>" class="btn btn-default btn-flat float-right"><?=$this->lang->line('pfl_profil_logout')?></a>
                </li>
            </ul>
        </li>
    </ul>
</nav>