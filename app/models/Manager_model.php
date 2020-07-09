<?php

class Manager_model {
    private $table = 'manager';
    private $table2 = 'user';
    private $table3 = 'cabang';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllManager(){
        
        $this->db->query('SELECT * FROM manager
                        INNER JOIN user
                        ON manager.id_user=user.id_user
                        INNER JOIN cabang
                        ON manager.id_cabang=cabang.id');
        return $this->db->resultSet();
    }
    public function getManagerbyId($id){
        $this->db->query('SELECT * FROM '.$this->table.' 
                        INNER JOIN '.$this->table2.'
                        ON '.$this->table.'.id_user='.$this->table2.'.id_user
                        INNER JOIN '.$this->table3.'
                        ON '.$this->table.'.id_cabang='.$this->table3.'.id
                        WHERE id_manager=:idman');
        $this->db->bind('idman', $id);
        
        return $this->db->single();
    }

    public function tambahDataManager($data,$user){
        //mendapat id user
        $uid = $user['id_user'];
        //cek apakah nama manager sudah ada
        $this->db->query('SELECT * FROM '.$this->table.' WHERE nama=:nama');
        $this->db->bind('nama',$data['nama']);
        $manager = $this->db->single();
        // jika data manager sudah ada atau lebih dari 0 maka hapus user berkaitan
        if($manager > 0){
            $this->db->query('DELETE FROM '. $this->table2 .' WHERE id_user=:uid');
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

        if($data['gender']=="laki"){
            $radio = 'Laki-Laki';
        }elseif($data['gender']=="perem"){
            $radio = 'Perempuan';
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
            header('Location:'.BASEURL.'Manager');
            exit;
        }

        // if($data['image'] == "" ){
            $image = 'default.jpg';
        // }else{
        //     $image = $data['image'];
        // }
    
        $query = "UPDATE ". $this->table ." SET no_pintar=:no,nama=:nama,image=:img,gender=:gen,telp=:telp,id_cabang=:idcab WHERE id_manager=:idmanager";
        
        $this->db->query($query);
        $this->db->bind('no',$data['nopintar']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('img', $image);
        $this->db->bind('gen', $radio);
        $this->db->bind('telp', $data['notelp']);
        // $this->db->bind('idus', $uid);
        $this->db->bind('idcab', $data['cabang']);
        $this->db->bind('idmanager',$data['idmanager']);


        $this->db->execute();

        return $this->db->rowCount();
        
    }
    
}