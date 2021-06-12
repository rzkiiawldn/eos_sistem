<?php

class Stock_allocation extends CI_Controller
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

      'nama_menu'         => 'setup',
      'judul'             => 'stock allocation',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/stock_allocation/index');
    $this->load->view('templates/footer');
  }

  public function create_stock_allocation()
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'             => 'Create stock allocation',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->form_validation->set_rules('stock_allocation_code', 'stock_allocation Code', 'required|trim');
    $this->form_validation->set_rules('stock_allocation_name', 'stock_allocation_name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/stock_allocation/create');
      $this->load->view('templates/footer');
    } else {

      $data_stock_allocation = [
        'stock_allocation_code'     => $this->input->post('stock_allocation_code'),
        'stock_allocation_name'     => $this->input->post('stock_allocation_name'),
      ];
      $this->db->insert('stock_allocation', $data_stock_allocation);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">stock_allocation Berhasil ditambah</div>');
      redirect('setup/stock_allocation');
    }
  }

  public function edit_stock_allocation($id_stock_allocation)
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'             => 'Edit stock allocation',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'stock_allocation'  => $this->db->get_where('stock_allocation', ['id_stock_allocation' => $id_stock_allocation])->row_array()
    ];
    $this->form_validation->set_rules('stock_allocation_code', 'stock_allocation Code', 'required|trim');
    $this->form_validation->set_rules('stock_allocation_name', 'stock_allocation name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/stock_allocation/edit');
      $this->load->view('templates/footer');
    } else {
      $id_stock_allocation         = $this->input->post('id_stock_allocation');
      $stock_allocation_code        = $this->input->post('stock_allocation_code');
      $stock_allocation_name        = $this->input->post('stock_allocation_name');

      $this->db->set('stock_allocation_code', $stock_allocation_code);
      $this->db->set('stock_allocation_name', $stock_allocation_name);
      $this->db->where('id_stock_allocation', $id_stock_allocation);
      $this->db->update('stock_allocation');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">stock_allocation Berhasil diubah</div>');
      redirect('setup/stock_allocation');
    }
  }

  public function delete_stock_allocation($id_stock_allocation)
  {
    $this->db->where('id_stock_allocation', $id_stock_allocation);
    $this->db->delete('stock_allocation');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">stock_allocation Berhasil Didelete</div>');
    redirect('setup/stock_allocation');
  }
}
