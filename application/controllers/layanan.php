<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
	}

	public function index()
	{
		$data['records'] = $this->layanan_model->get();
		$this->load->view('layanan/layanan_view', $data);
	}

	public function insert()
	{
		if($this->input->post())
		{
			$data_layanan = array(
						   'nama_layanan'   => $this->input->post('nama_layanan'),
						   'tarif_layanan' => $this->input->post('tarif_layanan')
				);
			$this->layanan_model->insert($data_layanan);

			redirect('layanan');
		}
		else
		{
			$this->load->view('layanan/kelola_layanan');
		}
	}

	public function edit($id = NULL)
	{
		if($id == NULL) redirect('layanan','refresh');

		if($this->input->post())
		{
			$data_layanan = array(
						   'nama_layanan'   => $this->input->post('nama_layanan'),
						   'tarif_layanan' => $this->input->post('tarif_layanan')
				);
			$this->layanan_model->update($id, $data_layanan);

			redirect('layanan');
		}
		else
		{
			$data['layanan'] = $this->layanan_model->get( $id );
			$this->load->view('layanan/kelola_layanan', $data);	
		}
	}

	public function delete($id = NULL)
	{
		if($id != NULL) $this->layanan_model->delete($id);

		redirect('layanan');
	}

	public function crud()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('layanan');
		$output = $crud->render();

		$this->load->view('layanan_view_1.php', $output);
	}

}