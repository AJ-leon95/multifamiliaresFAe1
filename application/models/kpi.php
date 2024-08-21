<?php 
class kpi extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function CantidadAutos(){
        $sql="SELECT COUNT(*) as cantidad_vehiculos FROM vehiculos;";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
    function CantidadSocios(){
        $sql="SELECT COUNT(*) AS cantidad 
FROM usuarios 
WHERE perfil IN ('ADMINISTRADOR', 'GERENTE', 'SECRETARIO', 'SOCIO');
";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
    function cantidadClientes(){
        $sql="SELECT COUNT(*) AS cantidad 
FROM usuarios 
WHERE perfil ='CLIENTE';
";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
    function taxistaConMasCarreras(){
        $sql="SELECT v.placa_veh, u.nombres AS nombre_taxista, 
        
        u.apellidos AS apellidos_taxista, COUNT(c.id_car) AS
         total_carreras FROM carreras_encomiendas c JOIN vehiculos v ON c.fk_car_veh = v.id_veh 
         JOIN usuarios u ON v.fk_veh_usu = u.id_usu WHERE c.tipo_ce = 
         'CARRERA' GROUP BY v.placa_veh, u.nombres, u.apellidos ORDER BY
          total_carreras DESC LIMIT 5;
";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
    function taxistaConMasEncomiendas(){
        $sql="SELECT v.placa_veh, u.nombres AS nombre_taxista, u.apellidos AS apellidos_taxista, COUNT(c.id_car) AS total_carreras FROM carreras_encomiendas c JOIN vehiculos v ON c.fk_car_veh = v.id_veh JOIN usuarios u ON v.fk_veh_usu = u.id_usu WHERE c.tipo_ce = 'ENCOMIENDA' GROUP BY v.placa_veh, u.nombres, u.apellidos ORDER BY total_carreras DESC LIMIT 5;
";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
   
    function cantidadChofer(){
        $sql="SELECT COUNT(*) AS cantidad 
FROM chofer ;
;
";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }

}