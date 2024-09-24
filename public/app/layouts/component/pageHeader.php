<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title mb-15">
                <div class="d-flex justify-content-md-between justify-content-center py-2">
                    <div class="d-none d-md-block">
                        <h3 class="breadcrumb-header"><?= ($title) ? $title : '' ?></h3>
                        <p class="text-muted mb-0"><?= ($description) ? $description : '' ?></p>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group mx-auto">
                            <ol class="breadcrumb hide-phone m-0" id="breadcrumb-placeholder"><?= ($breadcrumb) ? $breadcrumb : '' ?> > <?= ($title) ? $title : '' ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>