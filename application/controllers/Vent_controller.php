<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vent_controller
 *
 * @author DELL
 */
class Vent_controller extends CI_Controller{
    //put your code here
    function __construct() {
        parent:: __construct();
        $this->load->model("");
        $this->load->helper("url");
    }

    public function index() {
        $this->load->view("kardex/head");
        $this->load->view("kardex/header");
        $this->load->view("kardex/ventas/ventas");
        $this->load->view("kardex/footer");
    }
}
