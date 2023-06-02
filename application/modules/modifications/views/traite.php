
<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>

                <span class="float-right">
					<a class='btn btn-info btn-sm' href="<?php echo base_url('modifications/Modifications/index/'.$table)?>"><i class='fa fa-list'></i>
						<span class='d-none d-sm-inline'>&nbsp;Liste</span>
					</a>
                </span>
            </div>

		<div class="card-body">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php 
						$user = get_db_occurency("admin_users", array('usr_id',$data->user_id)); 
						?>
						<div class="col-md-4">
							<label>Utilisateur</label>
							<?=$user->usr_fname.' '.$user->usr_lname?>
						</div>

						<div class="col-md-4">
							<label>Anciennes données</label>
							<?=$data->old_values?>
						</div>

						<div class="col-md-4">
							<label>Nouvelles données</label>
							<?=$data->new_values?>
						</div>

						<div class="col-md-4">
							<label>IP</label>
							<?=$data->ip_address?>
						</div>

						<div class="col-md-4">
							<label>Agent</label>
							<?=$data->user_agent?>
						</div>

						<div class="col-md-4">
							<label>Créer</label>
							<?=$data->created_at?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<?php 
						$hidden = array(
							'id_trial'=>$data->id,
							'user_id'=>$this->session->userdata('user')
						);
					?>
					<?=form_open('modifications/Modifications/traite/'.$data->id, NULL, $hidden)?>

						<div class='form-group'>
							<label>Décision</label>
							<?php 
								$decisions =  array('0'=>'-','1'=>'Valider','2'=>'Refuser');
							?>
							<?=form_dropdown('statut',$decisions,set_value('statut'),"class='form-control'")?>
                        	<?php echo form_error('statut','<span class="text-danger">', '</span>'); ?>
						</div>

						<div class='row'>
							<?=form_submit('','Valider','class="btn btn-sm btn-primary", style="margin-top:20px"')?>				
						</div>
					<?=form_close()?>
				</div>
			</div>
		</div>
	</section>
</div>