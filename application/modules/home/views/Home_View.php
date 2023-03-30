   
    <div class="content-wrapper" style="min-height: 357.039px;">

      <section class="content">

          <div class="card card-info card-outline">
          
              <div class="card-body">
            
              <?php if($this->session->flashdata('errors')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo validation_errors(); ?>                 
                </div>
              <?php } ?>

                 Home Pages

               
              </div>

          </div>

      </section>

    </div>
