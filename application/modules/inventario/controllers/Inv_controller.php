<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inv_controller
 *
 * @author DELL
 */
class Inv_controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent:: __construct();
        $this->load->model("");
        $this->load->helper("url");
    }

    public function index() {
        $this->load->view("comun/head");
        $this->load->view("comun/header");
        $this->load->view("inventario/inventario");
        $this->load->view("comun/footer");
    }

}
