<?php 
class chofer_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("chofer",$data);
    }
    public function obtenerDatos(){
        // $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.id_usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_cho");
        $datos = $this->db->get("chofer");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_cho){
        $this->db->where("id_cho",$id_cho);
        return $this->db->delete("chofer");
    }
    public function obtenerRegistro($id_cho){
        // $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.id_usu");
        $this->db->where("id_cho",$id_cho);
        $usuario= $this->db->get("chofer");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_cho,$datos){
        $this->db->where("id_cho",$id_cho);
        return $this->db->update("chofer",$datos);
    }
    // function choferPersonales($fk_not_usu){
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