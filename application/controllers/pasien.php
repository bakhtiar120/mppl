<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model');
	}

	public function index()
	{
		$data['records'] = $this->pasien_model->get();
		$this->load->view('pasien_view', $data);
	}

	public function insert()
	{
		if($this->input->post())
		{
			$data_pasien = array(
						   'nama_pasien'   => $this->input->post('nama_pasien'),
						   'alamat_pasien' => $this->input->post('alamat_pasien'),
						   'telp_pasien'   => $this->input->post('telp_pasien'),
						   'jk_pasien'	   => $this->input->post('jk_pasien')
				);
			$this->pasien_model->insert($data_pasien);

			redirect('pasien');
		}
		else
		{
			$this->load->view('pasien/kelola_pasien');
		}
	}

	public function edit($id = NULL)
	{
		if($id == NULL) redirect('pasien','refresh');

		if($this->input->post())
		{
			$data_pasien = array(
						   'nama_pasien'   => $this->input->post('nama_pasien'),
						   'alamat_pasien' => $this->input->post('alamat_pasien'),
						   'telp_pasien'   => $this->input->post('telp_pasien'),
						   'jk_pasien'	   => $this->input->post('jk_pasien')
				);
			$this->pasien_model->update($id, $data_pasien);

			redirect('pasien');
		}
		else
		{
			$data['pasien'] = $this->pasien_model->get( $id );
			$this->load->view('pasien/kelola_pasien', $data);	
		}
	}

	public function delete($id = NULL)
	{
		if($id != NULL) $this->pasien_model->delete($id);

		redirect('pasien');
	}

	public function crud()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pasien');
		$output = $crud->render();

		$this->load->view('pasien_view_1.php', $output);
	}

}