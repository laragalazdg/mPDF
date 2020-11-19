<?php
class Persona{
	private $nrodoc;
	private $apellido;
	private $nombre;
	private $fechaNac;
	private $telefono;
	private $domicilio;
	private $mensajeoperacion;

	public function __construct(){
		$this->nrodoc = "";
		$this->nombre = "";
		$this->apellido = "";
		$this->fechaNac = "";
		$this->telefono = "";
		$this->domicilio = "";
		$this->mensajeoperacion ="";
	}

	/**
	*SETS
	*/
	public function setear($NroD,$Ape,$Nom,$fechaNac,$tel,$domicilio){
		$this->setNrodoc($NroD);
		$this->setApellido($Ape);
		$this->setNombre($Nom);
		$this->setFechaNac($fechaNac);
		$this->setTelefono($tel);
		$this->setDomicilio($domicilio);
	}

	public function setNrodoc($NroDNI){
		$this->nrodoc=$NroDNI;
	}
	public function setNombre($Nom){
		$this->nombre=$Nom;
	}
	public function setApellido($Ape){
		$this->apellido=$Ape;
	}
	public function setFechaNac($fecha){
		$this->fechaNac=$fecha;
	}
	public function setTelefono($tel){
		$this->telefono = $tel;
	}
	public function setDomicilio($domicilio){
		$this->domicilio = $domicilio;
	}

	public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

	/**
	*GETS
	*/
	public function getNrodoc(){
		return $this->nrodoc;
	}
	public function getNombre(){
		return $this->nombre ;
	}
	public function getApellido(){
		return $this->apellido ;
	}
	public function getFechaNac(){
		return $this->fechaNac ;
	}
	public function getTelefono(){
		return $this->telefono;
	}
	public function getDomicilio(){
		return $this->domicilio;
	}
	public function getmensajeoperacion(){
		return $this->mensajeoperacion ;
	}


	public function cargar(){
		$resp = false;
		$base=new BaseDatos();
		$sql="SELECT * FROM persona WHERE NroDni = ".$this->getNrodoc();
		if ($base->Iniciar()) {
			$res = $base->Ejecutar($sql);
			if($res>-1){
				if($res>0){
					$row = $base->Registro();
					$this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
				}
			}
		} else {
			$this->setmensajeoperacion("persona->listar: ".$base->getError());
		}
		return $resp;
	}

	public static function listar($condicion=""){
		$arregloPersona = array();
		$base=new BaseDatos();
		$sql="SELECT * from persona ";
		if ($condicion!=""){
			$sql=$sql.' where '.$condicion;
		}
		$res = $base->Ejecutar($sql);
		if($res>-1){
			if($res>0){

				while ($row = $base->Registro()){
					$obj= new Persona();
					$obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
					array_push($arregloPersona, $obj);
				}
			}

		} else {
			$this->setmensajeoperacion("Persona->listar: ".$base->getError());
		}
		return $arregloPersona;
	}


	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$sql="INSERT INTO persona(NroDni, Apellido, Nombre,  fechaNac, Telefono, Domicilio)
		VALUES ('".$this->getNrodoc()."','".$this->getApellido()."','".$this->getNombre()."','".$this->getFechaNac()."','".$this->getTelefono()."','".$this->getDomicilio()."')";

		if($base->Iniciar()){
			if ($elid = $base->Ejecutar($sql)) {
				//$this->setId($elid);
				$resp = true;
			} else {
				$this->setmensajeoperacion("Persona->insertar: ".$base->getError());
			}
		} else {
			$this->setmensajeoperacion("Persona->insertar: ".$base->getError());
		}

		return $resp;
	}


	public function modificar(){
		$resp =false;
		$base=new BaseDatos();
		$sql="UPDATE persona SET Apellido='".$this->getApellido()."',Nombre='".$this->getNombre()."'
		,fechaNac='".$this->getFechaNac()."',Telefono='".$this->getTelefono().
		"',Domicilio='".$this->getDomicilio()."' WHERE NroDNI=". $this->getNrodoc();
		if($base->Iniciar()){
			if($base->Ejecutar($sql)){
				$resp=  true;
			}else{
				$this->setmensajeoperacion("Persona->modificar: ".$base->getError());

			}
		}else{
			$this->setmensajeoperacion("Persona->modificar: ".$base->getError());

		}
		return $resp;
	}


	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
			$sql="DELETE FROM persona WHERE NroDni=".$this->getNrodoc();
			if($base->Ejecutar($sql)){
				echo "pase eliminar";
				$resp=  true;
			}else{
				$this->setmensajeoperacion("Persona->eliminar: ".$base->getError());

			}
		}else{
			$this->setmensajeoperacion("Persona->eliminar: ".$base->getError());

		}
		return $resp;
	}
}
?>
