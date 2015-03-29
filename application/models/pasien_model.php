<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_Model extends CI_Model
{
	public function get($id = NULL)
	{
		if($id == NULL)
		{
			return $this->db->get('pasien')->result_array();
		}
		else
		{
			$limit = 1;
			$offset = 0;
			return $this->db->get_where('pasien', array('id_pasien' => $id), $limit, $offset)->row_array();
		}
	}

	public function get_transaksi($id)
	{
		$sql = "SELECT * FROM transaksi WHERE id_pasien = '$id'";
		return $this->db->query($sql)->result_array();
	}

	public function insert($data = array())
	{
		$this->db->insert('pasien', $data); 
	}

	public function update($id, $data = array())
	{
		$this->db->update('pasien', $data, array('id_pasien' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('pasien', array('id_pasien' => $id));
	}
	public function laporan()
	{
		$sql = "Select p.nama_pasien,p.alamat_pasien,p.telp_pasien,count(*) as intensitas
				from transaksi t, pasien p
				where t.id_pasien = p.id_pasien
				group by p.nama_pasien,p.alamat_pasien,p.telp_pasien";
		return $this->db->query($sql)->result_array();
	}
}