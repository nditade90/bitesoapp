<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>
                <span class="float-right">
                    <?php include_once "menu_role.php";?>
                </span>
            </div>
            <div class="card-body">

                <?php $hiddens = ['rol_id'=>$role->rol_id] ?>
                <?php echo form_open('administration/Role/nouveau',null, $hiddens); ?>
                <div class="row mb-4">
                    <div class="form-group col-md-4">
                        <?php echo form_label('Nom', 'rol_code',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                              $rol_code = ['type'=>'text','name'=>'rol_code','value' =>set_value('rol_code',$role->rol_code),'class' => 'form-control','placeholder' => 'Nom'];
                              echo form_input($rol_code);
                          ?>
                        <i><?php echo form_error('rol_code', '<span class="text-danger">', '</span>'); ?></i>

                    </div>

                    <div class="form-group col-md-4">
                        <?php echo form_label('Description', 'rol_description',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                              $rol_description = ['type'=>'text','name'=>'rol_description','value' =>set_value('rol_description',$role->rol_description),'class' => 'form-control','placeholder' => 'Description'];
                              echo form_input($rol_description);
                          ?>
                        <i><?php echo form_error('rol_description', '<span class="text-danger">', '</span>'); ?></i>

                    </div>

                    <div class="form-group col-md-4">
                        <?php echo form_label('Etat', 'rol_active',['style'=>"font-weight: 900; color:#454545"]); ?>

                        <?php echo form_dropdown('rol_active', $this->My_model->dropdown_etat(), set_value('rol_active', $role->rol_active), 'id="rol_active" class="form-control required"'); ?>
                        <i><?php echo form_error('rol_active', '<span class="text-danger">', '</span>'); ?></i>

                    </div>
                </div>


                <div class="row mb-4">



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
                <?php echo form_close();?>
            </div>


        </div>
</div>
</section>
</div>