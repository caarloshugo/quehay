<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Default_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		$this->helpers();
		$this->table = "empresas";
	}

	public function getFirst() {
		$count = $this->Db->countAll($this->table);
		$data  = $this->Db->findAll($this->table);
		
		return $data;
	}
}
