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

		$data = $this->_db->get('ipp_document', array('admin_id', '=', $id));

		if ($data->count()) {
			$this->_data = $data->results();
			return true;
		}

		return false;
	}

	public function rename($fields = array()){
		
		$id = $this->data()->id;

		if (!$this->_db->update('ipp_document', $id, $fields)) {
			throw new Exception('There was a problem renaming your document');
    	}
	}

	public function delete($user = null){
		
		if ($user = null){
			$user = $this->data()->id;
		}

		$data = $this->_db->delete('ipp_users', array('id', '=', $user));

		if ($data->count()){
			return true;
		}
		
		return false;
	}

	public function data(){
		return $this ->_data;
	}

} 
?>