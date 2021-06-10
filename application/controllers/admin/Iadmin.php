<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iadmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('loginStatus') != "isAdmin") {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Login terlebih dahulu</div>');
            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {
        $kelas = $this->db->get('t_kelas')->num_rows();
        $data['kelas'] = $kelas;

        $mapel =  $this->db->get('t_mapel')->num_rows();
        $data['mapel'] = $mapel;

        $this->db->where('pengajar_id !=', null);
        $pengajar = $this->db->get('t_user')->num_rows();
        $data['pengajar'] = $pengajar;

        $this->db->where('siswa_id !=', null);
        $siswa = $this->db->get('t_user')->num_rows();
        $data['siswa'] = $siswa;

        $this->load->view('admin/VindexAdmin',$data);
    }
}
