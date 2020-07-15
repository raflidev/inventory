<?php
class mBarang extends CI_MODEL{

    public function getBarang()
    {
        return $this->db->get('barang')->result_array();
    }

    public function getBarangMasuk()
    {
        $this->db->join('barang', 'barang.id_barang = masuk.id_barang');
        $this->db->join('supplier', 'supplier.id_supplier = masuk.id_supplier');
        return $this->db->get('masuk')->result_array();	
    }

    public function checkAktifBarang($id)
    {
        $this->db->where('aktif',$id);
        return $this->db->get('barang')->result_array();
    }

    public function getBarangKeluar()
    {
        $this->db->join('barang', 'barang.id_barang = keluar.id_barang');
        $this->db->join('supplier', 'supplier.id_supplier = keluar.id_supplier');
        return $this->db->get('keluar')->result_array();	
    }
}