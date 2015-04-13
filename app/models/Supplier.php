<?php

class Supplier extends Eloquent{
	public function expense()
	{
		return $this->hasMany('Expense');
	}
}
?>