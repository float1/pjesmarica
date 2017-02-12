<?php
class Pjesma extends CI_Controller {

	public function index()
	{
		$config['base_url'] = base_url().'index.php/pjesma/';
		$config['total_rows'] = $this->pjesma_model->broji_pjesme();
		$config['per_page'] = 5;
		$config['first_link'] = 'Prvo';
		$config['last_link'] = 'Posljednje';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$data['pjesme'] = $this->pjesma_model->paginacija_pjesme($config['per_page'], $this->uri->segment(2));
		$data['paginacija'] = $this->pagination->create_links();
		$data['broj_pjesama'] = $this->pjesma_model->broji_pjesme();


		$this->load->view('zaglavlje');
		$this->load->view('pjesme', $data);
		$this->load->view('podnozje');
	}

	public function kreiraj()
	{
		if (isset($_POST['kreiraj']))
		{
			$data = array(
				'naslov' => $this->input->post('naslov'),
				'tablatura' => $this->input->post('tablatura'),
				'korisnik_korisnik_id' => $_SESSION['korisnik_id']
			);

			

            $this->form_validation->set_rules('izvodjaci','Izvođači','required|callback_check_default');
  			$this->form_validation->set_message('check_default', 'Morate odabrati izvođača');
			$this->form_validation->set_rules('naslov', 'Naslov', 'required', array('required' => 'Naslov je obavezan'));
			$this->form_validation->set_rules('tablatura', 'Tablatura', 'required', array('required' => 'Tablatura je obavezna'));
			

			if ($this->form_validation->run() != FALSE)
			{
				$pjesma_id = $this->pjesma_model->kreiraj($data);

				$data = array(
					'izvodjac_izvodjac_id' => $this->input->post('izvodjaci'),
					'pjesma_pjesma_id' => $pjesma_id
				);

				$this->pjesma_model->izvodi_pjesmu($data);

				redirect('pjesma', 'location');
			}
			
		}

		$data['izvodjaci'] = $this->izvodjac_model->svi_izvodjaci();

		$this->load->view('zaglavlje');
		$this->load->view('pjesma_kreiraj', $data);
		$this->load->view('podnozje');
	}

	function check_default($post_string)
	{
  		return $post_string == '0' ? FALSE : TRUE;
	}

	public function uredi($id)
	{
		if (isset($_POST['azuriraj']))
		{
			$data = array(
				'naslov' => $this->input->post('naslov'),
				'tablatura' => $this->input->post('tablatura'),
				'korisnik_korisnik_id' => $_SESSION['korisnik_id']
			);

			

            $this->form_validation->set_rules('izvodjaci','Izvođači','required|callback_check_default');
  			$this->form_validation->set_message('check_default', 'Morate odabrati izvođača');
			$this->form_validation->set_rules('naslov', 'Naslov', 'required', array('required' => 'Naslov je obavezan'));
			$this->form_validation->set_rules('tablatura', 'Tablatura', 'required', array('required' => 'Tablatura je obavezna'));
			

			if ($this->form_validation->run() != FALSE)
			{
				
				$izvodjac_id = $this->input->post('izvodjaci');
					
				$this->pjesma_model->azuriraj($id, $data, $izvodjac_id);


				redirect('pjesma', 'location');
			}
			
		}

		$data['pjesma'] = $this->pjesma_model->jedna_pjesma($id);
		$data['izvodjaci'] = $this->izvodjac_model->svi_izvodjaci();

		$this->load->view('zaglavlje');
		$this->load->view('pjesma_uredi', $data);
		$this->load->view('podnozje');
	}

	public function brisi($id)
	{
		$this->pjesma_model->brisanje($id);

		redirect('pjesma', 'location');
	}
}