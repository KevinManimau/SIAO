<?php

class Maneger_model {
    private $table = 'maneger';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllManeger(){
        
        $this->db->query('SELECT * FROM maneger
                        INNER JOIN user
                        ON maneger.id_user=user.id
                        INNER JOIN cabang
                        ON maneger.id_cabang=cabang.id');
        return $this->db->resultSet();
    }
    
}