<style>
    #formulario input[type="radio"]{
        display: none; 
    }

</style>
<div class="container-fluid mt-5">
    <div class="bg-light mt-3">
        <h2>Administración / Proveedores</h2>
    </div>

    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalProveedores">Nuevo Proveedor</button>

    <div class="container-fluid">
        <div class="modal-body">
            <table id="idTblProveedores" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>CI/RUC</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Razon Social</th>
                        <th>Tipo Documento</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>


    <div class="modal fade" id="modalProveedores" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header" >
                        <h1 class="bg-light" id="modal-title">Nuevo Proveedor</h1> 
                    </div>
                    <div class="modal-body">
                        <form id="formulario" action="<?php echo base_url() ?>Admin_controller/insertarProveedor">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row" >
                                        <label class="col-form-label col-md-4" >Documento:</label>
                                        <div class="btn-group col-form-label col-md-8"  data-toggle="buttons">
                                            <label class="btn btn-info btn-sm" id="lblRC">
                                                <input type="radio" name="crp" id="idCedula" value="Cedula" >CEDULA
                                            </label>
                                            <label class="btn btn-info btn-sm " id="lblRR" >
                                                <input type="radio" name="crp" id="idRuc" value="Ruc" checked="">RUC
                                            </label>
                                            <label class="btn btn-info btn-sm " id="lblRP">
                                                <input type="radio" name="crp" id="idPasaporte" value="Pasaporte">PASAPORTE
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="idNombre" class="col-form-label col-md-4">Nombres:</label>
                                        <input  type="hidden" name="txtId">
                                        <input  type="text" name="txtNombre" id="idNombre" class="form-control form-control-sm col-form-input col-md-8">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="row mt-1 ">
                                        <label class="col-form-label col-md-4">CI/RUC/PAS:</label>
                                        <input  type="text" name="txtCiRuc" id="idCiRuc" class="form-control form-control-sm col-form-input col-md-8">
                                    </div>
                                    <div class="row mt-3">
                                        <label class="col-form-label col-md-4 ">Apellidos:</label>
                                        <input  type="text" name="txtApellido" id="idApellido" class="form-control form-control-sm col-form-label col-md-8">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-form-label col-md-2">Razon Social:</label>
                                <input  type="text" name="txtRazonSocial" id="idRazonSocial" class="form-control form-control-sm col-form-input col-md-10">
                            </div>
                            <div class="row">
                                <label class="col-form-label col-md-2">Direccion:</label>
                                <input  type="text" name="txtDireccion" id="idDireccion" class="form-control form-control-sm col-form-input col-md-10">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label class="col-form-label col-md-4">Correo:</label>
                                        <input  type="text" name="txtCorreo" id="idCorreo" class="form-control form-control-sm col-form-input col-md-8">
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="row">
                                        <label class="col-form-label col-md-4 ">Telefono:</label>
                                        <input  type="text" name="txtTelefono" id="idTelefono" class="form-control form-control-sm col-form-label col-md-8">
                                    </div>
                                </div>
                            </div>

                    </div>


                    </form>

                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-primary" id="idInsertar">Insertar</button>
                    <button type="button" class="btn btn-danger" id="idCancelar" data-dismiss="modal"onclick="limpiar();" >Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    cargarProveedores();

    function limpiar() {
        $('#formulario')[0].reset();
        $('input[type="hidden"]').val('');
        $('#idInsertar').text('Insertar');
        $('#modalProveedores').find('#modal-title').text('Nuevo Proveedor');
    }

    $('#idInsertar').click(function () {
        var url = $('#formulario').attr('action');
        var datos = $('#formulario').serialize();
      

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: datos,
            dataType: 'json',
            success: function (response, textStatus, jqXHR) {
                if (response) {
                    var msg = "";
                    $('#idTblProveedores').DataTable().destroy();
                    cargarProveedores()
                    $('#modalProveedores').modal('hide');
                    $('.modal-backdrop').remove();
                    if (response.type === 'add') {
                        msg = "Agregado exitosamente";
                    } else {
                        msg = "Actualizado exitosamente";
                    }
                    limpiar();
                    Command: toastr['success'](msg, 'Insertado');
                }
            },
            error: function () {
                Command: toastr['error']("Posible error en la DB", 'Error');
            }
        });
    });

    $('#idTblProveedores').on('click', '.item-edit', function () {
        var id = $(this).attr('data');
        $('#modalProveedores').modal('show');
        $('#modalProveedores').find('#modal-title').text('Actualize el Proveedor');
        $('#idInsertar').text('Actualizar');
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/mostrarProveedor',
            data: {id: id},
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {

                $('input[name="txtId"]').val(data.id);
                $('input[name="txtNombre"]').val(data.nombre);
                $('input[name="txtApellido"]').val(data.apellido);
                $('input[name="txtCiRuc"]').val(data.ci_ruc);
                $('input[name="txtRazonSocial"]').val(data.razon_social);
                $('input[name="txtDireccion"]').val(data.direccion);
                $('input[name="txtTelefono"]').val(data.telefono);
                $('input[name="txtCorreo"]').val(data.correo);
                if (data.tipo_documento === 'Cedula') {
                    $('#idCedula').prop('checked', true);
                    $('#lblRC').addClass('active')
                    $('#lblRR').removeClass('active')
                    $('#lblRP').removeClass('active')
                } else if (data.tipo_documento === 'Ruc') {
                    $('#idRuc').prop('checked', true);
                    $('#lblRR').addClass('active')
                    $('#lblRC').removeClass('active')
                    $('#lblRP').removeClass('active')
                } else {
                    $('#idPasaporte').prop('checked', true);
                    $('#lblRP').addClass('active')
                    $('#lblRC').removeClass('active')
                    $('#lblRR').removeClass('active')
                }



            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    function cargarProveedores() {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/obtenerProveedores',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
              
                $('#idTblProveedores').DataTable({
                    responsive: true,
//                    scrollX: true,
                    data: data,
                    columns: [
                        {data: 'id'},
                        {data: 'ci_ruc'},
                        {data: 'nombre'},
                        {data: 'apellido'},
                        {data: 'razon_social'},
                        {data: 'tipo_documento'},
                        {data: 'direccion'},
                        {data: 'correo'},
                        {data: 'telefono'},
                        {data: function (data, type, row) {
                                var a =
                                        ` <a href="#" class="btn btn-warning btn-sm item-edit" data="${data.id}"><li class="fa fa-edit"></li></a>
                                            <a href="#" class="btn btn-danger btn-sm item-delete" data="${data.id}"><li class="fa fa-trash-alt"></li></a>            
                                            `;
                                return a;
                            }}
                    ],
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                Command: toastr['erro']('Posible error en la DataBase', 'Error');
            }
        });

    }



</script>