<?php

class News_bundling_report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('reports/news_bundling_report');
    $this->load->view('templates/footer');
  }
}
