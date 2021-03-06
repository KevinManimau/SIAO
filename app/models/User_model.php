<?php

class User_model {
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getAllUser()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
    public function getUserbyUsername($data){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE username=:uname');
        $this->db->bind('uname', $data['username']);
        return $this->db->single();
    }
    public function tambahDataUser($data)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE username=:uname');
        $this->db->bind('uname',$data['username']);
        $user = $this->db->single();
        if($user > 0){
            return 0;
        }else{    
            $query = "INSERT INTO ". $this->table ." (username,password,id_role) VALUES(:user, :pass, :role)";
            $this->db->query($query);
            $this->db->bind('user',$data['username']);
            $this->db->bind('pass', $data['password1']);
            $this->db->bind('role', 2);
            $this->db->execute();

            return $this->db->rowCount();
        }
        
    }
}