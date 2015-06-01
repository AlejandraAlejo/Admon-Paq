<?php

class Supplier extends Eloquent{
	public function expenses()
	{
		return $this->hasMany('Expense');
	}

	public function delete()
    {
        if(count($this->expenses) > 0){
	        foreach($this->expenses as $expense)
	        {
	            $expense->delete();
	        }
	    }
 
        return parent::delete();
    }
}
?>