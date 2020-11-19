<?php
class AbmPersona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */
    private function cargarObjeto($param){
        $obj = null;

        if( array_key_exists('nrodoc',$param) and array_key_exists('apellido',$param)and array_key_exists('nombre',$param)and array_key_exists('fecha',$param)and array_key_exists('telefono',$param)and array_key_exists('domicilio',$param)){
            $obj = new Persona();
            $obj->setear($param['nrodoc'], $param['apellido'], $param['nombre'], $param['fecha'], $param['telefono'], $param['domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Tabla
     */
    private function cargarObjetoConClave($param){
        $obj = null;

        if( isset($param['nrodoc']) ){
            $obj = new Persona();
            $obj->setear($param['nrodoc'], null, null,null, null, null);
        }
        return $obj;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param){
        return isset($param['nrodoc']);
    }

    /**
     *
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtPersona = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtPersona!=null and $elObjtPersona->insertar()){
            $resp = true;
        }
        return $resp;

    }
    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        $auto = new Auto;
        $listaAuto = $auto ->listar('DniDuenio='.$param['nrodoc'],$limite=1);
        if(count($listaAuto)==0){
                //print_r($listaAuto);
            if ($this->seteadosCamposClaves($param)){
                $elObjtPersona = $this->cargarObjetoConClave($param);

                if ($elObjtPersona and $elObjtPersona->eliminar()){
                    $resp = true;
                }
            }
        }


        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona!=null and $elObjtPersona->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param){
            if  (isset($param['nrodoc']))
                $where.=" and NroDni =".$param['nrodoc'];
            if  (isset($param['apellido']))
               $where.=" and Apellido ='".$param['apellido']."'";
           if  (isset($param['nombre']))
               $where.=" and Nombre ='".$param['nombre']."'";
           if  (isset($param['fechaNac']))
               $where.=" and fechaNac ='".$param['fechaNac']."'";
           if  (isset($param['telefono']))
               $where.=" and Telefono ='".$param['telefono']."'";
           if  (isset($param['domicilio']))
               $where.=" and Domicilio ='".$param['domicilio']."'";
       }
       $persona = new Persona();
       $arreglo = $persona->listar($where);
       return $arreglo;




   }

}
?>