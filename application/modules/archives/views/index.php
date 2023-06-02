<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>

                <span class="float-right">
                    
                </span>

            </div>
            <div class="card-body">

                <div class="table-responsive p-0">

                    <?php echo $this->session->flashdata('msg');?>

                    <table class='table table-striped table-bordered' id="dtable">
                        <thead>
                            <th>#</th>
                            <th>UTILISATEUR</th>
                            <th>ANCIEN DONNEE</th>
                            <th>NOUVEAU DONNEE</th>
                            <th>IP</th>
                            <th>EVENT</th>
                            <th>OPTIONS</th>
                         </thead>
                        <tbody>
                            <?php foreach ( $datas as $data ): ?>
                                <?php 
                                    $user = get_db_occurency("admin_users", array('usr_id',$data->user_id)); 

                                    $status = [0=>'Non valide',1=>'Valide',3=>'Rejeter'];
                                ?>
                            <tr>
                                <td><?=$data->id?></td>
                                <td><?=$user->usr_fname.' '.$user->usr_lname?></td>
                                <td><?=$data->old_values?></td>
                                <td><?=$data->new_values?></td>
                                <td><?=$data->ip_address?></td>
                                <td><?=$data->event?></td>
                                <td><?=$status[$data->statut]?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

                    <?php echo $this->pagination->create_links(); ?>

                    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                  

                </div>

            </div>
        </div>
    </section>
</div>