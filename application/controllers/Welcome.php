<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('dist/index');
	}

	public function getAllBlogs()
	{
		$data=array(
				array('id' => 1,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
				array('id' => 2,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
				array('id' => 3,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
		);
		header('Content-Type:application/json');
		echo json_encode($data);
	}
	public function getBlogById($id)
	{
		$data=array(
				array('id' => 1,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
				array('id' => 2,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
				array('id' => 3,'title' => 1, 'link' => 2, 'author' => 3, 'tag' => 4),
		);

		$data=$data[1];
		header('Content-Type:application/json');
		echo json_encode($data);
	}

}
