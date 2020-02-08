<?php

class Manager_model {
    private $table = 'manager';
    private $table2 = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllManager(){
        
        $this->db->query('SELECT * FROM manager
                        INNER JOIN user
                        ON manager.id_user=user.id
                        INNER JOIN cabang
                        ON manager.id_cabang=cabang.id');
        return $this->db->resultSet();
    }
    public function getManagerbyId($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_manager=:id');
        $this->db->bind('id', $id);
        
        return $this->db->single();
    }

    public function tambahDataManager($data,$user){
        $uid = $user['id'];
        $this->db->query('SELECT * FROM '.$this->table.' WHERE nama=:nama');
        $this->db->bind('nama',$data['nama']);
        $manager = $this->db->single();
        if($manager > 0){
            $this->db->query('DELETE FROM '. $this->table2 .' WHERE id=:uid');
            $this->db->bind('uid',$uid);

            $this->db->execute();
            return 0;
        }else{
        if($data['gender']=="laki"){
            $radio = 'Laki-Laki';
        }elseif($data['gender']=="perem"){
            $radio = 'Perempuan';
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
            header('Location:'.BASEURL.'Manager');
            exit;
        }

        if($data['image'] == "" ){
            $image = 'default.jpg';
        }else{
            $image = $data['image'];
        }
    
        $query = "INSERT INTO ". $this->table ." (no_pintar,nama,image,gender,telp,id_user,id_cabang) VALUES(:no, :nama, :img, :gen, :telp, :idus, :idcab)";
        
        $this->db->query($query);
        $this->db->bind('no',$data['nopintar']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('img', $image);
        $this->db->bind('gen', $radio);
        $this->db->bind('telp', $data['notelp']);
        $this->db->bind('idus', $uid);
        $this->db->bind('idcab', $data['cabang']);


        $this->db->execute();

        return $this->db->rowCount();
        }
    }
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id_manager=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ubahDataManager($data){

        
    }
    
}