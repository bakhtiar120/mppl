<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_Model extends CI_Model
{
	public function get($id = NULL)
	{
		if($id == NULL)
		{
			return $this->db->get_where('dokter', array('flag_delete' => '0'))->result_array();
		}
		else
		{
			$limit = 1;
			$offset = 0;
			return $this->db->get_where('dokter', array('id_dokter' => $id), $limit, $offset)->row_array();
		}
	}

	public function insert($data = array())
	{
		$this->db->insert('dokter', $data); 
	}

	public function update($id, $data = array())
	{
		$this->db->update('dokter', $data, array('id_dokter' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('dokter', array('id_dokter' => $id)); 
	}
}