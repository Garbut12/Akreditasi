

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
                    <div class="col-4">
                    <a href="" class="btn btn-info waves-effect waves-light btn-purple m-b-5" style="margin-left: 10px"> <i class="fa fa-upload m-r-10"></i> <span>import</span> </a>

                    <a href="" class="btn btn-info waves-effect waves-light btn-purple m-b-5" style="margin-left: 10px"> <i class="fa fa-upload m-r-10"></i> <span>Download</span> </a>
                    </div>
                    <div class="col-8">
                    <div class="fa-pull-right">
                        <div class="col-12">
                            <form action="http://localhost/Akreditasi/asesor/searchAsesor" method="post">
                                <div class="input-group">
                                    <input name="keywordNama" id="keywordNama" autocomplete="off" type="text" class="w-50 form-control" placeholder="Cari Lembaga" required>
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

                    </tr>
                    </thead>
                    <tbody>
                    <!--                --><?php //$i= 1; ?>
                    <!--                --><?php //foreach ($akreditasi as $a) :?>

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

        <div class="row mb-lg-2">
            <div class="col-6">
                <a href="<?= base_url('akreditasi/viewvalidasi/'.$sessionid = $this->session->userdata('id'))?>"class=" btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                    <span class="text">Back</span>
                </a>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->


    <!-- End of Main Content -->


    </div>
