<?php 
class vehiculo_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("vehiculos",$data);
    }
    public function obtenerDatos(){
         $this->db->join("usuarios","vehiculos.fk_veh_usu = usuarios.id_usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_veh");
        $datos = $this->db->get("vehiculos");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_veh){
        $this->db->where("id_veh",$id_veh);
        return $this->db->delete("vehiculos");
    }
    public function obtenerRegistro($id_veh){
        $this->db->join("usuarios","vehiculos.fk_veh_usu = usuarios.id_usu");
        $this->db->where("id_veh",$id_veh);
        $usuario= $this->db->get("vehiculos");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_veh,$datos){
        $this->db->where("id_veh",$id_veh);
        return $this->db->update("vehiculos",$datos);
    }
    public function obtener_usuarios_sin_vehiculo() {
        $query = $this->db->query("SELECT u.* FROM usuarios u LEFT JOIN vehiculos v ON u.id_usu = v.fk_veh_usu WHERE v.fk_veh_usu IS NULL;");

        return $query->result();
    }
    public function obtener_unidad_con_numero() {
        $query = $this->db->query("SELECT numero FROM vehiculos WHERE numero NOT IN (SELECT id_veh FROM usuarios);");

        return $query->result();
    }
    public function obtenerVehiculo() {
        $query = $this->db->query("SELECT v.*, u_propietario.*, COALESCE(c.nombres_cho, 'No hay chofer asignado') AS nombres_chofer, COALESCE(c.apellidos_cho, '') AS apellidos_chofer, COALESCE(c.telefono_cho, '') AS telefono_chofer, COALESCE(c.foto_cho, '') AS foto_chofer FROM vehiculos v JOIN usuarios u_propietario ON v.fk_veh_usu = u_propietario.id_usu LEFT JOIN veh_cho vc ON v.id_veh = vc.fk_vc_veh LEFT JOIN chofer c ON vc.fk_vc_cho = c.id_cho;");

        return $query->result();
    }
    public function obtener_vehiculo($id_usu)
    {
        $this->db->select('id_veh');
        $this->db->from('vehiculos');
        $this->db->where('fk_veh_usu', $id_usu);
        $query = $this->db->get();

        return $query->row(); // Retorna una sola fila como objeto
    }
    

}


?>