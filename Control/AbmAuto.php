<?php
class AbmAuto{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */
    private function cargarObjeto($param){
        $obj = null;

        if( array_key_exists('patente',$param) and array_key_exists('marca',$param)and array_key_exists('modelo',$param)and array_key_exists('DniDuenio',$param)){
            $obj = new Auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $param['DniDuenio']);
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

        if( isset($param['patente']) ){
            $obj = new Auto();
            $obj->setear($param['patente'], null);
        }
        return $obj;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['patente']))
            $resp = true;
        return $resp;
    }

    /**
     *
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtAuto = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtAuto!=null and $elObjtAuto->insertar()){
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
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ($elObjtAuto!=null and $elObjtAuto->eliminar()){
                $resp = true;
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
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto!=null and $elObjtAuto->modificar()){
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
        if ($param<>NULL){
            if  (isset($param['patente']))
                $where.=" and patente =".$param['patente'];
            if  (isset($param['modelo']))
                 $where.=" and modelo ='".$param['modelo']."'";
            if  (isset($param['DniDuenio']))
                 $where.=" and DniDuenio ='".$param['DniDuenio']."'";
        }
        $auto = new Auto();
        $arreglo = $auto->listar($where);
        return $arreglo;

    }

}
?>