<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['suara'] = $this->db->select('kandidat.nama, pilihan, count(*) as suara')->from('vote')->join('kandidat', 'kandidat.id=vote.pilihan', 'inner')->group_by('pilihan')->limit('2', 'desc')->order_by('pilihan')->get()->result_array();
    //    tinggal ambil nama buat di chart
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer_dashboard');
    }
}
