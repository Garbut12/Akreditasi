

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg  ">
            <?= form_error('akreditasi','
                        <div class="alert alert-danger" role="alert">',
                '</div>');?>



            <?= $this->session->flashdata('message') ;?>

            <?php
            if ($this->session->userdata('role_id') == 1) {
            ?>

            <a href="<?= base_url('akreditasi/addtahun'); ?>" class="btn btn-primary mb-3 " >+Tahun Akreditasi </a>

                <?php
            }
            ?>


            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tahun Akreditasi</th>
                    <th scope="col">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php $i= 1; ?>
                <?php foreach ($akreditasi as $tv) :?>
                    <tr>
                        <th scope="row"><?= $i ;?></th>
                        <td><?= $tv['tahun']; ?></td>
                        <td>
                            <a href="<?= base_url('akreditasi/viewvalidasi/' . $tv['id']) ;?>"class="badge badge-pill badge-warning">view</a>

                            <?php
                            if ($this->session->userdata('role_id') == 1) {
                            ?>
                            <a href="<?= base_url('akreditasi/edittahun/' . $tv['id']) ;?>"class="badge badge-pill badge-success">edit</a>
                            <a href="<?= base_url('akreditasi/deleteTahun/' . $tv['id']) ;?>"class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus?')">delete</a>
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
