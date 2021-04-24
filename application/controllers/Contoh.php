<?php
class Contoh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Msales', 'msales');
    }
    public function index()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id']    = $this->tank_auth->get_user_id();
            $data['username']    = $this->tank_auth->get_username();
            $data['capabilities']    = $this->tank_auth->get_capabilities();
            $data['role']    = $this->tank_auth->get_role();


            $this->data['site']['title'] = 'Master Sales';
            $this->load->view('header', $this->data['site']);
            $this->load->view('menu', $data);
            if (in_array('read_sales', unserialize($this->tank_auth->get_capabilities()))) {
                // $this->load->view('master/sales/index', $data);
                $this->load->view('contoh', $data);
            } else {
                $this->load->view('unauthorized', $data);
            }
            // $this->load->view('footer');
        }
    }
}
