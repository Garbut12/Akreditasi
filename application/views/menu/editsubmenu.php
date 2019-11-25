    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <div class="row">
            <div class="col-lg-6">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors() ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        Edit Sub Menu
                    </div>

                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <?= form_open_multipart('menu/editsubmenu/' . $submenu['id']); ?>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="<?= $submenu['title']; ?>">
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="menu" class="col-sm-2 col-form-label">Menu</label>
                                <div class="col-sm-10">
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <option value="<?= $submenu['menu_id']; ?>"> <?= $submenu['menu']; ?> </option>
                                        <?php foreach ($menu as $m) : ?>

                                            <?php
                                            if ($m['menu'] == $submenu['menu']){
                                                continue;
                                            }
                                            ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="url" name="url"
                                               value="<?= $submenu['url']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="icon" name="icon"
                                               value="<?= $submenu['icon']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="is_active"
                                                   name="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                Active?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="from-group row justify-content-end	">
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-3">
                                                <a href="<?= base_url('menu/submenu') ?>"class=" btn btn-secondary btn-icon-split">
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
    <!-- End of Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newmenumodalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
