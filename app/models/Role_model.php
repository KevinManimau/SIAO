<?php

class Role_model {
    private $table = 'role';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getRolebyId($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
}