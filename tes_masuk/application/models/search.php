<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->setlimit=20;
	}
	
	
	function search_sal( $key = '' )
	{
		$sql="select * from gl_msales ";
		if( $key!='' ){
			$sql.="where gl_msales.sales_code like '". mysql_real_escape_string($key) ."%' or  gl_msales.nama_sales like '". mysql_real_escape_string($key) ."%'";
		}
		$sql.="order by sales_code";
		$sql.=" limit ".$this->setlimit;
		$query = $this->db->query($sql,array());
		return $query->result_array();
	}
	
	
	
}
/* End of file search.php */
/* Location: ./application/models/search.php */