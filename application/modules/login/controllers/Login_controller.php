<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_controller
 *
 * @author DELL
 */
class Login_controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent:: __construct();
        $this->load->model('login_model');
        $this->load->helper('url');
    }

    public function index() {

//        if ($this->session->userdata('is_logged')) {
//            redirect(base_url('opciones_controller'));
//        }

        $this->load->view('kardex/login');
    }
      

    public function login() {

        $user = $this->input->get('user');
        $pass = $this->input->get('pass');
        $resultado = $this->login_model->login($user, $pass);
        if ($resultado) {

            $datosUser = array('id' => $resultado->id,
                'is_logged' => true,
                'nombre' => $resultado->nombre,
                'apellido' => $resultado->apellido,
                'user' => $resultado->usuario,
            );

            $this->session->set_userdata($datosUser);
//            $this->session->set_flashdata('msg','Usuario: '.$datosUser['user']);
            echo json_encode($resultado);
        } else {
            echo json_encode($resultado);
        }
    }

    public function logout() {
        $dato = array('id', 'nombre', 'apellido','usuario');
        $this->session->unset_userdata($dato);
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
