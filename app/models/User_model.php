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
    public function getUserforAuth($data){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE username=:uname and password=:paswd');
        $this->db->bind('uname',$data['username']);
        $this->db->bind('paswd',$data['password']);

        return $this->db->single();
    }
    public function UpdateTimeUser($id)
    {
        $waktusekarang = time();
        $query = "UPDATE ". $this->table ." SET `last_login`=:time WHERE `id_user`=:id ";
        $this->db->query($query);
        $this->db->bind('time',$waktusekarang);
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
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
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id_user=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataUser($data, $iduser){
        // $this->db->query('SELECT * FROM '.$this->table.' WHERE id_manager=:mgrid');
        // $this->db->bind('mgrid',$iduser);
        // $manager = $this->db->single();
            $query = "UPDATE ". $this->table ." SET username=:uname,password=:pass WHERE id_user=:iduser";
            $this->db->query($query);
            $this->db->bind('uname', $data['username']);
            $this->db->bind('pass', $data['password1']);
            $this->db->bind('iduser', $iduser);

            $this->db->execute();
            return $this->db->rowCount();
    }
}