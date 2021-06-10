<?php

class mMapel extends CI_Model
{
    function getPertemuan($table,$where){
        return $this->db->get_where($table, $where);
    }
    function getMapel($nis)
    {
        $this->db->select('id_mapel');
        $this->db->from('t_kelas_siswa');
        $this->db->join('t_mapel', 't_kelas_siswa.id_kelas = t_mapel.id_kelas', 'right');
        $this->db->where('t_kelas_siswa.nis', $nis);
        $this->db->group_by('t_mapel.hari_mapel');
        $query = $this->db->get();
        return $query->result_array();;
    }

    function delMateri(){
        
    }
}

