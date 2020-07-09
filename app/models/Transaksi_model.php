<?php

class Transaksi_model {
    private $table = 'transaksi';
    private $table2 = 'anggota';
    private $table3 = 'cabang';
    private $table4 = 'jenis_trans';
    private $table5 = 'nasabah';
    private $table6 = 'transaksi_harian';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getAllTransaksi()
    {
        $this->db->query('SELECT * FROM '.$this->table.' 
        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
        ORDER BY `besar_pinjaman` DESC');
        return $this->db->resultSet();
    }
    public function getTransaksibyId($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' 
        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
        WHERE id_transaksi = :id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function getTransaksibyIdCab($idcab){
        $this->db->query('SELECT * FROM '.$this->table.' 
                        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
                        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
                        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
                        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
                        WHERE id = :idcab ORDER BY `besar_pinjaman` DESC');
        $this->db->bind('idcab',$idcab);
        return $this->db->resultSet();
    }
    public function getTransaksibyIdAgt($idagt){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_agt = :idagt');
        $this->db->bind('idagt',$idagt);
        return $this->db->single();
    }
    public function FilterTglTransaksiCabang($idcbg){
        $tgl_sekarang = date('Y-m-d'); 
        $this->db->query('SELECT COUNT(IF((`cabang`.`id` = :idcbg) AND YEAR(`transaksi`.`date_create`) = YEAR(:tglsekarang) AND MONTH(`transaksi`.`date_create`) = MONTH(:tglsekarang), jumlah_bayar, NULL)) as jml_transaksi, 
        SUM(IF((cabang.id = :idcbg) AND YEAR(`transaksi`.`date_create`) = YEAR(:tglsekarang) AND MONTH(`transaksi`.`date_create`) = MONTH(:tglsekarang), jumlah_bayar, 0)) as jml_bayar, 
        SUM(IF((cabang.id = :idcbg) AND YEAR(`transaksi`.`date_create`) = YEAR(:tglsekarang) AND MONTH(`transaksi`.`date_create`) = MONTH(:tglsekarang), income, 0)) as income, 
        SUM(IF((cabang.id = :idcbg) AND YEAR(`transaksi`.`date_create`) = YEAR(:tglsekarang) AND MONTH(`transaksi`.`date_create`) = MONTH(:tglsekarang), sisa_pinjam, 0)) as sisa_bayar 
        FROM `transaksi` INNER JOIN `anggota` ON `anggota`.`id_agt`=`transaksi`.`id_agt` INNER JOIN `cabang` ON `cabang`.`id` = `anggota`.`id_cabang`');
        $this->db->bind('idcbg',$idcbg);
        $this->db->bind('tglsekarang',$tgl_sekarang);
        return $this->db->single();
    }
    public function FilterTglTransaksi($idagt){
        $tgl_sekarang = date('Y-m-d'); 
        $this->db->query('SELECT COUNT(IF((id_agt = :idagt) AND (YEAR(date_create) = YEAR(:tglsekarang)) AND (MONTH(date_create) = MONTH(:tglsekarang)), jumlah_bayar, NULL)) as jml_transaksi,
                                 SUM(IF((id_agt = :idagt) AND (YEAR(date_create) = YEAR(:tglsekarang)) AND (MONTH(date_create) = MONTH(:tglsekarang)), jumlah_bayar, 0)) as jml_bayar,
                                 SUM(IF((id_agt = :idagt) AND (YEAR(date_create) = YEAR(:tglsekarang)) AND (MONTH(date_create) = MONTH(:tglsekarang)), income, 0)) as income,
                                 SUM(IF((id_agt = :idagt) AND (YEAR(date_create) = YEAR(:tglsekarang)) AND (MONTH(date_create) = MONTH(:tglsekarang)), sisa_pinjam, 0)) as sisa_bayar
                        FROM '.$this->table);
        $this->db->bind('idagt',$idagt);
        $this->db->bind('tglsekarang',$tgl_sekarang);
        return $this->db->single();
    }
    public function getTransaksiNasabah($idnas)
    {
        $this->db->query('SELECT * FROM '.$this->table.' 
                        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
                        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
                        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
                        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
                        WHERE id_nasabah = :idnas ORDER BY `tgl_transaksi` ASC');
        $this->db->bind('idnas',$idnas);
        return $this->db->resultSet();
    }
    // public function sumbiaya()
    // {
    //     $this->db->query('SELECT SUM(besar_pinjaman) as total FROM '.$this->table);
    //     return $this->db->single();
    // }
    public function tambahDataTransaksi($data){
        $timetodate = date('d-m-Y',time());
        $tglsekarang = strtotime($timetodate);
        $bunga = 0.02;
        
        // $bsrpinjam = $data['besarpinjam'];
        $bsrpinjam = $data['besarpinjam'];
        $besarbunga = $bsrpinjam * $bunga;
        $totalbayar = $bsrpinjam + $besarbunga;
        $sisabayar = $totalbayar;

        $tglpinjam = strtotime($data['tglpinjam']);
        $tglkontrak = strtotime($data['tglkontrak']);

        $this->db->query('INSERT INTO '.$this->table.' (tgl_transaksi,id_agt,id_jenis_trans,Nomor_Nasabah,tgl_pinjam,besar_pinjaman,bukti,keterangan,tgl_kontrak,jumlah_bayar,sisa_pinjam,status_pembayaran,date_create) VALUES(:tgltrans,:idagt,:idjns,:idnasa,:tglpinjam,:bsrpinjam,:bukti,:keter,:tglkontrak,:jumlahbayar,:sisabayar,:status,:date)');

        $this->db->bind('tgltrans',$tglsekarang);
        $this->db->bind('idagt',$data['namaao']);
        $this->db->bind('idjns',$data['jnspinjam']);
        $this->db->bind('idnasa',$data['nasabah']);
        $this->db->bind('tglpinjam',$tglpinjam);
        $this->db->bind('bsrpinjam', $bsrpinjam);
        $this->db->bind('bukti','default.jpg');
        $this->db->bind('keter',$data['keterangan']);
        $this->db->bind('tglkontrak',$tglkontrak);
        $this->db->bind('jumlahbayar', $totalbayar);
        $this->db->bind('sisabayar',$sisabayar);
        $this->db->bind('status', 0);
        $this->db->bind('date', date('Y-m-d'));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function databelumLunas($data)
    {
        $this->db->query('SELECT 
                                    SUM(IF((id_agt = :idagt) AND (status_pembayaran = :stat), jumlah_bayar, 0)) as bunga 
                                    FROM '.$this->table);
        $this->db->bind('idagt',$data['idao']);
        $this->db->bind('stat',0);
        return $this->db->single();
    }
    public function cekDataHarian($data){
        $convert = date('Y-m-d');
        $tglsekarang = strtotime($convert);
        $this->db->query('SELECT * FROM '.$this->table6.' WHERE tgl_transaksi = :tglsekarang AND id_agt = :idagt');
        $this->db->bind('tglsekarang', $tglsekarang);
        $this->db->bind('idagt', $data['idao']);
        $result = $this->db->single();
        if($result > 0){
            $this->updateDataHarian($data, $result);
        }else{
            $this->tambahDataHarian($data);
        }
    }

    public function tambahDataHarian($data){
        $data_transaksi_BL = $this->databelumLunas($data);
        $bunga_harian = $data_transaksi_BL['bunga'] / 30;
        $kekurangan = $bunga_harian - $data['jumlahbayar'];
        if($kekurangan <= 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $tgl_sekarang = date('Y-m-d');
        $converTgl = strtotime($tgl_sekarang);

        $this->db->query('INSERT INTO '.$this->table6.' (id_agt,bunga_harian,disetor,kekurangan,status,date_create,tgl_transaksi) VALUES(:idagt, :bungaharian, :disetor, :kekurangan, :status, :date_create, :tgltrans)');
        
        $this->db->bind('idagt',$data['idao']);
        $this->db->bind('bungaharian',$bunga_harian);
        $this->db->bind('disetor',$data['jumlahbayar']);
        $this->db->bind('kekurangan',$kekurangan);
        $this->db->bind('status',$status);
        $this->db->bind('date_create',$tgl_sekarang);
        $this->db->bind('tgltrans',$converTgl);

        $this->db->execute();
    }
    public function updateDataHarian($data, $olddata){

        $data_transaksi_BL = $this->databelumLunas($data);
        $bunga_harian = $data_transaksi_BL['bunga'] / 30;
        $totalbayarsebelum = $olddata['disetor'] +  $data['jumlahbayar'];
        $kekurangan = $bunga_harian - $totalbayarsebelum;
        if($kekurangan <= 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $tgl_sekarang = date('Y-m-d');
        $converTgl = strtotime($tgl_sekarang);

        $this->db->query('UPDATE '.$this->table6.' SET bunga_harian = :bungaharian,disetor = :disetor,kekurangan = :kekurangan,status = :status WHERE tgl_transaksi = :tgltrans AND id_agt = :idagt');
        
        $this->db->bind('idagt',$data['idao']);
        $this->db->bind('bungaharian',$bunga_harian);
        $this->db->bind('disetor',$totalbayarsebelum);
        $this->db->bind('kekurangan',$kekurangan);
        $this->db->bind('status',$status);
        $this->db->bind('tgltrans',$converTgl);

        $this->db->execute();
    }

    public function updateDataTransaksi($data)
    {
        
        $totalpembayaransebelum = $data['outputincome'] + $data['jumlahbayar'];
        $sisabayar = $data['outputbesarpinjam'] - $totalpembayaransebelum;
        if($sisabayar <= 0){
            $this->db->query('UPDATE '.$this->table.' SET income=:income, sisa_pinjam=:sisabayar,status_pembayaran=:status WHERE id_transaksi=:id');
            $this->db->bind('status',1);
        }else{
            $this->db->query('UPDATE '.$this->table.' SET income=:income, sisa_pinjam=:sisabayar WHERE id_transaksi=:id');
        }
        $this->db->bind('income',$totalpembayaransebelum);
        $this->db->bind('id',$data['idtrans']);
        $this->db->bind('sisabayar',$sisabayar);

        $this->db->execute();

        $this->cekDataHarian($data);        
        return $this->db->rowCount();
    }

    public function getTransaksibyFilter($idagt, $data){
        $nilai1 = strtotime($data['start']);
        $nilai2 = strtotime($data['end']);

        $this->db->query('SELECT 
                        SUM(transaksi.jumlah_bayar) as jml_bayar,
                        SUM(transaksi.income) as income,
                        SUM(transaksi.sisa_pinjam) as sisa_bayar FROM '.$this->table.' 
                        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
                        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
                        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
                        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
                        WHERE '.$this->table.'.`id_agt` = :idagt AND tgl_transaksi >= :nilai1 AND tgl_transaksi <= :nilai2 
                        ORDER BY tgl_transaksi ASC');
        
        $this->db->bind('nilai1',$nilai1);
        $this->db->bind('nilai2',$nilai2);
        $this->db->bind('idagt',$idagt);
        
        return $this->db->single();
    }
    public function getTransaksibyFilterHarian($data,$idcab){
        $tanggal = strtotime($data['tanggal']);

        $this->db->query('SELECT * FROM '.$this->table6.' 
                        INNER JOIN '.$this->table2.' ON '.$this->table6.'.`id_agt`='.$this->table2.'.`id_agt` 
                        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
                        WHERE '.$this->table3.'.`id` = :idcab AND tgl_transaksi = :nilai1  
                        ORDER BY tgl_transaksi ASC');
        
        $this->db->bind('nilai1',$tanggal);
        $this->db->bind('idcab',$idcab);
        
        return $this->db->resultSet();
    }
    public function FilterTglTransaksiHarian($idagt, $tglsekarang){
        // $tgl_sekarang = strtotime($tglsekarang); 
        $this->db->query('SELECT * FROM '.$this->table6.' WHERE id_agt = :idagt AND date_create = :tglsekarang');
        $this->db->bind('idagt',$idagt);
        $this->db->bind('tglsekarang',$tglsekarang);
        return $this->db->single();
    }
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id_transaksi=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getTransaksibyDate($date, $idcab)
    {
        $tglDibutuhkan = date('d-m-Y', $date);
        $mydate = strtotime($tglDibutuhkan);

        $beginDate = $this->getTransaksiDateBegin($idcab);

        $this->db->query('SELECT * FROM '.$this->table.' 
                        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
                        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
                        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
                        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
                        WHERE '.$this->table3.'.`id` = :idcab AND `tgl_transaksi` >= :tglmula AND `tgl_transaksi` <= :tgl');
        
        $this->db->bind('tglmula', $beginDate);
        $this->db->bind('tgl',$date);
        $this->db->bind('idcab',$idcab);
        $myhasil = $this->db->resultSet(); 

        return $myhasil;
    }

    public function getTransaksiDateBegin($idcab)
    {
        $this->db->query('SELECT * FROM '.$this->table.' 
                        INNER JOIN '.$this->table2.' ON '.$this->table.'.`id_agt`='.$this->table2.'.`id_agt` 
                        INNER JOIN '.$this->table3.' ON '.$this->table2.'.`id_cabang`='.$this->table3.'.`id` 
                        INNER JOIN '.$this->table4.' ON '.$this->table.'.`id_jenis_trans`='.$this->table4.'.`id_jenis` 
                        INNER JOIN '.$this->table5.' ON '.$this->table.'.`Nomor_Nasabah`='.$this->table5.'.`id_nasabah` 
                        WHERE '.$this->table3.'.`id` = :idcab ORDER BY tgl_transaksi ASC');
        $this->db->bind('idcab',$idcab);
        $mataram = $this->db->resultSet();
        $beginTrans = $mataram[0]['tgl_transaksi'];
        return $beginTrans;
    }
    public function getAllDataBulananTahunan($bulan)
    {
        $bulansekarang = date('Y-'.$bulan.'-d');
        $tglsekarang = date('Y-m-d');

            $this->db->query('SELECT SUM(`jumlah_bayar`) as jml_bayar FROM `transaksi` WHERE YEAR(date_create) = YEAR("'.$tglsekarang.'") AND MONTH(date_create) = MONTH("'.$bulansekarang.'")');

            // $this->db->bind('bulan',$bulan);
            // $this->db->bind('tanggal',$tglsekarang);
            $newResult = $this->db->single();
            if($newResult > 0){
                return $newResult;
            }
    }
    public function getDataBulananTahunan($idcab,$bulan)
    {
        $bulansekarang = date('Y-'.$bulan.'-d');
        $tglsekarang = date('Y-m-d');

            $this->db->query('SELECT SUM(`jumlah_bayar`) as jml_bayar FROM `transaksi` INNER JOIN anggota ON anggota.id_agt=transaksi.id_agt INNER JOIN cabang ON cabang.id = anggota.id_cabang WHERE id_cabang = :idcab AND YEAR(transaksi.date_create) = YEAR("'.$tglsekarang.'") AND MONTH(transaksi.date_create) = MONTH("'.$bulansekarang.'")');

            $this->db->bind('idcab',$idcab);
            // $this->db->bind('bulan',$bulan);
            // $this->db->bind('tanggal',$tglsekarang);
            $newResult = $this->db->single();
            if($newResult > 0){
                return $newResult;
            }
    }
}