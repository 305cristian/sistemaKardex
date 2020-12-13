<style type="text/css">
    .alinear{
        position: relative;
        left: 40px;
    }
</style>

<div class="content-wrapper content-header mt-5">
    <div class="bg-light mt-3">
        <h2>Administracion / Tipo</h2>    
    </div>

    <div class="container col-sm-12 mt-3">

        <button class="btn btn-outline-success alinear" data-toggle="modal" data-target="#idModalTipo">Nuevo Tipo</button>

        <!--Inicio-->
        <div class="container-fluid">                       
            <div class="modal-body">
                <table id="idTbltipo" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
                    <thead>
                        <tr >
                            <th>id</th>
                            <th>Tipo</th>
                            <th>Detalle</th>
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

    <!-- INICIO Modal nueva marca-->
    <div class=" modal fade" id="idModalTipo" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h1 id="modal-title">Cree una Tipo</h1>
                    </div>
                    <div class="modal-body">
                        <form id="idFormInsertar" class="container" action="<?php echo base_url() ?>admin/Admin_controller/insertarTipo">
                            <div class="row">
                                <input type="hidden" name="txtId">
                                <label>Ingre el tipo</label>
                                <input class="form-control" type="text" name="txtNombre">
                            </div>
                            <br>
                            <div class="row">
                                <label>Detalle el tipo</label>
                                <input class="form-control" type="text" name="txtDetalle">
                            </div>
                            <br>
                            <div class="row"> 
                                <div class="col-md-6">
                                    <input id="idActivo" type="checkbox" name="estado" checked>
                                    <label id="idlblEstado">Activo</label>
                                </div>

                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" id="idInsertar" class="btn btn-primary"> Insertar</button>
                            <button type="button" id="idCancelar" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                        </div>


                    </div>    
                </div>

            </div>
        </div>
    </div>
    <!-- FIN Modal nueva marca-->
</div>
</div>

<script>

    mostrarMarcas();

    //Limpiar formulario
    $('#idCancelar').click(function () {
        $('#idFormInsertar')[0].reset();
        $('input[type="hidden"]').val('');
        $('#idInsertar').text('Insertar')
    });

    $('#idInsertar').click(function () {
        var url = $('#idFormInsertar').attr('action');
        var datos = $('#idFormInsertar').serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response) {
                    var msg = "";
                    $('#idTbltipo').DataTable().destroy();//reinicializamos el datatable
                    mostrarMarcas();//actualizamos la tabla marcas
                    $('#idModalTipo').modal('hide');//cerramos el modal
                    $('.modal-backdrop').remove();//cerramos el modal
                    $('#idFormInsertar')[0].reset();//Reseteamos el formulario
                    $('input[type="hidden"]').val('');//Para limpiar el Id en caso de haber realizado un update
                    if (response.type === 'add') {
                        msg = 'Agregado exitosamente';
                    } else {
                        msg = 'Actualizado exitosamente';
                    }
                    Command: toastr["success"](msg, "Insertado")
                } else {
                    Command: toastr["error"]("Posible error en la DB", 'Error')
                }

            },
            error: function () {
                Command: toastr["error"]("Posible error en la DB", 'Error')
            }

        });
    });


    $('#idTbltipo').on('click', '.item-edit', function () {
        var id = $(this).attr('data');

        $('#idModalTipo').find('#modal-title').text('Editar Tipo');
        $('#idInsertar').text('Actualizar');

        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>admin/Admin_Controller/obtenerTipo',
            data: {id: id},
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                $('input[name=txtId]').val(data.id);
                $('input[name=txtNombre]').val(data.nombre);
                $('input[name=txtDetalle]').val(data.detalle);
                if (data.estado === 'on') {
                    $("input[name=estado]").prop("checked", true);
                    $('#idlblEstado').text('Activo')
                } else {
                    $("input[name=estado]").prop("checked", false);
                    $('#idlblEstado').text('Deshabilitado')
                }

            },
            error: function () {
                alert('No se cargo la marca');
            }
        });
    });

    $('#idTbltipo').on('click', '.item-delete', function () {
        var id = $(this).attr('data');
        swal.fire({
            title: "¿Estas seguro?",
            text: "Este paso eliminara definitivamente el Tipo,  siempre que no este asociada a otra tabla, caso contrario dara erro al eliminar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "¡Si!",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false}).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: "<?php echo base_url(); ?>admin/Admin_controller/eliminarTipo",
                    data: {id: id},
                    success: function (response) {
                        if (response) {
                            $('#idTbltipo').DataTable().destroy();
                            mostrarMarcas();
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'Dato eliminado exitosamnete',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Command: toastr["error"]("No ha selecionado ninguna tipo Posible tabla asociada en la DB", 'Error')

                        }
                    },
                    error: function () {
                        Command: toastr["error"]("No ha selecionado ninguna tipo Posible tabla asociada en la DB", 'Error')
                    }
                });
            }
        });

    });
    function mostrarMarcas() {

        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>admin/Admin_controller/obtenerTipos",
            dataType: 'json',
            success: function (data) {
                $('#idTbltipo').dataTable({
                    lengthMenu: [[6, 10, 15, -1], [6, 10, 15, "Todo"]],
                    responsive: true,
                    data: data,
                    columns: [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'detalle'},
                        {data: 'estado'},
                        {data: function (data, type, row) {
                                var a =
                                        ` <a href="#" class="btn btn-warning btn-sm item-edit" data="${data.id}" data-toggle="modal" data-target="#idModalTipo"><li class="fa fa-edit"></li></a>
                                          <a href="#" class="btn btn-danger btn-sm item-delete" data="${data.id}"><li class="fa fa-trash-alt"></li></a>
                                        `;
                                return a;
                            }
                        }
                    ],
                    columnDefs: [
                        {
                            targets: [3],
                            data: 'estado',
                            render: function (data, row, type) {
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
    ;

</script>