<?php

class UserType extends Eloquent{
	public function user()
	{
		return $this->hasMany('User');
	}
}

?>