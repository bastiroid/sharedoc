<?php

class Group {
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName;

	public function __construct($group = null){
		$this->_db = DB::getInstance();
	}

	public function create($groupFields = array(), $joinFields = array()){
		
		if ($this->_db->insert('ipp_group', $groupFields)){

			$joinFields['group_id'] = $this->_db->getLastId();

			if (!$this->_db->insert('ipp_group_join', $joinFields)){
				throw new Exception('There was a problem creating your group');
			}

		} else {
			throw new Exception('There was a problem creating your group');
		}
	}

	public function find($group = null){
		if ($group){
			$field = is_numeric($group) ? 'id' : 'email';
			$data = $this->_db->get('ipp_group', array($field, '=', $group));

			if ($data->count()){
				$this->_data = $data->results();
				return true;
			}
		}
		return false;
	}

	public function getGroups(){
		$user = new User();
		$id = $user->data()->id;

		$sql = "SELECT `ipp_group`.`id`,`ipp_group`.`name`
				FROM `ipp_group`
				INNER JOIN `ipp_group_join`
				ON `ipp_group_join`.`group_id` = `ipp_group`.`id`
				INNER JOIN `ipp_users`
				ON `ipp_group_join`.`user_id` = `ipp_users`.`id`
				WHERE `ipp_group_join`.`user_id` = ?";

		$data = $this->_db->query($sql, array($id));

		if ($data->count()) {
			$this->_data = $data->results();
			return true;
		}

		return false;
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