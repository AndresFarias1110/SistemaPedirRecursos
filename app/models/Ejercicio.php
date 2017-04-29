<?php

class Ejercicio extends Eloquent {
	protected $guarded = array();
	public $timestamps= false;
	public static $rules = array(
		'anio' => 'required'
	);
}
