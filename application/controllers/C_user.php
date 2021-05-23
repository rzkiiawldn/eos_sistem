<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_user");
        $this->load->library('form_validation');
        $data['user'] = $this->M_user->getAll();
    }

    public function index()
    {
        $data['user'] = $this->M_user->getAll();
        $data['judul'] = 'SISTEM TA';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('department_id', 'Department_id', 'required');

        if ($this->form_validation->run() == false) 
        {
            $data['judul'] = 'SISTEM TA';
            $data['department'] = $this->db->get('department')->result_array();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('user/create');
            $this->load->view('templates/footer');
        }
        else 
        {
            $data = [
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('phone'),
                'password' => $this->input->post('password1'),
                'image' => 'default.png',
                'department_id' => $this->input->post('department_id'),
                'created_date' => time(),
                'created_by' => $this->session->userdata('fullname')
            ];
            // echo var_dump($data);exit;
            $this->db->insert('user', $data);
            redirect('c_user');
        }
    }
}