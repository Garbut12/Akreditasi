<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin
 */
class Akreditasi extends CI_Controller
{

    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Akreditasi_model', 'akm');
    }


    public function index()
    {
        $data['title'] = 'TerAkreditasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $data['akreditasi']=  $this->akm->tahunValid();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function addtahun()
    {
        $data['title']= 'Add Tahun Validasi';
        $data['user'] =$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required|is_unique[tahun_valid.tahun]',
            array(
                'is_unique' => 'this Tahun has already registered'));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/addtahun', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'tahun' => htmlspecialchars($this->input->post('tahun'))
            ];

            $data2 = $this->akm->tahunValid();
            $berbeda = true;
            foreach ($data2 as $daB) {
                unset($daB['id']);
                if ($data == $daB) {
                    $berbeda = false;
                }
            }
            if ($berbeda) {
                if ($this->akm->addtahun($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data Asesor</div>');
                    redirect('akreditasi/index');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menyimpan data asesor</div>');
                    redirect('akreditasi/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, asesor dengan data yang sama sudah tersimpan</div>');
                redirect('akreditasi/index');
            }
        }

    }

    public function editTahun($id)
    {
        $data['title'] = 'Edit Tahun';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['akreditasi'] = $this->akm->getDetailTahun($id);

        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required|is_unique[tahun_valid.tahun]',
            array(
                'is_unique' => 'this Tahun has already registered'));

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/edittahun', $data);
            $this->load->view('templates/footer');
        }else{
            $tahun = $this->input->post('tahun');

            $data = array(
                'tahun' => $tahun
            );

            $this->akm->edittahun($id,$data);
            $this->session->set_flashdata('message',
                '<div class="alert alert-success" role="alert">
                              Data Years Has Been Update
                         </div>');
            redirect('akreditasi/index');
        }
    }

    public function deletetahun($id)
    {
        if ($this->akm->deletetahun($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data tahun</div>');
            redirect('akreditasi/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menghapus data tahun</div>');
            redirect('akreditasi/index');
        }
    }

    public function viewvalidasi($id)
    {
        $data['title'] = 'Validasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $data['akreditasi']=  $this->akm->validasi($id);

        $datasession = array(
            'id' => $id
        );
        $this->session->set_userdata($datasession);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/viewvalidasi', $data);
        $this->load->view('templates/footer');
    }

    public function addvalidasi()
    {


        $data['title']= 'Add  Validasi';
        $data['user'] =$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $data['get_tahun'] = $this->akm->tahunValid();

        $sessionid = $this->session->userdata('id');

        $this->form_validation->set_rules('validasi', 'validasi', 'trim|required');
        $this->form_validation->set_rules('tahun_id', 'tahun_id', 'trim|required');
        $this->form_validation->set_rules('no_sk', 'no_sk', 'trim|required');
        $this->form_validation->set_rules('tgl_valid', 'tgl_valid', 'trim|required');



        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/addvalidasi', $data);
            $this->load->view('templates/footer');
            $data = array(); // Buat variabel $data sebagai array
//
//            if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
//                // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
//                $upload = $this->akm->upload_file($this->filename);
//
//                if($upload['result'] == "success"){ // Jika proses upload sukses
//                    // Load plugin PHPExcel nya
//                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
//
//                    $excelreader = new PHPExcel_Reader_Excel2007();
//                    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
//                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
//
//                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
//                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
//                    $data['sheet'] = $sheet;
//                }else{ // Jika proses upload gagal
//                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
//                }
//            }
//
        }else{
            $data = [
                'validasi' => $this->input->post('validasi'),
                'tahun_id' => $this->input->post('tahun_id'),
                'no_sk' => $this->input->post('no_sk'),
                'tgl_valid' => $this->input->post('tgl_valid')
            ];



            $data2 = $this->akm->valid();
            $berbeda = true;
            foreach ($data2 as $daB) {
                unset($daB['id']);
                if ($data == $daB) {
                    $berbeda = false;
                }
            }
            if ($berbeda) {
                if ($this->akm->addvalidasi($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data validasi</div>');
                    redirect('akreditasi/viewvalidasi/'.$sessionid);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menyimpan data validasi</div>');
                    redirect('akreditasi/viewvalidasi/'.$sessionid);
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, validasi dengan data yang sama sudah </div>');
                redirect('akreditasi/viewvalidasi/'.$sessionid);
            }
        }

    }

//    public function import(){
//        // Load plugin PHPExcel nya
//        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
//
//        $excelreader = new PHPExcel_Reader_Excel2007();
//        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
//        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
//
//        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
//        $data = array();
//
//        $numrow = 1;
//        foreach($sheet as $row){
//            // Cek $numrow apakah lebih dari 1
//            // Artinya karena baris pertama adalah nama-nama kolom
//            // Jadi dilewat saja, tidak usah diimport
//            if($numrow > 1){
//                // Kita push (add) array data ke variabel data
//                array_push($data, array(
//                    'npsn'=>$row['A'], // Insert data nis dari kolom A di excel
//                    'satuan_pendidikan'=>$row['B'], // Insert data nama dari kolom B di excel
//                    'program'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
//                    'Kab_Kota'=>$row['D'], // Insert data alamat dari kolom D di excel
//                    'status_akreditasi'=>$row['E'], // Insert data alamat dari kolom D di excel
//                ));
//            }
//
//            $numrow++; // Tambah 1 setiap kali looping
//        }
//
//        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
//        $this->akm->insert_multiple($data);
//
//    }

    public function editvalidasi($id)
    {
        $data['title'] = 'Edit Validasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['validasi'] = $this->akm->getdetailvalid($id);
        $sessionid = $this->session->userdata('id');

        $this->form_validation->set_rules('validasi', 'validasi', 'trim|required');
        $this->form_validation->set_rules('no_sk', 'no_sk', 'trim|required');
        $this->form_validation->set_rules('tgl_valid', 'tgl_valid', 'trim|required');


        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/editvalidasi', $data);
            $this->load->view('templates/footer');
        }else{
            $validasi = $this->input->post('validasi');
            $no_sk = $this->input->post('no_sk');
            $tgl_valid = $this->input->post('tgl_valid');

            $data = array(
                'validasi' => $validasi,
                'no_sk' => $no_sk,
                'tgl_valid' => $tgl_valid
            );

            $this->akm->editvalidasi($id,$data);
            $this->session->set_flashdata('message',
                '<div class="alert alert-success" role="alert">
                              Data Validasi Has Been Update
                         </div>');
            redirect('akreditasi/viewvalidasi/'. $sessionid);
        }
    }



    public function deleteValidasi($id)
    {
        $sessionid = $this->session->userdata('id');
        if ($this->akm->deleteValidasi($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Succes delete data valid</div>');
            redirect('akreditasi/viewvalidasi/'. $sessionid);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete data validasi</div>');
            redirect('akreditasi/viewvalidasi/'. $sessionid);
        }
    }

    public function hasilakreditasi()
    {
        $data['title'] = 'Hasil Validasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/hasilakreditasi', $data);
        $this->load->view('templates/footer');
    }


}