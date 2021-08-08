<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['paslon'] = $this->db->select('*')->from('kandidat')->get()->result_array();
		$data['count_vote_x'] = $this->db->select('count(*) as vote_x')->from('user_detail')->where('vote_status', 0)->get()->row_array();
		$data['count_vote_o'] = $this->db->select('count(*) as vote_o')->from('user_detail')->where('vote_status', 1)->get()->row_array();
		$data['user'] = $this->db->get_where('user_detail', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Home';
		$this->load->view('templates/home_header', $data);
		$this->load->view('home', $data);
		$this->load->view('templates/home_footer');
	}
}
