<?php

class Accione extends Eloquent {
	protected $guarded = array();
	public $timestamps= false;
	public static $rules = array(
		'no_accion' => 'required',
		'descripcion' => 'required'
	);
}
