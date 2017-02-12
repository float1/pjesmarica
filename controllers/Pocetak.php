<?php
class Pocetak extends CI_Controller {

	public function index()
	{
		//$data['izvodjaci_abc'] = $this->pocetak_model->izvodjaci_abecedno();
		//$data['izvodjaci_za_izbornik'] = $this->pocetak_model->svi_izvodjaci_za_izbornik();

		$this->load->view('zaglavlje');
		$this->load->view('pocetak');
		$this->load->view('podnozje');
	}

	public function abc($slovo)
	{
		$data['izvodjaci_abc'] = $this->pocetak_model->izvodjaci_abecedno($slovo);

		$this->load->view('zaglavlje');
		$this->load->view('pocetak', $data);
		$this->load->view('podnozje');
	}

	public function tab($id)
	{
		$data['tab'] = $this->pjesma_model->jedna_pjesma_tab($id);

		$this->load->view('zaglavlje');
		$this->load->view('pocetak', $data);
		$this->load->view('podnozje');

	}

	public function pjesme($id)
	{
		$data['pjesme_izvodjaca'] = $this->pocetak_model->sve_pjesme_izvodjaca($id);

		$this->load->view('zaglavlje');
		$this->load->view('pocetak', $data);
		$this->load->view('podnozje');
	}
}