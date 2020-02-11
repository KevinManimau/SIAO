<?php

class Auth_model {
    private $table = 'manager';
    // private $table2 = 'manager';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getidManager($uid)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_user=:idu');
        $this->db->bind('idu', $uid);
        
        return $this->db->single();
    }
}