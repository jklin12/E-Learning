<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalMengajar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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


        $nip = $this->session->userdata("nip");
        //$getmapel = $this->mMapel->getMapel($nis);
        $query =   $this->db->query("SELECT * FROM `t_jadwal` LEFT JOIN t_kelas ON t_jadwal.id_kelas = t_kelas.id_kelas LEFT JOIN t_mapel ON t_jadwal.id_mapel = t_mapel.id_mapel WHERE t_jadwal.nip = '" . $nip . "'");
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
        $this->load->view('pengajar/Vjadwalmengajar', $data);
    }

    public function materi($id)
    {

        //$idmapel = $this->encryption->decrypt($rawid);
        $this->session->set_userdata("mapelId", $id);

        $query = $this->db->query("SELECT * FROM `t_materi` LEFT JOIN t_jadwal on t_materi.id_jadwal = t_jadwal.id_jadwal LEFT JOIN t_pengajar on   t_jadwal.nip = t_pengajar.nip left join t_kelas on t_materi.id_kelas =  t_kelas.id_kelas left join t_mapel on t_materi.id_mapel = t_mapel.id_mapel WHERE t_materi.id_mapel = '" . $id . "'");
        $row = $query->row_array();
        $result = $query->result_array();
        //print_r($result);
        //die();

        $data["judul"] = $row["nama_mapel"];
        $data["id_jadwal"] = $row["id_jadwal"];
        $data["id_mapel"] = $row["id_mapel"];
        $data["data"] = $result;

        $this->load->view('pengajar/Vmateri', $data);
    }
    public function addMateri()
    {
        $kelas = $this->mMateri->getKelas()->result_array();
        $data["kelas"] = $kelas;
        $data["id_jadwal"] = $this->input->get('idjadwal');
        $query = $this->db->query("SELECT * FROM `t_mapel` WHERE id_mapel = '".$this->input->get('idmapel')."'");
        $result = $query->row_array();
        $data["id_mapel"] = $result["id_mapel"];
        $data["nama_mapel"] = $result["nama_mapel"];

        $this->load->view('pengajar/Vaddmateri', $data);
    }

    public function doAddMateri()
    {
        //echo $this->input->post('have_tugas');
        $nip = $this->session->userdata("nip");
        
        $rawid = $this->session->userdata('mapelId');

        $config['upload_path']          = 'userfiles/uploads';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf|mp4|mkv';
        $config['max_size']             = 0;
        $config['encrypt_name'] = TRUE;

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        //$this->form_validation->set_rules('mapel_id', 'Mapelid', 'required|callback_check_default');
        $this->form_validation->set_rules('kelas_id', 'Kelas id', 'min_length[1]');
        $this->form_validation->set_rules('userfile', 'File', 'trim|xss_clean');


        $tugas = $this->input->post("tugas");
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $mapelid = $this->input->post('mapel_id');
        $kelasid = $this->input->post('kelas_id');
        $idjadwal = $this->input->post('jadwal_id');

        $this->load->library('upload', $config);

        //baru

        if ($tugas == '0') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pengajar/Vaddmateri', $data);
            } else {
                $umateri = $this->do_upload('userfile');
                $materiname = $umateri["upload_data"]["file_name"];
                if($umateri["upload_data"]["file_ext"] == ".mp4"){
                    $materi = '<video width="800" controls>
                    <source src="'.base_url('userfiles/uploads/' . $materiname).'" type="video/mp4">
                    Your browser does not support HTML video.
                    </video>';
                }else{
                    $materi = '<img src="'.base_url('userfiles/uploads/' . $materiname).'" >';
                }
                //print_r($umateri);
                //die();
                foreach ($kelasid as $id) {
                    $data = array(
                        "id_mapel" => $mapelid,
                        "id_jadwal" => $idjadwal,
                        "id_kelas" => $id,
                        "nip" => $nip,
                        "judul" => $judul,
                        "deskripsi" => $deskripsi,
                        "tugas" => "tidak",
                        "materi" => $materi,
                        "tgl_upload" => date("Y-m-d H:i:s"),
                    );
                    $inseert = $this->mMateri->addMateri($data);
                    $err = $this->db->error();
                    if ($err["code"] == 0) {
                        redirect("pengajar/JadwalMengajar/materi/" . $rawid);
                    } else {
                        print_r($err);
                    }
                }
            }
        } else {
            $judultugas = $this->input->post("judul_tugas");
            $deskripsitugas = $this->input->post('deskripsi_tugas');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pengajar/Vaddmateri', $data);
            } else {
                $umateri = $this->do_upload('userfile');
                $materiname = $umateri["upload_data"]["file_name"];
                if($umateri["upload_data"]["file_ext"] == ".mp4"){
                    $materi = '<video width="800" controls>
                    <source src="'.base_url('userfiles/uploads/' . $materiname).'" type="video/mp4">
                    Your browser does not support HTML video.
                    </video>';
                }else{
                    $materi = '<img src="'.base_url('userfiles/uploads/' . $materiname).'" >';
                }

                $utugas = $this->do_upload('userfile_tugas');
                $tugasname = $utugas["upload_data"]["file_name"];
                if($utugas["upload_data"]["file_ext"] == ".mp4"){
                    $filetugas = '<video width="800" controls>
                    <source src="'.base_url('userfiles/uploads/' . $tugasname).'" type="video/mp4">
                    Your browser does not support HTML video.
                    </video>';
                }else{
                    $filetugas = '<img src="'.base_url('userfiles/uploads/' . $tugasname).'" >';
                }
                foreach ($kelasid as $id) {
                    $datamateri = array(
                        "id_mapel" => $mapelid,
                        "id_jadwal" => $idjadwal,
                        "id_kelas" => $id,
                        "nip" => $nip,
                        "judul" => $judul,
                        "deskripsi" => $deskripsi,
                        "tugas" => "tidak",
                        "materi" => $materi,
                        "tgl_upload" => date("Y-m-d H:i:s"),
                    );
                    $insertmateri = $this->mMateri->addMateri($datamateri);
                    $materiId = $this->db->insert_id();
                    $datatugas = array(
                        "id_materi" => $materiId,
                        "judul_tugas" => $judultugas,
                        "deskripsi" => $deskripsitugas,
                        "tugas" => $filetugas,
                        "tgl_upload" => date("Y-m-d H:i:s"),
                    );
                    $inserttugas = $this->mMateri->addTugas($datatugas);
                    if ($insertmateri || $inserttugas) {
                        echo "Gagal";
                    } else {
                        redirect("pengajar/JadwalMengajar/materi/" . $rawid);
                    }
                }
            }
        }

        //bagian lama
        /*if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengajar/Vaddmateri', $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                //$error = array('error' => $this->upload->display_errors());

                $this->form_validation->set_message('userfile', $data['error'] = $this->upload->display_errors());
                //$this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $filename = $data["upload_data"]["file_name"];

                if ($tugas == '0') {
                    foreach ($kelasid as $id) {
                        $data = array(
                            "mapel_id" => $mapelid . $id,
                            "judul" => $judul,
                            "konten" => $type,
                            "deskripsi" => $deskripsi,
                            "tugas" => "tidak",
                            "file" => 'userfiles/uploads/' . $filename,
                            "tgl_posting" => date("Y-m-d H:i:s"),
                        );
                        $inseert = $this->mMateri->addKelas($data);
                        $err = $this->db->error();
                        if ($err["code"] == 0) {
                            redirect("pengajar/JadwalMengajar/materi/" . $rawid);
                        } else {
                            print_r($err);
                        }
                    }
                } else {
                    $this->form_validation->set_rules('judul_tugas', 'Judul Tugas', 'required');
                    $this->form_validation->set_rules('deskripsi_tugas', 'Deskripsi Tugas', 'required');

                    $tugas = $this->input->post("judul_tugas");
                    $judul = $this->input->post('deskripsi_tugas');
                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('pengajar/Vaddmateri', $data);
                    } else {
                        if (!$this->upload->do_upload('userfile_tugas')) {

                            $this->form_validation->set_message('userfile', $data['error'] = $this->upload->display_errors());
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $filename = $data["upload_data"]["file_name"];
                        }
                    }
                }

                //print_r($data["upload_data"]["file_name"]);
                //echo $judul . "\n" . $deskripsi . "\n" . $mapelid . "\n" . $type . "\n" . $kelasid;
                //$this->load->view('upload_success', $data);
            }
        }*/

        //$this->load->view('pengajar/Vaddmateri',$data);

    }

    function do_upload($filename)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

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

    public function deleteMateri($id)
    {
        $this->mMateri->delMateri($id);
        $rawid = $this->session->userdata('mapelId');

        redirect('pengajar/JadwalMengajar/materi/' . $rawid);
    }

    function detailmateri(){
        $idmateri = $this->input->get('idmateri');

        $query = $this->db->query("SELECT t_materi.id_materi,t_materi.id_jadwal,t_materi.id_mapel,t_materi.id_kelas,t_materi.nip,t_materi.judul,t_materi.deskripsi,t_materi.materi,t_materi.tgl_upload,t_mapel.nama_mapel,t_jadwal.hari,t_jadwal.jam_mulai,t_jadwal.jam_selesai,t_kelas.nama_kelas,t_pengajar.nama,t_tugas.id_tugas,t_tugas.judul_tugas,t_tugas.tugas FROM `t_materi` LEFT JOIN t_mapel on t_materi.id_mapel = t_mapel.id_mapel left join t_jadwal on t_materi.id_jadwal = t_jadwal.id_jadwal left join t_kelas on t_materi.id_kelas = t_kelas.id_kelas left join t_pengajar on t_materi.nip = t_pengajar.nip left join t_tugas on t_materi.id_materi = t_tugas.id_materi where  t_materi.id_materi = '" . $idmateri . "' ");
        $result = $query->row_array();
        //print_r($result);
        $data["data"] = $result;
        $this->load->view('pengajar/Vdetailmateri', $data);
    }


}
