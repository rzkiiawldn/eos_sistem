<?php

class News_bundling_report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index($id_client = null, $id_location = null)
  {
    $id1 = $id_client;
    $id2 = $id_location;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM news WHERE id_client = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM news WHERE id_client = $id1 AND id_location = $id2")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM news")->result_array();
    }
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'      => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('reports/news_bundling_report');
    $this->load->view('templates/footer');
  }
  public function index_client()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'user'      => $user,
      'news'      => $this->db->get_where('news', ['id_client' => $id_client])->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('reports/news_bundling_report');
    $this->load->view('templates/footer');
  }



  public function create($id_client = null, $id_location = null)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'id_client' => $id1,
      'id_location' => $id2,
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array()
    ];

    $this->form_validation->set_rules('nama_pihak1', 'nama_pihak1', 'required|trim');
    $this->form_validation->set_rules('nama_pihak2', 'nama_pihak2', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak1', 'posisi_pihak1', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak2', 'posisi_pihak2', 'required|trim');
    $this->form_validation->set_rules('dept_pihak1', 'dept_pihak1', 'required|trim');
    $this->form_validation->set_rules('dept_pihak2', 'dept_pihak2', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
    $this->form_validation->set_rules('id_barang', 'id_barang', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('reports/create_news_bundling');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nama_pihak1'    => htmlspecialchars($this->input->post('nama_pihak1')),
        'posisi_pihak1'    => htmlspecialchars($this->input->post('posisi_pihak1')),
        'dept_pihak1'    => htmlspecialchars($this->input->post('dept_pihak1')),
        'nama_pihak2'    => htmlspecialchars($this->input->post('nama_pihak2')),
        'posisi_pihak2'    => htmlspecialchars($this->input->post('posisi_pihak2')),
        'dept_pihak2'    => htmlspecialchars($this->input->post('dept_pihak2')),
        'lokasi'    => htmlspecialchars($this->input->post('lokasi')),
        'id_barang'    => htmlspecialchars($this->input->post('id_barang')),
        'tanggal'    => htmlspecialchars($this->input->post('tanggal')),
        'status'    => 0,
        'id_client'    => htmlspecialchars($this->input->post('id_client')),
        'id_location'    => htmlspecialchars($this->input->post('id_location')),
        'created_by'    => $data['user']['id_user'],
      ];
      $this->db->insert('news', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('reports/news_bundling_report/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('reports/news_bundling_report');
      }
    }
  }
}
