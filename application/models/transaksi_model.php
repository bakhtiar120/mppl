<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_Model extends CI_Model
{
	public function get($id = NULL)
	{
		if($id == NULL)
		{
			$sql = "SELECT t.id_transaksi, t.tanggal_transaksi, t.id_histori, p.nama_pasien , d.nama_dokter FROM transaksi t, pasien p, dokter d WHERE t.id_dokter = d.id_dokter AND t.id_pasien = p.id_pasien";
			return $this->db->query($sql)->result_array();
		}
		else
		{
			$sql = "SELECT t.id_transaksi, t.tanggal_transaksi, t.id_histori, p.id_pasien, p.nama_pasien, d.id_dokter, d.nama_dokter FROM transaksi t, pasien p, dokter d WHERE t.id_dokter = d.id_dokter AND t.id_pasien = p.id_pasien AND t.id_transaksi = '$id'";
			return $this->db->query($sql)->row_array();
		}
	}

	public function getlaporan($bulan,$tahun)
	{
			$sql="SELECT distinct t.id_transaksi, t.tanggal_transaksi, t.id_histori 
					FROM transaksi t, detail_histori dh
					WHERE EXTRACT(YEAR from t.tanggal_transaksi)='$tahun' AND EXTRACT(MONTH from t.tanggal_transaksi)='$bulan' 
					AND t.id_histori = dh.id_histori";
			return $this->db->query($sql)->result_array();
	}
	public function getlayanan($id)
	{
			$sql="SELECT l.id_layanan, l.nama_layanan, l.tarif_layanan 
					from detail_histori dh, layanan l, histori h
					where dh.id_histori = h.id_histori and h.id_histori = '$id' AND dh.id_layanan = l.id_layanan";
			return $this->db->query($sql)->result_array();
	}

	public function get_transaksi_pasien($id_pasien)
	{
		$sql = "SELECT * FROM transaksi WHERE id_pasien = '$id_pasien'";
		return $this->db->query($sql)->result_array();
	}

	public function insert($data = array())
	{
		$this->db->insert('transaksi', $data); 
	}

	public function update($id, $data = array())
	{
		$this->db->update('transaksi', $data, array('id_transaksi' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('transaksi', array('id_transaksi' => $id)); 
	}

	public function get_pembayaran($id_transaksi)
	{
		$sql = "SELECT SUM(l.tarif_layanan) as total_pembayaran FROM transaksi t, histori h, detail_histori dt, layanan l WHERE t.id_transaksi = '$id_transaksi' AND t.id_histori = h.id_histori AND h.id_histori = dt.id_histori AND dt.id_layanan = l.id_layanan";
		return $this->db->query($sql)->row_array();
	}

}