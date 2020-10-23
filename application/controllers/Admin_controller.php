<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_controller
 *
 * @author DELL
 */
class Admin_controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->helper("url");
    }

    public function index() {
        $this->load->view("kardex/head");
        $this->load->view("kardex/header");
        $this->load->view("kardex/admin/administracion");
        $this->load->view("kardex/footer");
    }

    //LLAMADO Y METODOS DE LA VISTA MARCAS
    public function marca() {
        $this->load->view("kardex/head");
        $this->load->view("kardex/header");
        $this->load->view("kardex/admin/marca");
        $this->load->view("kardex/footer");
    }

    public function obtenerMarcas() {
        $resultado = $this->Admin_model->obtenerMarcas();
        echo json_encode($resultado);
    }

    public function obtenerMarca() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->obtenerMarca($id);
        echo json_encode($resultado);
    }

    public function insertarMarca() {
        $id = $this->input->post('txtId');

        $datos = array(
            'marca' => $this->input->post('txtNombre'),
            'detalle' => $this->input->post('txtDetalle'),
            'estado' => $this->input->post('estado')
        );


        if ($id) {
            $resultado = $this->Admin_model->insertarMarca($id, $datos);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        } else {
            $resultado = $this->Admin_model->insertarMarca($id, $datos);
            $msg['success'] = false;
            $msg['type'] = 'add';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    }

    public function eliminarMarca() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->eliminarMarca($id);

        $msg['success'] = false;
        $msg['type'] = 'delete';

        if ($resultado) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //LLAMADO Y METODOS DE LA VISTA TIPO
    public function tipo() {
        $this->load->view("kardex/head");
        $this->load->view("kardex/header");
        $this->load->view("kardex/admin/tipo");
        $this->load->view("kardex/footer");
    }

    public function obtenerTipos() {
        $resultado = $this->Admin_model->obtenerTipos();
        echo json_encode($resultado);
    }

    public function obtenerTipo() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->obtenerTipo($id);
        echo json_encode($resultado);
    }

    public function insertarTipo() {
        $id = $this->input->post('txtId');

        $datos = array(
            'nombre' => $this->input->post('txtNombre'),
            'detalle' => $this->input->post('txtDetalle'),
            'estado' => $this->input->post('estado')
        );


        if ($id) {
            $resultado = $this->Admin_model->insertarTipo($id, $datos);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        } else {
            $resultado = $this->Admin_model->insertarTipo($id, $datos);
            $msg['success'] = false;
            $msg['type'] = 'add';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    }

    public function eliminarTipo() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->eliminarTipo($id);

        $msg['success'] = false;
        $msg['type'] = 'delete';

        if ($resultado) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //METODOS DE LA VISTA GRUPO
    public function grupo() {
        $this->load->view("kardex/head");
        $this->load->view("kardex/header");
        $this->load->view("kardex/admin/grupo");
        $this->load->view("kardex/footer");
    }

    public function obtenerGrupos() {
        $resultado = $this->Admin_model->obtenerGrupos();
        echo json_encode($resultado);
    }

    public function obtenerGrupo() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->obtenerGrupo($id);
        echo json_encode($resultado);
    }

    public function insertarGrupo() {
        $id = $this->input->post('txtId');

        $datos = array(
            'nombreG' => $this->input->post('txtNombre'),
            'detalle' => $this->input->post('txtDetalle'),
            'estado' => $this->input->post('estado')
        );


        if ($id) {
            $resultado = $this->Admin_model->insertarGrupo($id, $datos);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        } else {
            $resultado = $this->Admin_model->insertarGrupo($id, $datos);
            $msg['success'] = false;
            $msg['type'] = 'add';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    }

    public function eliminarGrupo() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->eliminarGrupo($id);

        $msg['success'] = false;
        $msg['type'] = 'delete';

        if ($resultado) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //METODOS DE LA VISTA SUBGRUPO
    public function insertarSubGrupo() {
        $id = $this->input->post('txtIdSub');

        $datos = array(
            'nombre' => $this->input->post('txtNombreSub'),
            'detalle' => $this->input->post('txtDetalleSub'),
            'estado' => $this->input->post('estadoSub'),
            'fkGrupo' => $this->input->post('comboGrupo')
        );

        if ($id) {
            $resultado = $this->Admin_model->insertarSubGrupo($datos, $id);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        } else {
            $resultado = $this->Admin_model->insertarSubGrupo($datos, $id);
            $msg['success'] = false;
            $msg['type'] = 'add';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    }

    public function eliminarSubgrupo() {

        $id = $this->input->post('id');

        $resultado = $this->Admin_model->eliminarSubgrupo($id);
        $msg['success'] = false;
        $msg['type'] = 'delete';
        if ($resultado) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function obtenerSubgrupo() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->obtenerSubgrupo($id);
        echo json_encode($resultado);
    }

    public function obtenerSubGrupos() {
        $resultado = $this->Admin_model->obtenerSubGrupos();
        echo json_encode($resultado);
    }

    //METODOS DE L VISTA NUEVO PRODUCTO

    public function producto() {
        $this->load->view('kardex/head');
        $this->load->view('kardex/header');
        $this->load->view('kardex/admin/nuevoProducto');
        $this->load->view('kardex/footer');
    }

    function obtenerMarcasAtv() {
        $resultado = $this->Admin_model->obtenerMarcasAtv();
        echo json_encode($resultado);
    }

    function obtenerTipoAtv() {
        $resultado = $this->Admin_model->obtenerTipoAtv();
        echo json_encode($resultado);
    }

    function obtenerGrupoAtv() {
        $resultado = $this->Admin_model->obtenerGrupoAtv();
        echo json_encode($resultado);
    }

    function obtenerSubGrupoAtv() {

        $fkG = $this->input->post('fk');

        $resultado = $this->Admin_model->obtenerSubGrupoAtv($fkG);
        echo json_encode($resultado);
    }

    public function insertarProducto() {

        $id = $this->input->post('txtProd');

        if ($id) {
            $datos = array(
                'nombre' => $this->input->post('txtNombre'),
                'descripcion' => $this->input->post('comboDescripcion'),
                'stock_Min' => $this->input->post('txtMin'),
                'stock_Max' => $this->input->post('txtMax'),
                'estado' => $this->input->post('estado'),
                'iva' => $this->input->post('iva'),
                'cod_barra1' => $this->input->post('txtCB1'),
                'cod_barra2' => $this->input->post('txtCB2'),
                'cod_barra3' => $this->input->post('txtCB3'),
                'fkMarca' => $this->input->post('comboMarca'),
                'fkSubGrupo' => $this->input->post('comboSubGrupo'),
                'fkTipo' => $this->input->post('comboTipo')
            );
            $resultado = $this->Admin_model->insertarProducto($datos, $id);

            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        } else {
            $datos = array(
                'nombre' => $this->input->post('txtNombre'),
                'descripcion' => $this->input->post('comboDescripcion'),
                'stock_Min' => $this->input->post('txtMin'),
                'stock_Max' => $this->input->post('txtMax'),
                'estado' => $this->input->post('estado'),
                'iva' => $this->input->post('iva'),
                'cod_barra1' => $this->input->post('txtCB1'),
                'cod_barra2' => $this->input->post('txtCB2'),
                'cod_barra3' => $this->input->post('txtCB3'),
                'fkMarca' => $this->input->post('comboMarca'),
                'fkSubGrupo' => $this->input->post('comboSubGrupo'),
                'fkTipo' => $this->input->post('comboTipo')
            );
            $resultado = $this->Admin_model->insertarProducto($datos, $id);

            $msg['success'] = false;
            $msg['type'] = 'add';
            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    }

    public function obtenerProductos() {
        $resultado = $this->Admin_model->obtenerProductos();
        echo json_encode($resultado);
    }

    public function obtenerProducto() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->obtenerProducto($id);
        echo json_encode($resultado);
    }

    public function eliminarProducto() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->eliminarProducto($id);
        echo json_encode($resultado);
    }

    //METODOS DE LA VISTA PROVEEDORES

    public function proveedores() {
        $this->load->view('kardex/head');
        $this->load->view('kardex/header');
        $this->load->view('kardex/admin/proveedores');
        $this->load->view('kardex/footer');
    }

    public function insertarProveedor() {
        $id = $this->input->post('txtId');

        if ($id) {
            $datos = array(
                'tipo_documento' => $this->input->post('crp'),
                'ci_ruc' => $this->input->post('txtCiRuc'),
                'nombre' => $this->input->post('txtNombre'),
                'apellido' => $this->input->post('txtApellido'),
                'razon_social' => $this->input->post('txtRazonSocial'),
                'direccion' => $this->input->post('txtDireccion'),
                'telefono' => $this->input->post('txtTelefono'),
                'correo' => $this->input->post('txtCorreo'),
            );

            $resultado = $this->Admin_model->insertarProveedor($datos, $id);

            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($resultado) {
                $msg['success'] = true;
            }

            echo json_encode($msg);
        } else {
            $datos = array(
                'tipo_documento' => $this->input->post('crp'),
                'ci_ruc' => $this->input->post('txtCiRuc'),
                'nombre' => $this->input->post('txtNombre'),
                'apellido' => $this->input->post('txtApellido'),
                'razon_social' => $this->input->post('txtRazonSocial'),
                'direccion' => $this->input->post('txtDireccion'),
                'telefono' => $this->input->post('txtTelefono'),
                'correo' => $this->input->post('txtCorreo'),
            );

            $resultado = $this->Admin_model->insertarProveedor($datos, $id);

            $msg['success'] = false;
            $msg['type'] = 'add';
            if ($resultado) {
                $msg['success'] = true;
            }

            echo json_encode($msg);
        }
    }

    public function obtenerProveedores() {
        $resultado = $this->Admin_model->obtenerProveedores();
        echo json_encode($resultado);
    }

    public function mostrarProveedor() {
        $id = $this->input->post('id');
        $resultado = $this->Admin_model->mostrarProveedor($id);


        echo json_encode($resultado);
    }

    public function clientes() {
        $this->load->view('kardex/head');
        $this->load->view('kardex/header');
        $this->load->view('kardex/admin/clientes.php');
        $this->load->view('kardex/footer');
    }

    //METODOS DEL MODULO CLIENTES

    public function mostrarClientes() {
        $resultado['clientes'] = $this->Admin_model->mostrarClientes();
        echo json_encode($resultado);
    }

    public function insertarCliente() {
        $validar = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellido',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'cedula',
                'label' => 'Cedula',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'estado',
                'label' => 'Estado',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($validar);
        if ($this->form_validation->run() == FALSE) {
            $respuesta['error'] = true;
            $respuesta['msg'] = array(
                'nombre' => form_error('nombre'),
                'apellido' => form_error('apellido'),
                'cedula' => form_error('cedula'),
                'genero' => form_error('genero'),
                'estado' => form_error('estado'),
            );
        } else {

            $datos = array(
                "cli_nombre" => $this->input->post('nombre'),
                "cli_apellido" => $this->input->post('apellido'),
                "cli_cedula" => $this->input->post('cedula'),
                "cli_genero" => $this->input->post('genero'),
                "cli_estado" => $this->input->post('estado')
            );

            $resultado = $this->Admin_model->insertarCliente($datos);

            if ($resultado) {
                $respuesta['error'] = false;
                $respuesta['msg'] = 'Usuario agregado correctamente';
            }
        }
        echo json_encode($respuesta);
    }

    public function actualizarCliente() {
        $validar = array(
            array(
                'field' => 'cli_nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'cli_apellido',
                'label' => 'Apellido',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'cli_cedula',
                'label' => 'Cedula',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'cli_estado',
                'label' => 'Estado',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($validar);
        if ($this->form_validation->run() == FALSE) {
            $respuesta['error'] = true;
            $respuesta['msg'] = array(
                'nombre' => form_error('cli_nombre'),
                'apellido' => form_error('cli_apellido'),
                'cedula' => form_error('cli_cedula'),
                'estado' => form_error('cli_estado'),
            );
        } else {

            $id = $this->input->post('id');
            $datos = array(
                "cli_nombre" => $this->input->post('cli_nombre'),
                "cli_apellido" => $this->input->post('cli_apellido'),
                "cli_cedula" => $this->input->post('cli_cedula'),
                "cli_genero" => $this->input->post('cli_genero'),
                "cli_estado" => $this->input->post('cli_estado')
            );

            $resultado = $this->Admin_model->actualizarCliente($id, $datos);
            if ($resultado) {
                $respuesta['error'] = false;
                $respuesta['msg'] = 'Usuario actualizado correctamente';
            }
        }
        echo json_encode($respuesta);
    }

    public function eliminarCliente() {
        $id = $this->input->post('id');

        $resultado = $this->Admin_model->eliminarCliente($id);

        if ($resultado) {
            $respuesta['error'] = true;
            $respuesta['msg'] = 'Usuario eliminado exitosamente';
        }
        echo json_encode($respuesta);
    }

}
