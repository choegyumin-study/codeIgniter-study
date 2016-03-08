<?php

/**
 * @file Bbs_model.php
 * @brief BBS model class
 * @author GyuminChoi(choegyumin@gmail.com)
 */

class Bbs_model extends CI_Model {

	/**
	 * @brief Set function of construct
	 */
	function __construct() {
		parent::__construct();
	}

	/**
	 * @brief Select data rows in database
	 * @param string $query Query for data rows selection condition
	 * @return array Selected data rows
	 */
	function select_data_rows($query = '') {
		return $this->db->query('SELECT * FROM bbs ' . $query)->result();
	}

	/**
	 * @brief Select data arguments on row in database
	 * @param string $cate Category value of selection match data
	 * @param string $idx Index value of selection match data
	 * @return array Selected data arguments
	 */
	function select_data_args($cate, $idx) {
		return $this->db->get_where('bbs', array('cate'=> $cate, 'idx'=> $idx))->row();
	}
}