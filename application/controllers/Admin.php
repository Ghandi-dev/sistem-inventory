<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['count'] = $this->Aset_Model->count_all_jenis();
        $data['aset'] = $this->Aset_Model->get_new();
        $this->load->view('admin/dashboard/index', $data);
    }

    public function profile()
    {
        $id = $this->session->userdata('id');
        $data['profile'] = $this->User_Model->get(array('id' => $id));
        $data['title'] = 'profile';
        $this->load->view('admin/profile/index', $data);
    }

    public function update_profile()
    {
        $id = $this->session->userdata('id');
        $user = $this->User_Model->get(array('id' => $id));
        $username = $this->input->post('username');
        $old_image = $this->input->post('old_image');
        $image = $_FILES['image']['name'];
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

        $data = array(
            'username' => $username,
            'image' => $image,
            'role' => $user->role,
            'password' => $user->password,
        );

        if (!$this->User_Model->update($data, array('id' => $id))) {
            $this->session->set_flashdata('error', 'Terjadi Kesalahan, silahkan coba lagi');
            redirect('admin/profile');
        }

        $this->session->set_userdata('image', $image);
        $this->session->set_flashdata('success', 'Profile telah diupdate');
        redirect('admin/profile');
    }

    public function fetch_data()
    {
        $data = $this->aset_Model->get_data(); // Mengambil data dari model
        echo json_encode($data);
    }

    ####################################
    // DATA TANAH
    ####################################

    public function tanah()
    {
        $table = 'tb_aset';
        $where = array('jenis' => 'tanah');
        $data['title'] = 'Tanah';
        $data['aset'] = $this->Aset_Model->get($table, $where);
        $this->load->view('admin/tanah/index', $data);
    }
    ####################################
    // END DATA TANAH
    ####################################

    ####################################
    // DATA ELEKTRONIK
    ####################################
    public function elektronik()
    {
        $table = 'tb_aset';
        $where = array('jenis' => 'elektronik');
        $data['title'] = 'Elektronik';
        $data['aset'] = $this->Aset_Model->get($table, $where);
        $this->load->view('admin/elektronik/index', $data);
    }
    ####################################
    // END DATA TANAH
    ####################################

    ####################################
    // DATA ELEKTRONIK
    ####################################
    public function kendaraan()
    {
        $table = 'tb_aset';
        $where = array('jenis' => 'kendaraan');
        $data['title'] = 'Kendaraan';
        $data['aset'] = $this->Aset_Model->get($table, $where);
        $this->load->view('admin/kendaraan/index', $data);
    }
    ####################################
    // END DATA TANAH
    ####################################

    ####################################
    // DATA ELEKTRONIK
    ####################################
    public function barang_kantor()
    {
        $table = 'tb_aset';
        $where = array('jenis' => 'barang kantor');
        $data['title'] = 'Barang Kantor';
        $data['aset'] = $this->Aset_Model->get($table, $where);
        $this->load->view('admin/barang_kantor/index', $data);
    }
    ####################################
    // END DATA ELEKTRONIK
    ####################################

    public function create()
    {
        $type = strtolower(str_replace(" ", "_", $this->input->get('type')));
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

        $data = array(
            'nama_aset' => $nama_aset,
            'kode_aset' => $kode_aset,
            'nup' => $nup,
            'tahun_peroleh' => $tahun,
            'nilai' => $nilai,
            'merk' => $merk,
            'keterangan' => $keterangan,
            'gambar' => $image,
            'jenis' => str_replace("_", " ", $this->input->get('type')),
        );

        if ($this->Aset_Model->insert('tb_aset', $data)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('admin/' . $type);
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data.');
        }

    }

    public function update()
    {
        $type = strtolower(str_replace(" ", "_", $this->input->get('type')));

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

        $data = array(
            'nama_aset' => $nama_aset,
            'kode_aset' => $kode_aset,
            'nup' => $nup,
            'tahun_peroleh' => $tahun,
            'nilai' => $nilai,
            'merk' => $merk,
            'keterangan' => $keterangan,
            'gambar' => $image,
            'jenis' => str_replace("_", " ", $this->input->get('type')),
        );

        $where = array('id' => $id);
        if ($this->Aset_Model->update('tb_aset', $data, $where)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate.');
            redirect('admin/' . $type);
        } else {
            echo ($this->Aset_Model->update('tb_aset', $data, $where));
            $this->session->set_flashdata('error', 'Gagal mengupdate data.');
            var_dump($data);
            var_dump($where);
        }
    }

    public function delete($id)
    {
        $type = strtolower(str_replace(" ", "_", $this->input->get('type')));
        $where = array('id' => $id);
        $data = $this->Aset_Model->get('tb_aset', $where);
        if ($data[0]->gambar !== 'default-image.jpg') {
            //lokasi gambar
            $path = './assets/upload/foto/';
            //hapus data di folder
            @unlink($path . $data[0]->gambar);
        }
        $where = array('id' => $id);
        $this->Aset_Model->delete('tb_aset', $where);
        redirect('admin/' . $type);
    }

    public function edit($id)
    {
        $type = strtolower($this->input->get('type'));
        $data['title'] = $type;
        $where = array('id' => $id);
        $data['aset'] = ($this->Aset_Model->get('tb_aset', $where))[0];
        if ($type === 'tanah') {
            $this->load->view('admin/tanah/edit', $data);
            return;
        }
        $this->load->view('admin/edit', $data);
    }

    public function detail($id)
    {
        $type = strtolower($this->input->get('type'));
        $data['title'] = $type;
        $where = array('id' => $id);
        $data['aset'] = ($this->Aset_Model->get('tb_aset', $where))[0];
        if ($type === 'tanah') {
            $this->load->view('admin/tanah/detail', $data);
            return;
        }
        $this->load->view('admin/detail', $data);
    }

    public function print()
    {
        $type = strtolower($this->input->get('type'));
        $min = $this->input->get('min');
        $max = $this->input->get('max');
        $nama_aset = $this->input->get('nama_aset');
        $type = strtolower($this->input->get('type'));
        $data['aset'] = $this->Aset_Model->get_data($min, $max, $nama_aset, $type);
        if ($type === 'tanah') {
            $this->load->view('admin/tanah/print', $data);
            return;
        }
        $this->load->view('admin/print', $data);
    }
    public function export()
    {
        $this->load->library('pdfgenerator');
        $min = $this->input->get('min');
        $max = $this->input->get('max');
        $nama_aset = $this->input->get('nama_aset');
        $type = strtolower($this->input->get('type'));
        $data['aset'] = $this->Aset_Model->get_data($min, $max, $nama_aset, $type);
        $file_pdf = 'aset_' . strtolower(str_replace(' ', '_', $type)) . '_' . $min . '-' . $max;
        $paper = 'F4';
        $orientation = "landscape";
        if ($type === 'tanah') {
            $html = $this->load->view('admin/tanah/pdf', $data, true);
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
            return;
        }
        $html = $this->load->view('admin/print', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

    }
}
