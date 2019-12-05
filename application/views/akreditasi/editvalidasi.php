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
                   Edit Validasi
                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <?= form_open_multipart('akreditasi/editvalidasi/' . $validasi['id'] ); ?>
                        <div class="form-group row">
                            <label for="validasi" class="col-sm-3 col-form-label">Validasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="validasi" name="validasi"
                                       value="<?= $validasi['validasi']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_sk" class="col-sm-3 col-form-label">NO SK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_sk" name="no_sk"
                                       value="<?= $validasi['no_sk']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_valid" class="col-sm-3 col-form-label">Tanggal Valid</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tgl_valid" name="tgl_valid"
                                       value="<?= $validasi['tgl_valid']; ?>">
                            </div>
                        </div>


                        <div class="from-group row justify-content-end	">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-5">
                                        <a href="<?= base_url('akreditasi/viewvalidasi/'.$sessionid = $this->session->userdata('id')) ?>"class=" btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                                            <span class="text">Back</span>
                                        </a>
                                    </div>
                                    <div class="col-5">
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                            <span class="text">Update</span></button>
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

