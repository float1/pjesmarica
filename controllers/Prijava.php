<?php
class Prijava extends CI_Controller {

	public function index()
	{
		$this->load->view('zaglavlje');
		$this->load->view('prijava');
		$this->load->view('podnozje');
	}

	public function provjera()
	{
		$this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'required', array('required' => 'Korisničko ime je obavezno.'));
		$this->form_validation->set_rules('lozinka', 'Lozinka', 'required', array('required' => 'Lozinka je obavezna.'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$data['korisnicko_ime'] = $this->input->post('korisnicko_ime');
			$data['lozinka'] = $this->input->post('lozinka');

			$korisnik = $this->prijava_model->dobavi_korisnika($data['korisnicko_ime']);

			if (password_verify($data['lozinka'], $korisnik['lozinka']))
			{
				session_start();
				$_SESSION['tip_id'] = $korisnik['tip_korisnika_tip_korisnika_id'];
				$_SESSION['korisnik_id'] = $korisnik['korisnik_id'];
				$_SESSION['korisnicko_ime'] = $korisnik['korisnicko_ime'];
				redirect('pocetak', 'location');
			}
			else
			{
				redirect('prijava', 'location');
			}
		}
		

	}

	public function odjava()
	{
		unset($_SESSION['korisnicko_ime']);
		session_destroy();

		redirect('prijava', 'location');
	}
}