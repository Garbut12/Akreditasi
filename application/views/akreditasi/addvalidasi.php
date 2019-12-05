<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="row">
        <div class="col-lg-9">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    Add validasi
                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form method="post" action="<?php echo base_url("akreditasi/addvalidasi"); ?>" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="validasi" class="col-sm-3 col-form-label">Validasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="validasi" name="validasi"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun_id" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">

                                <select class="form-control" name="tahun_id">
                                    <?php foreach ($get_tahun as $data) { ?>
                                    <option value="<?= $data['id']; ?>"><?= $data['tahun']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="no_sk" class="col-sm-3 col-form-label">NO SK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_sk" name="no_sk"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_valid" class="col-sm-3 col-form-label">Tanggal Valid</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tgl_valid" name="tgl_valid"
                                       value="">
                            </div>
                        </div>


<!--                        <div class="form-group row">-->
<!--                            <label class="col-sm-3 ">Tanggal Valid</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-sm-8">-->
<!--                                        <div class="custom-file">-->
<!--                                            <input type="date" class="custom-file-input" id="tgl_valid" name="tgl_valid"">-->
<!--                                            <label class="custom-file-label" for="tgl_valid">Tanggal Valid</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="from-group row justify-content-end	">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-5">
                                        <a href="<?= base_url('akreditasi/viewvalidasi/'.$sessionid = $this->session->userdata('id'))?>"class=" btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
                                            <span class="text">Back</span>
                                        </a>
                                    </div>
                                    <div class="col-5">
                                        <button type="submit" name="preview" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                            <span class="text">Add</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
//if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
//    if (isset($upload_error)) { // Jika proses upload gagal
//        echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
//        die; // stop skrip
//    }
//
//    // Buat sebuah tag form untuk proses import data ke database
//    echo "<form method='post' action='" . base_url("Akreditasi/import") . "'>";
//
//    // Buat sebuah div untuk alert validasi kosong
//    echo "<div style='color: red;' id='kosong'>
//		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
//		</div>";
//
//    echo "<table border='1' cellpadding='8'>
//		<tr>
//			<th colspan='5'>Preview Data</th>
//		</tr>
//		<tr>
//			<th>NPSN</th>
//			<th>Satuan Pendidikan</th>
//			<th>Program</th>
//			<th>Kab Kota</th>
//			<th>Status Akreditasi</th>
//		</tr>";
//
//    $numrow = 1;
//    $kosong = 0;
//
//    // Lakukan perulangan dari data yang ada di excel
//    // $sheet adalah variabel yang dikirim dari controller
//    foreach ($sheet as $row) {
//        // Ambil data pada excel sesuai Kolom
//        $npsn = $row['A']; // Ambil data NIS
//        $satuan_pendidikan = $row['B']; // Ambil data nama
//        $program = $row['C']; // Ambil data jenis kelamin
//        $Kab_Kota = $row['D']; // Ambil data alamat
//        $status_akreditasi = $row['E']; // Ambil data alamat
//
//        // Cek jika semua data tidak diisi
//        if ($npsn == "" && $satuan_pendidikan == "" && $program == "" && $Kab_Kota == "" && $status_akreditasi == "")
//            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
//
//        // Cek $numrow apakah lebih dari 1
//        // Artinya karena baris pertama adalah nama-nama kolom
//        // Jadi dilewat saja, tidak usah diimport
//        if ($numrow > 1) {
//            // Validasi apakah semua data telah diisi
//            $npsn_td = (!empty($npsn)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
//            $satuan_pendidikan_td = (!empty($satuan_pendidikan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
//            $program_td = (!empty($program)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
//            $Kab_Kota_td = (!empty($Kab_Kota)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
//            $status_akreditasi_td = (!empty($status_akreditasi)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
//
//            // Jika salah satu data ada yang kosong
//            if ($npsn == "" or $satuan_pendidikan == "" or $program == "" or $Kab_Kota == "" or $status_akreditasi == "") {
//                $kosong++; // Tambah 1 variabel $kosong
//            }
//
//            echo "<tr>";
//            echo "<td" . $npsn_td . ">" . $npsn . "</td>";
//            echo "<td" . $satuan_pendidikan_td . ">" . $satuan_pendidikan . "</td>";
//            echo "<td" . $program_td . ">" . $program . "</td>";
//            echo "<td" . $Kab_Kota_td . ">" . $Kab_Kota . "</td>";
//            echo "<td" . $status_akreditasi_td . ">" . $status_akreditasi . "</td>";
//            echo "</tr>";
//        }
//
//        $numrow++; // Tambah 1 setiap kali looping
//    }
//
//    echo "</table>";
//
//    // Cek apakah variabel kosong lebih dari 0
//    // Jika lebih dari 0, berarti ada data yang masih kosong
//    if ($kosong > 0) {
//        ?>
<!--        <script>-->
<!--            $(document).ready(function() {-->
<!--                // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong-->
<!--                $("#jumlah_kosong").html('--><?php //echo $kosong; ?>//');
//
//                $("#kosong").show(); // Munculkan alert validasi kosong
//            });
//        </script>
//        <?php
//    } else { // Jika semua data sudah diisi
//        echo "<hr>";
//
//        // Buat sebuah tombol untuk mengimport data ke database
//        echo "<button type='submit' name='import'>Import</button>";
//        echo "<a href='" . base_url("akreditasi/addvalidasi") . "'>Cancel</a>";
//    }
//
//    echo "</form>";
//}
//?>
