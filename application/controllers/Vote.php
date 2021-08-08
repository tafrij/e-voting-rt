<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Pemilihan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['vote'] = $this->db->select()->from('vote')->join('user', 'user.id=vote.user_id')->join('kandidat', 'kandidat.id=vote.pilihan')->get()->result_array();
		$data['user_status'] = $this->db->select('*')->from('user_detail')->get()->result_array();
		$data['count_vote_x'] = $this->db->select('count(*) as vote_x')->from('user_detail')->where('vote_status', 0)->get()->row_array();
		$data['count_vote_o'] = $this->db->select('count(*) as vote_o')->from('user_detail')->where('vote_status', 1)->get()->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('vote/index', $data);
		$this->load->view('templates/footer');
	}

	public function voteKandidat($id)
	{
		$user = $this->db->get_where('user_detail', ['nik' => $this->session->userdata('nik')])->row_array();
		$periode = date('Y');
		$this->db->insert('vote', ['user_id' => $user['user_id'], 'pilihan' => $id, 'periode' => $periode]);
		$this->db->set(['vote_status' => 1, 'waktu_pemilihan' => date('Y-m-d H:i:s')]);
		$this->db->where('user_id', $user['user_id']);
		$this->db->update('user_detail');
 	}
}
