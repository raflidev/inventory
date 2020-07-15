<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forget extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function index()
	{
		$this->load->view('forget');		
	}
}
