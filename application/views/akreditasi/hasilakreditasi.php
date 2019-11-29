

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
                    <div class="col-6">
                        <form action="http://localhost/Akreditasi/asesor/searchAsesor" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend bg-light">
                                    <label class="input-group-text bg-light font-weight-light small" for="asesor">Cari </label>
                                </div>
                                <input name="keywordNama" id="keywordNama" autocomplete="off" type="text" class="w-50 form-control" placeholder="Cari Lembaga" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="tombolCariLembaga">Cari</button>
                                </div>
                            </div>
                        </form>
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

                    </tr>
                    </thead>
                    <tbody>
                    <!--                --><?php //$i= 1; ?>
                    <!--                --><?php //foreach ($akreditasi as $a) :?>
                    <tr>
                        <th scope="row">1</th>
                        <td>69906573</td>

                        <td>TK AN NUR
                        </td>
                        <td>
                            Taman Kanak- kanak

                        </td>
                        <td>
                            Kab. Indragiri Hulu

                        </td>

                        <td>
                            C


                        </td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>69945559
                        </td>

                        <td>KB NUR RAMADHANI

                        </td>
                        <td>
                            Kelompok Bermain


                        </td>
                        <td>
                            Kab. Bengkalis


                        </td>

                        <td>
                            B



                        </td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>69982551
                        </td>

                        <td>TK FITRAH AL MUKARAMAH

                        </td>
                        <td>
                            Taman Kanak- kanak


                        </td>
                        <td>
                            Kab. Bengkalis


                        </td>

                        <td>
                            B


                        </td>
                    </tr>
                    <!--                    --><?php //$i++ ;?>
                    <!--                --><?php //endforeach; ?>
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
