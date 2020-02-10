<?php

class Auth_model {
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function loginUser($data)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE username=:uname and password=:paswd');
        $this->db->bind('uname',$data['username']);
        $this->db->bind('paswd',$data['password']);

        return $this->db->single(); 
    }
}