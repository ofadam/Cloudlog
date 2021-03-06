<?php

class Sota extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function get_all() {
		$CI =& get_instance();
      	$CI->load->model('Stations');
      	$station_id = $CI->Stations->find_active();

		$this->db->where("station_id", $station_id);
		$this->db->order_by("COL_SOTA_REF", "ASC"); 
		$this->db->where('COL_SOTA_REF !=', '');
		
		return $this->db->get($this->config->item('table_name'));
	}
}

?>