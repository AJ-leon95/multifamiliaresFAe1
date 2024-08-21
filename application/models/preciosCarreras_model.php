<?php 
class preciosCarreras_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function insertar($data) {
        return $this->db->insert("precios_carreras",$data);
    }
    public function obtenerTodosPrecios() {
        $this->db->select('*');
        $this->db->from('precios_carreras'); 
        $query = $this->db->get();
        return $query->result();
    }
    public function obtenerRegistro($id_precio_carrera ){
;
        $this->db->where("id_precio_carrera ",$id_precio_carrera );
        $usuario= $this->db->get("precios_carreras");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_precio_carrera ,$datos){
        $this->db->where("id_precio_carrera ",$id_precio_carrera );
        return $this->db->update("precios_carreras",$datos);
    }
    public function borrar($id_precio_carrera){
        $this->db->where("id_precio_carrera",$id_precio_carrera);
        return $this->db->delete("precios_carreras");
    } 
    // public function getTarifaPorDistancia($distancia) {
    //     $this->db->where('distancia_min <=', $distancia);
    //     $this->db->where('distancia_max >=', $distancia);
    //     $query = $this->db->get('precios_carreras'); // Reemplaza con el nombre de tu tabla
    
    //     if ($query->num_rows() > 0) {
    //         return $query->row(); // Devuelve la tarifa encontrada
    //     } else {
    //         return null; // No se encontró tarifa
    //     }
    // }
    
}