<?php
class Responsable extends Eloquent {

	protected $table = 'responsables';

	public $timestamps = false;

	public static $rules = [
		'nombre' => 'required',
		'profesion' => 'required'
	];

	public function usuario(){
		return $this->hasOne('Usuario', 'id_responsable');
	}

	public function departamentos() {
		return $this->hasMany('Depto', 'responsable_id');
	}

}