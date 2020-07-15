<?php
class profile extends ci_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('mUser');    
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'Required');
        
        if($this->form_validation->run() == false)
        {
            $data['profile'] = $this->mUser->getUser();            
            $data['judul'] = "Profile";
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/sidebar',$data);
            $this->load->view('admin/profile');
            $this->load->view('admin/layout/footer');
        }else{
            $data = array(
                'nama_user' => $this->input->post('nama')
            );
            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('user',$data);
            $this->session->set_flashdata('pesan',"toastr.success('Data berhasil diupdate')");	
            redirect(base_url('admin/profile'));
        }

    }
}