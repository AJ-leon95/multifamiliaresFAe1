<?php 
class reunion_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("reuniones",$data);
    }
    public function obtenerDatos(){
        // $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.id_usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_reu");
        $datos = $this->db->get("reuniones");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_reu){
        $this->db->where("id_reu",$id_reu);
        return $this->db->delete("reuniones");
    }
    public function obtenerRegistro($id_reu){
        // $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.id_usu");
        $this->db->where("id_reu",$id_reu);
        $usuario= $this->db->get("reuniones");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_reu,$datos){
        $this->db->where("id_reu",$id_reu);
        return $this->db->update("reuniones",$datos);
    }
    // function reunionesPersonales($fk_not_usu){
    //     $sql="SELECT * FROM notificaciones WHERE fk_not_usu = $fk_not_usu";
    //     $result = $this->db->query($sql);
    //     if ($result->num_rows()>0) {
    //         return $result->result();
    //     } else {
    //         return 0;
    //     }
    
    // }
}


?>