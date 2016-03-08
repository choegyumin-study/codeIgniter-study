<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bbs extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('bbs_model');
	}

	public function index() {
		$seg = func_get_args();
		$returning['SEG'] = $seg;

		//@@@
	}

	public function lists() {
		$seg = func_get_args();
		$seg[0] = isset($seg[0]) ? strtolower($seg[0]) : 'all';
		$seg[1] = isset($seg[1]) ? $seg[1] : 1;
		$returning['SEG'] = $seg;

		$bbs_list_cond['cate'] = $seg[0];
		$bbs_list_cond['page'] = $seg[1];
		$bbs_list_cond['len'] = 5;
		$bbs_list_cond['start'] = $bbs_list_cond['page'] * $bbs_list_cond['len'] - $bbs_list_cond['len'];

		$bbs_list_query = "";
		if ($bbs_list_cond['cate'] != 'all') $bbs_list_query .= " WHERE cate='{$bbs_list_cond['cate']}'";
		$bbs_list_query .= " ORDER BY od, idx";
		$bbs_list_query .= " LIMIT {$bbs_list_cond['start']}, {$bbs_list_cond['len']}";

		$returning['bbs_list'] = $bbs_list = $this->bbs_model->select_data_rows($bbs_list_query);

		if (!$bbs_list) $this->load->view('bbs_list_error', $returning);
		else $this->load->view('bbs_list', $returning);
	}

	public function view() {
		$seg = func_get_args();
		$seg[0] = isset($seg[0]) ? strtolower($seg[0]) : null;
		$seg[1] = isset($seg[1]) ? $seg[1] : null;
		$returning['SEG'] = $seg;

		$bbs_view_cond['cate'] = $seg[0];
		$bbs_view_cond['idx'] = $seg[1];

		$returning['bbs_view'] = $bbs_view = $this->bbs_model->select_data_args($bbs_view_cond['cate'], $bbs_view_cond['idx']);

		if (!$bbs_view) $this->load->view('bbs_view_error', $returning);
		else $this->load->view('bbs_view', $returning);
	}

	public function write() {
		$seg = func_get_args();
		$returning['SEG'] = $seg;

		$this->load->view('bbs_write', $returning);
	}
}
