<?php

class Request_bundling extends CI_Controller
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
      'judul'             => 'Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/request_bundling/index');
    $this->load->view('templates/footer');
  }

  public function detail_item($id_request_bundling)
  {
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('bundling/request_bundling/detail');
    $this->load->view('templates/footer');
  }

  public function create_item()
  {
    $data = [
      'judul'             => 'Create Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => $this->db->get('packing_type')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_packing_type', 'id_packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/request_bundling/create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'request_bundling_code'       => htmlspecialchars($this->input->post('request_bundling_code')),
        'bundling_type'               => htmlspecialchars($this->input->post('bundling_type')),
        'id_item_bundling'            => htmlspecialchars($this->input->post('id_item_bundling')),
        'request_quantity'            => htmlspecialchars($this->input->post('request_quantity')),
        'id_packing_type'             => $this->input->post('id_packing_type'),
        'id_status'                   => $this->input->post('id_status'),
      ];
      $this->db->insert('request_bundling', $data);
      redirect('bundling/request_bundling');
    }
  }

  public function edit_item($id_request_bundling)
  {
    $data = [
      'judul'             => 'Edit Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => $this->db->get('packing_type')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'request_bundling'  => $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('id_packing_type', 'id_packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/request_bundling/edit');
      $this->load->view('templates/footer');
    } else {
      $id_request_bundling        = htmlspecialchars($this->input->post('id_request_bundling'));
      $request_bundling_code      = htmlspecialchars($this->input->post('request_bundling_code'));
      $bundling_type              = htmlspecialchars($this->input->post('bundling_type'));
      $id_item_bundling           = htmlspecialchars($this->input->post('id_item_bundling'));
      $request_quantity           = htmlspecialchars($this->input->post('request_quantity'));
      $id_packing_type            = htmlspecialchars($this->input->post('id_packing_type'));
      $id_status                  = htmlspecialchars($this->input->post('id_status'));

      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('id_packing_type', $id_packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      redirect('bundling/request_bundling');
    }
  }


  public function delete_item($id_request_bundling)
  {
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->delete('request_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('bundling/request_bundling');
  }

  // REQUEST
  public function request()
  {
    $data = [
      'judul'             => 'Request',
      'nama_menu'         => 'Request',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => $this->db->get('packing_type')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_packing_type', 'id_packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('bundling/request_bundling/request');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'request_bundling_code'       => htmlspecialchars($this->input->post('request_bundling_code')),
        'bundling_type'               => htmlspecialchars($this->input->post('bundling_type')),
        'id_item_bundling'            => htmlspecialchars($this->input->post('id_item_bundling')),
        'request_quantity'            => htmlspecialchars($this->input->post('request_quantity')),
        'id_packing_type'             => $this->input->post('id_packing_type'),
        'id_status'                   => $this->input->post('id_status'),
      ];
      $this->db->insert('request_bundling', $data);
      redirect('bundling/request_bundling');
    }
  }
}
