
<?php $viewDir="gr/views/fiche_identification/details/";?>

<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">

        <div class="card card-info card-outline card-tabs">
            <div class="card-header p-0 pt-1">

                <span class="float-right">
                    <?php if($this->router->method !== 'view'){ ?>
                        <a href='<?=base_url('gr/Fiche_identification/add')?>' class="btn btn-info btn-sm"><i
                                class="fa fa-plus"></i> <span class="d-none d-sm-inline">&nbsp;Nouvelle Fiche</span>
                        </a>
                    <?php } ?>

                    <a class="btn btn-primary btn-sm" href="<?=base_url('gr/Fiche_identification')?>"><i
                            class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">&nbsp;Liste des Fiches</span>
                    </a>
                </span>
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab_identinfication-tab" data-toggle="pill"
                            href="#tab_identinfication" role="tab" aria-controls="tab_identinfication"
                            aria-selected="false">Identification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_ayant_droits-tab" data-toggle="pill" href="#tab_ayant_droits"
                            role="tab" aria-controls="tab_ayant_droits" aria-selected="false">Ayants droits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_carriere-tab" data-toggle="pill" href="#tab_carriere" role="tab"
                            aria-controls="tab_carriere" aria-selected="true">Carriere</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_situations-tab" data-toggle="pill" href="#tab_situations" role="tab"
                            aria-controls="tab_situations" aria-selected="false">Situations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_cotations-tab" data-toggle="pill" href="#tab_cotations" role="tab"
                            aria-controls="tab_cotations" aria-selected="true">Cotations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_etudes_faites-tab" data-toggle="pill" href="#tab_etudes_faites"
                            role="tab" aria-controls="tab_etudes_faites" aria-selected="false">Etudes faites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_formations-tab" data-toggle="pill" href="#tab_formations" role="tab"
                            aria-controls="tab_formations" aria-selected="false">Formations & Stages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_hist_grades-tab" data-toggle="pill" href="#tab_hist_grades"
                            role="tab" aria-controls="tab_hist_grades" aria-selected="false">Historique des grades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_mvts-tab" data-toggle="pill" href="#tab_mvts" role="tab"
                            aria-controls="tab_mvts" aria-selected="false">Mouvements</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" id="tab_identinfication" role="tabpanel"
                        aria-labelledby="tab_identinfication-tab">

                        <div class="row">
                            <div class="col-7">
                                <table class='table table-condensed table-hover table-stripped table-responsive'>
                                    <tr>
                                        <th>Matricule</th>
                                        <td><?=$data->matricule?></td>
                                        <th>Ancien Matricule</th>
                                        <td><?=$data->ancien_matricule?></td>
                                        <th>Nouveau Matricule</th>
                                        <td><?=$data->nouveau_matricule?></td>
                                    </tr>
                                    <tr>
                                        <th>Categorie</th>
                                        <td><?=get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie))?></td>
                                        <th>Corps d'origine</th>
                                        <td><?=get_db_value("gr_corps_origine","nom_corps_origine",array("id_corps_origine",$data->id_corps_origine))?></td>
                                        <th>Promotion</th>
                                        <td><?=get_db_value("gr_promotions","nom_promotion",array("id_promotion",$data->id_promotion))?></td>
                                    </tr>
                                    <tr>
                                        <th>Passport</th>
                                        <td><?=$data->numero_psp?></td>
                                        <th>Nom et Prenom</th>
                                        <td><?=$data->nom." ".$data->prenom?></td>
                                        <th>Etat civil</th>
                                        <td><?=get_db_value("gr_etat_civil","nom_etat_civil",array("id_etat_civil",$data->id_etat_civil))?></td>
                                    </tr>
                                    <tr>
                                        <th>Ethnie</th>
                                        <td><?=get_db_value("gr_ethnies","nom_ethnie",array("id_ethnie",$data->id_ethnie))?></td>
                                        <th>Genre</th>
                                        <td><?=get_db_value("gr_sexes","nom_sexe",array("id_sexe",$data->id_sexe))?></td>
                                        <th>Religion</th>
                                        <td><?=get_db_value("gr_religions","nom_religion",array("id_religion",$data->id_religion))?></td>
                                    </tr>
                                    <tr>
                                        <th>Groupe sanguin</th>
                                        <td><?=get_db_value("gr_groupes_sanguin","nom_gpe_sanguin",array("id_gpe_sanguin",$data->id_groupe_sanguin))?></td>
                                        <th>Noms Pere</th>
                                        <td><?=$data->noms_pere?></td>
                                        <th>Noms Mere</th>
                                        <td><?=$data->noms_mere?></td>
                                    </tr>
                                    <tr>
                                        <th>Nombres d'enfants</th>
                                        <td><?=$data->nombre_enfant?></td>
                                        <th>INSS</th>
                                        <td><?=$data->numero_inss?></td>
                                        <th>MFP</th>
                                        <td><?=$data->numero_mfp?></td>

                                    </tr>
                                    <tr>
                                        <th>Pays/Ville de naissance</th>
                                        <td><?=get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays_naissance))." / ".$data->ville_naissance?></td>
                                        <th>Date de naissance</th>
                                        <td><?=$data->date_naissance?></td>
                                        <th>Colline</th>
                                        <td><?=get_db_value("gr_collines","nom_colline",array("id_colline",$data->id_colline))?></td>
                                    </tr>
                                    <tr>
                                        <th>Ann&eacute;e de naissance</th>
                                        <td><?=$data->annee_naissance?></td>
                                        <th>Ann&eacute;e pension min</th>
                                        <td><?=$data->anne_pension_min?></td>
                                        <th>Ann&eacute;e pension max</th>
                                        <td><?=$data->annee_pension_max?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-3">
								<div class="img ">
                                    <img class="img-fluid mb-2" src="<?=base_url('uploads/photo_passport/')?><?=$data->photo_psp?>" alt="PHOTO PASSPORT"/>
                                    <?=form_open_multipart('gr/Fiche_identification/change_profile/'.$data->id_identification)?>
                                        <div class="row">Changer un photo de profil</div>
                                        <div class="row">
                                            <div class='form-group col-md-6'>
                                                <?=form_upload('photo_psp',set_value('photo_psp'),"class='form-control' placeholder='photo_psp'")?>
                                                <?php echo form_error('photo_psp','<span class="text-danger">', '</span>'); ?>
                                            </div>

                                            <div class='form-group col-md-6'>
                                                <?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?>
                                            </div>
                                        </div>  
                                    <?=form_close()?>                                  
                                </div>
                            </div>
                            
                            <div class="col-2">
								
                                <table class='table table-condensed table-hover table-stripped'>
                                <?php 
                                    if($this->session->flashdata('msg')){
                                        echo $this->session->flashdata('msg');
                                    }
                                ?>
                                <?=form_open_multipart('gr/Fiche_identification/ajout_document/'.$data->id_identification)?>
                                        <div class="row">
                                            
                                            <legend>Documents</legend>
                                            <?=form_dropdown('id_type_document',$this->My_model->multi_dropdown('gr_type_documents',array("id_type_document","nom_type_document")),set_value('id_type_document'),"class='form-control select2' placeholder='Document'")?>
                                            <?php echo form_error('id_type_document','<span class="text-danger">', '</span>'); ?></div>
                                        </div>
                                        <br>

                                        <div class='row'>
                                            <?=form_upload('photo_psp',set_value('photo_psp'),"class='form-control' placeholder='Scan'")?>
                                            <?php echo form_error('photo_psp','<span class="text-danger">', '</span>'); ?>
                                        </div>
                                        <br>

                                        <div class='row'>
                                            <?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?>
                                        </div>
                                    <?=form_close()?>   

									<br>
									<thead>
										<tr>
											<th>#</th>
                                            <th>Document</th>
                                            <th>Voir</th>
										</tr>
									</thead>

                                    <tbody>
                                        
                                        <?php 
                                            $i = 1;
                                            foreach ($documents as $document) {
                                        ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$document->nom_type_document?></td>
                                                <td><a href="<?=base_url().'uploads/document_joint/'.$document->fichier_joint?>" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                        <?php
                                            $i ++;
                                            } 
                                        ?>
									
										
									</tbody>
								</table>
							</div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="tab_ayant_droits" role="tabpanel"
                        aria-labelledby="tab_ayant_droits-tab">
                        <?=render_fragment($viewDir."ayants_droits",get_db_values('gr_ayants_droit', ['id_ayant_droit','id_identification','id_categorie_ayant_droit','nom','prenoms','date_naissance','prise_en_charge'], ['id_identification',$data->id_identification]), $data->id_identification,"DONNEES AYANTS DROITS")?>
                    </div>


                    <div class="tab-pane fade" id="tab_carriere" role="tabpanel" aria-labelledby="tab_carriere-tab">
                    <?=render_fragment($viewDir."carrieres",get_db_values('gr_fiche_carriere', ['id_fiche_carriere','id_departement','id_categorie','id_statut','id_fonction','salaire_base','id_niveau_formation'], ['id_identification',$data->id_identification]), $data->id_identification,"DONNEES CARRIERE")?>
                    </div>

                    <div class="tab-pane fade" id="tab_situations" role="tabpanel" aria-labelledby="tab_situations-tab">
                    <?=render_fragment($viewDir."situations",get_db_values('gr_historique_situations', ['id_historique','id_situation','id_identification','date_debut','date_fin','observation'], ['id_identification',$data->id_identification]), $data->id_identification,"DONNEES HISTORIQUE DES SITUATIONS")?>
                    </div>

                    <div class="tab-pane fade" id="tab_cotations" role="tabpanel" aria-labelledby="tab_cotations-tab">
                    <?=render_fragment($viewDir."cotations",get_db_values('mv_cotations', ['id_cotation','id_identification','id_type_cote','code','annee','points1', 'points2', 'note_obtenue'], ['id_identification',$data->id_identification]), $data->id_identification, "DONNEES DES COTATIONS")?>
                    </div>

                    <div class="tab-pane fade" id="tab_etudes_faites" role="tabpanel"
                        aria-labelledby="tab_etudes_faites-tab">
                        <?=render_fragment($viewDir."etudes",get_db_values('mv_etudes_faites', ['id_etudes','id_identification','id_type_etudes','etablissement','periode_etude','ref_equivalence', 'note_obtenue', 'date_obtention', 'id_pays '], ['id_identification',$data->id_identification]), $data->id_identification,"DONNEES SUR LES ETUDES FAITES")?>
                    </div>

                    <div class="tab-pane fade" id="tab_formations" role="tabpanel" aria-labelledby="tab_formations-tab">
                         <?=render_fragment($viewDir."formations",get_db_values('mv_formations_stages', ['id_formation_stage','id_identification','id_stage','id_specialite','titre_obtenu','id_pays', 'date_debut', 'date_fin', 'nb_mois','montant_prime','ref_stage','note_obtenue','date_specialite','ref_specialite'], ['id_identification',$data->id_identification]), $data->id_identification, "DONNEES SUR LES FORMATIONS ET STAGES")?>
                    </div>

                    <div class="tab-pane fade" id="tab_hist_grades" role="tabpanel"
                        aria-labelledby="tab_hist_grades-tab">
                        <?=render_fragment($viewDir."grades",get_db_values('mv_avancement_grades', ['id_avancement_grade','id_identification', 'id_categorie', 'id_ancien_grade','id_nouveau_grade','date_avancement','ancien_salaire_base','nouveau_salaire_base','ref_avancement'], ['id_identification',$data->id_identification]), $data->id_identification ,"DONNEES SUR L'HISTORIQUE DES GRADES")?>
                    </div> 
                    

                    <div class="tab-pane fade" id="tab_mvts" role="tabpanel" aria-labelledby="tab_mvts-tab">
                        <div class="row">
                            <div class="col-4 col-sm-2">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="mutations-tab" data-toggle="pill"
                                        href="#mutations" role="tab" aria-controls="mutations"
                                        aria-selected="true">Mutations</a>
                                    <a class="nav-link" id="actions_disciplinaires-tab" data-toggle="pill"
                                        href="#actions_disciplinaires" role="tab" aria-controls="actions_disciplinaires"
                                        aria-selected="false">Actions disciplinaires</a>
                                    <a class="nav-link" id="dossiers_penals-tab" data-toggle="pill"
                                        href="#dossiers_penals" role="tab" aria-controls="dossiers_penals"
                                        aria-selected="false">Dossiers penals</a>
                                    <a class="nav-link" id="absences-tab" data-toggle="pill"
                                        href="#absences" role="tab" aria-controls="absences"
                                        aria-selected="false">Absences</a>
                                    <a class="nav-link" id="missions_renforts-tab" data-toggle="pill"
                                        href="#missions_renforts" role="tab" aria-controls="missions_renforts"
                                        aria-selected="true">Missions & Renforcements</a>
                                    <a class="nav-link" id="distinctions-tab" data-toggle="pill"
                                        href="#distinctions" role="tab" aria-controls="distinctions"
                                        aria-selected="false">Distinctions honorifiques</a>
                                    <a class="nav-link" id="accidents_roulage-tab" data-toggle="pill"
                                        href="#accidents_roulage" role="tab" aria-controls="accidents_roulage"
                                        aria-selected="false">Accidents de roulage</a>
                                    <a class="nav-link" id="accidents_travail-tab" data-toggle="pill"
                                        href="#accidents_travail" role="tab" aria-controls="accidents_travail"
                                        aria-selected="false">Accidents de travail</a>
                                    <a class="nav-link" id="exemptions_service-tab" data-toggle="pill"
                                        href="#exemptions_service" role="tab" aria-controls="exemptions_service"
                                        aria-selected="true">Exemptions de service</a>
                                </div>
                            </div>
                            <div class="col-8 col-sm-10">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade active show" id="mutations" role="tabpanel"
                                        aria-labelledby="mutations-tab">
                                        <?=render_fragment($viewDir."mutations",get_db_values('mv_fiche_mutations', ['id_mutation','id_identification','date_mutation','ref_mutation','id_ancien_service','id_nouveau_service','id_ancienne_unite','id_nouvelle_unite','id_ancienne_fonction','id_nouvelle_fonction','observations','bp'], ['id_identification',$data->id_identification]), $data->id_identification,"DONNEES SUR LES MUTATIONS")?>
                                    </div>
                                    <div class="tab-pane text-left fade" id="actions_disciplinaires" role="tabpanel"
                                        aria-labelledby="actions_disciplinaires-tab">  
                                        <?=render_fragment($viewDir."actions_disciplinaires",get_db_values('mv_actions_disciplinaires', ['id_action_disciplinaire ','date_ouverture','id_type_punition','nb_jours_punition','date_cloture','ref_cloture','date_levee','autorite_decision','ref_levee','observation'], ['id_identification',$data->id_identification]), $data->id_identification,"ACTIONS DISCIPLINAIRES")?>
                                    </div>
                                    <div class="tab-pane text-left fade" id="dossiers_penals" role="tabpanel"
                                        aria-labelledby="dossiers_penals-tab">
                                        <?=render_fragment($viewDir."dossiers_penals",get_db_values('mv_dossiers_penals', ['id_dossier_penal','date_debut','date_fin','id_type_peine','juridiction','id_type_infraction','chef','nbre','id_unite_nbre'], ['id_identification',$data->id_identification]),$data->id_identification,"DOSSIERS PENALS")?>
                                    </div>
                                    <div class="tab-pane text-left fade" id="absences" role="tabpanel"
                                        aria-labelledby="absences-tab"> 
                                        <?=render_fragment($viewDir."absences",get_db_values('mv_absences', ['id_absence','id_identification','date_debut','date_fin','nb_jours','nb_heures','est_justifie','justification'], ['id_identification',$data->id_identification]), $data->id_identification,"ABSENCES")?>
                                    </div>
                                    <div class="tab-pane text-left fade" id="missions_renforts" role="tabpanel"
                                        aria-labelledby="missions_renforts-tab"> 
                                        <?=render_fragment($viewDir."missions_renforts",get_db_values('mv_renforcements', ['id_renforcement','id_type_renforcement','ref_renforcement','titre_obtenu','id_pays','date_depart','date_retour','nb_jours'], ['id_identification',$data->id_identification]),$data->id_identification,"MISSIONS & RENFORCEMENTS")?>
                                    </div>
                                    <div class="tab-pane text-left fade" id="distinctions" role="tabpanel"
                                        aria-labelledby="distinctions-tab">
                                        <?=render_fragment($viewDir."distinctions",get_db_values('mv_dictinctions_honorifiques', ['id_distinction','id_type_distiction ','date_distiction','ref_distiction','observations'], ['id_identification',$data->id_identification]),$data->id_identification,"DISTINCTIONS HONORIFIFIQUES")?>
                                    </div>
                                    <div class="tab-pane fade" id="accidents_roulage" role="tabpanel"
                                        aria-labelledby="accidents_roulage-tab"> 
                                        <?=render_fragment($viewDir."accidents_roulage",get_db_values('mv_accidents_roulage', ['id_accident','date_accident ','degat_charge','degat_cause','responsable','observation'], ['id_identification',$data->id_identification]), $data->id_identification,"ACCIDENTS DE ROULAGE")?>
                                    </div>
                                    <div class="tab-pane fade" id="accidents_travail" role="tabpanel"
                                        aria-labelledby="accidents_travail-tab">
                                        <?=render_fragment($viewDir."accidents_travail",get_db_values('mv_accidents_travail', ['id_accident','date_accident ','nature','decision'], ['id_identification',$data->id_identification]),$data->id_identification,"ACCIDENTS DE TRAVAIL")?>
                                    </div>

                                    <div class="tab-pane fade" id="exemptions_service" role="tabpanel"
                                        aria-labelledby="exemptions_service-tab">
                                        <?=render_fragment($viewDir."exemptions",get_db_values('mv_exemptions_service', ['id_exemption','annee ','date_debut','date_fin','nb_jours'], ['id_identification',$data->id_identification]),$data->id_identification,"EXEMPTIONS DE SERVICE")?>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </section>
</div>



