<?php
class Auto {
	private $patente;
	private $marca;
	private $modelo;
	private $dniDuenio;
	private $mensajeoperacion;

	public function __construct(){
		$this->patente = "";
		$this->marca = "";
		$this->modelo = "";
		$this->dniDuenio = "";
		$this->mensajeoperacion ="";
	}

	public function setear($patente, $marca, $modelo, $dni){
		$this->setPatente($patente);
		$this->setMarca($marca);
		$this->setModelo($modelo);
		$this->setDniDuenio($dni);
	}

	public function setPatente($patente){
		$this->patente = $patente;
	}

	public function setMarca($marca){
		$this->marca = $marca;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo;
	}
	public function setDniDuenio($dni){
		$this->dniDuenio = $dni;
	}

	public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

	public function getPatente(){
		return $this->patente;
	}

	public function getMarca(){
		return $this->marca;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function getDniDuenio(){
		return $this->dniDuenio;
	}

	public function getmensajeoperacion(){
		return $this->mensajeoperacion ;
	}

	public function cargar(){
		$resp = false;
		$base=new BaseDatos();
		$sql="SELECT * FROM auto WHERE patente = ".$this->getPatente();
		if ($base->Iniciar()) {
			$res = $base->Ejecutar($sql);
			if($res>-1){
				if($res>0){
					$row = $base->Registro();
					$this->setear($row['patente'], $row['marca'], $row['modelo'], $row['DniDuenio']);
				}
			}
		} else {
			$this->setmensajeoperacion("auto->listar: ".$base->getError());
		}
		return $resp;
	}

	public function listar($condicion="", $limite=""){
		$arregloAuto = array();
		$base = new BaseDatos();
		$sql="SELECT * FROM auto ";
		if ($condicion!=""){
			$sql=$sql.' where '.$condicion;
		}
		if($limite!=""){
			$sql.=" limit $limite";
		}
		//echo "\n".$sql;
		$res = $base->Ejecutar($sql);
		if($res>-1){
			if($res>0){

				while ($row = $base->Registro()){
					$obj= new Auto();
					$persona = new Persona();
					$persona->setNrodoc($row['DniDuenio']);
					$persona->cargar();
					$obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $persona);
					array_push($arregloAuto, $obj);
				}
			}
		} else {
			$this->setmensajeoperacion("Auto->listar: ".$base->getError());
		}
		return $arregloAuto;
	}

	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$sql="INSERT INTO auto(patente, marca, modelo, DniDuenio)
		VALUES ('".$this->getPatente()."','".$this->getMarca()."','".$this->getModelo()."','".$this->getDniDuenio()."')";

		if($base->Iniciar()){
			if ($elid = $base->Ejecutar($sql)) {
				//$this->setId($elid);
				$resp = true;
			} else {
				$this->setmensajeoperacion("Auto->insertar: ".$base->getError());
			}
		} else {
			$this->setmensajeoperacion("Auto->insertar: ".$base->getError());
		}

		return $resp;
	}

	public function modificar(){
		$resp =false;
		$base=new BaseDatos();
		$sql="UPDATE auto SET marca='".$this->getMarca()."',modelo='".$this->getModelo()."',DniDuenio='".$this->getDniDuenio()."' WHERE patente= '". $this->getPatente()."'";
		if($base->Iniciar()){
			if($base->Ejecutar($sql)){
				$resp=  true;
			}else{
				$this->setmensajeoperacion("Auto->modificar: ".$base->getError());

			}
		}else{
			$this->setmensajeoperacion("Auto->modificar: ".$base->getError());

		}
		return $resp;
	}

	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
			$sql="DELETE FROM auto WHERE patente=".$this->getPatente();
			if($base->Ejecutar($sql)){
				$resp=  true;
			}else{
				$this->setmensajeoperacion("Auto->eliminar: ".$base->getError());

			}
		}else{
			$this->setmensajeoperacion("Auto->eliminar: ".$base->getError());

		}
		return $resp;
	}
}
?>