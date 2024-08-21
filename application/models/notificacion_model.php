<?php 
class notificacion_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("notificaciones",$data);
    }
    public function obtenerDatos(){
        $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.id_usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_not");
        $datos = $this->db->get("notificaciones");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_not){
        $this->db->where("id_not",$id_not);
        return $this->db->delete("notificaciones");
    }
    public function obtenerRegistro($id_not){
        $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.id_usu");
        $this->db->join("empresas","usuarios.fk_usu_emp = empresas.id_emp");
        $this->db->where("id_not",$id_not);
        $usuario= $this->db->get("notificaciones");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_not,$datos){
        $this->db->where("id_not",$id_not);
        return $this->db->update("notificaciones",$datos);
    }
    function notificacionesPersonales($fk_not_usu){
        $sql="SELECT * FROM notificaciones WHERE fk_not_usu = $fk_not_usu";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
}


?>