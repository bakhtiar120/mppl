<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Histori extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('histori_model');
		$this->load->model('transaksi_model');
		$this->load->model('pasien_model');
		$this->load->model('layanan_model');
		$this->load->library('user_agent');
	}

	public function index($id_pasien)
	{
		$data['pasien'] = $this->pasien_model->get($id_pasien);
		$data['records'] = $this->transaksi_model->get_transaksi_pasien($id_pasien);
		foreach ($data['records'] as $key => $value) 
		{
			$data['records'][$key]['histori'] = $this->histori_model->get_histori_transaksi($value['id_transaksi']);
			$data['records'][$key]['layanan'] = $this->histori_model->get_histori_layanan($value['id_histori']);
		}

		$this->load->view('histori/histori_view', $data);
	}

	public function insert($id = NULL, $id_pasien = NULL)
	{
		if($this->input->post())
		{
			$data_histori = array(
						   'resep'   	=> $this->input->post('resep'),
						   'catatan'	=> $this->input->post('catatan')
				);
			$this->histori_model->insert($data_histori);
			$id_histori = $this->histori_model->get_last_id()['id_histori'];
			$this->transaksi_model->update($id, array('id_histori' => $id_histori));

			foreach ($this->input->post('layanan') as $key => $value) 
			{
				$data_detail_histori = array(
					'id_histori' => $id_histori,
					'id_layanan' => $value
					);
				$this->histori_model->insert_detail($data_detail_histori);	
			}

			if ($this->agent->is_referral() && $this->agent->referrer() == base_url('transaksi/insert'))
			{
			    redirect('transaksi/insert');
			}
			else
			{
				redirect('histori/index/'.$id_pasien);
			}
		}
		else
		{
			$data['pasien'] = $this->pasien_model->get( $id_pasien );
			$data['layanan'] = $this->layanan_model->get();
			$this->load->view('histori/kelola_histori', $data);
		}
	}

	public function get_last()
	{
		echo $this->histori_model->get_last_id()['id_histori'];
	}

	public function edit($id = NULL, $id_pasien = NULL)
	{
		if($id == NULL || $id_pasien == NULL) redirect('histori','refresh');

		if($this->input->post())
		{
			$data_histori = array(
						   'catatan'   		=> $this->input->post('catatan'),
						   'resep' 			=> $this->input->post('resep')
				);
			$this->histori_model->update($id, $data_histori);

			redirect('histori/index/'.$id_pasien);
		}
		else
		{
			$data['pasien'] = $this->pasien_model->get( $id_pasien );
			$data['layanan'] = $this->layanan_model->get();
			$data['histori'] = $this->histori_model->get( $id );
			$data['histori']['layanan'] = $this->histori_model->get_histori_layanan($data['histori']['id_histori']);
			
			$this->load->view('histori/kelola_histori', $data);	
		}
	}
	public function cetak_resep($id = NULL)
	{
		$this->load->library('fpdf');
		if($id != NULL)
		{
			$data['records'] = $this->histori_model->getResep($id);
			$this->load->view('histori/cetak_resep', $data);	
		}
		else
			redirect('histori');
	}

	public function delete($id = NULL)
	{
		if($id != NULL) $this->histori_model->delete($id);

		redirect('histori');
	}

	public function crud()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('histori');
		$output = $crud->render();

		$this->load->view('histori_view_1.php', $output);
	}

}