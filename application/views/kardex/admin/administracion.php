<?php
//if (!$this->session->userdata('is_logged')) {
//    redirect(base_url());
//}
?>
<?php $rol = $this->session->userdata('rol') ?>
<?php $nombreUser = $this->session->userdata('nombre') ?>
<?php $apellidoUser = $this->session->userdata('apellido') ?>


<style>
    body {
        background-color: white;
    }

    .thumbnail {
        margin-top: 15px;
        margin-bottom: 5px;
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
<div class="container-fluid mt-5">
    <div class="container text-center col-sm-12 mt-3">
        <div class="row">                      
            <div class="col-sm-12 col-md-3">
                <div class=" cont-second">
                    <div class="thumbnail">
                        <span><i class="fas fa-clipboard-list fa-4x"></i></span>
                        <h5>PRODUCTOS</h5>                                
                    </div>
                    <div class=" btnEnlace mt-3">
                        <a href="<?php echo base_url()?>producto_controller" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>

            </div>
            
            <div class="col-sm-12 col-md-3">
                <div class=" cont-second">
                    <div class="thumbnail">
                        <span><i class="fas fa-users fa-4x"></i></span>
                        <h5>USUARIOS</h5>                                
                    </div>
                    <div class=" btnEnlace mt-3">
                        <a href="" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-md-3">
                <div class=" cont-second">
                    <div class="thumbnail">
                        <span><i class="fas fa-user-tie fa-4x"></i></span>
                        <h5>PROVEEDORES</h5>                                
                    </div>
                    <div class=" btnEnlace mt-3">
                        <a href="" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-md-3">
                <div class=" cont-second">
                    <div class="thumbnail">
                        <span><i class="fas fa-user-tie fa-4x"></i></span>
                        <h5>CLIENTES</h5>                                
                    </div>
                    <div class=" btnEnlace mt-3">
                        <a href="" class="link">Acceder al modulo  <span><i class="fas fa-arrow-circle-right"></i></span></a>
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
</div>
