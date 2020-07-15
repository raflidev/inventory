<?php
class mSupplier extends CI_MODEL{
    public function getSupplier()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function updateSupplier($id, $data)
    {
        $this->db->where('id_supplier', $id);
        $this->db->update('supplier',$data);
    }

    public function insertSupplier($data)
    {
        $this->db->update('supplier',$data);
    }

    public function deleteSupplier($id)
    {
        $this->db->where('id_supplier',$id);
		$this->db->delete('supplier');
    }
}