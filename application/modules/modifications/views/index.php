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

                    <table class='table table-striped' id="tables">
                        <thead>
                            <th>#</th>
                            <th>UTILISATEUR</th>
                            <th>ANCIEN DONNEE</th>
                            <th>NOUVEAU DONNEE</th>
                            <th>IP</th>
                            <th>STATUT</th>
                            <th>OPTIONS</th>
                         </thead>
                        <tbody>
                           
                        </tbody>
                    </table>

                    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                  

                </div>

            </div>
        </div>
    </section>
</div>
