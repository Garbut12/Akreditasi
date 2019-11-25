<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="row">
        <div class="col-lg-6">

            <?= form_error ('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="card">
                <div class="card-header">
                    Edit Menu
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form method="post" action="<?= base_url('menu/editmenu/'. $menu['id']); ?>">
                            <div class="form-group row">
                                <label for="menu" class="col-sm-2 col-form-label">Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']?>" q>
                                </div>
                            </div>
                            <div class="from-group row justify-content-end	">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="<?= base_url('menu') ?>" class="btn btn-secondary btn-icon-split">
                                                <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                                                <span class="text">Back</span>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                                <span class="text">Edit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

