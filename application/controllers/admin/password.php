<?php
class password extends ci_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();  
        $this->load->model('mUser');      
    }

    public function index()
    {

        $this->form_validation->set_rules('passwordold', "Passworld lama", 'required');
        $this->form_validation->set_rules('passwordnew', "Passworld baru", 'required');
        $this->form_validation->set_rules('passwordnew2', "Konfirmasi Passworld", 'required');

        if($this->form_validation->run() == false)
        {
            $data['judul'] = "Ganti Password";
    
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/sidebar',$data);
            $this->load->view('admin/password');
            $this->load->view('admin/layout/footer');
        }else{
            // get profile
            $profile = $this->mUser->getUser();                        
            if($profile[0]['password'] == $this->input->post('passwordold'))
            {
                if($this->input->post('passwordnew') == $this->input->post('passwordnew2'))
                {
                    $data = array(
                        'password' => $this->input->post('passwordnew2')                
                    );
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('user',$data);
                    $this->session->set_flashdata('pesan',"toastr.success('Password berhasil diubah')");
                    redirect(base_url('admin/password'));
                }else{
                    $this->session->set_flashdata('pesan',"toastr.error('Password baru harus sama')");
                    redirect(base_url('admin/password'));
                }
            }else{
                $this->session->set_flashdata('pesan',"toastr.error('Password lama harus sama')");
                redirect(base_url('admin/password'));
            }
            
       
        }

    }
}