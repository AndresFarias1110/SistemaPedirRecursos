<?php

class Partida extends Eloquent {

	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array(
		'descripcion' => 'required'
	);

	protected $primaryKey= 'partida';
}
