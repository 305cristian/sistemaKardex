<style type="text/css">
    .alinear{
        position: relative;
        left: 40px;
    }
</style>

<div class="container-fluid mt-5">

    <div class="bg-light mt-3">
        <h2>Administracion / Nuevo Producto</h2>    
    </div>


    <div class="container col-sm-12 mt-3">

        <!--<button class="btn btn-outline-primary alinear" data-toggle="modal" data-target="#modalProducto" >Nuevo Producto</button>-->

        <!--Inicio-->
        <div class="container-fluid">                       
            <div class="modal-body">
                <table id="idTblProductos" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
                    <thead>
                        <tr >
                            <th>id</th>
                            <th>Producto</th>
                            <th>Detalle</th>
                            <th>Marca</th>
                            <th>Grupo</th>
                            <th>Subgrupo</th>
                            <th>Tipo</th>
                            <th>iva</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="idTableBody">

                    </tbody>
                </table>
            </div>

        </div>
        <!--Fin -->

    </div>


    <div class=" modal fade" id="modalProducto" data-backdrop=static data-keyboard=false>
        <div class=" modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header bg-light">
                        <h1 id="modal-title">Cree un nuevo Producto</h1>
                    </div>
                    <div class="modal-body">
                        <form id="idFormulario" action="<?php echo base_url(); ?>Admin_controller/insertarProducto">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Ingrese el Nombre</label>
                                    <input type="hidden" name="txtProd">
                                    <input class="form-control " type="text" id="idNombre" name="txtNombre">
                                    <br>
                                    <label>Ingrese la Descripcion</label>
                                    <select class="form-control" id="idComboDesc" name="comboDescripcion">
                                        <option>UNI</option>
                                        <option>KG</option>
                                        <option>QQ</option>
                                        <option>LB</option>
                                        <option>ROLLO</option>
                                        <option>DYSPLEY</option>
                                        <option>ATADO</option>
                                        <option>CAJA</option>
                                    </select>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Stock Min</label>
                                            <input class="form-control" type="number" id="idMin" name="txtMin" value="5">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Stock Max</label>
                                            <input class="form-control" type="number" id="idMax" name="txtMax" value="100">
                                        </div>
                                    </div>
                                    <br>
                                    <input class="" type="checkbox" id="" name="estado" checked=""> <label id="idlblEstadoSub"> Activo</label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Selecione la Marca</label>
                                    <select class="form-control" id="idComboMarca" name="comboMarca"></select>
                                    <br>
                                    <label>Selecione el Tipo</label>
                                    <select class="form-control" id="idComboTipo" name="comboTipo"></select>
                                    <br>
                                    <label>Selecione el Grupo</label>
                                    <select class="form-control item-select" id="idComboGrupo" name="comboGrupo"></select>
                                    <br>
                                    <label>Selecione el SubGrupo</label>
                                    <select class="form-control" id="idComboSubGrupo" name="comboSubGrupo"></select>


                                </div>
                                <div class="col-sm-4">
                                    <label>Codigo de Barras 1</label>
                                    <input class="form-control" type="text" id="idCB1" name="txtCB1">
                                    <br>
                                    <label>Codigo de Barras 2</label>
                                    <input class="form-control" type="text" id="idCB2" name="txtCB2">
                                    <br>
                                    <label>Codigo de Barras 3</label>
                                    <input class="form-control" type="text" id="idCB3" name="txtCB3">
                                    <br>
                                    <input type="radio" id="idIva0" name="iva"  value="0" checked=""> IVA - TARIFA 0%<br>
                                    <input type="radio" id="idIva12" name="iva" value="12"> IVA - TARIFA 12%<br>

                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-primary" id="idInsertar">Insertar</button>
                        <button type="button" class="btn btn-danger" id="idCancelar" data-dismiss="modal" onclick=limpiar();>Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>


    //MARCAS
    cargarMarca();

    //TIPOS
    cargarTipo();

    //GRUPOS
    cargarGrupo();

    //PRODUCTOS
    cargarProductos()


    function limpiar() {
        $('#idFormulario')[0].reset();
        $('input[type="hidden"]').val('');
        $('#idInsertar').text('Insertar');
        $('#modalProducto').find('#modal-title').text('Cree un nuevo producto');
    }



    function cargarMarca() {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/obtenerMarcasAtv',
            dataType: 'json',
            success: function (response) {
                if (response) {
//                    var registro=eval(response)
                    var cuerpoCombo = '';
                    for (var i = 0; i < response.length; i++) {
                        cuerpoCombo += '<option id="cbx" value="' + response[i].id + '">' + response[i].id + ': ' + response[i].marca + '</option>';
                    }
                    $('#idComboMarca').html(cuerpoCombo);

                }
            },
            error: function () {
                command:toastr['error']('Posible error en la DB', '!');
            }
        });
    }
    function cargarTipo() {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/obtenerTipoAtv',
            dataType: 'json',
            success: function (response) {
                if (response) {
//                    var registro=eval(response)
                    var cuerpoCombo = '';
                    for (var i = 0; i < response.length; i++) {
                        cuerpoCombo += '<option id="cbx" value="' + response[i].id + '">' + response[i].id + ': ' + response[i].nombre + '</option>';
                    }
                    $('#idComboTipo').html(cuerpoCombo);
                }
            },
            error: function () {
                command:toastr['error']('Posible error en la DB', '!');
            }
        });
    }
    function cargarGrupo() {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/obtenerGrupoAtv',
            dataType: 'json',
            success: function (response) {
                if (response) {
//                    var registro=eval(response)
                    var cuerpoCombo = '';
                    for (var i = 0; i < response.length; i++) {
                        cuerpoCombo += '<option id="cbxg" value="' + response[i].id + '">' + response[i].id + ': ' + response[i].nombreG + '</option>';
                    }
                    $('#idComboGrupo').html(cuerpoCombo);
                    var fk = $('#idComboGrupo').val();
                    cargarSubGrupo(fk);
                }
            },
            error: function () {
                command:toastr['error']('Posible error en la DB', '!');
            }
        });
    }
    function cargarSubGrupo(fkG) {//Recivo el id de Grupo por parametros
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/obtenerSubGrupoAtv',
            data: {fk: fkG},
            dataType: 'json',
            success: function (response) {
                var cuerpoCombo = '';
                for (var i = 0; i < response.length; i++) {
                    cuerpoCombo += '<option id="cbx" value="' + response[i].id + '">' + response[i].id + ': ' + response[i].nombre + '</option>';
                }
                $('#idComboSubGrupo').html(cuerpoCombo);
            },
            error: function () {
                command:toastr['error']('Posible error en la DB', '!');
            }
        });
    }

//Selecionamos el grupo y se acuerdo a la selecion cargamos el subgrupo 
    $('#idComboGrupo').on('change', function () {
        var id = $(this).val();
        cargarSubGrupo(id);
    });

    $('#idInsertar').click(function () {
        var datos = $('#idFormulario').serialize();
        var url = $('#idFormulario').attr('action');
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response) {
                    var msg = "";
                    $('#idTblProductos').DataTable().destroy();
                    cargarProductos();
                    $('#modalProducto').modal('hide');
                    $('.modal-backdrop').remove();
                    limpiar();
                    if (response.type === 'add') {
                        msg = "Agregado exitosamente";
                    } else {
                        msg = "Actualizado exitosamente";
                    }
                    limpiar();
                    command: toastr['success'](msg, 'Insertado');
                } else {
                    Command: toastr["error"]("Posible error en la DB", 'Error')
                }
            },
            error: function () {
                Command: toastr["error"]("Posible error en la DB", 'Error')
            }
        });
    });

    $('#idTblProductos').on('click', '.item-edit', function () {

        var id = $(this).attr('data');
        $('#modalProducto').modal('show');
        $('#modalProducto').find('#modal-title').text('Actualize el producto');
        $('#idInsertar').text('Actualizar')
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>Admin_controller/obtenerProducto',
            data: {id: id},
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {

//                cargarSubGrupo(data.fkGrupo);
                $('input[name="txtProd"]').val(data.id);
                $('input[name="txtNombre"]').val(data.nombre);
                $('input[name="txtMin"]').val(data.stock_min);
                $('input[name="txtMax"]').val(data.stock_max);
                $('input[name="txtCB1"]').val(data.cod_barra1);
                $('input[name="txtCB2"]').val(data.cod_barra2);
                $('input[name="txtCB3"]').val(data.cod_barra3);
                $('select[name="comboDescripcion"]').val(data.descripcion);
                $('select[name="comboMarca"]').val(data.fkMarca);
                $('select[name="comboTipo"]').val(data.fkTipo);
                $('select[name="comboGrupo"]').val(data.fkGrupo);
                $('select[name="comboSubGrupo"]').val(data.fkSubGrupo);
                if (data.iva === '12') {
                    $('#idIva12').prop('checked', true);
                } else {
                    $('#idIva0').prop('checked', true);
                }
                if (data.estado === 'on') {
                    $('input[name=estado]').prop('checked', true);
                    $('#idlblEstadoSub').text('Activo');
                } else {
                    $('input[name=estado]').prop('checked', false);
                    $('#idlblEstadoSub').text('Deshabilitado');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Command: toastr["error"]("Posible error en la DB", 'Error')
            }

        });
    });

    $('#idTblProductos').on('click', '.item-delete', function () {
        var id = $(this).attr('data');
        swal.fire({
            title: "¿Estas seguro?",
            text: "Este paso eliminara definitivamente el Producto,  siempre que no este asociada a otra tabla, caso contrario dara erro al eliminar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#CC0000",
            confirmButtonText: "¡Si!",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false}).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url() ?>Admin_controller/eliminarProducto',
                    data: {id: id},
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response) {
                            cargarProductos()
                            $('#idTblProductos').DataTable().destroy();
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'Producto eliminado exitosamente',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Command: toastr['error']('No se obtubo respuesta de la base de datos', '!');
                        }
                    }
                });
            } 
        });
         
    });




    function cargarProductos() {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: "<?php echo base_url() ?>Admin_controller/obtenerProductos",
            dataType: 'json',
            success: function (data) {
                $('#idTblProductos').DataTable({
                    responsive: true,
                    lengthMenu: [[7, 10, 15, -1], [7, 10, 15, "Todo"]],
                    dom: "<'row'<'col-sm-12 col-md-12'B>>" +
                            "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [{

                            text: '<li class="fas fa-clipboard-list"></li> Nuevo Producto',
                            titleAttr: 'Nuevo Producto',
                            className: 'btn btn-primary btn-sm',
                            action: function () {
                                $('#modalProducto').modal('show')
                            }

                        }, {
                            extend: 'excelHtml5',
                            text: '<li class="fas fa-file-excel"></li> EXCEL',
                            titleAttr: 'Exportar a EXCEL',
                            className: 'btn btn-success btn-sm'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<li class="fas fa-file-pdf"></li> PDF',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-danger btn-sm'
                        },
                        {
                            extend: 'print',
                            text: '<li class="fas fa-print"></li> IMPRIMIR',
                            titleAttr: 'Imprimir Documento',
                            className: 'btn btn-info btn-sm'
                        }
                    ],
                    data: data,
                    columns: [

                        {data: 'id'},
                        {data: 'nombreProd'},
                        {data: 'descripcion'},
                        {data: 'marca'},
                        {data: 'nombreG'},
                        {data: 'nombreSubG'},
                        {data: 'nombreTipo'},
                        {data: 'iva'},
                        {data: 'estado'},
                        {data: function (data, type, row) {
                                var a =
                                        ` <a href="#" class="btn btn-warning btn-sm item-edit" data="${data.id}"><li class="fa fa-edit"></li></a>
                                            <a href="#" class="btn btn-danger btn-sm item-delete" data="${data.id}"><li class="fa fa-trash-alt"></li></a>            
                                            `;
                                return a;
                            }
                        }
                    ],
                    columnDefs: [
                        {
                            targets: [8],
                            data: 'estado',
                            render: function (data, type, row) {
                                if (data === 'on') {
                                    return '<span>Activo</span>';
                                } else {
                                    return '<span>Deshabilitado</span>';
                                }
                            }

                        }
                    ]

                });
            }

        });
    }
</script>
