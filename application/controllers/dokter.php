<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('dokter');
		$output = $crud->render();

		$this->load->view('dokter_view_1.php', $output);
	}

}