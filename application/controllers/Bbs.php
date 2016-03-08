<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @file Bbs.php
 * @brief BBS controller class
 * @author GyuminChoi(choegyumin@gmail.com)
 */

class Bbs extends CI_Controller {

	/**
	 * @brief Set function of construct
	 */
	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('bbs_model');
	}

	/**
	 * @brief URL remapping and create page frame
	 * @param string $method function in URL
	 * @param array $segs segment in URL
	 */
	public function _remap($method, $segs = array()) {
		$this->load->view('header');

		if (method_exists($this, $method . '_method')) $this->{$method . '_method'}($segs);
		else $this->load->view('bbs_' . $method);

		$this->load->view('footer');
	}

	/**
	 * @brief Return BBS index page(redirect to list page)
	 * @param array $segs segment in URL
	 */
	public function index_method($segs = array()) {
		//$segs = func_get_args();
		$this->{'lists_method'}($segs);
	}

	/**
	 * @brief Return BBS list page
	 * @param array $segs segment in URL
	 */
	public function lists_method($segs = array()) {
		//$segs = func_get_args();
		$segs[0] = isset($segs[0]) ? strtolower($segs[0]) : 'all';
		$segs[1] = isset($segs[1]) ? $segs[1] : 1;
		$returning['SEGS'] = $segs;

		$bbs_list_cond['cate'] = $segs[0];
		$bbs_list_cond['page'] = $segs[1];
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

	/**
	 * @brief Return BBS view page
	 * @param array $segs segment in URL
	 */
	public function view_method($segs = array()) {
		//$segs = func_get_args();
		$segs[0] = isset($segs[0]) ? strtolower($segs[0]) : null;
		$segs[1] = isset($segs[1]) ? $segs[1] : null;
		$returning['SEGS'] = $segs;

		$bbs_view_cond['cate'] = $segs[0];
		$bbs_view_cond['idx'] = $segs[1];

		$returning['bbs_view'] = $bbs_view = $this->bbs_model->select_data_args($bbs_view_cond['cate'], $bbs_view_cond['idx']);

		if (!$bbs_view) $this->load->view('bbs_view_error', $returning);
		else $this->load->view('bbs_view', $returning);
	}

	/**
	 * @brief Return BBS write page
	 * @param array $segs segment in URL
	 * @todo make it do something
	 */
	public function write_method($segs = array()) {
		//$segs = func_get_args();
		$returning['SEGS'] = $segs;

		$this->load->view('bbs_write', $returning);
	}
}
