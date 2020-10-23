<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_model
 *
 * @author DELL
 */
class Admin_model extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    //METODOS DE LA VISTA MARCA
    public function obtenerMarcas() {
        $consulta = $this->db->get('marca_prod');
        if ($consulta->num_rows() > 0) {
            return $consulta->result();        
        } else {
            return false;
        }
    }

    public function obtenerMarca($id) {
        $consulta = $this->db->select('*')
                ->from('marca_prod')
                ->where('id', $id)
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }

    public function insertarMarca($id, $datos) {

        if ($id) {
            $this->db->where('id', $id)
                    ->update('marca_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('marca_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function eliminarMarca($id) {
        $this->db->where('id', $id)
                ->delete('marca_prod');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //METODOS DE LA VISTA TIPO
    public function obtenerTipos() {
        $consulta = $this->db->get('tipo_prod');
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerTipo($id) {
        $consulta = $this->db->select('*')
                ->from('tipo_prod')
                ->where('id', $id)
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }

    public function insertarTipo($id, $datos) {

        if ($id) {
            $this->db->where('id', $id)
                    ->update('tipo_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('tipo_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function eliminarTipo($id) {
        $this->db->where('id', $id)
                ->delete('tipo_prod');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //METODOS DE LA VISTA GRUPO
    public function obtenerGrupos() {
        $consulta = $this->db->get('grupo_prod');
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerGrupo($id) {
        $consulta = $this->db->select('*')
                ->from('grupo_prod')
                ->where('id', $id)
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }

    public function insertarGrupo($id, $datos) {

        if ($id) {
            $this->db->where('id', $id)
                    ->update('grupo_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('grupo_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function eliminarGrupo($id) {
        $this->db->where('id', $id)
                ->delete('grupo_prod');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //METOS DE LA VISTA SUBGRUPO

    public function insertarSubGrupo($datos, $id) {

        if ($id) {
            $this->db->where('id', $id)
                    ->update('subgrupo_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('subgrupo_prod', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function eliminarSubgrupo($id) {
        $this->db->where('id', $id)
                ->delete('subgrupo_prod');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerSubgrupo($id) {
        $consulta = $this->db->select('*')
                ->from('subgrupo_prod')
                ->where('id', $id)
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }

    public function obtenerSubGrupos() {
        $consulta = $this->db->select('subgrupo_prod.id, 
                                        subgrupo_prod.nombre, 
                                        subgrupo_prod.detalle,
                                        subgrupo_prod.estado, 
                                        grupo_prod.nombreG')
                ->from('subgrupo_prod')
                ->join('grupo_prod', 'subgrupo_prod.fkGrupo=grupo_prod.id')
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    //METODOS DE LA VISTA PRODUCTO

    public function obtenerMarcasAtv() {

        $consulta = $this->db->select('*')
                ->from('marca_prod')
                ->where('estado ', 'on')
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerTipoAtv() {

        $consulta = $this->db->select('*')
                ->from('tipo_prod')
                ->where('estado ', 'on')
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerGrupoAtv() {

        $consulta = $this->db->select('*')
                ->from('grupo_prod')
                ->where('estado ', 'on')
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerSubGrupoAtv($fkSg) {

        $consulta = $this->db->select('*')
                ->from('subgrupo_prod')
                ->where('estado ', 'on')
                ->where('fkGrupo', $fkSg)
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function insertarProducto($datos, $id) {

        if ($id) {
            $this->db->where('id', $id)
                    ->update('productos', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('productos', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function obtenerProductos() {
        $consulta = $this->db->select('productos.id ,productos.nombre AS nombreProd,
                                        productos.descripcion,
                                        productos.stock_min,
                                        productos.stock_max,
                                        productos.estado,
                                        productos.iva,
                                        productos.cod_barra1,
                                        productos.cod_barra2,
					productos.cod_barra3,
                                        grupo_prod.nombreG,
                                        subgrupo_prod.nombre AS nombreSubG,
                                        marca_prod.marca, 
					tipo_prod.nombre AS nombreTipo')
                ->from('productos')
                ->join('marca_prod', 'productos.fkMarca=marca_prod.id')
                ->join('tipo_prod', 'productos.fkTipo=tipo_prod.id')
                ->join('subgrupo_prod', 'productos.fkSubGrupo=subgrupo_prod.id')
                ->join('grupo_prod', 'subgrupo_prod.fkGrupo=grupo_prod.id')
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerProducto($id) {
//        $consulta = $this->db->select('*')
        $consulta = $this->db->select('productos.id ,productos.nombre,
                                        productos.descripcion,
                                        productos.stock_min,
                                        productos.stock_max,
                                        productos.estado,
                                        productos.iva,
                                        productos.cod_barra1,
                                        productos.cod_barra2,
					productos.cod_barra3,
                                        productos.fkMarca,
                                        productos.fkTipo,
                                        productos.fkSubGrupo,
                                        subgrupo_prod.fkGrupo')
                ->from('productos')
                ->join('subgrupo_prod', 'productos.fkSubGrupo=subgrupo_prod.id')
                ->where('productos.id', $id)
                ->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }

    public function eliminarProducto($id) {
        $this->db->where('id', $id)
                ->delete('productos');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

//METODOS DE LA VISTA PROVEEDORES

    public function insertarProveedor($datos, $id) {

        if ($id) {
            $this->db->where('id', $id)
                    ->update('proveedores', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('proveedores', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function obtenerProveedores() {
        $consulta = $this->db->select('*')
                ->from('proveedores')
                ->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function mostrarProveedor($id) {
        $consulta = $this->db->select('*')
                ->from('proveedores')
                ->where('id', $id)
                ->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }

    //METODOS DEL MODULO CLIENTES
    public function mostrarClientes() {
        $consulta = $this->db->select('*')
                ->from('clientes')
                ->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function insertarCliente($datos) {
        if ($this->db->insert('clientes', $datos)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function actualizarCliente($id, $datos) {
        $this->db->where('id',$id)
                ->update('clientes',$datos);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
                
    }
    
    public function eliminarCliente($id) {
        $this->db->where('id',$id)
                ->delete('clientes');
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
                
        
    }

}
