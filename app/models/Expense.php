<?php

class Expense extends Eloquent{
	public function supplier()
	{
		return $this->belongsTo('Supplier');
	}
}
?>