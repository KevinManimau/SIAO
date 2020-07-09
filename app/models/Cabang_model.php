<?php

class Cabang_model {
    private $table = 'cabang';
    private $table2 = 'jabatan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllCabang(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
    public function getCabangbyId($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getCabangWithKey($key){
        mysqli_escape_string("'",$key);
        $this->db->query('SELECT * FROM '.$this->table.' WHERE virtual_key=:key');
        $this->db->bind('key', $key);
        return $this->db->single();
    }
   
    public function tambahDataCabang($data){
        if($data['stat']=="kc"){
            $radio = 'KC';
        }elseif($data['stat']=="kcp"){
            $radio = 'KCP';
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
            header('Location:'.BASEURL.'Cabang');
            exit;
        }

       
        $query = "INSERT INTO ". $this->table ." (nrp,nama_cab,status) VALUES(:nrp, :nama, :stat )";
        
        $this->db->query($query);
        $this->db->bind('nrp',$data['nrp']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stat', $radio);
        // $this->db->bind('delstatus',0);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ubahDataCabang($data){

        if($data['stat']=="kc"){
            $radio = 'KC';
        }elseif($data['stat']=="kcp"){
            $radio = 'KCP';
        }else{
            header('Location:'.BASEURL.'cabang');
        }
       
        $query = "UPDATE $this->table SET `nrp`=:nrp,
                                          `nama_cab`=:nama,
                                          `status`=:stat
                                        WHERE id=:id";
        
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nrp',$data['nrp']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stat', $radio);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // join
    public function joinJabatan()
    {
        $this->db->query('SELECT * FROM '.$this->table.' INNER JOIN '.$this->table2.' ON '.$this->table1.'.id_jabatan = '.$this->table2.'.id');
        return $this->db->resultSet();
    }
}