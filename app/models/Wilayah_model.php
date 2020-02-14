<?php

class Wilayah_model {
    private $table = 'wilayah';
    private $table2 = 'cabang';

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllWilayah(){
        $this->db->query('SELECT * FROM '.$this->table.' INNER JOIN '.$this->table2.' ON '.$this->table.'.id_cabang = '.$this->table2.'.id');
        return $this->db->resultSet();
    }
    public function getWilayahbyId($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' INNER JOIN '.$this->table2.' ON '.$this->table.'.id_cabang = '.$this->table2.'.id WHERE id_wil=:idw');
        $this->db->bind('idw',$id);
        return $this->db->single();
    }
    public function getWilayahbyIdCabang($idcab){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_cabang=:idcab');
        $this->db->bind('idcab',$idcab);
        return $this->db->resultSet();
    }
    public function tambahDataWilayah($data){
        $query = "INSERT INTO ". $this->table ." (nm_wilayah,id_cabang) VALUES(:nwil, :idcab)";
        
        $this->db->query($query);
        $this->db->bind('nwil',$data['wilayah']);
        $this->db->bind('idcab', $data['cabang']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id_wil=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataWilayah($data)
    {
        $query = "UPDATE ".$this->table." SET nm_wilayah=:nmwil,id_cabang=:idcab WHERE id_wil=:idwil";
        $this->db->query($query);
        $this->db->bind('nmwil',$data['wilayah']);
        $this->db->bind('idcab',$data['cabang']);
        $this->db->bind('idwil',$data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}