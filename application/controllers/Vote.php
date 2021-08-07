<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Pemilihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['vote'] = $this->db->select()->from('vote')->join('user', 'user.id=vote.user_id')->join('kandidat', 'kandidat.id=vote.pilihan')->get()->result_array();
        $data['user_status'] = $this->db->select('*')->from('user_detail')->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('vote/index', $data);
        $this->load->view('templates/footer');
	}
}
