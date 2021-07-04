<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('madmin');
        $this->load->helper('day_helper');
        if ($this->session->userdata('loginStatus') != "isAdmin") {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Login terlebih dahulu</div>');
            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {

        $this->db->select('*');
        $this->db->from('t_siswa');
        $this->db->join('t_kelas', 't_siswa.id_kelas = t_kelas.id_kelas', 'left');
        $query = $this->db->get();
        $data['siswa'] = $query->result_array();


        $this->load->view('admin/Vsiswa', $data);
    }

    public function detail($nis)
    {
        $this->db->select('*');
        $this->db->from('t_siswa');
        $this->db->join('t_kelas', 't_siswa.id_kelas = t_kelas.id_kelas', 'left');
        $this->db->join('t_user', 't_siswa.nis = t_user.siswa_id', ' ');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        $data['detail'] = $query->row_array();

        $this->db->select('*');
        $this->db->from('t_kelas');
        $query = $this->db->get();
        $data['kelas'] = $query->result_array();

        //print_r($data['kelas']);
        //die();
        $this->load->view('admin/VdetailSiswa', $data);
    }

    public function edit()
    {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $tempat = $this->input->post('tempat_lahir');
        $tanggal = $this->input->post('tanggal');
        $alamat = $this->input->post('alamat');

        $this->db->set("nama", $name);
        $this->db->set("tempat_lahir", $tempat);
        $this->db->set("tgl_lahir", $tanggal);
        $this->db->set("alamat", $alamat);


        $this->db->where("nis", $id);
        $edit = $this->db->update("t_siswa");

        if ($edit) {
            $this->session->set_flashdata('siswa', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit siswa</div>');
            redirect(base_url("index.php/admin/siswa/detail/" . $id));
        } else {
            $this->session->set_flashdata('siswa', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit siswa  </div>');
            redirect(base_url("index.php/admin/siswa/detail/" . $id));
        }
    }

    public function editLogin()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $pas = $this->input->post('password');
        $pas1 = $this->input->post('password1');

        if (isset($username)) {

            $this->db->set("username", $this->input->post('username'));
            $this->db->where("siswa_id", $id);
            $edit = $this->db->update("t_user");

            if ($edit) {
                $this->session->set_flashdata('siswa', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit Username</div>');
                redirect(base_url("index.php/admin/siswa/detail/" . $id));
            } else {
                $this->session->set_flashdata('siswa', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit Username  </div>');
                redirect(base_url("index.php/admin/siswa/detail/" . $id));
            }
        } else {
            if ($pas !=  $pas1) {
                $this->session->set_flashdata('siswa', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Password tidak sama</div>');
                //echo "index.php/admin/siswa/detail/" . $id;
                redirect(base_url("index.php/admin/siswa/detail/" . $id));
            } else {
                $this->db->set("password", md5($this->input->post('password')));
                $this->db->where("siswa_id", $id);
                $edit = $this->db->update("t_user");
                if ($edit) {
                    $this->session->set_flashdata('siswa', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit Password</div>');
                    redirect(base_url("index.php/admin/siswa/detail/" . $id));
                } else {
                    $this->session->set_flashdata('siswa', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit Password  </div>');
                    redirect(base_url("index.php/admin/siswa/detail/" . $id));
                }
            }
        }
    }

    public function editKelas()
    {
        $id = $this->input->post('id');
        $kelas = $this->input->post('kelas');

        $this->db->set("id_kelas", $kelas);
        $this->db->where("nis", $id);
        $edit = $this->db->update("t_siswa");

        if ($edit) {
            $this->session->set_flashdata('siswa', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit Kelas</div>');
            redirect(base_url("index.php/admin/siswa/detail/" . $id));
        } else {
            $this->session->set_flashdata('siswa', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit Kelas  </div>');
            redirect(base_url("index.php/admin/siswa/detail/" . $id));
        }
    }

    public function addSiswa()
    {
        $kelas =  $this->madmin->getData('t_kelas')->result_array();

        $data["kelas"] = $kelas;
        $this->load->view('admin/VaddSiswa',$data);
    }

    public function doAddSiswa()
    {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $bln_lahir = $this->input->post('bln_lahir');
        $thn_lair = $this->input->post('thn_lahir');
        $alamat = $this->input->post('alamat');
        $kelas = $this->input->post('kelas_id');

        $userData = array(
            'siswa_id' => $nis,
            'username' => $username,
            'password' => md5($password)
        );

        $siswaData = array(
            'nis' => $nis,
            'id_kelas' => $kelas,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $thn_lair . '-' . $bln_lahir . '-' . $tgl_lahir,
            'alamat' => $alamat,
        );

        $insert1 =     $this->db->insert('t_siswa', $siswaData);
        $insert2 = $this->db->insert('t_user', $userData);

        if ($insert1 && $insert2) {
            redirect(base_url("index.php/admin/siswa/"));
        } else {
            echo 'gagal';
        }
    }

    public function doDelete($nip)
    {
        $this->db->where('nis', $nip);
        $delete1 = $this->db->delete('t_siswa');

        $this->db->where('siswa_id', $nip);
        $delete2 = $this->db->delete('t_user');

        if ($delete1 && $delete2) {
            redirect(base_url("index.php/admin/siswa/"));
        } else {
            echo 'gagal';
        }
    }

}
