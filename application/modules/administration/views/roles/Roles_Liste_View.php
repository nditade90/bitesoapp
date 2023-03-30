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

                <div class="table-responsive p-0">
                    <?=$this->table->generate()?>
                </div>

            </div>
        </div>
    </section>
</div>