<?php

class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct(){
		$this->_db = DB::getInstance();
	}

	/*
	|--------------------------------------------------------------------------------------
	| Validation function
	|--------------------------------------------------------------------------------------
	*/
	public function check($source, $items = array()){

		foreach ($items as $item => $rules) {
			$value = trim($source[$item]);
			$alias = $item;
			
			foreach ($rules as $rule => $rule_value) {

				if (isset($rules['alias'])) {
					$alias = $rules['alias'];
				}

				$alias = escape(ucfirst($alias));			
				$items = escape($item);

				if ($rule == 'required' && empty($value)) {
					$this->addError("{$alias} is required");

				} else if(!empty($value)) {

					switch ($rule) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addError("{$alias} must be a minimum of {$rule_value} characters.");
							}
							break;

						case 'max':
							if (strlen($value) > $rule_value) {
								$this->addError("{$alias} must be a maximum of {$rule_value} characters.");
							}
							break;

						case 'matches':
							if ($value != $source[$rule_value]) {
								$this->addError("{$alias}s must match.");
							}
							break;

						case 'unique':
							$check = $this->_db->get('ipp_users', array($item, '=', $value));
							
							if ($check->count() > 0) {
								$this->addError("{$alias} already exists.");
							}

							break;
					}
				}
				
			}
		}

		if (empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error){
		$this->_errors[] = $error;
	}

	public function errors(){
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}