<?php

class Aset_Model extends CI_Model
{

    public function insert($tabel, $aset_data, $detail_data, $type)
    {
        $this->db->trans_begin();

        // Insert data ke tabel 'tb_aset'
        $this->db->insert($tabel, $aset_data);

        // Ambil ID dari aset yang baru saja diinsert
        $aset_id = $this->db->insert_id();

        // Insert ke detail tabel berdasarkan tipe aset tanah
        $detail_data['id_aset'] = $aset_id; // Tambahkan aset_id ke detail aset tanah
        switch ($type) {
            case 'tanah':
                $this->db->insert('tb_detail_aset_tanah', $detail_data);
                break;
            case 'elektronik':
                $this->db->insert('tb_detail_aset_elektronik', $detail_data);
                break;
            case 'kendaraan':
                $this->db->insert('tb_detail_aset_kendaraan', $detail_data);
                break;
            case 'jalan':
                $this->db->insert('tb_detail_aset_jalan', $detail_data);
                break;

            default:
                break;
        }

        // Cek status transaksi
        if ($this->db->trans_status() === false) {
            // Rollback jika gagal
            $this->db->trans_rollback();
            return false;
        } else {
            // Commit jika berhasil
            $this->db->trans_commit();
            return true;
        }

    }
    public function update($tabel, $aset_data, $detail_data, $type, $where)
    {
        $this->db->trans_begin(); // Memulai transaksi

        // Update data di tabel 'tb_aset' berdasarkan kondisi $where
        $this->db->where($where);
        $this->db->update($tabel, $aset_data);

        // Update detail tabel sesuai tipe aset
        switch ($type) {
            case 'tanah':
                // Update data di tabel 'tb_detail_aset_tanah' dengan kondisi berdasarkan 'id_aset'
                $this->db->where('id_aset', $where['id']); // Asumsi $where['id'] adalah ID aset
                $this->db->update('tb_detail_aset_tanah', $detail_data);
                break;
            case 'elektronik':
                $this->db->where('id_aset', $where['id']);
                $this->db->update('tb_detail_aset_elektronik', $detail_data);
                break;
            case 'kendaraan':
                $this->db->where('id_aset', $where['id']);
                $this->db->update('tb_detail_aset_kendaraan', $detail_data);
                break;
            case 'jalan':
                $this->db->where('id_aset', $where['id']);
                $this->db->update('tb_detail_aset_jalan', $detail_data);
                break;
            default:
                break;
        }

        // Cek status transaksi
        if ($this->db->trans_status() === false) {
            // Rollback jika ada error
            $this->db->trans_rollback();
            return false;
        } else {
            // Commit jika tidak ada error
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function get($tabel = 'tb_aset', $where)
    {
        // Tentukan apakah jenis adalah objek atau array
        if (is_array($where)) {
            $jenis = $where['jenis'];
        } else {
            $jenis = $where->jenis;
        }

        // Query
        $this->db->select('*');
        $this->db->from($tabel);

        // Join sesuai jenis
        switch ($jenis) {
            case 'tanah':
                $this->db->join('tb_detail_aset_tanah', 'tb_aset.id = tb_detail_aset_tanah.id_aset');
                break;
            case 'kendaraan':
                $this->db->join('tb_detail_aset_kendaraan', 'tb_aset.id = tb_detail_aset_kendaraan.id_aset');
                break;
            case 'jalan':
                $this->db->join('tb_detail_aset_jalan', 'tb_aset.id = tb_detail_aset_jalan.id_aset');
                break;
            case 'elektronik':
                $this->db->join('tb_detail_aset_elektronik', 'tb_aset.id = tb_detail_aset_elektronik.id_aset');
                break;
            default:
                // Jika jenis tidak diketahui, tidak ada join yang dilakukan
                break;
        }

        // Kondisi where
        $this->db->where($where);

        // Urutkan berdasarkan tahun_peroleh, jika memang diperlukan
        $this->db->order_by('tahun_peroleh', 'DESC');

        // Return hasil
        return $this->db->get()->result();
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

        switch ($type) {
            case 'tanah':
                $this->db->join('tb_detail_aset_tanah', 'tb_aset.id = tb_detail_aset_tanah.id_aset');
                break;
            case 'kendaraan':
                $this->db->join('tb_detail_aset_kendaraan', 'tb_aset.id = tb_detail_aset_kendaraan.id_aset');
                break;
            case 'jalan':
                $this->db->join('tb_detail_aset_jalan', 'tb_aset.id = tb_detail_aset_jalan.id_aset');
                break;
            case 'elektronik':
                $this->db->join('tb_detail_aset_elektronik', 'tb_aset.id = tb_detail_aset_elektronik.id_aset');
                break;
            default:
                // Jika jenis tidak diketahui, tidak ada join yang dilakukan
                break;
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_jenis()
    {
        // Definisikan jenis barang yang akan dihitung
        $jenis_barang = ['tanah', 'elektronik', 'kendaraan', 'jalan'];

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
