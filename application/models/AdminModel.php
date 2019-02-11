<?php

    class AdminModel extends CI_Model
    {
    public function __construct()
    {
        $this->load->database();
    }

    public function login($user,$pass)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('email',$user);
        $this->db->where('password',$pass);
        $res=$this->db->get();
        return $res->result();
    }

    public function getNoticias()
    {
        $this->db->select('*');
        $this->db->from('noticias');
        $res=$this->db->get();
        return $res->result();
    }

    public function getNoticia($id)
    {
        $this->db->select('*');
        $this->db->from('noticias');
        $this->db->where('id',$id);
        $res=$this->db->get();
        return $res->result();
    }

    public function addNoticia($data)
    {
        $this->db->insert('noticias',$data);
    }

    public function updateNoticia($data)
    {
        $this->db->replace('noticias', $data);
    }

    public function deleteNoticia($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('noticias');
    }
}