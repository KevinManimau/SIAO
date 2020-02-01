<?php

class Jabatan_model {
    private $table = 'jabatan';

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllJabatan(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
   
    // public function tambahDataAnggota($data){
    //     if($data['stat']=="kc"){
    //         $radio = 'KC';
    //     }else{
    //         $radio = 'KCP';
    //     }
    //     $query = "INSERT INTO $this->table VALUES('', :nrp, :nama, :stat, :jabatan)";
        
    //     $this->db->query($query);
    //     $this->db->bind('nrp',$data['nrp']);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('stat', $radio);
    //     $this->db->bind('jabatan',$data['jabatan']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
    // public function hapusDatabyID($id){
    //     $this->db->query('DELETE FROM '. $this->table .' WHERE id=:id');
    //     $this->db->bind('id',$id);

    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }
    // public function updateData($id){

    //     if($data['stat']=="kc"){
    //         $radio = 'KC';
    //     }else{
    //         $radio = 'KCP';
    //     }
        
    //     $update = $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');

    //     $this->db->query('UPDATE '. $this->table .' SET= ');
    //     $this->db->query($query);
    //     $this->db->bind('nrp',$data['nrp']);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('stat', $radio);
    //     $this->db->bind('jabatan',$data['jabatan']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
    // // join
    // public function joinJabatan()
    // {
    //     $this->db->query('SELECT * FROM '.$this->table.' INNER JOIN '.$this->table2.' ON '.$this->table1.'.id_jabatan = '.$this->table2.'.id');
    //     return $this->db->resultSet();
    // }
}