<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
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
        $pengajar =  $this->madmin->getData('t_pengajar')->result_array();
        //print_r($pengajar);
        //die();
        $data["pengajar"] = $pengajar;
        $this->load->view('admin/Vpengajar', $data);
    }

    public function detail($id)
    {
        $where = array(
            'nip' => $id
        );
        $detail = $this->db->get_where('t_pengajar', $where)->row_array();
        // print_r($detail);
        $data["detail"] = $detail;

        $query =   $this->db->query("SELECT * FROM `t_jadwal` LEFT JOIN t_kelas ON t_jadwal.id_kelas = t_kelas.id_kelas LEFT JOIN t_mapel ON t_jadwal.id_mapel = t_mapel.id_mapel WHERE t_jadwal.nip = '" . $id . "'");
        $result = array();
        foreach ($query->result_array() as $row) {
            $result[$row['hari']]['hari'] = $row['hari'];
            $result[$row['hari']]['data'][] = $row;
        }

        $data["jadwal"] = $result;

        $kelas =  $this->madmin->getData('t_kelas')->result_array();

        $data["kelas"] = $kelas;

        $kelas =  $this->madmin->getData('t_mapel')->result_array();

        $data["mapel"] = $kelas;



        $this->load->view('admin/VdetailPengajar', $data);
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


        $this->db->where("nip", $id);
        $edit = $this->db->update("t_pengajar");

        if ($edit) {
            $this->session->set_flashdata('pengajar', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit pengajar</div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $id));
        } else {
            $this->session->set_flashdata('pengajar', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal edit pengajar  </div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $id));
        }
    }

    public function addPelajaran()
    {
        $hari = $this->input->post('hari'); 
        $nip = $this->input->post('nip');
        $kelasid = $this->input->post('kelas_id');
        $mapelid = $this->input->post('mapel_kelas_id');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');

        $datas = array(
            "id_mapel" => $mapelid,
            "id_kelas" => $kelasid,
            "nip" => $nip,
            "hari" => $hari,
            "jam_mulai" => $jam_mulai,
            "jam_selesai" => $jam_selesai,
        );

        $add = $this->db->insert('t_jadwal', $datas);
        if ($add) {
            $this->session->set_flashdata('pengajar', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Tambah Jadwal</div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $nip));
        } else {
            $this->session->set_flashdata('kelas', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal Tambah Jadwal  </div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $nip));
        }
    }

    public function editPelajaran()
    {
        $nip = $this->input->post('nip');
        $id = $this->input->post('id');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $hari = $this->input->post('hari'); 

        if ($hari != '') {
            $this->db->set("hari", $hari);
        }
        $this->db->set("jam_mulai", $jam_mulai);
        $this->db->set("jam_selesai", $jam_selesai);
        $this->db->where("id_jadwal", $id);
        $edit = $this->db->update("t_jadwal");

        if ($edit) {
            $this->session->set_flashdata('pengajar', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Edit Jadwal</div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $nip));
        } else {
            $this->session->set_flashdata('kelas', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal Edit Jadwal  </div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $nip));
        }
    }

    public function addPengajar()
    {
        $this->load->view('admin/VaddPengajar');
    }

    public function doAddPengajar()
    {

        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $bln_lahir = $this->input->post('bln_lahir');
        $thn_lair = $this->input->post('thn_lahir');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $userData = array(
            'pengajar_id' => $nip,
            'username' => $username,
            'password' => md5($password)
        );

        $pengajarData = array(
            'nip' => $nip,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $thn_lair . '-' . $bln_lahir . '-' . $tgl_lahir,
            'alamat' => $alamat,
        );

        $insert1 =     $this->db->insert('t_pengajar', $pengajarData);
        $insert2 = $this->db->insert('t_user', $userData);

        if ($insert1 && $insert2) {
            redirect(base_url("index.php/admin/pengajar/"));
        } else {
            echo 'gagal';
        }
    }

    public function doDelete($nip)
    {
        $this->db->where('nip', $nip);
        $delete1 = $this->db->delete('t_pengajar');

        $this->db->where('pengajar_id', $nip);
        $delete2 = $this->db->delete('t_user');

        if ($delete1 && $delete2) {
            redirect(base_url("index.php/admin/pengajar/"));
        } else {
            echo 'gagal';
        }
    }

    public function deleteJAdwal($idjadwal,$id){

        $this->db->where('id_jadwal', $idjadwal);
        $delete2 = $this->db->delete('t_jadwal');

        if ($delete2) {
            $this->session->set_flashdata('pengajar', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Hapus pengajar</div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $id));
        } else {
            $this->session->set_flashdata('kelas', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Gagal Hapus pengajar  </div>');
            redirect(base_url("index.php/admin/pengajar/detail/" . $id));
        }
    }
}
