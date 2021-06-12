<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belum_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model("M_user");
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data = [

            'nama_menu' => 'setup',
            'judul'     => 'Users',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'data_user' => $this->M_user->getAll($id_user)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('setup/user/index');
        $this->load->view('templates/footer');
    }

    public function create_user()
    {
        $data = [

            'nama_menu' => 'setup',
            'judul'         => 'Create User',
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'department'    => $this->db->get('department')->result_array()
        ];

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('department_id', 'Department_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('setup/user/create');
            $this->load->view('templates/footer');
        } else {
            $image = $_FILES['image'];
            if ($image = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $image   = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Image</div>');
                    redirect('setup/user');
                }
            }
            $data = [
                'fullname'          => $this->input->post('fullname'),
                'username'          => $this->input->post('username'),
                'email'             => $this->input->post('email'),
                'no_telp'           => $this->input->post('phone'),
                'password'          => $this->input->post('password1'),
                'image'             => $image,
                'department_id'     => $this->input->post('department_id'),
                'created_date'      => time(),
                'created_by'        => $this->session->userdata('fullname')
            ];
            $this->db->insert('user', $data);
            redirect('setup/user');
        }
    }

    public function edit_user($id_user)
    {
        $data = [

            'nama_menu' => 'setup',
            'judul'         => 'Edit User',
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'data_user'     => $this->db->get_where('user', ['id_user' => $id_user])->row_array(),
            'department'    => $this->db->get('department')->result_array()
        ];

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1', 'trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password1]');
        $this->form_validation->set_rules('department_id', 'Department_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('setup/user/edit');
            $this->load->view('templates/footer');
        } else {
            $id_user          = $this->input->post('id_user');
            $fullname         = $this->input->post('fullname');
            $username         = $this->input->post('username');
            $email            = $this->input->post('email');
            $no_telp          = $this->input->post('phone');
            $password         = $this->input->post('password1');
            $department_id    = $this->input->post('department_id');

            $image = $_FILES['image'];
            if ($image = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_gambar         = $data['data_user']['image'];
                    if ($old_gambar     != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_gambar);
                    }
                    $image   = $this->upload->data('file_name');
                    $this->db->set('image', $image);
                } else {
                    $this->db->set('fullname', $fullname);
                    $this->db->set('username', $username);
                    $this->db->set('email', $email);
                    $this->db->set('no_telp', $no_telp);
                    if (!empty($password)) {
                        $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
                    }
                    $this->db->set('department_id', $department_id);
                    $this->db->where('id_user', $id_user);
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berhasil diubah</div>');
                    redirect('setup/user/edit_user/' . $id_user);
                }
            }

            $this->db->set('fullname', $fullname);
            $this->db->set('username', $username);
            $this->db->set('email', $email);
            $this->db->set('no_telp', $no_telp);
            if (!empty($password)) {
                $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
            }
            $this->db->set('department_id', $department_id);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');
            redirect('setup/user');
        }
    }

    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
        redirect('setup/user');
    }
}
