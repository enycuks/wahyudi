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

    public function view_by_date($date)
    {
        $this->db->where('DATE(tgl_pelaksana)', $date); // Tambahkan where tanggal nya

        return $this->db->get('undangan')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->where('MONTH(tgl_pelaksana)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_pelaksana)', $year); // Tambahkan where tahun

        return $this->db->get('undangan')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->where('YEAR(tgl_pelaksana)', $year); // Tambahkan where tahun

        return $this->db->get('undangan')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        return $this->db->get('undangan')->result(); // Tampilkan semua data transaksi
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(tgl_pelaksana) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('undangan'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_pelaksana)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_pelaksana)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function getProfilById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
