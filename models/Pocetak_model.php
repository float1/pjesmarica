<?php
class Pocetak_model extends CI_Model {

	public function izvodjaci_abecedno($slovo)
	{
		$this->db->like('naziv', $slovo, 'after');
        $query = $this->db->get('izvodjac');

        return $query->result(); 
	}

	public function svi_izvodjaci_za_izbornik()
	{
		$this->db->order_by('naziv', 'ASC');
		
		$query = $this->db->get('izvodjac');

		return $query->result();
	}

	public function sve_pjesme_izvodjaca($id)
	{
		$query = $this->db->select('p.pjesma_id, p.naslov')
			->from('pjesma p')
			->join('izvodi_pjesmu ip', 'p.pjesma_id=ip.pjesma_pjesma_id', 'left')
			->join('izvodjac i', 'i.izvodjac_id=ip.izvodjac_izvodjac_id', 'left')
    		->where('izvodjac_id', $id)
    		->get();
        
        //print_r($query->result());
    	return $query->result();
	}
}