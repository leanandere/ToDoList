<?php

class usuarios_model extends CI_Model{
    public function verificar($usuario="",$password=""){
       $this->db->select("usuario_id");
       $this->db->where("usuario",$usuario); 
       $this->db->where("password",$password);
       $this->db->limit(1);
       
       $res=$this->db->get("usuarios");
       if($res->num_rows()){
            $temp=$res->row_array();
            $this->actualiza_ult_login($temp["usuario_id"]);

            return $temp["usuario_id"];
       }else{
            return false;
       }
    }

    public function obtener($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        return $res->row_array();
    }

    public function actualiza_ult_login($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->set("ultlogin","NOW()",false);
        $this->db->update("usuarios");
    }
}

?>