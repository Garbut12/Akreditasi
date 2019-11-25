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
                    Edit Asesor
                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <?= form_open_multipart('asesor/editAsesor/' . $asesor['id']); ?>
                        <div class="form-group row">
                            <label for="nia" class="col-sm-3 col-form-label">NIA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nia" name="nia"
                                       value="<?= $asesor['nia']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama"
                                       value="<?= $asesor['nama']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rumpun" class="col-sm-3 col-form-label">Rumpun</label>
                            <div class="col-sm-9">
                                <?php
                                $rumpun = array('PAUD','PKBM','LKP');
                                ?>
                                <select type="text" class="form-control" id="rumpun" name="rumpun">
                                    <?= '<option value="'.$asesor['rumpun'].'">'. $asesor['rumpun'].' </option>'; ?>
                                    <?php
                                    for ($i = 0; $i < count($rumpun); $i++){
                                        if ($rumpun[$i] == $asesor['rumpun']){
                                            continue;
                                        }else{
                                            echo '<option value="'.$rumpun[$i].'">'.$rumpun[$i].' </option>';
                                        }
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kab_kota" class="col-sm-3 col-form-label">Kab/Kota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kab_kota" name="kab_kota"
                                       value="<?= $asesor['kab_kota']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_penugasan" class="col-sm-3 col-form-label">Status Penugasan</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control" id="status_penugasan" name="status_penugasan"
                                <?php
                                $status_penugasan = array('bisa ditugaskan','tidak bisa ditugaskan');
                                ?>
                                <select type="text" class="form-control" id="rumpun" name="rumpun">
                                    <?= '<option value="'.$asesor['status_penugasan'].'">'. $asesor['status_penugasan'].' </option>'; ?>
                                    <?php
                                    for ($i = 0; $i < count($status_penugasan); $i++){
                                        if ($status_penugasan[$i] == $asesor['status_penugasan']){
                                            continue;
                                        }else{
                                            echo '<option value="'.$status_penugasan[$i].'">'.$status_penugasan[$i].' </option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>




                        <div class="from-group row justify-content-end	">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-5">
                                        <a href="<?= base_url('asesor/asesor') ?>"class=" btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                                            <span class="text">Back</span>
                                        </a>
                                    </div>
                                    <div class="col-5">
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
