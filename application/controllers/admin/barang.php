<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->model('mBarang');
		$this->load->model('mSupplier');
		$this->load->library("form_validation");
    }

	public function index()
	{
		
		$this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

		if($this->form_validation->run() == false){
			if($this->uri->segment(4)){
				$this->db->where('id_barang',$this->uri->segment(4));
				$data['barangupdate']=$this->db->get('barang')->result_array();				
			}
			
			$data['judul'] = "Barang";			
			if($this->session->status_user == 4)
			{
				$this->db->where('aktif', 1);
			}
			else if($this->session->status_user == 1)
			{

			}
			else{
				$this->db->where('aktif', 0);
			}
			$data['barang'] = $this->mBarang->getBarang();
			
				$this->load->view('admin/layout/header');
				$this->load->view('admin/layout/sidebar', $data);		
				$this->load->view('admin/barang/barang');
				$this->load->view('admin/layout/footer');  
        }else{
		$data = array(
			'nama_barang' => $this->input->post('namabarang'),
			'deskripsi' => $this->input->post('deskripsi'),
			'satuan' => $this->input->post('satuan')
		);
		$id = $this->input->post('idbarang');
		if(!$id == "")
		{
			$this->db->where('id_barang',$id);
			$this->db->update('barang',$data);
			$this->session->set_flashdata('pesan',"toastr.success('Data berhasil diupdate')");														

		}else{
			$this->db->insert('barang',$data);
			$this->db->order_by('id_barang', 'DESC');
			$id = $this->db->get('barang')->result_array();
			$id_barang = 
			$data = array(
				'id_barang' => $id[0]['id_barang'],
				'jumlah_masuk' => 0,
				'jumlah_keluar' => 0,
				'jumlah_total' => 0
			);
			$this->db->insert('stok', $data);
			$this->session->set_flashdata('pesan',"toastr.success('Data berhasil ditambahkan')");														
		}
		redirect(base_url('admin/barang'));
		}	
	}
	

	public function masuk()
	{
		$this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');

		if($this->form_validation->run() == false){
			if($this->uri->segment(4)){
				$this->db->where('id_masuk',$this->uri->segment(4));
				$data['masukupdate']=$this->mBarang->getBarangMasuk();	
				// var_dump($data['masukupdate']);
				// die;		
			}
			$data['judul'] = "Barang Masuk";									
			$data['barangmasuk'] = $this->mBarang->getBarangMasuk();	
			
			// var_dump($data['barangmasuk'][0]['aktif']);die;
			$data['supplier'] = $this->mSupplier->getSupplier();
			$data['barang'] = $this->mBarang->checkAktifBarang(2);
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/sidebar', $data);		
			$this->load->view('admin/barang/masuk');
			$this->load->view('admin/layout/footer');
		}else{
				$data = array(
					'id_supplier' => $this->input->post('supplier'),
					'id_barang' => $this->input->post('namabarang'),
					'tanggal_masuk' => $this->input->post('tanggal'),
					'jumlah_masuk' => $this->input->post('jumlah')
				);
				$id = $this->input->post('idmasuk');				
				if(!$id == "")
				{
					$this->db->where('id_masuk',$id);
					$this->db->update('masuk',$data);
					$this->session->set_flashdata('pesan',"toastr.success('Data berhasil diupdate')");														

				}else
				{
					$this->db->insert('masuk',$data);
					$this->session->set_flashdata('pesan',"toastr.success('Data berhasil ditambahkan')");														

				}
				redirect(base_url('admin/barang/masuk'));
		}
	}
	
	public function keluar()
	{
		$this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
		
		if($this->form_validation->run() == false){
		
			if($this->uri->segment(4)){
				$this->db->where('id_keluar',$this->uri->segment(4));				
				$data['keluarupdate']=$this->mBarang->getBarangKeluar();	
				// var_dump($data['masukupdate']);
				// die;		
			}
		$data['judul'] = "Barang Keluar";		
		$data['barangkeluar'] = $this->mBarang->getBarangKeluar();
		$data['supplier'] = $this->mSupplier->getSupplier();		
		$data['barang'] = $this->mBarang->checkAktifBarang(2);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar', $data);		
		$this->load->view('admin/barang/keluar');
		$this->load->view('admin/layout/footer');
		}else{
			$data = array(
				'id_supplier' => $this->input->post('supplier'),
				'id_barang' => $this->input->post('namabarang'),
				'tanggal_keluar' => $this->input->post('tanggal'),
				'jumlah_keluar' => $this->input->post('jumlah')
			);
			$id = $this->input->post('idkeluar');				
				if(!$id == "")
				{
					$this->db->where('id_keluar',$id);
					$this->db->update('keluar',$data);
					$this->session->set_flashdata('pesan',"toastr.success('Data berhasil diupdate')");					
				}else
				{
					$this->db->insert('keluar',$data);
					$this->session->set_flashdata('pesan',"toastr.success('Data berhasil ditambahkan')");														
				}
			redirect(base_url('admin/barang/keluar'));
		}
	}

	public function baranghapus($id = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang'));
		$this->db->where('id_barang',$id);
		$this->db->delete('barang');
		$this->session->set_flashdata('pesan',"toastr.error('Data berhasil dihapus')");					
		redirect(base_url('admin/barang'));
	}

	public function masukhapus($id = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/masuk'));
		$this->db->where('id_masuk',$id);
		$this->db->delete('masuk');
		$this->session->set_flashdata('pesan',"toastr.error('Data berhasil dihapus')");					
		redirect(base_url('admin/barang/masuk'));
	}

	public function keluarhapus($id = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/keluar'));
		$this->db->where('id_keluar',$id);
		$this->db->delete('keluar');
		$this->session->set_flashdata('pesan',"toastr.error('Data berhasil dihapus')");					
		redirect(base_url('admin/barang/keluar'));
	}

	public function accept($id = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/'));
		// menagement
		if($this->session->status_user == 3)
		{
			$data = array(
				'aktif' => 1
			);
			$this->db->where('id_barang', $id);
			$this->db->update('barang',$data);
			redirect(base_url('admin/barang/'));
		}
		// gudang
		if($this->session->status_user == 4)
		{
			$data = array(
				'aktif`' => 2
			);
			$this->db->where('id_barang', $id);
			$this->db->update('barang',$data);
			redirect(base_url('admin/barang/'));
		}
	}

	public function acceptmasuk($id = null, $jml = null, $idmasuk = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/masuk'));
		// menagement
		if($this->session->status_user == 3)
		{						
			$data = array(
				'masuk_aktif' => 1
			);
			$this->db->where('id_masuk', $idmasuk);
			$this->db->update('masuk', $data);
			$this->db->query("call tambah_masuk($id,$jml)");			
			redirect(base_url('admin/barang/masuk'));
		}	
	}

	public function denymasuk($id = null, $jml = null, $idmasuk = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/masuk'));
		// menagement
		if($this->session->status_user == 3)
		{			
			$this->db->query("call batal_masuk($id,$jml)");
			$this->db->where('id_masuk', $idmasuk);
			$this->db->delete('masuk');	
			redirect(base_url('admin/barang/masuk'));
		}	
	}

	public function acceptkeluar($id = null, $jml = null, $idkeluar = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/keluar'));
		// menagement
		if($this->session->status_user == 3)
		{						
			$data = array(
				'keluar_aktif' => 1
			);
			$this->db->where('id_keluar', $idkeluar);
			$this->db->update('keluar', $data);			
			redirect(base_url('admin/barang/keluar'));
		}	
		//gudang
		if($this->session->status_user == 4)
		{						
			$data = array(
				'keluar_aktif' => 2
			);
			$this->db->where('id_keluar', $idkeluar);
			$this->db->update('keluar', $data);
			$this->db->query("call tambah_keluar($id,$jml)");			
			redirect(base_url('admin/barang/keluar'));
		}
	}

	public function denykeluar($id = null, $jml = null, $idkeluar = null)
	{
		if(!isset($id)) redirect(base_url('admin/barang/keluar'));
		// menagement
		if($this->session->status_user == 3)
		{			
			$this->db->query("call batal_keluar($id,$jml)");
			$this->db->where('id_keluar', $idkeluar);
			$this->db->delete('keluar');	
			redirect(base_url('admin/barang/keluar'));
		}	
	}
}
