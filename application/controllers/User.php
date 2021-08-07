<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function kelolaUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_detail', 'user_detail.user_id=user.id');
        $this->db->order_by('user.id', 'desc');
        $detail_user = $this->db->get();
        $data['user_detail'] = $detail_user->result_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Kelola User';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kelola_user', $data);
        $this->load->view('templates/footer');
    }

    public function detailUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_detail', 'user_detail.user_id=user.id');
        $this->db->where('user.id', $id);
        $detail_user = $this->db->get();
        $data['user_detail'] = $detail_user->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail User';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUser()
    {
        $username = strtolower($this->input->post('nama_lengkap'));
        $this->db->insert('user', [
            'name' => $this->input->post('nama_lengkap'),
            'username' => str_replace(' ', '', $username),
            'image' => 'default.jpg',
            'role_id' => $this->input->post('role_id')
        ]);
        $latest_user = $this->db->select('id')->from('user')->order_by('id', 'desc')->limit(1)->get();
        $id = $latest_user->row_array();
        $data = [
            'user_id' => $id['id'],
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'ttl' => $this->input->post('ttl'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw')
        ];
        $this->db->insert('user_detail', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
        redirect('kelola-user');
    }

    public function editUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_detail', 'user_detail.user_id=user.id');
        $this->db->where('user.id', $id);
        $detail_user = $this->db->get();
        $data['user_detail'] = $detail_user->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit User';
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('ttl', 'TTL', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'ttl' => $this->input->post('ttl'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
            ];
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '5048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user_detail']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('id', $id);
                    $this->db->update('user');
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->db->set($data);
            $this->db->where('user_id', $id);
            $this->db->update('user_detail');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('detail-user/' . $id);
        }
    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->db->where('user_id', $id);
        $this->db->delete('user_detail');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
        redirect('kelola-user');
    }

    public function kelolaKandidat()
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->order_by('id', 'desc');
        $detail_user = $this->db->get();
        $data['kandidat'] = $detail_user->result_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Kelola Kandidat';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kelola_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKandidat()
    {
        $data = [
            'no_kandidat' => $this->input->post('no_kandidat'),
            'nama' => $this->input->post('nama'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
        ];
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '5048';
            $config['upload_path'] = './assets/img/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data['image'] = $this->upload->data('file_name');
            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $this->db->insert('kandidat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
        redirect('kandidat');
    }

    public function editKandidat($id)
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->where('kandidat.id', $id);
        $detail_user = $this->db->get();
        $data['kandidat'] = $detail_user->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Kandidat';
        $this->form_validation->set_rules('no_kandidat', 'No Kandidat', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_kandidat', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_kandidat' => $this->input->post('no_kandidat'),
                'nama' => $this->input->post('nama'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
            ];
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '5048';
                $config['upload_path'] = './assets/img/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['kandidat']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }
                    $data['image'] = $this->upload->data('file_name');
                    $this->db->set($data);
                    $this->db->where('id', $id);
                    $this->db->update('kandidat');
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('detail-kandidat/' . $id);
        }
    }

    public function detailKandidat($id)
    {
        $this->db->select('*');
        $this->db->from('kandidat');
        $this->db->where('kandidat.id', $id);
        $detail_user = $this->db->get();
        $data['kandidat'] = $detail_user->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = '#ID Kandidat ' . $id;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function deleteKandidat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kandidat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('kandidat');
    }
}
