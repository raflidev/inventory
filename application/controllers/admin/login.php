<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper("form");
		$this->load->library("form_validation");
    }

	public function index()
	{
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run() == false)
        {
            $this->load->view('admin/login');		
        }else{
            $this->db->where('password', $this->input->post('password'));            
            $this->db->where('username', $this->input->post('username'));            
            $user = $this->db->get('user');
            $Quser = $user->result_array();
            if($user->row() > 0){
                $data = array(
                    'login' => 'true',
                    'id_user' =>  (int)$Quser[0]['id_user'],
                    'username' =>  $Quser[0]['username'],
                    'nama_user' =>  $Quser[0]['nama_user'],
                    'status_user' =>  (int)$Quser[0]['status_user']
                );
                $this->session->set_userdata($data);
                redirect(base_url('admin/'));
            }else{
                redirect(base_url('admin/login'));
            }
            }
        }
	}
