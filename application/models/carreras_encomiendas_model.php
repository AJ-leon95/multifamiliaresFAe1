<?php 
class carreras_encomiendas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("carreras_encomiendas",$data);
    }
    public function obtenerDatos(){
         //$this->db->join("usuarios","vehiculos.fk_veh_usu = usuarios.id_usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_veh");
        $datos = $this->db->get("carreras_encomiendas");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_car){
        $this->db->where("id_car",$id_car);
        return $this->db->delete("carreras_encomiendas");
    }
    public function obtenerRegistro($id_car){
         $this->db->join("usuarios","carreras_encomiendas.fk_car_usu = usuarios.id_usu");
         $this->db->join("vehiculos","carreras_encomiendas.fk_car_veh = vehiculos.id_veh");
        $this->db->where("id_car",$id_car);
        $usuario= $this->db->get("carreras_encomiendas");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_car,$datos){
        $this->db->where("id_car",$id_car);
        return $this->db->update("carreras_encomiendas",$datos);
    }
    public function obtenerMisCarreras($id_usu) {
        $query = $this->db->query("SELECT ce.*, v.*, u_propietario.* FROM carreras_encomiendas ce JOIN vehiculos v ON ce.fk_car_veh = v.id_veh JOIN usuarios u_propietario ON v.fk_veh_usu = u_propietario.id_usu WHERE u_propietario.perfil IN ('SOCIO', 'PRESIDENTE', 'SECRETARIO', 'GERENTE') AND ce.fk_car_usu = $id_usu;");

        return $query->result();
    }
    public function cancelar($estado,$id_car) {
        $query = $this->db->query("UPDATE carreras_encomiendas SET estadoCarrera = '$estado' WHERE id_car =$id_car;");

        
    }

}


?>