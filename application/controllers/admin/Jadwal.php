<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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

        $idKelas = $this->input->get('id_kelas');

        $this->db->select('*');
        $this->db->from('t_kelas');
        $this->db->where('id_kelas', $idKelas);
        $query = $this->db->get()->row_array();

        $data['kelas'] = $query['nama_kelas'];


        $query =   $this->db->query("SELECT * FROM `t_jadwal` LEFT JOIN t_kelas ON t_jadwal.id_kelas = t_kelas.id_kelas LEFT JOIN t_mapel ON t_jadwal.id_mapel = t_mapel.id_mapel WHERE t_jadwal.id_kelas = '" . $idKelas . "'");
        $jadwal = $query->result_array();

        $result = array();
        foreach ($jadwal as $row) {
            //$results[$row['hari_mapel']][] = $row;
            //$results[$row['hari_mapel']] = array('hari' => $row['hari_mapel'], 'data' => array());
            //$results[$row['hari_mapel']]['data'][] = $row;
            //$result[$row['hari_mapel']]['data'] = array();
            $result[$row['hari']]['hari'] = $row['hari'];
            $result[$row['hari']]['data'][] = $row;
        }
        $data['jadwal'] = $result;

        //print_r($data);
        //die(); 
        $this->load->view('admin/Vjadwal', $data);
    }
}
