<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
		
		<?php include VIEWPATH."menu_secondary/menu_reseignement.php"; ?>

        <div class="card card-info-cust card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Ayants droits</h3>

				<span class="float-right"> 
					<a class='btn btn-info-cust btn-sm' href="<?php echo base_url('gr/Ayants_droit/add')?>"><i class='fa fa-file'></i>
						<span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
					</a> 
					<a class='btn btn-primary-cust btn-sm' href="<?php echo base_url('gr/Ayants_droit/index')?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>     
				</span>
			</div>

		<div class="card-body">
		    <div class="col-md-12">
            <?php 
                // echo "<pre>";
                // print_r($datas->result());
                // echo "</pre>";
            ?>
        <table class='table table-condensed table-hover table-stripped'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom complet</th>
                    <th>Categorie</th>
                    <th>Date de naissance</th>
                    <th>Prise en charge</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($datas)){ 
                        foreach ($datas->result() as $data) {
                            ?>
                            <tr>
                                <td><?=$data->id_ayant_droit?></td>
                                <td><?=get_db_value("gr_categorie_ayant_droits","nom_categorie",array("id_categorie_ayant_droit",$data->id_categorie_ayant_droit))?></td>
                                <td><?=$data->nom.' '.$data->prenoms?></td>
                                <td><?=$data->date_naissance?></td>
                                <td><?=$data->prise_en_charge?></td>                
                                <td>
                                    <a href="<?php echo base_url('gr/Ayants_droit/edit/'.$data->id_ayant_droit)?>">
                                        <span class="fa fa-edit"></span>
                                    </a>

                                    <a href="<?php echo base_url('gr/Ayants_droit/delete/'.$data->id_ayant_droit)?>">
                                        <span class="fa fa-trash text-danger"></span>
                                    </a>
                                </td>                  
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
</table>