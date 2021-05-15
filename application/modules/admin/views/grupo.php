<style type="text/css">
    .alinear{
        position: relative;
        left: 40px;
    }
</style>

<div class="content-wrapper content-header mt-5">
    <div class="bg-light mt-3">
        <h2>Administracion / Grupos</h2>    
    </div>

    <div class="container col-sm-12 mt-3">

        <button class="btn btn-outline-primary alinear" data-toggle="modal" data-target="#idModalGrupo">Nuevo Grupo</button>
        <button class="btn btn-outline-success alinear" data-toggle="modal" data-target="#idModalSubGrupo">Nuevo SubGrupo</button>

        <!--Inicio-->
        <div class="container-fluid">                       
            <div class="modal-body">
                <table id="idTblGrupo" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
                    <thead>
                        <tr >
                            <th>id</th>
                            <th>Grupo</th>
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

    <!-- INICIO Modal nueva grupo-->
    <div class=" modal fade" id="idModalGrupo" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h1 id="modal-title">Cree un Grupo</h1>
                    </div>
                    <div class="modal-body">
                        <form id="idFormInsertar" class="container" action="<?php echo base_url() ?>admin/Admin_controller/insertarGrupo">
                            <div class="row">
                                <input type="hidden" name="txtId">
                                <label>Ingre el nombre del grupo</label>
                                <input class="form-control" type="text" name="txtNombre">
                            </div>
                            <br>
                            <div class="row">
                                <label>Ingrese el detalle del grupo</label>
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
                            <button type="button" onclick="resetearFormu()" id="idCancelar" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                        </div>


                    </div>    
                </div>

            </div>
        </div>
    </div>
    <!-- FIN Modal nueva grupo-->

    <!-- INICIO Modal nuevo subgrupo-->
    <div class=" modal fade" id="idModalSubGrupo" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h1 id="modal-title">Cree un Subgrupo</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <form id="idFormInsertarSub" class="container" action="<?php echo base_url() ?>admin/Admin_controller/insertarSubGrupo">
                                    <div class="row">
                                        <label>Selecione un grupo</label>
                                        <select class="form-control" id="idComboGrupo" name="comboGrupo">
                                            <!-- Aqui va el codigo jquery script-->
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label>Nombre del subgrupo</label>
                                        <input class="form-control" type="text" name="txtNombreSub">
                                        <input class="form-control" type="hidden" name="txtIdSub">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label>Detalle el subgrupo </label>
                                        <input class="form-control" type="text" name="txtDetalleSub">
                                    </div>
                                    <br>
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <input id="idActivo" type="checkbox" name="estadoSub" checked>
                                            <label id="idlblEstadoSub">Activo</label>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <button type="button" id="idInsertarSub" class="btn btn-primary"> Insertar</button> 
                                        <button type="button" id="idResetSub" class="btn btn-danger ml-2"> Reset</button> 
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9">
                                <table id="idTblSubGrupo" class="table table-striped dysplay nowrap" cellspacing="0" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Grupo</th>
                                            <th>Subgrupo</th>
                                            <th>Detalle</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button"  id="idCancelar" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                        </div>


                    </div>    
                </div>

            </div>
        </div>
    </div>
    <!-- FIN Modal nuevo subgrupo-->
</div>
</div>

<script>

    mostrarGrupos();
    mostrarGruposCombo();
    mostrarSubGrupos();
    //Limpiar formulario
//    $('#idCancelar').click(function () {
    function resetearFormu() {
        $('#idFormInsertar')[0].reset();
        $('input[type="hidden"]').val('');
        $('#idInsertar').text('Insertar');
        $('#modal-title').text('Crear Grupo');
    }

//    });
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
                    $('#idTblGrupo').DataTable().destroy(); //reinicializamos el datatable
                    mostrarGrupos(); //actualizamos la tabla grupos
                    mostrarGruposCombo();
                    resetearFormu();
                    $('#idModalGrupo').modal('hide'); //cerramos el modal
                    $('.modal-backdrop').remove(); //cerramos el modal
                   if (response.type === 'add') {
                        msg = 'Agregado exitosamente';
                    } else {
                        msg = 'Actualizado exitosamente';
                        resetearFormu();//Reseteamos el formulario al valor default
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
    $('#idTblGrupo').on('click', '.item-edit', function () {
        var id = $(this).attr('data');
        $('#idModalGrupo').find('#modal-title').text('Editar Grupo');
        $('#idInsertar').text('Actualizar');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>admin/Admin_Controller/obtenerGrupo',
            data: {id: id},
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                $('input[name=txtId]').val(data.id);
                $('input[name=txtNombre]').val(data.nombreG);
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
    $('#idTblGrupo').on('click', '.item-delete', function () {
        var id = $(this).attr('data');
        swal.fire({
            title: "¿Estas seguro?",
            text: "Este paso eliminara definitivamente el Grupo,  siempre que no este asociada a otra tabla, caso contrario presione cancelar",
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
                    url: "<?php echo base_url(); ?>admin/Admin_controller/eliminarGrupo",
                    data: {id: id},
                    success: function (response) {
                        if (response) {
                            $('#idTblGrupo').DataTable().destroy();
                            mostrarGrupos();
                            mostrarGruposCombo();                         
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'Dato eliminado exitosamnete',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Command: toastr["error"]("No ha selecionado ninguna Grupo Posible tabla asociada en la DB", 'Error')

                        }
                    },
                    error: function () {
                        Command: toastr["error"]("No ha selecionado ninguna Grupo Posible tabla asociada en la DB", 'Error')
                    }
                });
            }
        });
    });
    function mostrarGrupos() {

        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>admin/Admin_controller/obtenerGrupos",
            dataType: 'json',
            success: function (data) {
                $('#idTblGrupo').dataTable({
                    lengthMenu: [[6, 10, 15, -1], [6, 10, 15, "Todo"]],
                    responsive: true,
                    data: data,
                    columns: [
                        {data: 'id'},
                        {data: 'nombreG'},
                        {data: 'detalle'},
                        {data: 'estado'},
                        {data: function (data, type, row) {
                                var a =
                                        ` <a href="#" class="btn btn-warning btn-sm item-edit" data="${data.id}" data-toggle="modal" data-target="#idModalGrupo"><li class="fa fa-edit"></li></a>
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



    //SUBGRUPOS
  
    $('#idResetSub').click(function () {
        $('#idFormInsertarSub')[0].reset();
        $('input[type="hidden"]').val('');
        $('#idInsertarSub').text('Insertar');
        $('#idlblEstadoSub').text('Activo');
    });

    $('#idInsertarSub').click(function () {
        var datos = $('#idFormInsertarSub').serialize();
        var url = $('#idFormInsertarSub').attr('action');
//        var fk = $('#idComboGrupo').val();
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response) {
                    var msg = '';
                    $('#idTblSubGrupo').DataTable().destroy();
                    mostrarSubGrupos();
                    mostrarGruposCombo();

                    $('#idFormInsertarSub')[0].reset();
                    $('input[type="hidden"]').val('');

                    if (response.type === 'add') {
                        msg = 'Agregado exitosamente';
                    } else {
                        msg = 'Actualizado exitosamente';
                        $('#idInsertarSub').text('Insertar');
                    }
                    Command: toastr["success"](msg, "Insertado");
                } else {
                    Command: toastr["error"]("Posible error en la DB", 'Error')
                }
            },
            error: function () {
                Command: toastr["error"]("Posible error en la DB", 'Error')
            }
        });
    });

    $('#idTblSubGrupo').on('click', '.item-edit', function () {
        var id = $(this).attr('data');
        $('#idInsertarSub').text('Actualizar');
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url(); ?>admin/Admin_controller/obtenerSubgrupo',
            data: {id: id},
            dataType: 'json',
            success: function (data) {
                $('input[name=txtIdSub]').val(data.id);
                $('input[name=txtNombreSub]').val(data.nombre);
                $('input[name=txtDetalleSub]').val(data.detalle);
                if (data.estado === 'on') {
                    $('input[name=estadoSub]').prop('checked', true);
                    $('#idlblEstadoSub').text('Activo');
                } else {
                    $('input[name=estadoSub]').prop('checked', false);
                    $('#idlblEstadoSub').text('Deshabilitado');
                }

                $('select[name=comboGrupo]').val(data.fkGrupo);
            }
        });
    });

    $('#idTblSubGrupo').on('click', '.item-delete', function () {
        var id = $(this).attr('data');

        swal.fire({
            title: "¿Estas seguro?",
            text: "Este paso eliminara definitivamente el Grupo,  siempre que no este asociada a otra tabla, caso contrario dara erro al eliminar",
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
                    url: '<?php echo base_url() ?>admin/Admin_controller/eliminarSubgrupo',
                    data: {id: id},
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response) {
                            mostrarSubGrupos();
                            $('#idTblSubGrupo').DataTable().destroy();
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'Subgrupo eliminado exitosamente',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Command: toastr['error']('No se obtubo respuesta de la base de datos', '!');
                        }
                    },
                    error: function () {
                        Command: toastr['error']('No se obtubo respuesta de la base de datos', '!');

                    }
                });
            }
        });


    });

    function mostrarGruposCombo() {
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>admin/Admin_controller/obtenerGrupos",
            dataType: 'json',
            success: function (data) {
                var registro = eval(data);
                var cuerpoCombo = '';
                for (var i = 0; i < registro.length; i++) {
                    cuerpoCombo +=
                            '<option id="cbx" value="' + registro[i].id + '">' + registro[i].id + ':      ' + registro[i].nombreG + '</option>';
                    //El  value registro[i].id, permite agarrar el id del combo selecionado
                }
                $('#idComboGrupo').html(cuerpoCombo);
            }
        });
    }

    function mostrarSubGrupos() {
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>admin/Admin_controller/obtenerSubGrupos",
            dataType: 'json',
            success: function (data) {
                if (data) {

                    $('#idTblSubGrupo').DataTable({
                        lengthMenu: [[6, 10, 15, -1], [6, 10, 15, "Todo"]],
                        responsive: true,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'nombreG'},
                            {data: 'nombre'},
                            {data: 'detalle'},
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
                                targets: [4],
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
            }
        });
    }



</script>