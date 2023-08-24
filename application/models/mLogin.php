<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mLogin extends CI_Model
{
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}
	//login dokter
	public function login_dokter($username, $password)
	{
		$this->db->select('*');
		$this->db->from('dokter');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}

	//pasien
	public function registrasi($data)
	{
		$this->db->insert('pasien', $data);
	}
	public function login_pasien($username, $password)
	{
		$this->db->select('*');
		$this->db->from('pasien');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get()->row();
	}
}

/* End of file mLogin.php */
