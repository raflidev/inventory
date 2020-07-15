<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function index()
	{
		$data['judul'] = "Dashboard";
		$this->db->from('aksesmenu');
		$this->db->join('menu', 'aksesmenu.id_menu = menu.id_menu');

		$this->db->where('aktif', 0);
		$data['permintaan'] = $this->db->count_all_results('barang');

		// var_dump($data['permintaan']);
		// die;
		
		$this->db->where('aktif', 1);		
		$data['delay'] = $this->db->count_all_results('barang');
		
		$data['masuk'] = $this->db->count_all_results('masuk');
		$data['keluar'] = $this->db->count_all_results('keluar');
		

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/layout/content');
		$this->load->view('admin/layout/footer');
	}

	
}
