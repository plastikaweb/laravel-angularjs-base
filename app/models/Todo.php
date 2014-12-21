<?php

class Todo extends Eloquent {
	protected $guarded = []; // just for demo

    // accesor
    public function getCompletedAttribute($value)
    {
        return (boolean) $value;
    }

    // mutator
    public function setCompletedAttribute($value)
    {
        $this->attributes['completed'] = (int) $value;
    }
}
