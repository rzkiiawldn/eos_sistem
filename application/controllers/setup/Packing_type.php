<?php

class Packing_type extends CI_Controller
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
      'judul'           => 'Packing Type',
      'nama_menu'       => 'setup',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'    => $this->db->get('packing_type')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/packing_type/index');
    $this->load->view('templates/footer');
  }

  public function create_packing_type()
  {
    $data = [
      'judul'         => 'Create packing Type',
      'nama_menu'     => 'setup',
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'  => $this->db->get('packing_type')->result_array()
    ];
    $this->form_validation->set_rules('packing_type_code', 'packing_type Code', 'required|trim');
    $this->form_validation->set_rules('packing_type_name', 'packing_type_name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/packing_type/create');
      $this->load->view('templates/footer');
    } else {

      $data_packing_type = [
        'packing_type_code'     => $this->input->post('packing_type_code'),
        'packing_type_name'     => $this->input->post('packing_type_name'),
      ];
      $this->db->insert('packing_type', $data_packing_type);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">packing_type Berhasil ditambah</div>');
      redirect('setup/packing_type');
    }
  }

  public function edit_packing_type($id_packing_type)
  {
    $data = [
      'judul'         => 'Edit packing_type',
      'nama_menu'     => 'setup',
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'  => $this->db->get_where('packing_type', ['id_packing_type' => $id_packing_type])->row_array()
    ];
    $this->form_validation->set_rules('packing_type_code', 'packing_type Code', 'required|trim');
    $this->form_validation->set_rules('packing_type_name', 'packing_type name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/packing_type/edit');
      $this->load->view('templates/footer');
    } else {
      $id_packing_type         = $this->input->post('id_packing_type');
      $packing_type_code        = $this->input->post('packing_type_code');
      $packing_type_name        = $this->input->post('packing_type_name');

      $this->db->set('packing_type_code', $packing_type_code);
      $this->db->set('packing_type_name', $packing_type_name);
      $this->db->where('id_packing_type', $id_packing_type);
      $this->db->update('packing_type');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">packing_type Berhasil diubah</div>');
      redirect('setup/packing_type');
    }
  }

  public function delete_packing_type($id_packing_type)
  {
    $this->db->where('id_packing_type', $id_packing_type);
    $this->db->delete('packing_type');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">packing_type Berhasil Didelete</div>');
    redirect('setup/packing_type');
  }
}
