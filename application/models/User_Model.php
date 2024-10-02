<?php

class User_Model extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('tb_user');
    }

    public function update($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tb_user', $data);
        return $this->db->affected_rows() > 0;
    }

    public function get($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_user')->row();
    }

    public function cek_user($username)
    {
        return $this->db->select('*')
            ->from('tb_user')
            ->where('username', $username)
            ->get();
    }

    public function register_user($data)
    {
        // Menyimpan data pengguna baru ke tabel 'tb_user'
        return $this->db->insert('tb_user', $data);
    }

}
