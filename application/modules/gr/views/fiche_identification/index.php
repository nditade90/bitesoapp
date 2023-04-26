<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        
    <?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info-cust card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>

                <span class="float-right">
                    <a href='<?=base_url('gr/Fiche_identifications/add')?>' class="btn btn-default btn-sm"><i
                            class="fa fa-plus"></i> <span class="d-none d-sm-inline">&nbsp;<?=$this->lang->line('identity_menu_new')?></span></a>
                    <a class="btn btn-primary-cust btn-sm" href="<?=base_url('gr/Fiche_identifications')?>"><i
                            class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">&nbsp;<?=$this->lang->line('identity_menu_list')?></span>
                    </a>
                </span>

            </div>
            <div class="card-body">

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
                            <?php foreach ( $datas->result() as $data ): ?>
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
                                        href='<?=base_url('gr/Fiche_identifications/view/'.$data->id_identification);?>'><span class="fa fa-eye"></span></a>
                                    &nbsp; <a
                                        href='<?=base_url('gr/Fiche_identifications/edit/'.$data->id_identification);?>'><span class="fa fa-edit"></span></a>
                                    &nbsp;<a
                                        data-url='<?=base_url('gr/Fiche_identifications/delete/'.$data->id_identification);?>'
                                        href='javascript:void(0)' class='delete'><span class="fa fa-trash text-danger"></span></a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

                    <?php echo $this->pagination->create_links(); ?>

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

            </div>
        </div>
    </section>
</div>