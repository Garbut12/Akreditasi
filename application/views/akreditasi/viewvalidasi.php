

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
                <tr class="center">
                    <th scope="col">NO</th>
                    <th scope="col">Validasi</th>
                    <th scope="col">NO SK</th>
                    <th scope="col">Tanggal Validasi</th>
                    <th scope="col">Aksi</th>

                </tr>
                </thead>
                <tbody>
                                <?php $i= 1; ?>
                                <?php foreach ($akreditasi as $v) :?>
                <tr>
                    <th scope="row"><?= $i ;?></th>
                    <td><?= $v['validasi']; ?></td>
                    <td><?= $v['no_sk']; ?></td>
                    <td><?= $v['tgl_valid']; ?> </td>
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

    <div class="row mb-lg-2">
        <div class="col-6">
            <a href="<?= base_url('akreditasi/index/'.$sessionid = $this->session->userdata('id'))?>"class=" btn btn-secondary btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                <span class="text">Back</span>
            </a>
        </div>
    </div>



</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->


</div>
