

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

                <?php
                if ($this->session->userdata('role_id') == 1) {
                ?>

                <a href="<?= base_url('asesor/addasesor'); ?>" class="btn btn-primary mb-3 " >Add New Asesor </a>

                    <?php
                }
                ?>

                <div class="fa-pull-right">
                    <div class="col">
                        <form action="http://localhost/Akreditasi/asesor/searchAsesor" method="post">
                            <div class="input-group">
                                <input name="keywordNama" id="keywordNama" autocomplete="off" type="text" class="w-50 form-control" placeholder="Cari Nama Asesor" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="tombolCariAsesor">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIA</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Rumpun</th>
                        <th scope="col">Kab/Kota</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <?php
                        if ($this->session->userdata('role_id') == 1) {
                        ?>
                        <th scope="col">Action</th>
                            <?php
                        }
                        ?>
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
                            <td><?= $a['keterangan']; ?></td>


                            <?php
                            if ($this->session->userdata('role_id') == 1) {
                            ?>
                            <td>
                                <a href="<?= base_url('asesor/editasesor/' . $a['id']) ;?>"class="badge badge-pill badge-success">edit</a>
                                <a href="<?= base_url('asesor/deleteAsesor/' . $a['id']) ;?>"class="badge badge-pill badge-danger" onclick="return confirm('Apakah Yakin Hapus Data?')">delete</a>
                            </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php $i++ ;?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row mt-3">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->


    <!-- End of Main Content -->




                    </form>
