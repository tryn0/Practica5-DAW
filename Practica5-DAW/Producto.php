<?php
	/**
	 * Class Category | Producto.php
	 *
	 * @package     Producto
	 * @author      Guillermo Pérez Aragón
	 * @version     v1
	 * @copyright   Copyright (c) 2020, Guillermo
	 */
    require_once('DB.php');

    /**
	* Class summary
	* A longer class description
	* @package modelo/Producto
	* @see     No existe
	*/
	class Producto{
        /** 
         * devuelve PVP de un código
         * @param string $cod 
         * @return float 
        */
        public function getPVP($cod){ 
            $conexion = DB::conexion('mysql:host=localhost;dbname=tarea6', 'root', '');
            $consulta = DB::consulta($conexion,'SELECT PVP from producto WHERE cod = "'.$cod.'"');
            $PVP = DB::obtener_resultados($consulta);
            DB::cerrar_conexion($conexion);
            return $PVP;
        } 

        /** 
         * devuelve stock de dicho producto
         * @param string $cod 
         * @param string $cod_tienda 
         * @return float 
        */ 
        public function getStock($cod, $cod_tienda){
            $conexion = DB::conexion('mysql:host=localhost;dbname=tarea6', 'root', '');
            $consulta = DB::consulta($conexion,'SELECT unidades from stock WHERE producto = "'.$cod.'" AND tienda = "'.$cod_tienda.'"');
            $stock = DB::obtener_resultados($consulta);
            DB::cerrar_conexion($conexion);
            return $stock; 
        }

        /** 
         * devuelve array de las familias
         * @return array 
        */ 
        public function getFamilia(){ 
            $conexion = DB::conexion('mysql:host=localhost;dbname=tarea6', 'root', '');
            $consulta = DB::consulta($conexion,'SELECT nombre FROM familia');
            $arrayFamilias = DB::todosResultados($consulta);
            DB::cerrar_conexion($conexion);
            return $arrayFamilias; 
        } 

        /** 
         * devuelve array de nombres de productos de una familia
         * @param string $cod_familia
         * @return array 
        */ 
        public function getProductosFamilia($cod_familia){ 
            $conexion = DB::conexion('mysql:host=localhost;dbname=tarea6', 'root', '');
            $consulta = DB::consulta($conexion,'SELECT nombre_corto FROM producto WHERE familia ="'.$cod_familia.'"');
            $arrayCodsProductosFamilia = DB::todosResultados($consulta);
            DB::cerrar_conexion($conexion);
            return $arrayCodsProductosFamilia; 
        }
    }
?>