<?php

class Wilayah_model {
    private $table = 'wilayah';

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllWilayah(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
}