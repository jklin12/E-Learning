<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
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

        $mapel =  $this->madmin->getData('t_mapel')->result_array();
        //print_r($mapel);
        //die();
        $data["mapel"] = $mapel;
        $this->load->view('admin/Vmapel', $data);
    }

    public function addMapel()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');

        $data = array(
            "id_mapel" => $id,
            "nama_mapel" => $name
        );
        $addmapel = $this->madmin->addData("t_mapel", $data);

        if ($addmapel) {
            $this->session->set_flashdata('mapel', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Menambah mapel</div>');
            redirect(base_url("index.php/admin/mapel"));
        } else {
            $this->session->set_flashdata('mapel', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal menambah mapel  </div>');
            redirect(base_url("index.php/admin/mapel"));
        }
    }


    public function editmapel()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
 
        $this->db->set("nama_mapel", $name);
        $this->db->where("id_mapel", $id);
        $addmapel = $this->db->update("t_mapel"); 
        //print_r($this->db->last_query());    
        //die();
        if ($addmapel) {
            $this->session->set_flashdata('mapel', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit mapel</div>');
            redirect(base_url("index.php/admin/mapel"));
        } else {
            $this->session->set_flashdata('mapel', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit mapel  </div>');
            redirect(base_url("index.php/admin/mapel"));
        }
    }

    public function hapusMapel($id){ 

        $this->db->where("id_mapel", $id);
        $addmapel = $this->db->delete("t_mapel"); 

        if ($addmapel) {
            $this->session->set_flashdata('mapel', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Hapus mapel</div>');
            redirect(base_url("index.php/admin/mapel"));
        } else {
            $this->session->set_flashdata('mapel', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal Hapus mapel  </div>');
            redirect(base_url("index.php/admin/mapel"));
        }
    }
}
