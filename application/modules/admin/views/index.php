<?php
//if (!$this->session->userdata('is_logged')) {
//    redirect(base_url());
//}
?>
<?php $rol = $this->session->userdata('rol') ?>
<?php $nombreUser = $this->session->userdata('nombre') ?>
<?php $apellidoUser = $this->session->userdata('apellido') ?>


<style>
    .colorNav{
        background:slateblue ;
        color: white;
    }

    body {
        background-color: white;
    }

    .thumbnail {
        margin-top: 15px;
        margin-bottom: 5px;
    }
    .container{
        position: relative;
        top: 25px;
    }

    .cont-second {
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 0px;
        box-shadow: 0px 0px 6px #6a6b6b;
    }

    .cont-second:hover {
        box-shadow: 0px 0px 14px #6a6b6b;
    }

    .cont-second .btnEnlace{
        background: slateblue;
        width: auto;
        height: 40px;
    }
    .cont-second .link{
        position: relative;
        text-decoration: none;
        color: white;
        top: 7px;
    }

    .sombra {
        position: absolute;
        left: 52px;
        bottom: 62px;
    }

    .sombra:hover {
        box-shadow: 0px 0px 11px #007bff;
        color: #7abaff
    }

    .support:hover {
        box-shadow: 0px 0px 11px #ffffff;
        border-radius: 50px;
    }


</style>
<!--<nav class="navbar navbar-expand-lg navbar-light blue colorNav fixed-top">
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
</nav>-->


<div class="content-wrapper mt-5">
    <div class="container">
        <div class=" content-header text-center col-sm-12 mt-3 ">
            <div class="row">                      
                <div class="col-sm-12 col-md-3">
                    <div class=" cont-second ">
                        <div class="thumbnail">
                            <span><i class="fas fa-users-cog fa-4x"></i></span>
                            <h5>ADMINISTRACION</h5>                                
                        </div>
                        <div class=" btnEnlace mt-3">
                            <a href="<?php echo base_url() ?>administracion" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-3">
                    <div class=" cont-second">
                        <div class="thumbnail">
                            <span><i class="fas fa-cart-plus fa-4x"></i></span>
                            <h5>COMPRAS</h5>                                
                        </div>
                        <div class=" btnEnlace mt-3">
                            <a href="<?php echo base_url() ?>compras" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-3">
                    <div class=" cont-second">
                        <div class="thumbnail">
                            <span><i class="fas fa-cash-register fa-4x"></i></span>
                            <h5>VENTAS</h5>                                
                        </div>
                        <div class=" btnEnlace mt-3">
                            <a href="<?php echo base_url() ?>ventas" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-3">
                    <div class=" cont-second">
                        <div class="thumbnail">
                            <span><i class="fas fa-poll-h fa-4x"></i></span>
                            <h5>INVENTARIO</h5>                                
                        </div>
                        <div class=" btnEnlace mt-3">
                            <a href="<?php echo base_url() ?>inventario" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                        </div>
                    </div>

                </div>



            </div>
        </div>


    </div>
</div>

<!--Inicio Modal soporte-->
<div id="idModal-Soporte" class="modal fade" data-backdrop=static data-keyboard=false>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Contactos</h1>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p>
                        <label>Telefono: 0992094788</label><br>
                        <label>Correo: pcris.994@gmail.com</label>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger mover" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--Fin Modal soporte-->

<!--/#wrapper--> 
<!--</div>-->
