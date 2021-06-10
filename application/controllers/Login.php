<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }

    public function index()
    {
        $this->load->view('Vlogin');
    }

    function doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $where = array(
            'username' => $username,
            'password' => md5($password)
        ); 
        $cek = $this->mLogin->cekLogin("t_user", $where)->row_array();
 
        if (isset($cek)) {


            if ($cek["siswa_id"] != null) {

                $wh = array(
                    'nis' => $cek["siswa_id"]
                );

                $getSiswa =  $this->mLogin->cekLogin("t_siswa", $wh)->row_array();
                $data_session = array(
                    'nis' => $getSiswa["nis"],
                    'kelas' => $getSiswa["id_kelas"],
                    'nama' => $getSiswa["nama"],
                    'foto' => $getSiswa["foto"],
                    'loginStatus' => 'isLogin'
                );

                $this->session->set_userdata($data_session);
                redirect('siswa/Isiswa');
            } elseif ($cek["pengajar_id"] != null) {

                $wh = array(
                    'nip' => $cek["pengajar_id"]
                );

                $getSiswa =  $this->mLogin->cekLogin("t_pengajar", $wh)->row_array();
                $data_session = array(
                    'nip' => $getSiswa["nip"],
                    'nama' => $getSiswa["nama"],
                    'foto' => $getSiswa["foto"],
                    'loginStatus' => 'isLogin'
                );
                $this->session->set_userdata($data_session);
                redirect('pengajar/Ipengajar');
            } elseif ($cek["is_admin"] != null) {


                $data_session = array(
                    'nama' => $cek["usernam"],
                    'loginStatus' => 'isAdmin'
                );
                $this->session->set_userdata($data_session);
                redirect('admin/Iadmin');
            }else{
                echo "sini";
            }
        } else {
            $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Maaf akun tidak ditemukan</div>');
            redirect('login');
        }
    }

    function doLogout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('login', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button> Berhasil Logout</div>');
        redirect(base_url("index.php/login"));
    }
}
