<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $data['title'] = 'Login';
        $this->session->set_userdata($data);
        $this->load->view('auth/login', $data);
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

        if (!$this->form_validation->run()) {
            $this->load->view('login/register');
            return;
        }

        $data = array(
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
            'role' => 1,
            'created_at' => date('Y-m-d'),
        );

        $this->User_Model->register_user($data);
        $this->session->set_flashdata('success', 'Registration successful! Please log in.');
        redirect(base_url());

    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth');
            return;
        }

        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $cek = $this->User_Model->cek_user($username);
        if ($cek->num_rows() != 1) {
            $this->session->set_flashdata('error', 'Username tidak terdaftar, silahkan register terlebih dahulu.');
            redirect('auth');
            return;
        }

        $isi = $cek->row();
        if (!password_verify($password, $isi->password)) {
            $this->session->set_flashdata('error', 'Password salah, silahkan coba lagi.');
            redirect('auth');
            return;
        }

        $data_session = array(
            'id' => $isi->id,
            'name' => $username,
            'is_login' => true,
            'role' => $isi->role,
            'image' => $isi->image,
        );

        $this->session->set_userdata($data_session);
        $this->session->set_flashdata('success', 'Login Berhasil');

        // if ($isi->role == 1) {
        //     redirect(base_url('admin'));
        // } else {
        //     redirect(base_url('user'));
        // }

        redirect(base_url('admin'));
    }

    public function update_password()
    {
        $id = $this->session->userdata('id');
        $user = $this->User_Model->get(array('id' => $id));
        $username = $this->session->userdata('name');
        $password_old = $this->input->post('password_old');
        $password_new = $this->input->post('password_new');
        $password_confirm = $this->input->post('password_confirm');
        if (!password_verify($password_old, $this->User_Model->cek_user($username)->row()->password)) {
            $this->session->set_flashdata('error', 'Password lama salah, silahkan coba lagi.');
            redirect('admin/profile');
            return;
        }

        if ($password_new != $password_confirm) {
            $this->session->set_flashdata('error', 'Password baru tidak cocok, silahkan coba lagi.');
            redirect('admin/profile');
            return;
        }

        $data = array(
            'id' => $id,
            'password' => password_hash($password_new, PASSWORD_BCRYPT),
            'role' => $user->role,
            'username' => $user->username,
        );
        if (!$this->User_Model->update($data, array('id' => $id))) {
            $this->session->set_flashdata('error', 'Password gagal diubah, silahkan coba lagi.');
            redirect('admin/profile');
            return;
        }

        $this->session->set_flashdata('success', 'Password berhasil diubah silahkan login kembali');
        redirect(base_url());
    }

    public function logout()
    {
        $this->session->set_flashdata('success', 'Berhasil logout');
        redirect(base_url());
    }
}
