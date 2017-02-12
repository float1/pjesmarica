<?php
class Izvodjac extends CI_Controller {

	public function index()
	{
		$config['base_url'] = base_url().'index.php/izvodjac/';
		$config['total_rows'] = $this->izvodjac_model->broji_izvodjace();
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
		$data['izvodjaci'] = $this->izvodjac_model->paginacija_izvodjaci($config['per_page'], $this->uri->segment(2));
		$data['paginacija'] = $this->pagination->create_links();
		$data['broj_izvodjaca'] = $this->izvodjac_model->broji_izvodjace();

		$this->load->view('zaglavlje');
		$this->load->view('izvodjaci', $data);
		$this->load->view('podnozje');
	}

		public function kreiraj()
	{
		if (isset($_POST['kreiraj']))
		{
			$data = array(
				'naziv' => $this->input->post('naziv')
			);

			$this->form_validation->set_rules('naziv', 'Naziv', 'required|is_unique[izvodjac.naziv]', array('required' => 'Naziv je obavezan', 'is_unique' => 'Naziv već postoji'));
			

			if ($this->form_validation->run() != FALSE)
			{
				$this->izvodjac_model->kreiraj($data);

				redirect('izvodjac', 'location');
			}
			
		}

		

		$this->load->view('zaglavlje');
		$this->load->view('izvodjac_kreiraj');
		$this->load->view('podnozje');
	}

	public function uredi($id)
	{
		if (isset($_POST['azuriraj']))
		{
			$data = array(
				'naziv' => $this->input->post('naziv')
			);

			$izvodjac['izvodjac'] = $this->izvodjac_model->jedan_izvodjac($id);

			if ($data['naziv'] != $izvodjac['izvodjac']['naziv'])
			{
				$is_unique_naziv = '|is_unique[izvodjac.naziv]';
			}
			else
			{
				$is_unique_naziv = '';
			}

			$this->form_validation->set_rules('naziv', 'Naziv', 'required'.$is_unique_naziv, array('required' => 'Naziv je obavezan', 'is_unique' => 'Naziv već postoji'));

			if ($this->form_validation->run() != FALSE)
			{
				$this->izvodjac_model->azuriraj($id, $data);

				redirect('izvodjac', 'location');
			}
		}
		

		$data['izvodjac'] = $this->izvodjac_model->jedan_izvodjac($id);

		$this->load->view('zaglavlje');
		$this->load->view('izvodjac_uredi', $data);
		$this->load->view('podnozje');
	}

	public function brisi($id)
	{
		$this->izvodjac_model->brisanje($id);

		redirect('izvodjac', 'location');
	}
}