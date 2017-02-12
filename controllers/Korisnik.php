<?php
class Korisnik extends CI_Controller {

	public function index()
	{
		$data['korisnici'] = $this->korisnik_model->svi_korisnici();
		$data['broj_korisnika'] = count($data['korisnici']);

		$this->load->view('zaglavlje');
		$this->load->view('korisnici', $data);
		$this->load->view('podnozje');
	}

	public function kreiraj()
	{
		if (isset($_POST['kreiraj']))
		{
			$data = array(
				'korisnicko_ime' => $this->input->post('korisnicko_ime'),
				'lozinka' => password_hash($this->input->post('lozinka'), PASSWORD_BCRYPT),
				'tip_korisnika_tip_korisnika_id' => $this->input->post('tip_korisnika')
			);

			$this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'required|is_unique[korisnik.korisnicko_ime]', array('required' => 'Korisničko ime je obavezno', 'is_unique' => 'Korisničko ime već postoji'));
			$this->form_validation->set_rules('lozinka', 'Lozinka', 'required|min_length[8]', array('required' => 'Lozinka je obavezna', 'min_length' => 'Lozinka mora biti minimalno 8 znakova'));

			if ($this->form_validation->run() != FALSE)
			{
				$this->korisnik_model->kreiraj($data);

				redirect('korisnik', 'location');
			}
			
		}

		$data['tipovi_korisnika'] = $this->korisnik_model->dobavi_tipove_korisnika();

		$this->load->view('zaglavlje');
		$this->load->view('korisnik_kreiraj', $data);
		$this->load->view('podnozje');
	}

	public function uredi($id)
	{
		if (isset($_POST['azuriraj']))
		{
			$data = array(
				'korisnicko_ime' => $this->input->post('korisnicko_ime'),
				'tip_korisnika_tip_korisnika_id' => $this->input->post('tip_korisnika')
			);

			$korisnik['korisnik'] = $this->korisnik_model->jedan_korisnik($id);

			if ($data['korisnicko_ime'] != $korisnik['korisnik']['korisnicko_ime'])
			{
				$is_unique_korisnicko_ime = '|is_unique[korisnik.korisnicko_ime]';
			}
			else
			{
				$is_unique_korisnicko_ime = '';
			}

			$this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'required'.$is_unique_korisnicko_ime, array('required' => 'Korisničko ime je obavezno', 'is_unique' => 'Korisničko ime već postoji'));

			if ($this->form_validation->run() != FALSE)
			{
				$this->korisnik_model->azuriraj($id, $data);

				redirect('korisnik', 'location');
			}
		}
		

		$data['korisnik'] = $this->korisnik_model->jedan_korisnik($id);
		$data['tipovi_korisnika'] = $this->korisnik_model->dobavi_tipove_korisnika();

		$this->load->view('zaglavlje');
		$this->load->view('korisnik_uredi', $data);
		$this->load->view('podnozje');
	}

	public function brisi($id)
	{
		$this->korisnik_model->brisanje($id);

		redirect('korisnik', 'location');
	}
}