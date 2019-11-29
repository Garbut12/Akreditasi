

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <?= form_error('akreditasi','
                        <div class="alert alert-danger" role="alert">',
                '</div>');?>



            <?= $this->session->flashdata('message') ;?>
            <a href="<?= base_url('akreditasi/addtahun'); ?>" class="btn btn-primary mb-3 " >+Tahun Akreditasi </a>



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
<!--                        <td>--><?//= $a['tahun_valid']; ?><!--</td>-->
                        <td><?= $tv['tahun']; ?></td>
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


                        <td>
                            <a href="<?= base_url('akreditasi/viewvalidasi/' . $tv['id']) ;?>"class="badge badge-pill badge-warning">view</a>
                            <a href="<?= base_url('akreditasi/edittahun/' . $tv['id']) ;?>"class="badge badge-pill badge-success">edit</a>
                            <a href="<?= base_url('akreditasi/deleteTahun/' . $tv['id']) ;?>"class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus?')">delete</a>
<!--                            <a href="--><?//= base_url('asesor/editasesor/' ) ;?><!--"class="badge badge-pill badge-success">edit</a>-->
<!--                            <a href="--><?//= base_url('asesor/editasesor/' ) ;?><!--"class="badge badge-pill badge-success">view</a>-->
<!--                            <a href="--><?//= base_url('asesor/deleteAsesor/') ;?><!--"class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus?')">delete</a>-->
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
