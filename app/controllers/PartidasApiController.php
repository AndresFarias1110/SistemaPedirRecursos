<?php 

class PartidasApiController extends BaseController{

	public function getDescPartida($partida = 0){
		return Partida::find($partida);
	}
}
