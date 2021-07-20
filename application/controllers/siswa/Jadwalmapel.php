<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");

class Jadwalmapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mMapel');
        $this->load->model('mMateri');
        $this->load->helper('day_helper');
        if ($this->session->userdata('loginStatus') != "isLogin") {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Login terlebih dahulu</div>');

            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {
        /*$query =   $this->db->query("SELECT * FROM `t_kelas_siswa` LEFT JOIN t_mapel on t_kelas_siswa.id_kelas = t_mapel.id_kelas WHERE t_kelas_siswa.nis = '666'");
        print_r($query->result());*/


        $nis = $this->session->userdata("nis");
        $kelas = $this->session->userdata("kelas");
        //$getmapel = $this->mMapel->getMapel($nis);
        $query =   $this->db->query("SELECT * FROM `t_jadwal`left join t_mapel on t_jadwal.id_mapel = t_mapel.id_mapel LEFT JOIN t_pengajar on t_jadwal.nip = t_pengajar.nip  where t_jadwal.id_kelas = '" . $kelas . "'");
        $result = array();
        foreach ($query->result_array() as $row) {
            //$results[$row['hari_mapel']][] = $row;
            //$results[$row['hari_mapel']] = array('hari' => $row['hari_mapel'], 'data' => array());
            //$results[$row['hari_mapel']]['data'][] = $row;
            //$result[$row['hari_mapel']]['data'] = array();
            $result[$row['hari']]['hari'] = $row['hari'];
            $result[$row['hari']]['data'][] = $row;
        }
        //$result = array_values($result);
        //print_r($result);
        //die();

        $data["jadwal"] = $result;

        $this->load->view('siswa/Vjadwalmapel', $data);
    }



    public function pelajaran()
    {
        $idmapel = $this->input->get('id_mapel');
        $kelas = $this->session->userdata("kelas");
        $nis = $this->session->userdata("nis");

        $now =  date('Y-m-d H:i:s');
        $minweek = date('Y-m-d H:i:s', strtotime('-1 week'));
        $query = $this->db->query("SELECT t_materi.id_materi,t_materi.id_jadwal,t_materi.id_mapel,t_materi.id_kelas,t_materi.nip,t_materi.judul,t_materi.deskripsi,t_materi.materi,t_materi.tgl_upload,t_mapel.nama_mapel,t_jadwal.hari,t_jadwal.jam_mulai,t_jadwal.jam_selesai,t_kelas.nama_kelas,t_pengajar.nama,t_tugas.id_tugas,t_tugas.judul_tugas,t_tugas.tugas FROM `t_materi` LEFT JOIN t_mapel on t_materi.id_mapel = t_mapel.id_mapel left join t_jadwal on t_materi.id_jadwal = t_jadwal.id_jadwal left join t_kelas on t_materi.id_kelas = t_kelas.id_kelas left join t_pengajar on t_materi.nip = t_pengajar.nip left join t_tugas on t_materi.id_materi = t_tugas.id_materi where  t_materi.id_mapel = '" . $idmapel . "' AND t_materi.id_kelas = '" . $kelas . "' AND (t_materi.tgl_upload BETWEEN  '" . $minweek . "' AND '" . $now . "')");
        $result = $query->row_array();

        if (isset($result)) {
            $materi = "ya";
            $data["data"] = $result;

            $idmateri = $result["id_materi"];
            $cektugas = $this->db->query("SELECT * FROM `t_tugas_kirim` where id_materi = '" . $idmateri . "' and id_siswa = '" . $nis . "' ")->row_array();
            $data["tugas"] = $cektugas;
        } else {
            $materi = "tidak";
        }
        $data["has_materi"] = $materi;
  

        $this->load->view('siswa/Vpelajaran', $data);
    }



    public function absensi()
    {
        $idmapel = $this->input->post("id_mapel");
        $idmateri = $this->input->post("id_materi");
        $nis = $this->session->userdata("nis");
        $keterangan = $this->input->post("keterangan");
        $dataabsen = array(
            'id_materi' => $idmateri,
            'id_siswa' => $nis,
            'keterangan' => $keterangan,

        );
        $absensi = $this->mMateri->addAbsesnis($dataabsen);
        if (!$absensi) {
            redirect('siswa/Jadwalmapel/pelajaran?id_mapel=' . $idmapel);
        }
    }
}
