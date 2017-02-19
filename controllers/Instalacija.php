<?php
class Instalacija extends CI_Controller {

	public function index()
	{
		if (isset($_POST['kreiraj']))
		{
			$data = array(
				'korisnicko_ime' => $this->input->post('korisnicko_ime'),
				'lozinka' => password_hash($this->input->post('lozinka'), PASSWORD_BCRYPT),
				'tip_korisnika_tip_korisnika_id' => 1
			);
			
			$this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'required', array('required' => 'Korisničko ime je obavezno'));
			$this->form_validation->set_rules('lozinka', 'Lozinka', 'required|min_length[8]', array('required' => 'Lozinka je obavezna', 'min_length' => 'Lozinka mora biti minimalno 8 znakova'));

			if ($this->form_validation->run() != FALSE)
			{
				$this->korisnik_model->kreiraj($data);

				redirect('prijava', 'location');
			}
			
		}
		
		$this->load->view('zaglavlje');
		$this->load->view('instalacija');
		$this->load->view('podnozje');
	}
}