<?php 
class usuario_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data) {
        return $this->db->insert("usuarios",$data);
    }
    public function obtenerDatosUsu(){
        // $this->db->join("usuarios","notificaciones.fk_not_usu = usuarios.usu");
        // $this->db->join("usuarios","automoviles.fkau_usu = usuarios.id_usu");
        $datos = $this->db->get("usuarios");
        if($datos->num_rows() > 0){
            return $datos->result();

        }else{
            return false;
        }
    }
    public function borrar($id_usu){
        $this->db->where("id_usu",$id_usu);
        return $this->db->delete("usuarios");
    }
    public function obtenerRegistro($id_usu){
        $this->db->where("id_usu",$id_usu);
        $usuario= $this->db->get("usuarios");
        if($usuario->num_rows() > 0){
            return $usuario->row();
        }else{
            return false;
        }
    }
    public function procesoActu($id_usu,$datos){
        $this->db->where("id_usu",$id_usu);
        return $this->db->update("usuarios",$datos);
    }


    function obtenerPorEmailPassword($correo, $contrasenia)
    {
        $this->db->where("correo", $correo);
        $this->db->where("contrasenia", $contrasenia);
        $usuario = $this->db->get("usuarios");
        if ($usuario->num_rows() > 0) {
            return $usuario->row();
        }
        return false;
    }
    function comprobarCorreo($correo)
    {
        $this->db->where("correo", $correo);
        $usuario = $this->db->get("usuarios");
        if ($usuario->num_rows() > 0) {
            return $usuario->row();
        }
        return false;
    }
    function recuperarID($correo){
        $this->db->where("correo", $correo);
        $usuario = $this->db->get("usuarios");
        if ($usuario->num_rows() > 0) {
            return $usuario->row();
        }
        return false;
    
    }
    function cantidadClientes($opcion){
        $sql="SELECT COUNT(id_usu) as total_cli FROM usuarios WHERE perfil_usu = '$opcion';";
        $result = $this->db->query($sql);
        if ($result->num_rows()>0) {
            return $result->result();
        } else {
            return 0;
        }
    
    }
    function CambiarContraBBDD($correo,$nuevaPass){
        $sql="UPDATE usuarios
        SET contrasenia = '$nuevaPass'
        WHERE correo = '$correo';";
        $result = $this->db->query($sql);
    }
    public function usuarioExiste($correo) {
        $this->db->where('correo', $correo);
        $query = $this->db->get('usuarios');
        return $query->num_rows() > 0;
    }
    

}


?>