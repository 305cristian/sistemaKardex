<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of evaluacion
 *
 * @author DELL
 */
class Index_controller extends MX_Controller{

    //put your code here
    function __construct() {
        parent:: __construct();
        $this->load->model('Index_Model');
        $this->load->helper('url');
    }

//   
     public function index() {

        $this->load->view('comun/headm');
        $this->load->view('comun/header');
        $this->load->view('admin/index');
        $this->load->view('comun/footer');
    }
    
   
    
   

}

?>