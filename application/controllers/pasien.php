<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('pasien_model','transaksi_model','histori_model'));
		$this->load->library('user_agent');
	}

	public function index()
	{
		$data['records'] = $this->pasien_model->get();
		$this->load->view('pasien/pasien_view', $data);
	}

	public function laporan()
	{
		$data['records'] = $this->pasien_model->get();
		$this->load->view('pasien/pasien_laporan', $data);
	}

	public function cetak_kartu($id = NULL)
	{
		$this->load->library('fpdf');
		$this->load->library('fpdi');
		if($id == NULL) redirect('pasien','refresh');

		else
		{
			$data['pasien'] = $this->pasien_model->get( $id );
			$this->load->view('pasien/cetak_kartu', $data);	
		}
	}

	public function cetak_laporan()
	{
		$this->load->library('fpdf');
		$data['records'] = $this->pasien_model->get();
		$this->load->view('pasien/cetak_laporan', $data);
	}

	public function historibulan()
	{
		$data['records'] = $this->pasien_model->get();
		$this->load->view('pasien/pasien_view_riwayatbulan',$data);
	}
	public function historilayanan()
	{
		$data['records'] = $this->pasien_model->get();
		$data['records1']=$this->layanan_model->get();
		$this->load->view('pasien/pasien_view_riwayatlayanan',$data);
	}
	public function cetak_riwayat_pasien_bulan()
	{
		$this->load->library('fpdf');
		if($this->input->post())
		{
			
			$pecah= explode( "-", $this->input->post('bulan'));
			$bulan=$pecah[0];
			
			$tahun=$pecah[1];
			
			$idpasien=$this->input->post('id_pasien');
			
			$data['records'] = $this->histori_model->getriwayatbulan($idpasien , $bulan , $tahun );
			$this->load->view('histori/historibulanview',$data);	
		}
		else
			redirect('pasien');
		
	}
	public function cetak_riwayat_pasien_bulanview()
	{
		$this->load->library('fpdf');
		if($this->input->post())
		{
			
			$datetime= explode( " ", $this->input->post('bulan'));
			$date=$datetime[0];
			$bulantime=explode("-", $date);
			$bulan=$bulantime[1];
			$tahun=$bulantime[0];
			
			$idpasien=$this->input->post('id_pasien');
			
			$data['records'] = $this->histori_model->getriwayatbulan($idpasien , $bulan , $tahun );
			$this->load->view('histori/historibulan',$data);	
		}
		else
			redirect('pasien');
		
	}
	public function cetak_riwayat_pasien_layanan()
	{
		$this->load->library('fpdf');
		if($this->input->post())
		{
			
			
			
			$idpasien=$this->input->post('id_pasien');
			$layanan=$this->input->post('layanan');
			
			$data['records'] = $this->histori_model->getriwayatlayanan($idpasien , $layanan);
			$this->load->view('histori/historilayananview',$data);	
		}
		else
			redirect('pasien');
		
	}
		public function cetak_riwayat_pasien_layananview()
	{
		$this->load->library('fpdf');
		if($this->input->post())
		{
			
			
			
			$idpasien=$this->input->post('id_pasien');
			$layanan=$this->input->post('layanan');
			
			$data['records'] = $this->histori_model->getriwayatlayanan($idpasien , $layanan);
			$this->load->view('histori/historilayanan',$data);	
		}
		else
			redirect('pasien');
		
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

			if ($this->agent->is_referral() && $this->agent->referrer() == base_url('transaksi/insert'))
			{
			    redirect('transaksi/insert');
			}
			else
			{
				redirect('pasien');
			}
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
		if($id != NULL) 
		{
			$this->db->trans_start();
			$this->pasien_model->delete($id);
			$data = $this->pasien_model->get_transaksi($id);
			foreach ($data as $value) 
			{
				$this->histori_model->delete($value['id_histori']);
				$this->transaksi_model->delete($value['id_transaksi']);
			}
			$this->db->trans_complete();
		}
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