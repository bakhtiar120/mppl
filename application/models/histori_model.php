<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Histori_Model extends CI_Model
{
	public function get($id = NULL)
	{
		if($id == NULL)
		{
			return $this->db->get('histori')->result_array();
		}
		else
		{
			$limit = 1;
			$offset = 0;
			return $this->db->get_where('histori', array('id_histori' => $id), $limit, $offset)->row_array();
		}
	}

	public function get_histori_transaksi($id_transaksi)
	{
		$sql = "SELECT h.resep, h.catatan FROM transaksi t, histori h WHERE t.id_transaksi = '$id_transaksi' AND t.id_histori = h.id_histori";
		return $this->db->query($sql)->row_array();
	}

	public function get_histori_layanan($id_histori)
	{
		$sql = "SELECT l.* FROM detail_histori dt, layanan l WHERE dt.id_histori = '$id_histori' AND dt.id_layanan = l.id_layanan";
		return $this->db->query($sql)->result_array();
	}

	public function get_last_id()
	{
		$sql = "SELECT id_histori FROM histori ORDER BY id_histori DESC LIMIT 1";
		return $this->db->query($sql)->row_array();
	}

	public function insert($data = array())
	{
		$this->db->insert('histori', $data); 
	}

	public function insert_detail($data = array())
	{

		$this->db->insert('detail_histori', $data);
	}

	public function update($id, $data = array())
	{
		$this->db->update('histori', $data, array('id_histori' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('histori', array('id_histori' => $id)); 
	}
<<<<<<< HEAD
	public function getResep($id_histori)
	{
		$sql = "SELECT h.resep,p.nama_pasien,d.nama_dokter,t.tanggal_transaksi
				FROM histori h, pasien p, dokter d, transaksi t
				WHERE h.id_histori = '$id_histori' AND t.id_histori = '$id_histori' AND d.id_dokter = t.id_dokter AND p.id_pasien = t.id_pasien";
		return $this->db->query($sql)->row_array();
	}
=======

	public function update_transaksi($id, $data = array())
	{
		$this->db->update('transaksi', $data, array('id_histori' => $id));
	}

>>>>>>> 1170e3eb4d8bb1c1890aa8b41ab13897d935ea59
}