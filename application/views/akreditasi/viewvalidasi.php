

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?= form_error('akreditasi','
                        <div class="alert alert-danger" role="alert">',
                '</div>');?>



            <?= $this->session->flashdata('message') ;?>
            <a href="<?= base_url('akreditasi/addvalidasi'); ?>" class="btn btn-primary mb-3 " >Add New Validasi </a>



            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Validasi</th>
                    <th scope="col">Ket</th>
                    <th scope="col">File</th>
                    <th scope="col">Aksi</th>

                </tr>
                </thead>
                <tbody>
                                <?php $i= 1; ?>
                                <?php foreach ($akreditasi as $v) :?>
                <tr>
                    <th scope="row"><?= $i ;?></th>
                    <td><?= $v['validasi']; ?></td>
                    <td><?= $v['keterangan']; ?></td>
                    <td><?= $v['file_valid']; ?>

                        <a href="" class="badge badge-pill badge-primary">download</a>
                    </td>
                    <td>
                        <a href="<?= base_url('akreditasi/hasilakreditasi') ;?>"class="badge badge-pill badge-warning">view</a>
                        <?php
                        if ($this->session->userdata('role_id') == 1) {
                            ?>

                        <a href="<?= base_url('akreditasi/editvalidasi/' . $v['id']) ;?>"class="badge badge-pill badge-success">edit</a>
                        <a href="<?= base_url('akreditasi/deleteValidasi/' . $v['id']) ;?>"class="badge badge-pill badge-danger"onclick="return confirm('Yakin Hapus?')">delete</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                                    <?php $i++ ;?>
                                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row mt-3">
                <div class="col">
                    <!--Tampilkan pagination-->
                    <!--                    --><?php //echo $pagination; ?>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->


</div>
