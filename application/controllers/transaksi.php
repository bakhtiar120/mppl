<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('dokter_model');
		$this->load->model('pasien_model');
		$this->load->model('layanan_model');
		$this->load->model('histori_model');
	}

	public function index()
	{
		$data['records'] = $this->transaksi_model->get();
		foreach ($data['records'] as $key => $value) 
		{
			$data['records'][$key]['layanan'] = $this->histori_model->get_histori_layanan($value['id_histori']);
			$data['records'][$key]['total_pembayaran'] = $this->transaksi_model->get_pembayaran($value['id_transaksi']);
		}
		$this->load->view('transaksi/transaksi_view', $data);
	}

	public function laporan()
	{
		$data['records'] = $this->transaksi_model->get();
		foreach ($data['records'] as $key => $value) 
		{
			$data['records'][$key]['layanan'] = $this->histori_model->get_histori_layanan($value['id_histori']);
			$data['records'][$key]['total_pembayaran'] = $this->transaksi_model->get_pembayaran($value['id_transaksi']);
		}
		$this->load->view('transaksi/transaksi_laporan', $data);
	}

	public function cetak_laporan()
	{
		$this->load->library('fpdf');
		if($this->input->post())
		{
			$pecah= explode( "-", $this->input->post('bulan'));
			$bulan=$pecah[0];
			$tahun=$pecah[1];
			$data['records'] = $this->transaksi_model->getlaporan( $bulan,$tahun );
			foreach ($data['records'] as $key => $value) 
			{
				$data['records'][$key]['layanan'] = $this->transaksi_model->getlayanan($value['id_histori']);
				$data['records'][$key]['total_pembayaran'] = $this->transaksi_model->get_pembayaran($value['id_transaksi']);
			}
			$this->load->view('transaksi/cetak_laporan', $data);	
		}
		else
			redirect('transaksi/laporan');
	}
	public function cetak_kuitansi($id = NULL)
	{
		$this->load->library('fpdf');
		if($id != NULL)
		{
			$data['records'] = $this->transaksi_model->get($id);
			$data['records']['layanan'] = $this->transaksi_model->getlayanan($data['records']['id_histori']);
			$data['records']['total_pembayaran'] = $this->transaksi_model->get_pembayaran($data['records']['id_transaksi']);
			$this->load->view('transaksi/cetak_kuitansi', $data);	
		}
		else
			redirect('transaksi');
	}

	public function insert()
	{
		if($this->input->post())
		{
			$data_transaksi = array(
						   'id_pasien'   => $this->input->post('id_pasien'),
						   'id_dokter' => $this->input->post('id_dokter')
				);
			$this->transaksi_model->insert($data_transaksi);

			redirect('transaksi');
		}
		else
		{
			$data['pasien'] = $this->pasien_model->get();
			$data['dokter'] = $this->dokter_model->get();

			$this->load->view('transaksi/kelola_transaksi', $data);
		}
	}

	public function edit($id = NULL)
	{
		if($id == NULL) redirect('transaksi','refresh');

		if($this->input->post())
		{
			$data_transaksi = array(
						   'id_pasien'   => $this->input->post('id_pasien'),
						   'id_dokter' => $this->input->post('id_dokter')
				);
			$this->transaksi_model->update($id, $data_transaksi);

			redirect('transaksi');
		}
		else
		{
			$data['pasien'] = $this->pasien_model->get();
			$data['dokter'] = $this->dokter_model->get();
			$data['transaksi'] = $this->transaksi_model->get( $id );
			$data['transaksi']['layanan'] = $this->histori_model->get_histori_layanan($data['transaksi']['id_histori']);
			$data['transaksi']['total_pembayaran'] = $this->transaksi_model->get_pembayaran($data['transaksi']['id_transaksi'])['total_pembayaran'];
			

			$this->load->view('transaksi/kelola_transaksi', $data);	
		}
	}

	public function delete($id = NULL)
	{
		if($id != NULL) $this->transaksi_model->delete($id);

		redirect('transaksi');
	}

	public function crud()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pasien');
		$output = $crud->render();

		$this->load->view('pasien_view_1.php', $output);
	}

}