<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>

                <span class="float-right">
                    <?php include_once "menu_user.php";?>
                </span>

            </div>
            <div class="card-body">
                <?php $hiddens = ['usr_id'=>$user->usr_id] ?>
                <?php echo form_open('administration/Users/nouveau',null, $hiddens); ?>
                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <?php echo form_label('Nom', 'usr_fname',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                    $usr_fname = ['type'=>'text','name'=>'usr_fname','value' =>set_value('usr_fname',$user->usr_fname),'class' => 'form-control','placeholder' => 'Nom'];
                    echo form_input($usr_fname);
                ?>
                        <i><?php echo form_error('usr_fname', '<span class="text-danger">', '</span>'); ?></i>

                    </div>

                    <div class="form-group col-md-6">
                        <?php echo form_label('Prenom', 'usr_lname',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                    $usr_lname = ['type'=>'text','name'=>'usr_lname','value' =>set_value('usr_lname',$user->usr_lname),'class' => 'form-control','placeholder' => 'Prenom'];
                    echo form_input($usr_lname);
                ?>
                        <i><?php echo form_error('usr_lname', '<span class="text-danger">', '</span>'); ?></i>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <?php echo form_label('Telephone', 'usr_telephone',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                    $usr_telephone = ['type'=>'text','name'=>'usr_telephone','value' =>set_value('usr_telephone',$user->usr_telephone),'class' => 'form-control','placeholder' => 'Telephone'];
                    echo form_input($usr_telephone);
                ?>
                        <i><?php echo form_error('usr_telephone', '<span class="text-danger">', '</span>'); ?></i>

                    </div>

                    <div class="form-group col-md-6">
                        <?php echo form_label('Email', 'usr_email',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                    $usr_email = ['type'=>'text','name'=>'usr_email','value' =>set_value('usr_email',$user->usr_email),'class' => 'form-control','placeholder' => 'Email'];
                    echo form_input($usr_email);
                ?>
                        <i><?php echo form_error('usr_email', '<span class="text-danger">', '</span>'); ?></i>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <?php echo form_label('Description', 'usr_description',['style'=>"font-weight: 900; color:#454545"]); ?>
                        <?php 
                    $usr_description = ['type'=>'text','name'=>'usr_description','value' =>set_value('usr_description',$user->usr_description),'class' => 'form-control','placeholder' => 'Description'];
                    echo form_input($usr_description);
                ?>
                        <i><?php echo form_error('usr_description', '<span class="text-danger">', '</span>'); ?></i>

                    </div>

                </div>

                <div class="row mb-4">

                    <div class="form-group col-md-6">
                        <?php echo form_label('Etat', 'usr_authorized',['style'=>"font-weight: 900; color:#454545"]); ?>

                        <?php echo form_dropdown('usr_authorized', $this->My_model->dropdown_etat(), set_value('usr_authorized', $user->usr_authorized), 'id="usr_authorized" class="form-control required"'); ?>
                        <i><?php echo form_error('usr_authorized', '<span class="text-danger">', '</span>'); ?></i>

                    </div>

                    <div class="form-group col-md-6">
                        <?php echo form_label('Role', 'rol_id',['style'=>"font-weight: 900; color:#454545"]); ?>

                        <?php echo form_dropdown('rol_id', $this->My_model->dropdown_role(), set_value('rol_id', $user->usr_authorized), 'id="rol_id" class="form-control required"'); ?>
                        <i><?php echo form_error('rol_id', '<span class="text-danger">', '</span>'); ?></i>

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
    </section>
</div>