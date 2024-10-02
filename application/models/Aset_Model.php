<?php

class Aset_Model extends CI_Model
{

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function update($tabel, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }

    public function get($tabel = 'tb_aset', $where)
    {
        $this->db->where($where);
        $this->db->order_by('tahun_peroleh', 'DESC');
        return $this->db->get($tabel)->result();
    }
    public function get_new()
    {
        $this->db->limit(5);
        $this->db->order_by('tahun_peroleh', 'DESC');

        // Mengambil data dari tabel
        return $this->db->get('tb_aset')->result();
    }

    public function get_data($start_year, $end_year, $item_name, $type)
    {
        $this->db->select('*');
        $this->db->from('tb_aset'); // Ganti dengan nama tabel Anda

        // Filter berdasarkan rentang tahun
        if ($start_year && $end_year) {
            $this->db->where('tahun_peroleh >=', $start_year);
            $this->db->where('tahun_peroleh <=', $end_year);
        }

        if ($item_name) {
            $this->db->like('nama_aset', $item_name); // Ganti dengan nama kolom yang sesuai
        }

        if ($type) {
            $this->db->where('jenis', $type);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_jenis()
    {
        // Definisikan jenis barang yang akan dihitung
        $jenis_barang = ['tanah', 'elektronik', 'kendaraan', 'barang kantor'];

        // Menghitung jumlah aset dan total nilai untuk masing-masing jenis
        $this->db->select('jenis, COUNT(*) as jumlah, SUM(nilai) as total_nilai');
        $this->db->where_in('jenis', $jenis_barang);
        $this->db->group_by('jenis');
        $query = $this->db->get('tb_aset');

        // Array untuk menyimpan hasil
        $hasil = [
            'jumlah_aset' => array_fill_keys($jenis_barang, 0),
            'total_nilai' => array_fill_keys($jenis_barang, 0),
        ];

        // Menyimpan hasil ke array
        foreach ($query->result() as $row) {
            $hasil['jumlah_aset'][$row->jenis] = $row->jumlah;
            $hasil['total_nilai'][$row->jenis] = $row->total_nilai;
        }

        return $hasil;
    }

}
