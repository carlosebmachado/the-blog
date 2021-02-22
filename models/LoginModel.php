<?php

namespace models;

class LoginModel extends Model
{
	public function validateLogin($uid, $pwd)
	{
		return $uid == 'admin' && $pwd == '123';
	}
}
