
<style>
    .colorNav{
        background:slateblue ;
        color: white;
    }
    .hoverr:hover{
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
    }


</style>

<nav class="navbar navbar-expand-lg navbar-light blue colorNav fixed-top">
    <button class="btn btn-outline-light" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
    <div class="sidebar-heading text-white font-weight-bold ml-3">
        <a class="nav-link text-white" href="<?php echo base_url(); ?>Index_controller">Sistema Web</a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo base_url(); ?>Index_controller">Home <span class="sr-only">(current)</span></a>
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
<div class="d-flex" id="wrapper"> 
    <div class="colorNav border-right" id="sidebar-wrapper">
        <div class="slidebar-header">
            <h1>.</h1>
        </div>
        <div class="list-group list-group-flush mt-5" id="idSubMenu">

            <a href="#idMenuAdm" class="list-group-item list-group-item-action colorNav hoverr dropdown-toggle" data-toggle="collapse" aria-expand="true" >Administracion</a>
            <ul class="collapse" id="idMenuAdm">
                <li >
                    <a href="<?php echo base_url()?>producto_controller">Nuevo Producto</a>
                </li> 
                <li >
                    <a href="<?php echo base_url()?>grupo_controller">Grupos</a>
                </li>
                <li >
                    <a href="<?php echo base_url()?>marca_controller">Marcas</a>
                </li>
                <li >
                    <a href="<?php echo base_url()?>tipo_controller">Tipo</a>
                </li>
                <li >
                    <a href="<?php base_url()?>clie_controller">Clientes</a>
                </li>
                <li >
                    <a href="<?php echo base_url()?>prove_controller">Proveedores</a>
                </li>
            </ul>
            <a href="#idMenuComp" class="list-group-item list-group-item-action colorNav hoverr dropdown-toggle" data-toggle="collapse" aria-expand="true" >Compras</a>
            <ul class="collapse" id="idMenuComp">
                <li >
                    <a href="#">Nueva Compra</a>
                </li>
                <li >
                    <a href="#">Registro de compras</a>
                </li>
            </ul>
            <a href="#idMenuVent" class="list-group-item list-group-item-action colorNav hoverr dropdown-toggle" data-toggle="collapse" aria-expand="true" >Ventas</a>
            <ul class="collapse" id="idMenuVent">
                <li >
                    <a href="#">Nueva Venta</a>
                </li>
                <li >
                    <a href="#">Registro de Ventas</a>
                </li>
            </ul>
            <a href="#idSubMenuInv" class="list-group-item list-group-item-action colorNav hoverr dropdown-toggle" data-toggle="collapse" aria-expanded="true">Inventario</a>                                        
            <ul class="collapse lisst-unstyled " id="idSubMenuInv">
                <li>
                    <a href="#">Inventario</a>
                </li>
                <li>
                    <a href="#" >Transferencias</a>
                </li>
                <li>
                    <a href="#" >Ajuste de Entrada</a>
                </li>
                <li>
                    <a href="#" >Ajuste de salida</a>
                </li>
            </ul>




            <a href="#" class="list-group-item list-group-item-action colorNav hoverr ">Reportes</a>
            <a href="#" class="list-group-item list-group-item-action colorNav hoverr " data-toggle="modal" data-target="#idModal-Soporte">Soporte</a>
        </div>
    </div>




