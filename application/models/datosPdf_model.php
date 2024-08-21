<?php 
class datosPdf_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function obtenerTodosSocios() {
        $this->db->select('*');
        $this->db->from('usuarios'); 
        $this->db->where_in('perfil', ['GERENTE', 'PRESIDENTE', 'SECRETARIO', 'SOCIO']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function obtenerUsuariosGerentes() {
        $this->db->select('*');
        $this->db->from('usuarios'); 
        $this->db->where('perfil', 'GERENTE');
        $query = $this->db->get();
        return $query->result();
    }
    public function obtenerUsuarioPresidente() {
        $this->db->select('*');
        $this->db->from('usuarios'); 
        $this->db->where('perfil', 'PRESIDENTE');
        $query = $this->db->get();
        return $query->result();
    }
    public function obtenerUsuariosSecretario() {
        $this->db->select('*');
        $this->db->from('usuarios'); 
        $this->db->where('perfil', 'SECRETARIO');
        $query = $this->db->get();
        return $query->result();
    }
    // function notificacionesPersonales(){
    //     $sql="";
    //     $result = $this->db->query($sql);
    //     if ($result->num_rows()>0) {
    //         return $result->result();
    //     } else {
    //         return 0;
    //     }
    
   // }
    // function ActualizarContraBBDD($id , $nuevaContra){
    //     $sql="UPDATE usuarios SET contrasenia = '$nuevaContra' WHERE id_usu = $id;";
    //     $result = $this->db->query($sql);
    // }
}


?>