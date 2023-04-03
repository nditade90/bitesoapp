
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Criteres de rechercher</h3>
            </div>

            <div class="card-body">

               <?php 
               
            //    echo "<pre>";
            //    print_r($this->auth_library->get());
            //    echo "</pre>";
               ?>
                <div class="col-md-12">
                    <?=form_open('search/Search/index')?>            
                        <div class="row">
                            <div class='col-md-3'>
                                <label>Matricule</label>
                                <?=form_input('matricule',set_value('matricule'),"class='form-control' placeholder='Matricule'")?>
                            </div>

                            <div class='col-md-3'>
                                <label>Nouveau matricule</label>
                                <?=form_input('nouveau_matricule',set_value('nouveau_matricule'),"class='form-control' placeholder='Nouveau matricule'")?>
                            </div>

                            <div class='col-md-3'>
                                <label>Ancien matricule</label>
                                <?=form_input('ancien_matricule',set_value('ancien_matricule'),"class='form-control' placeholder='Ancien matricule'")?>
                            </div>

                            <div class='col-md-3'>
                                <label>Catégorie</label>
                                <?=form_dropdown('id_categorie',$this->My_model->multi_dropdown('gr_categories',array("id_categorie","nom_categorie")),set_value('id_categorie') ,"class='select2 form-control'")?>
                            </div>

                            <div class='col-md-3'>
                                <label>Corps d'origine</label>
                                <?=form_dropdown('id_corps_origine',$this->My_model->multi_dropdown('gr_corps_origine',array("id_corps_origine","nom_corps_origine")),set_value('id_corps_origine'),"class='form-control select2'")?>
                            </div>

                            <div class='col-md-3'>
                                <label>Sexe</label>
                                <?=form_dropdown('id_sexe',$this->My_model->multi_dropdown('gr_sexes',array("id_sexe","nom_sexe")),set_value('id_sexe'),"class='form-control select2' placeholder='id_sexe'")?>
                            </div>

                            <div class='col-md-3'>
                                <label>Promotion</label>
                                <?=form_dropdown('id_promotion',$this->My_model->multi_dropdown('gr_promotions',array("id_promotion","nom_promotion")),set_value('id_promotion'),"class='form-control select2'")?>
                            </div>

                            <div class='col-md-3' style="margin-top:30px">
                                <?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?>                    
                            </div>
                        </div>
                    <?=form_close()?>
                </div>

                <div class="col-md-12" style="margin-top:20px">
                    <legend>Les resultats de recherche <?=(isset($donnees)?count($donnees):0)." Enregistrement(s)"?></legend>
                    <?php 
                        if(!empty($donnees)){
                        ?>
                            
                            <div class="table-responsive p-0">
                            <?php echo $this->session->flashdata('msg');?>

                            <table class='table table-striped table-bordered' id="dtable">
                                <thead>
                                    <th>#</th>
                                    <th><?=$this->lang->line('identity_list_matricule')?></th>
                                    <th><?=$this->lang->line('identity_list_category')?></th>
                                    <th><?=$this->lang->line('identity_list_nom')?></th>
                                    <th><?=$this->lang->line('identity_list_gerne')?></th>
                                    <th><?=$this->lang->line('identity_list_ethnie')?></th>
                                    <th><?=$this->lang->line('identity_list_origine')?></th>
                                    <th><?=$this->lang->line('identity_list_statut')?></th>
                                    <th><?=$this->lang->line('identity_list_nee')?></th>
                                    <th><?=$this->lang->line('identity_list_lieu')?></th>
                                    <th><?=$this->lang->line('identity_list_localt')?></th>
                                    <th><?=$this->lang->line('identity_list_promo')?></th>
                                    <th><?=$this->lang->line('identity_list_options')?></th>
                                </thead>
                                <tbody>
                                    <?php foreach ( $donnees as $data ): ?>
                                        <?php 
                                            $colline = get_db_occurency("gr_collines", array('id_colline',$data->id_colline)); 
                                            $commune = get_db_occurency("gr_communes", array('id_commune ',$colline->id_commune)); 
                                            $province = get_db_occurency("gr_provinces", array('id_province',$commune->id_province)); 
                                        ?>
                                    <tr>
                                        <td><?=$data->id_identification?></td>
                                        <td><?=$data->matricule?></td>
                                        <td><?=get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie))?></td>
                                        <td><?=$data->nom.' '.$data->prenom?></td>
                                        <td><?=get_db_value("gr_sexes","nom_sexe",array("id_sexe",$data->id_sexe))?></td>
                                        <td><?=get_db_value("gr_ethnies","nom_ethnie",array("id_ethnie",$data->id_ethnie))?></td>
                                        <td><?=get_db_value("gr_corps_origine","nom_corps_origine",array("id_corps_origine",$data->id_corps_origine))?></td>
                                        <td><?=get_db_value("gr_etat_civil","nom_etat_civil",array("id_etat_civil",$data->id_etat_civil))?></td>
                                        <td><?=$data->date_naissance?></td>
                                        <td><?=$data->ville_naissance?></td>
                                        <td>
                                            <?=$province->nom_province."/".
                                            $commune->nom_commune."/".
                                            $colline->nom_colline?>
                                        </td>

                                        <td><?=get_db_value("gr_promotions","nom_promotion",array("id_promotion",$data->id_promotion))?></td>
                                        <td><a
                                                href='<?=base_url('gr/Fiche_identification/view/'.$data->id_identification);?>'><span class="fa fa-eye"></span></a>
                                            &nbsp; <a
                                                href='<?=base_url('gr/Fiche_identification/edit/'.$data->id_identification);?>'><span class="fa fa-edit"></span></a>
                                            &nbsp;<a
                                                data-url='<?=base_url('gr/Fiche_identification/delete/'.$data->id_identification);?>'
                                                href='javascript:void(0)' class='delete'><span class="fa fa-trash text-danger"></span></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>


                            <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                            <script>
                            $(document).ready(function() {
                                $('.delete').click(function() {
                                    var url = $(this).data('url');
                                    if (confirm('Are you sure you want to delete this entry?')) {
                                        window.location = url
                                    }
                                });
                            });
                            </script>

                            </div>  
                        <?php
                        }
                    ?>
                </div>
            </div>            
        </div>
    </section>
</div>