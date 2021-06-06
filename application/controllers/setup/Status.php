<?php

class Status extends CI_Controller
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

      'nama_menu' => 'setup',
      'judul'       => 'status',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'status'      => $this->db->get('status')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/status/index');
    $this->load->view('templates/footer');
  }

  public function create_status()
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'       => 'Create status',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'status'      => $this->db->get('status')->result_array()
    ];
    $this->form_validation->set_rules('status', 'status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/status/create');
      $this->load->view('templates/footer');
    } else {

      $data_status = [
        'status'     => $this->input->post('status'),
      ];
      $this->db->insert('status', $data_status);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">status Berhasil ditambah</div>');
      redirect('setup/status');
    }
  }

  public function edit_status($id_status)
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'       => 'Edit status',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'status'      => $this->db->get_where('status', ['id_status' => $id_status])->row_array()
    ];
    $this->form_validation->set_rules('status', 'status name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/status/edit');
      $this->load->view('templates/footer');
    } else {
      $id_status     = $this->input->post('id_status');
      $status        = $this->input->post('status');

      $this->db->set('status', $status);
      $this->db->where('id_status', $id_status);
      $this->db->update('status');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">status Berhasil diubah</div>');
      redirect('setup/status');
    }
  }

  public function delete_status($id_status)
  {
    $this->db->where('id_status', $id_status);
    $this->db->delete('status');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">status Berhasil Didelete</div>');
    redirect('setup/status');
  }
}
