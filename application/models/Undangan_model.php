<?php

class Undangan_model extends CI_model
{
    public function getUndanganById($id)
    {
        $this->db->select('*');
        $this->db->from('undangan');
        $this->db->where('undangan.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllUndangan()
    {
        return $this->db->get('undangan')->result_array();
    }
    public function tambahUndangan()
    {
        $data = [
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "instansi" => $this->input->post('instansi', true),
            "perihal" => $this->input->post('perihal', true),
            "tgl_pelaksana" => $this->input->post('tgl_pelaksa', true),
            "delegasi" => $this->input->post('delegasi', true),
            "jam" => $this->input->post('jam', true),
            "ket" => $this->input->post('ket', true)
        ];

        $this->db->insert('undangan', $data);
    }

    public function editUndangan()
    {
        $data = [
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "instansi" => $this->input->post('instansi', true),
            "perihal" => $this->input->post('perihal', true),
            "tgl_pelaksana" => $this->input->post('tgl_pelaksa', true),
            "delegasi" => $this->input->post('delegasi', true),
            "ket" => $this->input->post('ket', true)
        ];

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('undangan', $data);
    }

    public function hapusUndangan($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('undangan');
        $row = $query->row();
        unlink("./assets/berkas/$row->file");

        $this->db->delete('undangan', array('id' => $id));
    }
}
