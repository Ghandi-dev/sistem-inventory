<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_Elektronik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth'); // Ganti dengan URL login yang sesuai
        }
        $this->load->model('Aset_Model');
        $this->load->model('User_Model');

        $config['upload_path'] = './assets/upload/foto/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['max_size'] = 5000; // max 5 MB

        $this->load->library('upload', $config);
    }

    public function create()
    {
        $type = 'elektronik';
        $nama_aset = $this->input->post('nama_aset');
        $kode_aset = $this->input->post('kode_aset');
        $nup = $this->input->post('nup');
        $tahun = $this->input->post('tahun');
        $nilai = $this->input->post('nilai');
        $nilai = intval(str_replace(['Rp', ' ', '.'], '', $nilai));
        $merk = $this->input->post('merk');
        $keterangan = $this->input->post('keterangan');

        // Setup upload config
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '2048'; // max size in KB

        $this->load->library('upload', $config);

        // Upload foto ke folder
        if ($this->upload->do_upload('image')) {
            // Jika upload berhasil
            $image = $this->upload->data('file_name');
        } else {
            // Jika gagal upload
            $image = 'default-image.jpg';
        }

        $aset_data = array(
            'nama_aset' => $nama_aset,
            'kode_aset' => $kode_aset,
            'nup' => $nup,
            'tahun_peroleh' => $tahun,
            'nilai' => $nilai,
            'keterangan' => $keterangan,
            'gambar' => $image,
            'jenis' => $type,
        );

        $detail_data = array(
            'merk' => $merk,
        );

        if ($this->Aset_Model->insert('tb_aset', $aset_data, $detail_data, $type)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('admin/' . $type);
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data.');
        }

    }
    public function update()
    {
        $type = 'elektronik';

        $id = $this->input->post('id');
        $nama_aset = $this->input->post('nama_aset');
        $kode_aset = $this->input->post('kode_aset');
        $nup = $this->input->post('nup');
        $tahun = $this->input->post('tahun');
        $nilai = $this->input->post('nilai');
        $nilai = intval(str_replace(['Rp', ' ', '.'], '', $nilai));
        $merk = $this->input->post('merk');
        $keterangan = $this->input->post('keterangan');
        $old_image = $this->input->post('old_image');
        $image = $_FILES['image']['name'];
        //upload foto ke folder

        if ($image) {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
                if ($old_image !== 'default-image.jpg') {
                    @unlink('./assets/upload/foto/' . $old_image);
                }
            } else {
                $image = 'default-image.jpg';
            }
        } else {
            $image = $old_image;
        }

        $aset_data = array(
            'nama_aset' => $nama_aset,
            'kode_aset' => $kode_aset,
            'nup' => $nup,
            'tahun_peroleh' => $tahun,
            'nilai' => $nilai,
            'keterangan' => $keterangan,
            'gambar' => $image,
            'jenis' => $type,
        );

        $detail_data = array(
            'merk' => $merk,
        );

        $where = array('id' => $id);
        if ($this->Aset_Model->update('tb_aset', $aset_data, $detail_data, $type, $where)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate.');
            redirect('admin/' . $type);
        } else {
            echo ($this->Aset_Model->update('tb_aset', $data, $where));
            $this->session->set_flashdata('error', 'Gagal mengupdate data.');
        }
    }

    public function detail($id)
    {
        // Misalkan type aset adalah 'elektronik', bisa Anda ganti sesuai dengan jenis aset yang diinginkan
        $type = 'elektronik'; // Ini bisa disesuaikan: 'elektronik', 'kendaraan', 'jalan', 'elektronik', dll.
        // Set judul halaman
        $data['title'] = ucfirst($type); // Membuat huruf pertama menjadi kapital
        // Kondisi untuk mengambil data aset berdasarkan id dan jenis
        $where = array(
            'tb_aset.id' => $id, // ID aset
            'jenis' => $type, // Jenis aset (elektronik, kendaraan, dll.)
        );
        // Memanggil model untuk mengambil data aset berdasarkan ID dan jenis
        $data['aset'] = $this->Aset_Model->get('tb_aset', $where)[0];
        // Setelah selesai pengecekan dengan var_dump, Anda bisa load view untuk menampilkan data
        $this->load->view('admin/elektronik/detail', $data);
    }

    public function edit($id)
    {
        $type = 'elektronik';
        $data['title'] = ucfirst($type);
        $where = array(
            'tb_aset.id' => $id,
            'jenis' => $type,
        );
        $data['aset'] = ($this->Aset_Model->get('tb_aset', $where))[0];
        $this->load->view('admin/elektronik/edit', $data);
    }

    public function print()
    {
        $type = 'elektronik';
        $min = $this->input->get('min');
        $max = $this->input->get('max');
        $nama_aset = $this->input->get('nama_aset');
        $type = strtolower($this->input->get('type'));
        $data['aset'] = $this->Aset_Model->get_data($min, $max, $nama_aset, $type);
        $this->load->view('admin/elektronik/print', $data);
    }

}
