<?php 
if (!function_exists("reglas_veh")){
    function reglas_veh() {
        return array(
            array(
                'numero'=> 'numero',
                'label' => 'Numero',
                'rules' => 'required|is_unique[vehiculos.vehiculo]',
                'errors' => array(
                    'required' => 'Este campo es requerido.',
                    'is_unique' => 'El numero de unidad ya esta registrado.',
            ),
            ),
        );
    }
}




?>