<?php
class mUser extends ci_model
{
    public function getUser()
    {
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get('user')->result_array();
    }
}