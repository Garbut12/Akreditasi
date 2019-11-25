

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



        <div class="row">
            <div class="col-lg">
                <?= form_error('asesor','
                        <div class="alert alert-danger" role="alert">',
                    '</div>');?>



                <?= $this->session->flashdata('message') ;?>
                <a href="<?= base_url('asesor/addasesor'); ?>" class="btn btn-primary mb-3 " >Add New Asesor </a>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIA</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Rumpun</th>
                        <th scope="col">Kab/Kota</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 1; ?>
                    <?php foreach ($asesor as $a) :?>
                        <tr>
                            <th scope="row"><?= $i ;?></th>
                            <td><?= $a['nia']; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['rumpun']; ?></td>
                            <td><?= $a['kab_kota']; ?></td>
                            <td><?= $a['status_penugasan']; ?></td>
<!--                            <td>-->
<!--                                --><?php
//                                if($a['status_penugasan'] == '1'){
//                                    ?><!-- <a href="--><?//= base_url('asesor/asesorA' . $a['id']) ;?><!--"class="badge badge-pill badge-success"><i class="fas fa-check"></i> bisa ditugaskan</a>--><?php
//
//                                }else{
//                                    ?><!-- <a href="--><?//= base_url('asesor/asesorA' . $a['id']) ;?><!--"class="badge badge-pill badge-success"><i class="fas fa-check"></i> tidak bisa ditugaskan</a>--><?php
//                                }
//
//                                ?>
<!--                            </td>-->


                            <td>
                                <a href="<?= base_url('asesor/editasesor/' . $a['id']) ;?>"class="badge badge-pill badge-success">edit</a>
                                <a href="<?= base_url('asesor/deleteAsesor/' . $a['id']) ;?>"class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus?')">delete</a>
                            </td>
                        </tr>
                        <?php $i++ ;?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!--   Modal -->
    <div class="modal fade" id="newAsesorModal" tabindex="-1" role="dialog" aria-labelledby="newAsesorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAsesorModalLabel">Add New Asesor </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('asesor/asesor') ;?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nia" name="nia" placeholder="NIA">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <select name="rumpun" id="rumpun" class="form-control" placeholder="Rumpun">
                                <option value="">Select Rumpun</option>
                                <?php foreach ($asesor as $a) : ?>
                                    <option value="<?= $a['id'];?>"><?= $a['asesor'];?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>



                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kab_kota" name="kab_kota" placeholder="Kabupaten/Kota">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <select name="rumpun" id="rumpun" class="form-control" placeholder="Rumpun">
                                <option value="">Status Penugasan</option>

                            </select>
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