<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eval_Model
 *
 * @author DELL
 */
class Index_Model extends CI_Model {

    //put your code here
    function __construct() {
        parent:: __construct();
    }

    public function cambiarEstado($idUser, $taller) {

        $arraytaller = array($taller => '1'); 

        $consulta = $this->db->where('id', $idUser)
                ->update('login', $arraytaller);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerResultados() {
        $consulta = $this->db->get('login');
        if ($consulta->num_rows()>0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

}
