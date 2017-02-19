<?php
class Pocetak extends CI_Controller {

	public function index()
	{
		if (isset($_SESSION['korisnik_id']))
		{
			$data['korisnik'] = $this->korisnik_model->jedan_korisnik($_SESSION['korisnik_id']);

			$this->load->view('zaglavlje', $data);
			$this->load->view('pocetak');
			$this->load->view('podnozje');
		}
		else
		{

			$this->load->view('zaglavlje');
			$this->load->view('pocetak');
			$this->load->view('podnozje');
		}
		

		
	}

	public function abc($slovo)
	{
		if (isset($_SESSION['korisnik_id']))
		{
			$data['izvodjaci_abc'] = $this->pocetak_model->izvodjaci_abecedno($slovo);
			$data['korisnik'] = $this->korisnik_model->jedan_korisnik($_SESSION['korisnik_id']);

			$this->load->view('zaglavlje', $data);
			$this->load->view('pocetak', $data);
			$this->load->view('podnozje');
		}
		else
		{
			$data['izvodjaci_abc'] = $this->pocetak_model->izvodjaci_abecedno($slovo);
			

			$this->load->view('zaglavlje');
			$this->load->view('pocetak', $data);
			$this->load->view('podnozje');
		}
		
	}

	public function tab($id)
	{
		if (isset($_SESSION['korisnik_id']))
		{
			$data['tab'] = $this->pjesma_model->jedna_pjesma_tab($id);
			$data['korisnik'] = $this->korisnik_model->jedan_korisnik($_SESSION['korisnik_id']);

			$this->load->view('zaglavlje', $data);
			$this->load->view('pocetak', $data);
			$this->load->view('podnozje');
		}
		else
		{
			$data['tab'] = $this->pjesma_model->jedna_pjesma_tab($id);

			$this->load->view('zaglavlje');
			$this->load->view('pocetak', $data);
			$this->load->view('podnozje');
		}
		

	}

	public function pjesme($id)
	{
		if (isset($_SESSION['korisnik_id']))
		{
			$data['korisnik'] = $this->korisnik_model->jedan_korisnik($_SESSION['korisnik_id']); 
			$data['pjesme_izvodjaca'] = $this->pocetak_model->sve_pjesme_izvodjaca($id);

			$this->load->view('zaglavlje', $data);
			$this->load->view('pocetak', $data);
			$this->load->view('podnozje');
		}
		else
		{
			$data['pjesme_izvodjaca'] = $this->pocetak_model->sve_pjesme_izvodjaca($id);

			$this->load->view('zaglavlje');
			$this->load->view('pocetak', $data);
			$this->load->view('podnozje');
		}
		
	}
}