<?php
class ubicacion_vehiculo_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function insertar_ubicacion($data)
    {
        return $this->db->insert('ubicacion_vehiculo', $data);
    }


    public function ultimaUbicacion()
    {
        $query = $this->db->query("SELECT 
        u.nombres, 
        u.apellidos,  
        u.foto,  
        v.numero, 
        v.placa_veh,             
        v.foto_veh,             
        uv.latitud_ubi, 
        uv.longitud_ubi, 
        uv.fecha_ubi, 
        uv.hora_ubi 
    FROM 
        usuarios u 
    JOIN 
        vehiculos v ON u.id_usu = v.fk_veh_usu 
    JOIN 
        ubicacion_vehiculo uv ON v.id_veh = uv.fk_ubi_veh 
    JOIN 
        (
            SELECT 
                fk_ubi_veh, 
                MAX(CONCAT(fecha_ubi, ' ', hora_ubi)) AS max_fecha_hora 
            FROM 
                ubicacion_vehiculo 
            GROUP BY 
                fk_ubi_veh
        ) ult ON uv.fk_ubi_veh = ult.fk_ubi_veh 
            AND CONCAT(uv.fecha_ubi, ' ', uv.hora_ubi) = ult.max_fecha_hora 
    ORDER BY 
        uv.fecha_ubi DESC, 
        uv.hora_ubi DESC;
    ");

        return $query->result();
    }
}
