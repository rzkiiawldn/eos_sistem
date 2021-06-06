<?php

class Setting extends CI_Controller
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
      'judul'   => 'Menu',
      'user'    => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'menu'    => $this->db->get('user_menu')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/setting/menu');
    $this->load->view('templates/footer');
  }

  public function add_menu()
  {
    $active = $this->input->post('active');
    if (!empty($active)) {
      $active = 1;
    } else {
      $active = 0;
    }

    $data = [
      'menu'          => $this->input->post('menu'),
      'url'           => $this->input->post('url'),
      'icon'          => $this->input->post('icon'),
      'active'        => $active,
      'menu_order'    => $this->input->post('menu_order'),
    ];
    $this->db->insert('user_menu', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu Baru Berhasil Ditambah</div>');
    redirect('setup/setting');
  }

  public function edit_menu($id_menu)
  {
    $id_menu    = $this->input->post('id_menu');
    $menu       = $this->input->post('menu');
    $url       = $this->input->post('url');
    $icon       = $this->input->post('icon');
    $menu_order  = $this->input->post('menu_order');

    $active = $this->input->post('active');
    if (!empty($active)) {
      $active = 1;
    } else {
      $active = 0;
    }

    $this->db->set('menu', $menu);
    $this->db->set('url', $url);
    $this->db->set('icon', $icon);
    $this->db->set('menu_order', $menu_order);
    $this->db->set('active', $active);
    $this->db->where('id_menu', $id_menu);
    $this->db->update('user_menu');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu Berhasil Diubah</div>');
    redirect('setup/setting');
  }

  public function delete_menu($id_menu)
  {
    $this->db->where('id_menu', $id_menu);
    $this->db->delete('user_menu');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu Berhasil Dihapus</div>');
    redirect('setup/setting');
  }

  public function submenu()
  {
    $data = [
      'nama_menu' => 'setup',
      'judul'     => 'Submenu',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'submenu'   => $this->db->query("SELECT s.id_submenu, s.submenu, s.icon, s.url , s.active, s.menu_id, s.submenu_order, m.id_menu, m.menu FROM user_submenu AS s JOIN user_menu AS m ON s.menu_id = m.id_menu ORDER BY id_submenu DESC")->result_array(),
      'menu'      => $this->db->get('user_menu')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/setting/submenu');
    $this->load->view('templates/footer');
  }

  public function add_submenu()
  {
    $active = $this->input->post('active');
    if (!empty($active)) {
      $active = 1;
    } else {
      $active = 0;
    }

    $data = [
      'menu_id'     => $this->input->post('menu_id'),
      'submenu'     => $this->input->post('submenu'),
      'url'         => $this->input->post('url'),
      'icon'        => $this->input->post('icon'),
      'active'      => $active,
      'submenu_order'  => $this->input->post('submenu_order'),
    ];
    $this->db->insert('user_submenu', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">SubMenu Berhasil Ditambah</div>');
    redirect('setup/setting/submenu');
  }

  public function edit_submenu($id_submenu)
  {
    $id_submenu     = $this->input->post('id_submenu');
    $menu_id        = $this->input->post('menu_id');
    $submenu        = $this->input->post('submenu');
    $url            = $this->input->post('url');
    $icon           = $this->input->post('icon');
    $submenu_order  = $this->input->post('submenu_order');

    $active = $this->input->post('active');
    if (!empty($active)) {
      $active = 1;
    } else {
      $active = 0;
    }

    $this->db->set('menu_id', $menu_id);
    $this->db->set('submenu', $submenu);
    $this->db->set('url', $url);
    $this->db->set('icon', $icon);
    $this->db->set('active', $active);
    $this->db->set('submenu_order', $submenu_order);
    $this->db->where('id_submenu', $id_submenu);
    $this->db->update('user_submenu');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">SubMenu Berhasil Diubah</div>');
    redirect('setup/setting/submenu');
  }

  public function delete_submenu($id_submenu)
  {
    $this->db->where('id_submenu', $id_submenu);
    $this->db->delete('user_submenu');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">SubMenu Berhasil Dihapus</div>');
    redirect('setup/setting/submenu');
  }

  public function menu_access()
  {
    $data = [
      'nama_menu' => 'setup',
      'judul'       => 'Menu Access',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get('department')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/setting/menu_access');
    $this->load->view('templates/footer');
  }
  public function manage_access($department_id)
  {
    $data = [
      'nama_menu' => 'setup',
      'judul'       => 'Manage Access',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get_where('department', ['department_id' => $department_id])->row_array(),
      'submenu'     => $this->db->query('SELECT m.id_menu, m.menu, s.id_submenu, s.submenu, s.menu_id FROM user_menu AS m LEFT JOIN user_submenu s ON m.id_menu = s.menu_id ORDER BY m.menu ASC')->result_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('setup/setting/manage_access');
    $this->load->view('templates/footer');
  }

  public function change_access()
  {
    $id_menu          = $this->input->post('menuId');
    $id_submenu       = $this->input->post('submenuId');
    $department_id    = $this->input->post('departmentId');

    $data = [
      'id_level'        => $department_id,
      'id_menu'         => $id_menu,
      'id_submenu'      => $id_submenu
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hak akses berhasil ditambah</div>');
    } else {
      $this->db->delete('user_access_menu', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hak akses berhasil dihapus</div>');
    }
  }
}
