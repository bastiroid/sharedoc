<?php

class Token {
	public static function generate(){
		return Session::put(Config::get('session/token_name(token)'), )
	}
}