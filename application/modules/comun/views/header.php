
<style>
    .colorNav{
        background:slateblue ;
        color: white;
    }
    /*    .hoverr:hover{
            background:white ;
            color: slateblue;
            font-weight: bold;
    
        }
        .hoverr:focus{
            background:white ;
            color: slateblue;
            font-weight: bold;
        }
        #idSubMenu ul li a{
            padding: 10px;
            display: block;
            color: white;
            text-decoration: none;
    
        }
        #idSubMenu ul li a:hover{
            padding: 10px;
            display: block;
            font-weight: bold;
            text-decoration: none;
    
        }
        #idSubMenu ul li a:focus{
            padding: 10px;
            display: block;
            font-weight: bold;
            text-decoration: none;
    
        }
    
        #idSubMenu ul li{
            list-style: none;     
        }*/

    .sidebarTextColor ul li a p{
        color: white;
    }

    .sidebarMenuColor:hover {        
        font-weight: bold;
        box-shadow: 0px 0px 4px #FFFAFA;

    }
    .sidebarSubMenuColor:hover {             
        box-shadow: 0px 0px 2px #FFFAFA;
        color: darkgray;

    }
    .sidebarColorIcon{             
        color: white;

    }


</style>

<nav class="navbar navbar-expand-lg navbar-light blue colorNav fixed-top main-header"><!--clase main-header de anmintle-->

    <button class="btn btn-outline-light" data-widget="pushmenu" id="menu-toggle8"><span class="navbar-toggler-icon"></span></button>

    <div class="sidebar-heading text-white font-weight-bold ml-3">
        <a class="nav-link text-white" href="<?php echo base_url(); ?>main">Sistema Web</a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo base_url(); ?>main">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="" data-target="#idModal-Soporte" data-toggle="modal">Soporte <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="#">LogOut <span class="sr-only">(current)</span></a>
            </li>

        </ul>
    </div>
</nav>

<aside class="main-sidebar colorNav elevation-4">

    <a href="<?php echo base_url(); ?>main"" class="brand-link">
        <img src="assets/img/logo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="sidebarColorIcon">Ccomputers</span>
    </a>
    <hr>
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebarTextColor">
            <ul class=" nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
                <li class="nav-item">
                    <a href="#" class="nav-link sidebarMenuColor"><i class="nav-icon fas fa-table sidebarColorIcon"></i><p>Administración<i class="fas fa-angle-left right text-white"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>producto_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Nuevo Producto</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>grupo_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Grupos</p>
                            </a>
                        </li>

                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>marca_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Marcas</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>tipo_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Tipo</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor ">
                            <a href="<?php base_url() ?>clie_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor ">
                            <a href="<?php echo base_url() ?>prove_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link sidebarMenuColor"><i class="nav-icon fas fa-table sidebarColorIcon"></i><p>Compras<i class="fas fa-angle-left right text-white"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Nuevo Compra</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Registro de compras</p>
                            </a>
                        </li>


                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link sidebarMenuColor"><i class="nav-icon fas fa-table sidebarColorIcon"></i><p>Ventas<i class="fas fa-angle-left right text-white"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Nuevo Venta</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Registro de ventas</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link sidebarMenuColor"><i class="nav-icon fas fa-table sidebarColorIcon"></i><p>Inventario<i class="fas fa-angle-left right text-white"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Inventario</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Transferencias</p>
                            </a>
                        </li>

                        <li class="nav-item sidebarSubMenuColor">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Ajustes de entrada</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>Ajustes de salida</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link sidebarMenuColor"><i class="nav-icon fas fa-table sidebarColorIcon"></i><p>Reportes<i class="fas fa-angle-left right text-white"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>producto_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>sn</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>grupo_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>sn2</p>
                            </a>
                        </li>


                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link sidebarMenuColor"><i class="nav-icon fas fa-table sidebarColorIcon"></i><p>Soporte<i class="fas fa-angle-left right text-white"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>producto_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>sn</p>
                            </a>
                        </li>
                        <li class="nav-item sidebarSubMenuColor">
                            <a href="<?php echo base_url() ?>grupo_controller" class="nav-link">
                                <i class="far fa-circle nav-icon sidebarColorIcon"></i>
                                <p>sn2</p>
                            </a>
                        </li>

                    </ul>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>


</aside>

<!-- DE AQUI EN ADELANTE EMPIESA EL CONTENT MAIN-->