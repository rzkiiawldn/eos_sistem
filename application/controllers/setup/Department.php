<?php

class Department extends CI_Controller
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
      'judul'       => 'Department',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get('department')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/department/index');
    $this->load->view('templates/footer');
  }

  public function create_department()
  {
    $data = [
      'judul'       => 'Create Department',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get('department')->result_array()
    ];
    $this->form_validation->set_rules('kd_department', 'department Code', 'required|trim');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/department/create');
      $this->load->view('templates/footer');
    } else {

      $data_department = [
        'kd_department'     => $this->input->post('kd_department'),
        'name'              => $this->input->post('name'),
        'created_date'      => date('Y-m-d H:i:s'),
        'created_by'        => $data['user']['fullname'],
      ];
      $this->db->insert('department', $data_department);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">department Berhasil ditambah</div>');
      redirect('setup/department');
    }
  }

  public function edit_department($department_id)
  {
    $data = [
      'judul'     => 'Edit Department',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get_where('department', ['department_id' => $department_id])->row_array()
    ];
    $this->form_validation->set_rules('kd_department', 'department Code', 'required|trim');
    $this->form_validation->set_rules('name', 'department name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('setup/department/edit');
      $this->load->view('templates/footer');
    } else {
      $department_id        = $this->input->post('department_id');
      $name                 = $this->input->post('name');
      $kd_department        = $this->input->post('kd_department');

      $this->db->set('name', $name);
      $this->db->set('kd_department', $kd_department);
      $this->db->where('department_id', $department_id);
      $this->db->update('department');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">department Berhasil diubah</div>');
      redirect('setup/department');
    }
  }

  public function delete_department($department_id)
  {
    $this->db->where('department_id', $department_id);
    $this->db->delete('department');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">department Berhasil Didelete</div>');
    redirect('setup/department');
  }
}
