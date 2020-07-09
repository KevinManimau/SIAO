<?php

class Jenis_model {
    private $table = 'jenis_trans';

    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getAllJenisPinjaman()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
}