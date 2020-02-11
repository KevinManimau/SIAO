<?php

class HakAkses_model {
    private $table = 'hak_akses';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getHakAksesbyIdRole($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_role=:id');
        $this->db->bind('id',$id);
        return $this->db->resultSet();
    }
}