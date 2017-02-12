<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prijava_model extends CI_Model {

	public function dobavi_korisnika($korisnicko_ime)
	{
		$query = $this->db->get_where('korisnik', array('korisnicko_ime' => $korisnicko_ime));

		return $query->row_array();
	}
}