<?php

class Report_request_bundling extends CI_Controller
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
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1 AND rb.id_location = $id2")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN packing_type AS pt ON rb.id_packing_type = pt.id_packing_type JOIN status ON rb.id_status = status.id_status")->result_array();
    }
    $data = [
      'judul'     => 'Report Request Bundling',
      'nama_menu' => 'reports',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('reports/request_bundling');
    $this->load->view('templates/footer');
  }


  public function index_client()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $user,
      'request_bundling'     => $this->db->get_where('request_bundling', ['id_client' => $id_client])->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('reports/request_bundling');
    $this->load->view('templates/footer');
  }

  public function detail($id_client = null, $id_location = null, $id)
  {
    $id1 = $id_client;
    $id2 = $id_location;
    $data = [
      'judul'     => 'Report Request Bundling',
      'nama_menu' => 'reports',
      'id_client' => $id1,
      'id_location' => $id2,
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN packing_type ON request_bundling.id_packing_type = packing_type.id_packing_type LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN user ON request_bundling.id_user = user.id_user LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_request_bundling = $id")->row_array(),
      'request_bundling_total'  => $this->db->query("SELECT * FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN packing_type ON request_bundling.id_packing_type = packing_type.id_packing_type LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN user ON request_bundling.id_user = user.id_user LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_request_bundling = $id")->num_rows(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }
}
