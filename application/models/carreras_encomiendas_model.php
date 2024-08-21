<?php
class carreras_encomiendas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertar($data)
    {
        return $this->db->insert("carreras_encomiendas", $data);
    }
    public function obtenerDatos()
    {
        //$this->db->join("usuarios","vehiculos.fk_veh_usu = usuarios.id_usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_veh");
        $datos = $this->db->get("carreras_encomiendas");
        if ($datos->num_rows() > 0) {
            return $datos->result();
        } else {
            return false;
        }
    }
    public function borrar($id_car)
    {
        $this->db->where("id_car", $id_car);
        return $this->db->delete("carreras_encomiendas");
    }
    public function obtenerRegistro($id_car)
    {
        $this->db->join("usuarios", "carreras_encomiendas.fk_car_usu = usuarios.id_usu");
        $this->db->join("vehiculos", "carreras_encomiendas.fk_car_veh = vehiculos.id_veh");
        $this->db->where("id_car", $id_car);
        $usuario = $this->db->get("carreras_encomiendas");
        if ($usuario->num_rows() > 0) {
            return $usuario->row();
        } else {
            return false;
        }
    }
    public function procesoActu($id_car, $datos)
    {
        $this->db->where("id_car", $id_car);
        return $this->db->update("carreras_encomiendas", $datos);
    }
    public function obtenerMisEncomiendas($id_usu)
    {
        $query = $this->db->query("SELECT ce.*, v.*, u_taxi.* FROM carreras_encomiendas ce INNER JOIN vehiculos v ON ce.fk_car_veh = v.id_veh INNER JOIN usuarios u_taxi ON v.fk_veh_usu = u_taxi.id_usu WHERE ce.tipo_ce = 'ENCOMIENDA' AND ce.fk_car_usu = $id_usu;");

        return $query->result();
    }
    public function obtenerMisCarreras($id_usu)
    {
        $query = $this->db->query("SELECT ce.*, v.*, u_taxi.* FROM carreras_encomiendas ce INNER JOIN vehiculos v ON ce.fk_car_veh = v.id_veh INNER JOIN usuarios u_taxi ON v.fk_veh_usu = u_taxi.id_usu WHERE ce.tipo_ce = 'CARRERA' AND ce.fk_car_usu = $id_usu;");

        return $query->result();
    }
    public function getCarrerasPorTaxista($id_usu,$servicio)
    {
        // Asegúrate de que $id_usu es un entero para prevenir inyecciones SQL
        $id_usu = (int)$id_usu;
    
        // Ejecuta la consulta
        $query = $this->db->query("
            SELECT 
                ce.*,
                v.placa_veh,
                v.marca_veh,
                v.anio_veh,
                socio.nombres AS socio_nombres,
                socio.apellidos AS socio_apellidos,
                socio.correo AS socio_correo,
                socio.telefono AS socio_telefono,
                socio.direccion AS socio_direccion,
                solicitante.nombres AS solicitante_nombres,
                solicitante.apellidos AS solicitante_apellidos,
                solicitante.correo AS solicitante_correo,
                solicitante.telefono AS solicitante_telefono,
                solicitante.direccion AS solicitante_direccion
            FROM 
                carreras_encomiendas ce
            INNER JOIN 
                vehiculos v ON ce.fk_car_veh = v.id_veh
            INNER JOIN 
                usuarios socio ON v.fk_veh_usu = socio.id_usu
            INNER JOIN 
                usuarios solicitante ON ce.fk_car_usu = solicitante.id_usu
            WHERE 
                ce.tipo_ce = '$servicio'
                AND socio.id_usu = ?
        ", array($id_usu)); // Usa parámetros para prevenir inyecciones SQL
    
        // Verifica si hay resultados
        if ($query->num_rows() > 0) {
            return $query->result(); // Devuelve un array de objetos
        } else {
            return []; // Devuelve un array vacío si no hay resultados
        }
    }
    
    

    public function status($estado, $id_car)
    {
        $query = $this->db->query("UPDATE carreras_encomiendas SET estadoCarrera = '$estado' WHERE id_car =$id_car;");
    }
   
    public function obtenerTelefonoTaxista($id_car)
    {
        // Consulta SQL pura
        $sql = "SELECT usuarios.telefono 
                FROM vehiculos 
                JOIN usuarios ON usuarios.id_usu = vehiculos.fk_veh_usu 
                WHERE vehiculos.id_veh = ?;";

        // Ejecución de la consulta usando la base de datos de CodeIgniter
        $query = $this->db->query($sql, array($id_car));

        // Si hay resultados, devuelve el teléfono
        if ($query->num_rows() > 0) {
            return $query->row()->telefono;
        } else {
            return false; // Devuelve false si no se encuentra el teléfono
        }
    }
    public function obtenerTelefonoTaxistaCarreras($id_car)
    {
        // Consulta SQL pura
        $sql = "SELECT u.telefono
FROM carreras_encomiendas c
JOIN vehiculos v ON c.fk_car_veh = v.id_veh
JOIN usuarios u ON v.fk_veh_usu = u.id_usu
WHERE c.id_car = ?;
";

        // Ejecución de la consulta usando la base de datos de CodeIgniter
        $query = $this->db->query($sql, array($id_car));

        // Si hay resultados, devuelve el teléfono
        if ($query->num_rows() > 0) {
            return $query->row()->telefono;
        } else {
            return false; // Devuelve false si no se encuentra el teléfono
        }
    }
    public function obtenerTelefonoSolicitanteEncomienda($id_car)
{
    // Consulta SQL pura para obtener el número de teléfono del solicitante
    $sql = "SELECT u.telefono FROM carreras_encomiendas c JOIN usuarios u ON c.fk_car_usu = u.id_usu WHERE c.id_car = ?;";

    // Ejecución de la consulta usando la base de datos de CodeIgniter
    $query = $this->db->query($sql, array($id_car));

    // Si hay resultados, devuelve el teléfono
    if ($query->num_rows() > 0) {
        return $query->row()->telefono;
    } else {
        return false; // Devuelve false si no se encuentra el teléfono
    }
}

}
