<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>
                <span class="float-right">
                    <?php include_once "menu_permission.php";?>
                </span>
            </div>
            <div class="card-body">

                <?php $hiddens = ['per_id'=>$permission->per_id] ?>
                <?php echo form_open('administration/Permission/nouveau',null, $hiddens); ?>
                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <?php echo form_label('Code', 'per_code',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                              $per_code = ['type'=>'text','name'=>'per_code','value' =>set_value('per_code',$permission->per_code),'class' => 'form-control','placeholder' => 'Code'];
                              echo form_input($per_code);
                          ?>
                        <?php echo form_error('per_code', '<span class="text-danger">', '</span>'); ?>

                    </div>

                    <div class="form-group col-md-6">
                        <?php echo form_label('Description', 'per_descr',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                              $per_descr = ['type'=>'text','name'=>'per_descr','value' =>set_value('per_descr',$permission->per_descr),'class' => 'form-control','placeholder' => 'Description'];
                              echo form_input($per_descr);
                          ?>
                        <?php echo form_error('per_descr', '<span class="text-danger">', '</span>'); ?>

                    </div>
                </div>

                <div class="row mb-4">

                    <div class="form-group col-md-6">
                        <?php echo form_label('Etat', 'per_active',['style'=>"font-weight: 900; color:#454545"]); ?>

                        <?php echo form_dropdown('per_active', $this->My_model->dropdown_etat(), set_value('per_active', $permission->per_active), 'id="per_active" class="form-control required"'); ?>
                        <i><?php echo form_error('per_active', '<span class="text-danger">', '</span>'); ?></i>
                        <?php echo form_error('per_active', '<span class="text-danger">', '</span>'); ?>

                    </div>

                    <div class="form-group col-md-6">
                        <?php 
                          $data = array(
                                          'name'          => 'button',
                                          'class'         => 'btn btn-primary btn-sm',
                                          'value'         => 'true',
                                          'type'          => 'submit',
                                          'content'       => 'Enregister'
                                  );
                          echo form_button($data); 
                          ?>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>


        </div>
</div>
</section>
</div>