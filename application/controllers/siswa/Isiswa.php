<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Isiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('loginStatus') != "isLogin") {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Login terlebih dahulu</div>');
            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {
        $this->load->view('siswa/Vindexsiswa');
    }
}
