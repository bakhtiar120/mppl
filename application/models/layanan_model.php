<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan_Model extends CI_Model
{
	public function get($id = NULL)
	{
		if($id == NULL)
		{
			return $this->db->get('layanan')->result_array();
		}
		else
		{
			$limit = 1;
			$offset = 0;
			return $this->db->get_where('layanan', array('id_layanan' => $id), $limit, $offset)->row_array();
		}
	}

	public function insert($data = array())
	{
		$this->db->insert('layanan', $data); 
	}

	public function update($id, $data = array())
	{
		$this->db->update('layanan', $data, array('id_layanan' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('layanan', array('id_layanan' => $id)); 
	}
}