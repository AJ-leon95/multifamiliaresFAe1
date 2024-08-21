<?php 
class deporte_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("deportes",$data);
    }
    public function obtenerDatos(){
        
        $datos = $this->db->get("deportes");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_dep){
        $this->db->where("id_dep",$id_dep);
        return $this->db->delete("deportes");
    }
    public function obtenerRegistro($id_dep){
        $this->db->join("empresas","deportes.fk_dep_emp = empresas.id_emp");
        $this->db->where("id_dep",$id_dep);
        $usuario= $this->db->get("deportes");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_dep,$datos){
        $this->db->where("id_reu",$id_reu);
        return $this->db->update("deportes",$datos);
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