<?php 
class settings_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    function ActualizarFotoBBDD($id , $nuevaFoto){
        $sql="UPDATE usuarios SET foto = '$nuevaFoto' WHERE id_usu = $id;";
        $result = $this->db->query($sql);
    }
    function ActualizarContraBBDD($id , $nuevaContra){
        $sql="UPDATE usuarios SET contrasenia = '$nuevaContra' WHERE id_usu = $id;";
        $result = $this->db->query($sql);
    }
}


?>