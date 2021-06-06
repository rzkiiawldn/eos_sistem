<?php

class Manage_by extends CI_Controller
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
      'judul'       => 'Manage By',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'   => $this->db->get('manage_by')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/manage_by/index');
    $this->load->view('templates/footer');
  }

  public function create_manage_by()
  {
    $data = [
      'judul'       => 'Create manage by',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'   => $this->db->get('manage_by')->result_array()
    ];
    $this->form_validation->set_rules('manage_by_code', 'manage_by Code', 'required|trim');
    $this->form_validation->set_rules('manage_by_name', 'manage_by_name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/manage_by/create');
      $this->load->view('templates/footer');
    } else {

      $data_manage_by = [
        'manage_by_code'     => $this->input->post('manage_by_code'),
        'manage_by_name'     => $this->input->post('manage_by_name'),
      ];
      $this->db->insert('manage_by', $data_manage_by);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">manage_by Berhasil ditambah</div>');
      redirect('setup/manage_by');
    }
  }

  public function edit_manage_by($id_manage_by)
  {
    $data = [
      'judul'       => 'Edit manage_by',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'   => $this->db->get_where('manage_by', ['id_manage_by' => $id_manage_by])->row_array()
    ];
    $this->form_validation->set_rules('manage_by_code', 'manage_by Code', 'required|trim');
    $this->form_validation->set_rules('manage_by_name', 'manage_by name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/manage_by/edit');
      $this->load->view('templates/footer');
    } else {
      $id_manage_by         = $this->input->post('id_manage_by');
      $manage_by_code        = $this->input->post('manage_by_code');
      $manage_by_name        = $this->input->post('manage_by_name');

      $this->db->set('manage_by_code', $manage_by_code);
      $this->db->set('manage_by_name', $manage_by_name);
      $this->db->where('id_manage_by', $id_manage_by);
      $this->db->update('manage_by');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">manage_by Berhasil diubah</div>');
      redirect('setup/manage_by');
    }
  }

  public function delete_manage_by($id_manage_by)
  {
    $this->db->where('id_manage_by', $id_manage_by);
    $this->db->delete('manage_by');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">manage_by Berhasil Didelete</div>');
    redirect('setup/manage_by');
  }
}
