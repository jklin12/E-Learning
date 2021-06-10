<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('madmin');
        if ($this->session->userdata('loginStatus') != "isAdmin") {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Login terlebih dahulu</div>');
            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {
        //echo "isadmin";

        $kelas =  $this->madmin->getData('t_kelas')->result_array();
        //print_r($kelas);
        //die();
        $data["kelas"] = $kelas;
        $this->load->view('admin/Vkelas', $data);
    }

    public function addKelas()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');

        $data = array(
            "id_kelas" => $id,
            "nama_kelas" => $name
        );
        $addKelas = $this->madmin->addData("t_kelas", $data);

        if ($addKelas) {
            $this->session->set_flashdata('kelas', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Menambah kelas</div>');
            redirect(base_url("index.php/admin/kelas"));
        } else {
            $this->session->set_flashdata('kelas', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal menambah kelas  </div>');
            redirect(base_url("index.php/admin/kelas"));
        }
    }


    public function ediKelas()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');


        $this->db->set("nama_kelas", $id);
        $this->db->where("id_kelas", $name);
        $addKelas = $this->db->update("t_kelas");

        if ($addKelas) {
            $this->session->set_flashdata('kelas', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit kelas</div>');
            redirect(base_url("index.php/admin/kelas"));
        } else {
            $this->session->set_flashdata('kelas', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit kelas  </div>');
            redirect(base_url("index.php/admin/kelas"));
        }
    }
}
