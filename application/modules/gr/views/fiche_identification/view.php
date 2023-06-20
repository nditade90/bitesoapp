
<?php $viewDir="gr/views/fiche_identification/details/";?>

<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
    <?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info-cust card-outline card-tabs">
            <div class="card-header p-0 pt-1">
                <h3 class="card-title text-bold"><?=$title?></h3>
                
                <span class="float-right">
                    <?php if($this->router->method !== 'view'){ ?>
                        <a href='<?=base_url('gr/Fiche_identification/add')?>' class="btn btn-info-cust btn-sm"><i
                                class="fa fa-plus"></i> <span class="d-none d-sm-inline">&nbsp;Nouvelle Fiche</span>
                        </a>
                    <?php } ?>

                    <a class="btn btn-primary-cust btn-sm" href="<?=base_url('gr/Fiche_identification')?>"><i
                            class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">&nbsp;Liste des Fiches</span>
                    </a>
                </span>
                
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
                                                <?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?>
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
                                            <?=form_submit('','Enregistrer','class="btn btn-sm btn-primary-cust"')?>
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

                </div>
            </div>

        </div>
    </section>
</div>



