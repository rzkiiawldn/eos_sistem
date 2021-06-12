<?php

class Client extends CI_Controller
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
      'judul'     => 'Client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->db->query("SELECT * FROM client JOIN user ON client.user_id = user.id_user JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation")->result_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/client/index');
    $this->load->view('templates/footer');
  }

  public function detail_client($id_client)
  {
    $data = [
      'judul'     => 'Client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->db->query("SELECT * FROM client JOIN user ON client.user_id = user.id_user JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_client = $id_client")->row_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/client/detail');
    $this->load->view('templates/footer');
  }

  public function create_client()
  {
    $data = [
      'judul'     => 'Create client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->client_model->get()->result_array(),
      'data_user' => $this->db->get('user')->result_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->form_validation->set_rules('user_id', 'User', 'required|trim');
    $this->form_validation->set_rules('client_code', 'client code', 'required|trim');
    $this->form_validation->set_rules('client_name', 'client name', 'required|trim');
    $this->form_validation->set_rules('id_stock_allocation', 'id stock allocation', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/client/create');
      $this->load->view('templates/footer');
    } else {

      $data_client = [
        'user_id'             => $this->input->post('user_id'),
        'client_code'         => $this->input->post('client_code'),
        'client_name'         => $this->input->post('client_name'),
        'id_stock_allocation' => $this->input->post('id_stock_allocation'),
        'created_date'        => date('Y-m-d H:i:s')
      ];
      $this->client_model->add($data_client);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">client Berhasil ditambah</div>');
      redirect('setup/client');
    }
  }

  public function edit_client($id_client)
  {
    $data = [
      'judul'     => 'Edit client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->client_model->get($id_client)->row_array(),
      'data_user' => $this->db->get('user')->result_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->form_validation->set_rules('client_code', 'client Code', 'required|trim');
    $this->form_validation->set_rules('client_name', 'client name', 'required|trim');
    $this->form_validation->set_rules('user_id', 'user', 'required|trim');
    $this->form_validation->set_rules('id_stock_allocation', 'id stock allocation', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/client/edit');
      $this->load->view('templates/footer');
    } else {
      $id_client            = $this->input->post('id_client');
      $user_id              = $this->input->post('user_id');
      $client_code          = $this->input->post('client_code');
      $client_name          = $this->input->post('client_name');
      $id_stock_allocation  = $this->input->post('id_stock_allocation');

      $this->db->set('user_id', $user_id);
      $this->db->set('client_code', $client_code);
      $this->db->set('client_name', $client_name);
      $this->db->set('id_stock_allocation', $id_stock_allocation);
      $this->db->where('id_client', $id_client);
      $this->client_model->edit();

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">client Berhasil diubah</div>');
      redirect('setup/client');
    }
  }

  public function delete_client($id_client)
  {
    $this->client_model->delete($id_client);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">client Berhasil Didelete</div>');
    redirect('setup/client');
  }

  // AUTO COMPLETE

  public function get_autocomplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->client_model->cari($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $arr_result[] = $row->stock_allocation_name;
        echo json_encode($arr_result);
      }
    }
  }
}
