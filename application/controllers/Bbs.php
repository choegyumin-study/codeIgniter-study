<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bbs extends CI_Controller {

	public function index() {
		$args = func_get_args();
		$returning_data = array('arguments' => $args);
		$this->load->view('bbs_lists', $returning_data);
	}

	public function lists() {
		$args = func_get_args();
		$returning_data = array('arguments' => $args);
		$this->load->view('bbs_lists', $returning_data);
	}

	public function view() {
		$args = func_get_args();
		$returning_data = array('arguments' => $args);
		$this->load->view('bbs_view', $returning_data);
	}

	public function write() {
		$args = func_get_args();
		$returning_data = array('arguments' => $args);
		$this->load->view('bbs_write', $returning_data);
	}
}
