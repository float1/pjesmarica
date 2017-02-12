<?php
class Korisnik_model extends CI_Model {

	public function svi_korisnici()
	{
		$query = $this->db->get('korisnik');

		return $query->result();
	}

	public function jedan_korisnik($id)
	{
		$query = $this->db->get_where('korisnik', array('korisnik_id' => $id));

		return $query->row_array();
	}

	public function kreiraj($data)
	{
		$this->db->insert('korisnik', $data);
	}

	public function azuriraj($id, $data)
	{
		$this->db->where('korisnik_id', $id);
		$this->db->update('korisnik', $data);
	}

	public function brisanje($id)
	{
		$this->db->where('korisnik_id', $id);
		$this->db->delete('korisnik');
	}

	public function dobavi_tipove_korisnika()
	{
		$query = $this->db->get('tip_korisnika');

		return $query->result();
	}
}