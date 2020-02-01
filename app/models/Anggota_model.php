<?php

class Anggota_model {
    private $table = 'anggota';
    private $table2 = 'jabatan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllAnggota(){
        $this->db->query('SELECT * FROM `anggota` INNER JOIN `jabatan` ON `anggota`.`id_jabatan`=`jabatan`.`id`');
        // $this->db->query('SELECT * FROM '.$this->table);
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
    public function joinJabatan()
    {
        // .' INNER JOIN '.$this->table2.' ON '.$this->table.'.id_jabatan = '.$this->table2.'.id'
        $join = $this->db->query('SELECT * FROM '.$this->table);
        var_dump($this->db->query('SELECT * FROM jabatan'));
        
        // $this->db->query('SELECT * FROM '.$this->table2.' WHERE id=:id');
        // $this->db->bind('id',$join['id']);

        return $this->db->resultSet();
    }
}