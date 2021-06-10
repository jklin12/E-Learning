<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
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

    public function index(){
        $nip = $this->session->userdata("nip");

        $query = $this->db->query("select * from t_tugas left join t_materi on t_tugas.id_materi = t_materi.id_materi left join t_mapel on t_materi.id_mapel = t_mapel.id_mapel left join t_kelas on t_materi.id_kelas = t_kelas.id_kelas where t_materi.nip = '".$nip."'");
        $result = $query->result_array();
        //print_r($result);
        //die();
        $data["tugas"] = $result;
        $this->load->view("pengajar/Vtugas",$data);
    }

    public function deletetugas($id){
        $query = $this->db->query("DELETE FROM `t_tugas` WHERE id_tugas = '".$id."'");

        redirect('pengajar/Tugas');
    }

    public function detailtugas(){
        $idtugas = $this->input->get('idtugas');

        $query = $this->db->query("SELECT * FROM `t_tugas_kirim` left join t_siswa on t_tugas_kirim.id_siswa = t_siswa.nis left join t_materi on t_tugas_kirim.id_materi = t_materi.id_materi left join t_kelas on t_materi.id_kelas = t_kelas.id_kelas where id_tugas = '".$idtugas."' ");
        $result = $query->result_array();
        //print_r($result);
        //die();

        $data['tugas_kirim'] = $result;
        $this->load->view("pengajar/Vdetailtugas",$data);
    }

    public function addnilai(){
       $id = $this->input->post('id');
       $idtugas = $this->input->post('idtugas');
       $nilai =  $this->input->post('nilai');

       $query = $this->db->query("UPDATE `t_tugas_kirim` SET `nilai`= '".$nilai."'  WHERE id_tugas_kirim = '".$id."'");

       redirect('pengajar/tugas/detailtugas?idtugas='.$idtugas);
    }
}