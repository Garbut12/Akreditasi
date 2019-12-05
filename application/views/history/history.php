

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





            <div class="row mb-lg-2">
                <div class="col">
                    <div class="fa-pull-right">
                        <div class="col-mb-12">
                            <form action="http://localhost/Akreditasi/asesor/searchAsesor" method="post">
                                <div class="input-group">
                                    <input name="keywordNama" id="keywordNama" autocomplete="off" type="text" class="w-50 form-control" placeholder="Cari" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="tombolCariLembaga">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>






            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NPSN</th>
                    <th scope="col">Satuan Pendidikan</th>
                    <th scope="col">Program</th>
                    <th scope="col">Kabupaten/Kota</th>
                    <th scope="col">Status Akreditasi</th>
                    <th scope="col">No SK</th>
                    <th scope="col">Validasi</th>
                    <th scope="col">Tahun</th>

                </tr>
                </thead>
                <tbody>
                <?php $i= 1; ?>
                <?php foreach ($history as $h) :?>
                <tr>
                    <th scope="row"><?= $i ;?></th>
                    <td><?= $h['npsn']; ?></td>
                    <td><?= $h['satuan_pendidikan']; ?></td>
                    <td><?= $h['program']; ?></td>
                    <td><?= $h['Kab_Kota']; ?></td>
                    <td><?= $h['status_akreditasi']; ?></td>
                    <td><?= $h['validasi']; ?></td>
                    <td><?= $h['no_sk']; ?></td>
                    <td><?= $h['tahun']; ?></td>
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


<div class="col">
    <a href="<?= base_url('akreditasi/viewvalidasi/'.$sessionid = $this->session->userdata('id'))?>"class=" btn btn-secondary btn-icon-split">
        <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
        <span class="text">Back</span>
    </a>
</div>