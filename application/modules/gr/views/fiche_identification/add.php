<div class="content-wrapper" style="min-height: 357.039px;">
    
    <section class="content">
    
        <?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info card-outline">           

            <div class="card-header">                
               <h3 class="card-title text-bold"><?=$title?></h3>

                <span class="float-right">
                    <a href='<?=base_url('gr/Fiche_identifications/add')?>' class="btn btn-info btn-sm"><i
                            class="fa fa-plus"></i> <span class="d-none d-sm-inline">&nbsp;<?=$this->lang->line('identity_menu_new')?></span></a>
                    <a class="btn btn-primary btn-sm" href="<?=base_url('gr/Fiche_identifications')?>"><i
                            class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">&nbsp;<?=$this->lang->line('identity_menu_list')?></span>
                    </a>
                </span>
            </div>

            <div class="card-body">

                <?=form_open_multipart('gr/Fiche_identifications/add')?>

                <div class="row">
                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_matricule')?></label>
                        <?=form_input('matricule',set_value('matricule'),"class='form-control' placeholder='matricule' required='required'")?>
                        <?php echo form_error('matricule','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_new_matricule')?></label> 
                        <?=form_input('nouveau_matricule',set_value('nouveau_matricule'),"class='form-control' placeholder='nouveau_matricule' required='required'")?>
                        <?php echo form_error('nouveau_matricule','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_old_matricule')?></label>
                        <?=form_input('ancien_matricule',set_value('ancien_matricule'),"class='form-control' placeholder='ancien_matricule' required='required'")?>
                        <?php echo form_error('ancien_matricule','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_category')?></label>
                        <?=form_dropdown('id_categorie',$this->My_model->multi_dropdown('gr_categories',array("id_categorie","nom_categorie")),set_value('id_categorie') ,"class='select2 form-control' placeholder='id_categorie'")?>
                        <?php echo form_error('id_categorie','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_nom')?></label>
                        <?=form_input('nom',set_value('nom'),"class='form-control' placeholder='nom'  required='required'")?>
                        <?php echo form_error('nom','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_prenom')?></label>
                        <?=form_input('prenom',set_value('prenom'),"class='form-control' placeholder='prenom'  required='required'")?>
                        <?php echo form_error('prenom','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_photo_passport')?></label>
                        <?=form_upload('photo_psp',set_value('photo_psp'),"class='form-control' placeholder='photo_psp' ")?>
                        <?php echo form_error('photo_psp','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_gerne')?></label>
                        <?=form_dropdown('id_sexe',$this->My_model->multi_dropdown('gr_sexes',array("id_sexe","nom_sexe")),set_value('id_sexe'),"class='form-control select2' placeholder='id_sexe'")?>
                        <?php echo form_error('id_sexe','<span class="text-danger">', '</span>'); ?></div>


                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_ethnie')?></label>
                        <?=form_dropdown('id_ethnie',$this->My_model->multi_dropdown('gr_ethnies', array("id_ethnie","nom_ethnie")),set_value('id_ethnie'),"class='form-control select2' placeholder='id_ethnie'")?>
                        <?php echo form_error('id_ethnie','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_corps')?></label>
                        <?=form_dropdown('id_corps_origine',$this->My_model->multi_dropdown('gr_corps_origine',array("id_corps_origine","nom_corps_origine")),set_value('id_corps_origine'),"class='form-control select2' placeholder='id_corps_origine'")?>
                        <?php echo form_error('id_corps_origine','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_etat_civil')?></label>
                        <?=form_dropdown('id_etat_civil',$this->My_model->multi_dropdown('gr_etat_civil',array("id_etat_civil","nom_etat_civil")),set_value('id_etat_civil'),"class='form-control select2' id='id_etat_civil' placeholder='id_etat_civil'")?>
                        <?php echo form_error('id_etat_civil','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_nb_enfants')?></label>
                        <?=form_input('nombre_enfant',set_value('nombre_enfant'),"class='form-control' placeholder='nombre_enfant' required='required'")?>
                        <?php echo form_error('nombre_enfant','<span class="text-danger">', '</span>'); ?></div>


                    <div class='form-group col-md-3' id='conjoin_salarie_div'>
                        <label><?=$this->lang->line('identity_form_conjoint')?></label>
                        <?=form_checkbox('conjoin_salarie',set_value('conjoin_salarie',"0"),"class='form-control' title='conjoin_salarie' required='required'")?>
                        <?php echo form_error('conjoin_salarie','<span class="text-danger">', '</span>'); ?>
                    </div>

                    <div class='form-group col-md-3'>
                        <label><?=$this->lang->line('identity_form_date_naissance')?></label>
                        <div class="input-group date" id="inputdate" data-target-input="nearest">
                            <?=form_input('date_naissance',set_value('date_naissance'),"class='form-control datetimepicker-input', id='inputdate' placeholder='date_naissance'")?>
							<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
                        <?php echo form_error('date_naissance','<span class="text-danger">', '</span>'); ?>
                    </div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_annee_naissance')?></label>
                        <?=form_input('annee_naissance',set_value('annee_naissance'),"class='form-control' placeholder='annee_naissance'")?>
                        <?php echo form_error('annee_naissance','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_annee_pension')?></label>
                        <?=form_input('anne_pension_min',set_value('anne_pension_min'),"class='form-control' placeholder='anne_pension_min'")?>
                        <?php echo form_error('anne_pension_min','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_annee_pension_max')?></label>
                        <?=form_input('annee_pension_max',set_value('annee_pension_max'),"class='form-control' placeholder='annee_pension_max'")?>
                        <?php echo form_error('annee_pension_max','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'>
                        <label><?=$this->lang->line('identity_form_pays_naissance')?></label>
                        <?=form_dropdown('id_pays_naissance',$this->My_model->multi_dropdown('gr_pays',array("id_pays","nom_pays")),set_value('id_pays_naissance'),"class='form-control select2' placeholder='id_pays_naissance'")?>
                        <?php echo form_error('id_pays_naissance','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_ville_naissance')?></label>
                        <?=form_input('ville_naissance',set_value('ville_naissance'),"class='form-control' placeholder='ville_naissance'")?>
                        <?php echo form_error('ville_naissance','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'>
                        <label><?=$this->lang->line('identity_form_province')?></label>
                        <?=form_dropdown('id_province',$this->My_model->multi_dropdown('gr_provinces',array('id_province','nom_province')),set_value('id_province'),"class='form-control select2' id='id_province' placeholder='Province'")?>
                        <?php echo form_error('id_province','<span class="text-danger">', '</span>'); ?>
                    </div>

                    <div class='form-group col-md-3'>
                        <label><?=$this->lang->line('identity_form_commune')?></label>
                        <?=form_dropdown('id_commune',$this->My_model->multi_dropdown('gr_communes',array('id_commune','nom_commune')),set_value('id_commune'),"class='form-control select2' id='id_commune' placeholder='Commune'")?>
                        <?php echo form_error('id_commune','<span class="text-danger">', '</span>'); ?>
                    </div>

                    <div class='form-group col-md-3'>
                        <label><?=$this->lang->line('identity_form_colline')?></label>
                        <?=form_dropdown('id_colline',$this->My_model->multi_dropdown('gr_collines',array('id_colline','nom_colline')),set_value('id_colline'),"class='form-control select2' id='id_colline' placeholder='id_colline'")?>
                        <?php echo form_error('id_colline','<span class="text-danger">', '</span>'); ?>
                    </div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_promotion')?></label>
                        <?=form_dropdown('id_promotion',$this->My_model->multi_dropdown('gr_promotions',array("id_promotion","nom_promotion")),set_value('id_promotion'),"class='form-control select2' placeholder='id_promotion'")?>
                        <?php echo form_error('id_promotion','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_nom_pere')?></label>
                        <?=form_input('noms_pere',set_value('noms_pere'),"class='form-control' placeholder='noms_pere'")?>
                        <?php echo form_error('noms_pere','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_nom_mere')?></label>
                        <?=form_input('noms_mere',set_value('noms_mere'),"class='form-control' placeholder='noms_mere'")?>
                        <?php echo form_error('noms_mere','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_inss')?></label>
                        <?=form_input('numero_inss',set_value('numero_inss'),"class='form-control' placeholder='numero_inss'")?>
                        <?php echo form_error('numero_inss','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_mfp')?></label>
                        <?=form_input('numero_mfp',set_value('numero_mfp'),"class='form-control' placeholder='numero_mfp'")?>
                        <?php echo form_error('numero_mfp','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_psp')?></label>
                        <?=form_input('numero_psp',set_value('numero_psp'),"class='form-control' placeholder='numero_psp'")?>
                        <?php echo form_error('numero_psp','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_rel')?></label>
                        <?=form_dropdown('id_religion',$this->My_model->multi_dropdown('gr_religions', array("id_religion","nom_religion")),set_value('id_religion'),"class='form-control select2' placeholder='id_religion'")?>
                        <?php echo form_error('id_religion','<span class="text-danger">', '</span>'); ?></div>

                    <div class='form-group col-md-3'><label><?=$this->lang->line('identity_form_gp_sang')?></label>
                        <?=form_dropdown('id_groupe_sanguin',$this->My_model->multi_dropdown('gr_groupes_sanguin',array("id_gpe_sanguin","nom_gpe_sanguin")),set_value('id_groupe_sanguin'),"class='form-control select2' placeholder='id_groupe_sanguin'")?>
                        <?php echo form_error('id_groupe_sanguin','<span class="text-danger">', '</span>'); ?></div>

                </div>


                <div>
                    <?=form_submit('',$this->lang->line('identity_form_save_btn'),'class="btn btn-sm btn-primary"')?>
                </div>

            </div>
        </div>
    </section>
</div>