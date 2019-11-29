

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
                    <!--                        <td>--><?//= $a['tahun_valid']; ?><!--</td>-->
                    <!--                        <td>--><?//= $a['nama']; ?><!--</td>-->
                    <!--                        <td>--><?//= $a['rumpun']; ?><!--</td>-->
                    <!--                        <td>--><?//= $a['kab_kota']; ?><!--</td>-->
                    <!--                        <td>--><?//= $a['status_penugasan']; ?><!--</td>-->
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
                    <td><?= $v['keterangan']; ?></td>
                    <td><?= $v['file_valid']; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('akreditasi/hasilakreditasi/') ;?>"class="badge badge-pill badge-warning">view</a>
                        <a href=""class="badge badge-pill badge-success">edit</a>
                        <a href=""class="badge badge-pill badge-danger">delete</a>
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
