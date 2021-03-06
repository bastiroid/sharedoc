<?php

class Document {
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName;

	public function __construct($document = null){
		$this->_db = DB::getInstance();
	}

	public function create($fields = array()){
		
		if (!$this->_db->insert('ipp_document', $fields)){
			throw new Exception('There was a problem creating your document');
		}
	}

	public function find($documentId = null){
		
		$data = $this->_db->get('ipp_document', array('id', '=', $documentId));

		if ($data->count()){
			$this->_data = $data->first();
			return true;
		}
	
		return false;
	}

	public function getDocuments(){
		$user = new User();
		$id = $user->data()->id;

		$sql = "SELECT `ipp_document`.`group_id`,`ipp_document`.`name`,`ipp_document`.`id`
				FROM `ipp_document`
				WHERE `ipp_document`.`group_id` IN(
			    SELECT `ipp_group_join`.`group_id`
			    FROM `ipp_group_join`
			    WHERE `ipp_group_join`.`user_id`= ?);";

		$data = $this->_db->query($sql, array($id));

		if ($data->count()) {
			$this->_data = $data->results();
			return true;
		}

		return false;
	}

	public function change($fields = array()){
		
		$id = $this->data()->id;

		if (!$this->_db->update('ipp_document', $id, $fields)) {
			throw new Exception('There was a problem renaming your document');
    	}
	}

	public function delete(){
		
		$id = $this->data()->id;

		if(!$this->_db->delete('ipp_document', array('id', '=', $id))){
			throw new Exception('There was a problem deleting your document');
		}
	}

	public function data(){
		return $this ->_data;
	}

} 
?>