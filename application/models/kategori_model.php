<?php

class kategori_model extends CI_model
{
    public $id_kategori;
    public $nama_kategori;
    public $labels = [];

    function __construct()
    {
        parent::__construct();
        $this->labels = $this->_atributelabels();
        $this->load->database();
    }

    function insert()
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];
        return $this->db->insert('kategori', $data);
    }

    function update()
    {
        $sql = sprintf(
            "UPDATE kategori SET nama_kategori ='%s' where id_kategori='%s'",
            $this->nama,
            $this->id
        );
        $this->db->query($sql);
    }

    function delete()
    {
        $sql = sprintf("DELETE FROM kategori WHERE id_kategori='%s'", $this->id);
        $this->db->query($sql);
    }

    function read()
    {
        $sql = "SELECT * FROM kategori ORDER BY id_kategori";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function _atributelabels()
    {
        return [
            'id_kategori' => 'ID Kategori:',
            'nama_kategori' => 'Nama Kategori:',
        ];
    }
}
