<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user', ['username' => $username])->row_array();
            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username is not registered!</div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_username')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $username = $this->session->userdata('reset_username');
            $this->db->set('password', $password);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->unset_userdata('reset_username');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }

    public function loginUser()
    {
        if($this->session->userdata('nik')){
            redirect('welcome');
        }
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login User';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login_user');
            $this->load->view('templates/auth_footer');
        } else {
            $nik = $this->input->post('nik');
            $user = $this->db->get_where('user_detail', ['nik' => $nik])->row_array();
            if ($nik == $user['nik']) {
                $data['nik'] = $user['nik'];
                $this->session->set_userdata($data);
                redirect('welcome');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        }
    }

    public function logoutUser()
    {
        $this->session->unset_userdata('nik');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima kasih :)</div>');
        redirect('welcome');
    }
}
