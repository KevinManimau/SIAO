<?php

class Menu_model {
    private $table = 'menu';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getAllMenu()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
    public function getMenubyId($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_menu=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
}