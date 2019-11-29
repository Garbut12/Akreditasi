<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="row">
        <div class="col-lg-9">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    Add Asesor A
                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <?= form_open_multipart('akreditasi/addtahun/' ); ?>
                        <div class="form-group row">
                            <label for="nia" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tahun" name="tahun"
                                       value="">
                            </div>
                        </div>





                        <div class="from-group row justify-content-end	">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-5">
                                        <a href="<?= base_url('akreditasi/index') ?>"class=" btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                                            <span class="text">Back</span>
                                        </a>
                                    </div>
                                    <div class="col-5">
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                            <span class="text">Add</span></button>
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
