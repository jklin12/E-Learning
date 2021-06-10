<?php

class mMateri extends CI_Model
{
    function getKelas()
    {
        return $this->db->get('t_kelas');
    }
    function delMateri($id)
    {
        $this->db->delete('t_materi', array('id_materi' => $id));
    }

    function addMateri($data)
    {
        $this->db->insert('t_materi', $data);
    }

    function addTugas($data)
    {
        $this->db->insert('t_tugas', $data);
    }

    function addKirimTugas($data)
    {
        $this->db->insert('t_tugas_kirim', $data);
    }
    function addAbsesnis($data)
    {
        $this->db->insert('t_absesnsi', $data);
    }
    function getAbsesnin($idmateri,$idsiswa)
    {
        $this->db->select('*');
        $this->db->from('t_absesnsi');
        $this->db->where('id_materi', $idmateri);
        $this->db->where('id_siswa', $idsiswa);
        $query = $this->db->get();
        return $query;
    }
}
