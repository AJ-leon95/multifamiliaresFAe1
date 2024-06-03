<?php 
class empresa_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertar($data){
        return $this->db->insert("empresas",$data);
    }
    public function obtenerDatos(){
        $listadoempresas = $this->db->get("empresas");
        if($listadoempresas->num_rows() > 0){
            return $listadoempresas->result();
        }else{
            return false;
        }

    }
    function borrarRegistro($id_emp){
        $this->db->where("id_emp",$id_emp);
        return $this->db->delete("empresas");
    }
    function obtenerEmpresa($id_emp){
        $this->db->where("id_emp",$id_emp);
        $empresa = $this->db->get("empresas");
        if ($empresa->num_rows() > 0){
            return $empresa->row();
        }else{
            return false;
        }
    }
    function actualizar($id_emp,$datos){
        $this->db->where("id_emp",$id_emp);
        return $this->db->update("empresas",$datos);
    }
}

?>