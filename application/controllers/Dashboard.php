<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'judul'     => 'dashboard',
            'nama_menu' => 'dashboard',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/index');
        $this->load->view('templates/footer');
    }
}
