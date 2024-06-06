<?php
class Assign {

	private $Id, $registered, $update, $status;
	private $name, $Email, $pswd, $picture, $birthdate, $sex, $role, $activationkey, $token;

	public function __set($assign, $value) {
		return $this->$assign = $value;
	}

	public function &__get($assign) {
		return $this->$assign;
	}

}