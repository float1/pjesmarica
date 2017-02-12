<?php
class Pjesma_model extends CI_Model {

	public function broji_pjesme() {

    	return $this->db->count_all('pjesma');
    }

    public function paginacija_pjesme($limit=10, $offset=0) {

    	$query = $this->db->select('p.pjesma_id, p.naslov, i.naziv')
			->from('pjesma p')
			->join('izvodi_pjesmu ip', 'p.pjesma_id=ip.pjesma_pjesma_id', 'left')
			->join('izvodjac i', 'i.izvodjac_id=ip.izvodjac_izvodjac_id', 'left')
    		->limit($limit, $offset)
    		->get();
        
    	return $query->result();
    	//print_r($query->result());
    	//echo $this->db->last_query();
    }

    public function jedna_pjesma($id)
    {
    	$query = $this->db->select('p.pjesma_id, p.naslov, p.tablatura, i.naziv, i.izvodjac_id')
			->from('pjesma p')
			->join('izvodi_pjesmu ip', 'p.pjesma_id=ip.pjesma_pjesma_id', 'left')
			->join('izvodjac i', 'i.izvodjac_id=ip.izvodjac_izvodjac_id', 'left')
    		->where('pjesma_id', $id)
    		->get();
        
        //print_r($query->result());
    	return $query->row_array();
    }

    public function jedna_pjesma_tab($id)
    {
    	$query = $this->db->select('p.pjesma_id, p.naslov, p.tablatura, i.naziv, i.izvodjac_id')
			->from('pjesma p')
			->join('izvodi_pjesmu ip', 'p.pjesma_id=ip.pjesma_pjesma_id', 'left')
			->join('izvodjac i', 'i.izvodjac_id=ip.izvodjac_izvodjac_id', 'left')
    		->where('pjesma_id', $id)
    		->get();
        
        //print_r($query->result());
    	return $query->row_array();
    }

    public function kreiraj($data)
	{
		$this->db->insert('pjesma', $data);

		return $this->db->insert_id();
	}

	public function izvodi_pjesmu($data)
	{
		$this->db->insert('izvodi_pjesmu', $data);
	}

	public function azuriraj($pjesma_id, $data, $izvodjac_id)
	{
		$this->db->where('pjesma_id', $pjesma_id);
		$this->db->update('pjesma', $data);

		$this->db->set('ip.izvodjac_izvodjac_id', $izvodjac_id);
		$this->db->where('ip.pjesma_pjesma_id', $pjesma_id);
		$this->db->update('izvodi_pjesmu as ip');
	}

	public function brisanje($id)
	{
		
		$this->db->where('pjesma_pjesma_id', $id);
		$this->db->delete('izvodi_pjesmu');

		$this->db->where('pjesma_id', $id);
		$this->db->delete('pjesma');
	}
}