<?php 
class veh_cho_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("veh_cho",$data);
    }
    public function obtenerDatos(){
        $this->db->select('*');
        $this->db->from('veh_cho');
        $this->db->join('vehiculos', 'veh_cho.fk_vc_veh = vehiculos.id_veh');
        $this->db->join('chofer', 'veh_cho.fk_vc_cho = chofer.id_cho');
        $this->db->join('usuarios', 'vehiculos.fk_veh_usu = usuarios.id_usu');
        $datos = $this->db->get();
        
        if ($datos->num_rows() > 0) {
            return $datos->result();
        } else {
            return false;
        }
        
    }
    public function borrar($id_veh_cho){
        $this->db->where("id_veh_cho",$id_veh_cho);
        return $this->db->delete("veh_cho");
    }
    public function obtenerRegistro($id_veh_cho){
         $this->db->join("vehiculos","veh_cho.fk_vc_veh = vehiculos.id_veh");
         $this->db->join("chofer","veh_cho.fk_vc_cho = chofer.id_cho");
        $this->db->where("id_veh_cho",$id_veh_cho);
        $usuario= $this->db->get("veh_cho");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_veh_cho,$datos){
        $this->db->where("id_veh_cho",$id_veh_cho);
        return $this->db->update("veh_cho",$datos);
    }
    public function obtener_vehiculo_no_registrado() {
        $query = $this->db->query("SELECT v.*, u.* FROM vehiculos v LEFT JOIN usuarios u ON v.fk_veh_usu = u.id_usu LEFT JOIN veh_cho vc ON v.id_veh = vc.fk_vc_veh WHERE (vc.fk_vc_veh IS NULL OR vc.estatus_veh_cho = 'INACTIVO') AND v.id_veh NOT IN ( SELECT fk_vc_veh FROM veh_cho WHERE estatus_veh_cho = 'ACTIVO' );");

        return $query->result();
    }
    public function obtener_chofer() {
        $query = $this->db->query("SELECT *
FROM chofer;

        ");

        return $query->result();
    }
 
}


?>