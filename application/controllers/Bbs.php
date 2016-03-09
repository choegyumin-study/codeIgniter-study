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
		$this->load->helper(array('file', 'url'));
		$this->load->model('bbs_model');
	}

	/**
	 * @brief Construct returning data of method
	 */
	private function method_data_type() {
		return array(
			'data'=> array(),
			'view_html'=> ''
		);
	}

	/**
	 * @brief URL remapping and create page frame
	 * @param string $method function in URL
	 * @param array $segs Segment in URL
	 */
	public function _remap($method, $segs = array()) {
		if (method_exists($this, $method . '_method')) {
			$method_data = $this->{$method . '_method'}($segs);
			$data = $method_data['data'];
			$view_html['method'] = $method_data['view_html'];
		} else {
			$data = array();
			$view_html['method'] = $this->load->view('bbs_' . $method, null, true);
		}

		$view_html['header'] = $this->load->view('header', $data, true);
		$view_html['footer'] = $this->load->view('footer', $data, true);

		echo $view_html['header'];
		echo $view_html['method'];
		echo $view_html['footer'];
	}

	/**
	 * @brief Return BBS index page(redirect to list page)
	 * @param array $segs Segment in URL
	 * @return array Method Data
	 */
	public function index_method($segs = array()) {
		//$segs = func_get_args();

		return $this->lists_method($segs);
	}

	/**
	 * @brief Return BBS list page
	 * @param array $segs Segment in URL
	 * @return array Method data
	 */
	public function lists_method($segs = array()) {
		//$segs = func_get_args();
		$segs[0] = isset($segs[0]) ? strtolower($segs[0]) : '*';
		$segs[1] = isset($segs[1]) ? $segs[1] : 1;
		$data['SEGS'] = $segs;
		$returning = $this->method_data_type();

		$bbs_list_cond['cate'] = $segs[0];
		$bbs_list_cond['page'] = $segs[1];
		$bbs_list_cond['len'] = 5;
		$bbs_list_cond['start'] = $bbs_list_cond['page'] * $bbs_list_cond['len'] - $bbs_list_cond['len'];

		$bbs_list_query = "";
		if ($bbs_list_cond['cate'] != '*') $bbs_list_query .= " WHERE cate='{$bbs_list_cond['cate']}'";
		$bbs_list_query .= " ORDER BY od, idx";
		$bbs_list_query .= " LIMIT {$bbs_list_cond['start']}, {$bbs_list_cond['len']}";

		if (is_numeric($segs[1]) || $segs[1] != 0) $data['bbs_list'] = $bbs_list = $this->bbs_model->select_data_rows($bbs_list_query);
		else $bbs_list = false;

		if ($bbs_list_cond['cate'] != '*') $returning['data']['page_title'] = $segs[0];
		if (!$bbs_list) $returning['view_html'] = $this->load->view('bbs_list_error', $data, true);
		else $returning['view_html'] = $this->load->view('bbs_list', $data, true);

		return $returning;
	}

	/**
	 * @brief Return BBS view page
	 * @param array $segs Segment in URL
	 * @return array Method data
	 */
	public function view_method($segs = array()) {
		//$segs = func_get_args();
		$segs[0] = isset($segs[0]) ? strtolower($segs[0]) : null;
		$segs[1] = isset($segs[1]) ? $segs[1] : null;
		$data['SEGS'] = $segs;
		$returning = $this->method_data_type();

		$bbs_view_cond['cate'] = $segs[0];
		$bbs_view_cond['idx'] = $segs[1];

		$data['bbs_view'] = $bbs_view = $this->bbs_model->select_data_args($bbs_view_cond['cate'], $bbs_view_cond['idx']);

		if (!$bbs_view) {
			$returning['view_html'] = $this->load->view('bbs_view_error', $data, true);
		} else {
			$returning['data']['page_title'] = $bbs_view->title . ' - ' . $segs[0];
			$returning['view_html'] = $this->load->view('bbs_view', $data, true);
		}

		return $returning;
	}

	/**
	 * @brief Return BBS write page
	 * @param array $segs Segment in URL
	 * @return array Method data
	 * @todo make it do something
	 */
	public function write_method($segs = array()) {
		//$segs = func_get_args();
		$segs[0] = isset($segs[0]) ? strtolower($segs[0]) : null;
		$data['SEGS'] = $segs;
		$returning = $this->method_data_type();

		$returning['data']['page_title'] = 'Writing';
		$returning['view_html'] = $this->load->view('bbs_write', $data, true);

		return $returning;
	}
}
