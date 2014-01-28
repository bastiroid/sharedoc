<?php

class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct(){
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()){
		foreach ($items as $item => $rules) {
			
			foreach ($rules as $rule => $rule_value) {

				$value = trim($source[$item]);
				$items = escape($item);

				if ($rule === 'required' && empty($value)) {
					$this->addError("{$item} is required");
				} else if(!empty($value)) {

					switch ($rule) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addError("{$item} must be a minimum of {$rule_value} characters.");
							}
							break;

						case 'max':
							if (strlen($value) > $rule_value) {
								$this->addError("{$item} must be a maximum of {$rule_value} characters.");
							}
							break;

						case 'matches':
							if ($value != $source[$rule_value]) {
								$this->addError("{$item} must match {$rule_value}.");
							}
							break;

						case 'unique':
							$duplicate = $this->_db->query("SELECT * FROM :rule_value WHERE :item = :value", array(
								':item' => $item,
								':value' => $value,
								':rule_value' => $rule_value
							));

							if (!$duplicate->count()) {
								$this->addError("{$item} already exists.");
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