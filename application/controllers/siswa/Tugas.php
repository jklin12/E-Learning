<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mMateri');
        if ($this->session->userdata('loginStatus') != "isLogin") {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Login terlebih dahulu</div>');
            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {
        $kelas = $this->session->userdata("kelas");
        $nis = $this->session->userdata("nis");
        $cektugas = $this->db->query("SELECT * FROM `t_tugas` LEFT JOIN t_materi on t_tugas.id_materi = t_materi.id_materi left join t_mapel on t_materi.id_mapel = t_mapel.id_mapel left join t_pengajar on t_materi.nip = t_pengajar.nip  WHERE t_materi.id_kelas = '" . $kelas . "'")->result_array();
        //print_r($cektugas);
        //die();
        $data["tugas"] = $cektugas;
        $this->load->view('siswa/Vtugas',$data);
    }

    public function kirimTugas()
    {
        $idmapel = $this->input->post("id_mapel");
        $idtugas = $this->input->post("id_tugas");
        $idmateri = $this->input->post("id_materi");
        $nis = $this->session->userdata("nis");


        $utugas = $this->do_upload('file_tugas');
        //print_r($utugas);
        //die();
        $tugasname = $utugas["upload_data"]["file_name"];

        if ($tugasname != null) {
            $datatugas = array(
                'id_tugas' => $idtugas,
                'id_materi' => $idmateri,
                'id_siswa' => $nis,
                'tugas_kirim' => $tugasname,
                'status' => 'terkirim'
            );
            $kiritugas = $this->mMateri->addKirimTugas($datatugas);
            if (!$kiritugas) {
                redirect('siswa/Jadwalmapel/pelajaran?id_mapel=' . $idmapel);
            } else {
                echo "gagal";
            }
        }
        //        echo $tugasname . '<br>' . $idtugas . '<br>' . $idmateri . '<br>' . $nis;
    }

    function do_upload($filename)
    {
        $config['upload_path'] = 'userfiles/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($filename)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
            // $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
            //$this->load->view('upload_success', $data);
        }
    }
}
