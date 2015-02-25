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
}