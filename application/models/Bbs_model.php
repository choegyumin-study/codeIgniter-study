<?php
class Bbs_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function select_data_rows($query = ''){
		return $this->db->query('SELECT * FROM bbs ' . $query)->result();
	}

	function select_data_args($cate, $idx){
		return $this->db->get_where('bbs', array('cate'=> $cate, 'idx'=> $idx))->row();
	}
}