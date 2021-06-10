<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
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
        //echo "isadmin";
        $this->load->view('admin/Vpengumuman');
    }

    public function addPengumuman()
    {
        //echo "isadmin";
        $this->load->view('admin/VaddPengumuman');
    }

    public function doAddPengumuman(){
        echo "add";
    }
}
