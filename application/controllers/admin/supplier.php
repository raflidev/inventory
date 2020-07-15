<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->model('mSupplier');
    }

	public function index()
	{
		$this->form_validation->set_rules('namasupplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if($this->form_validation->run() == false){
			if($this->uri->segment(4)){
				$this->db->where('id_supplier',$this->uri->segment(4));
				$data['supplierupdate']=$this->mSupplier->getSupplier();				
			}

			$data['judul'] = "Supplier";
		
			$data['supplier'] = $this->mSupplier->getSupplier();
	
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/supplier');
			$this->load->view('admin/layout/footer');
		}else{			
			$data = array(
				'nama_supplier' => $this->input->post('namasupplier'),
				'telp' => $this->input->post('telp'),
				'alamat' => $this->input->post('alamat')
			);
			$id = $this->input->post('idsupplier');			
			if(!$id == ""){			
				$this->mSupplier->updateSupplier($id,$data);
				$this->session->set_flashdata('pesan',"toastr.success('Data berhasil diupdate')");														
			}else{
				$this->mSupplier->insertSupplier($data);			
				$this->session->set_flashdata('pesan',"toastr.success('Data berhasil ditambahkan')");														
			}
	
			redirect(base_url('admin/supplier'));
		}
	}

	public function hapus($id = null)
	{
		if(!isset($id)) redirect(base_url('admin/supplier'));
		$this->mSupplier->deleteSupplier($id);
		$this->session->set_flashdata('pesan',"toastr.error('Data berhasil dihapus')");														
		redirect(base_url('admin/supplier'));
	}
}
