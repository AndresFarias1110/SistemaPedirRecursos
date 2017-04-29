<?php
class Depto extends Eloquent {
	
	protected $table = 'departamentos';
	public $timestamps= false;
	function metas(){
		return $this -> belongsToMany('Meta', 'metas_departamentos', 'cat_departamentos_id', 'metas_id');
	}
	
	function hojas(){
		return $this-> belongsToMany('Hoja','hojasdepartamentos','id_departamento','id_hoja');
		
	}
	function responsable(){
		return $this->belongsTo('Responsable');
	}
}