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
        $data = [
            'judul'        => 'User',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'data_user' => $this->M_user->getAll()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('tech/user');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'judul'         => 'SISTEM TA',
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
            $this->load->view('tech/create_user');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'fullname'          => $this->input->post('fullname'),
                'username'          => $this->input->post('username'),
                'email'             => $this->input->post('email'),
                'no_telp'           => $this->input->post('phone'),
                'password'          => $this->input->post('password1'),
                'image'             => 'default.png',
                'department_id'     => $this->input->post('department_id'),
                'created_date'      => time(),
                'created_by'        => $this->session->userdata('fullname')
            ];
            $this->db->insert('user', $data);
            redirect('tech/user');
        }
    }

    public function edit($id_user)
    {
        $data = [
            'judul'         => 'SISTEM TA',
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'data_user'     => $this->db->get_where('user', ['id_user' => $id_user])->row_array(),
            'department'    => $this->db->get('department')->result_array()
        ];

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1', 'trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password1]');
        $this->form_validation->set_rules('department_id', 'Department_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('tech/edit_user');
            $this->load->view('templates/footer');
        } else {
            $id_user          = $this->input->post('id_user');
            $fullname         = $this->input->post('fullname');
            $username         = $this->input->post('username');
            $email            = $this->input->post('email');
            $no_telp          = $this->input->post('phone');
            $password         = $this->input->post('password1');
            $image            = 'default.png';
            $department_id    = $this->input->post('department_id');
            $this->db->set('fullname', $fullname);
            $this->db->set('username', $username);
            $this->db->set('email', $email);
            $this->db->set('no_telp', $no_telp);
            if (!empty($password)) {
                $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
            }
            $this->db->set('image', $image);
            $this->db->set('department_id', $department_id);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');
            redirect('tech/user');
        }
    }

    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
        redirect('tech/user');
    }
}
