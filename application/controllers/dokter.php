<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model');
	}

	public function index()
	{
		$data['records'] = $this->dokter_model->get();
		$this->load->view('dokter/dokter_view', $data);
	}

	public function laporan()
	{
		$data['records'] = $this->dokter_model->get();
		$this->load->view('dokter/dokter_laporan', $data);
	}

	public function cetak_laporan()
	{
		$this->load->library('fpdf');
		$data['records'] = $this->dokter_model->get();
		$this->load->view('dokter/cetak_laporan', $data);
	}

	public function insert()
	{
		if($this->input->post())
		{
			$data_dokter = array(
						   'nama_dokter'   => $this->input->post('nama_dokter'),
						   'alamat_dokter' => $this->input->post('alamat_dokter'),
						   'telp_dokter'   => $this->input->post('telp_dokter')
				);
			$this->dokter_model->insert($data_dokter);

			redirect('dokter');
		}
		else
		{
			$this->load->view('dokter/kelola_dokter');
		}
	}

	public function edit($id = NULL)
	{
		if($id == NULL) redirect('dokter','refresh');

		if($this->input->post())
		{
			$data_dokter = array(
						   'nama_dokter'   => $this->input->post('nama_dokter'),
						   'alamat_dokter' => $this->input->post('alamat_dokter'),
						   'telp_dokter'   => $this->input->post('telp_dokter')
				);
			$this->dokter_model->update($id, $data_dokter);

			redirect('dokter');
		}
		else
		{
			$data['dokter'] = $this->dokter_model->get( $id );
			$this->load->view('dokter/kelola_dokter', $data);	
		}
	}

	public function delete($id = NULL)
	{
		if($id != NULL) $this->dokter_model->update($id, array('flag_delete' => '1'));

		redirect('dokter');
	}

	public function crud()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pasien');
		$output = $crud->render();

		$this->load->view('pasien_view_1.php', $output);
	}

}