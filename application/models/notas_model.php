<?php

class notas_model extends CI_Model{

    function nueva($usuario_id="",$titulo="",$contenido=""){
        $this->db->set("usuario_id",$usuario_id);
        $this->db->set("titulo",$titulo);
        $this->db->set("contenido",$contenido);
        $this->db->insert("notas");
        return $this->db->insert_id();
    }

    function borrar($nota_id=""){
        $this->db->where("nota_id",$nota_id);
        $this->db->limit(1);
        $this->db->delete("notas");
        return $this->db->affected_rows();
    }

    function listar(){
        $this->db->order_by("fecha","desc");
        $res=$this->db->get("notas");
        return $res->result_array();
    }

    function tachar($nota_id)
    {
        $this->db->where("nota_id",$nota_id);
        $this->db->limit(1);
        $this->db->set("estado",2);
        $this->db->update("notas");
    }

    function destachar($nota_id)
    {
        $this->db->where("nota_id",$nota_id);
        $this->db->limit(1);
        $this->db->set("estado",1);
        $this->db->update("notas");
    }


}