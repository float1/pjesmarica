<?php
class Izvodjac_model extends CI_Model {

	public function svi_izvodjaci()
	{
		$query = $this->db->get('izvodjac');

		return $query->result();
	}

	public function kreiraj($data)
	{
		$this->db->insert('izvodjac', $data);
	}

	public function azuriraj($id, $data)
	{
		$this->db->where('izvodjac_id', $id);
		$this->db->update('izvodjac', $data);
	}

	public function brisanje($id)
	{
		$this->db->where('izvodjac_id', $id);
		$this->db->delete('izvodjac');
	}

	public function broji_izvodjace() {

    	return $this->db->count_all('izvodjac');
    }

    public function jedan_izvodjac($id)
	{
		$query = $this->db->get_where('izvodjac', array('izvodjac_id' => $id));

		return $query->row_array();
	}

    public function paginacija_izvodjaci($limit, $offset) {
    	$this->db->limit($limit, $offset);
    	$query = $this->db->get('izvodjac');
        
    	return $query->result();
    }
}