<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ban Paud</h6>

                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 ">
                            <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                          <i class="fas fa-circle text-primary"></i> Asesor
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle text-success"></i> Tahun Akreditasi
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle text-info"></i> Hasil Validasi
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Asesor</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $asesor; ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('asesor/asesor'); ?>"><i
                                            class="fas fa-user-tie fa-2x text-gray-300"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tahun Akreditasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tahun; ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('akreditasi'); ?>"><i
                                            class="fas fa-calendar-alt fa-2x text-gray-300"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Hasil Validasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hasilvalidasi; ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('akreditasi/hasilakreditasi'); ?>"><i
                                            class="fas fa-briefcase fa-2x text-gray-300"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->