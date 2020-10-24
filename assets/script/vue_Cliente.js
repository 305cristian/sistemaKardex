
var v = new Vue({
    el: '#app',
    data: {
        titulo: 'Administración / Clientes',
        url: 'http://localhost/sistemakardex/',
        sinResultado: false,
        clientes: [],

        nuevoCliente: {
            nombre: '',
            apellido: '',
            cedula: '',
            genero: '',
            estado: ''
        },
        actualizarCliente: {},
        successMSG: '',
        formValidacion: []
    },
    created() {
        this.cargarClientes();
    },

    methods: {
        tabla() {
            $(function () {
                $('#idTblClientes').DataTable({
                    lengthMenu: [[7, 10, 15, -1], [7, 10, 15, "Todo"]],
                    responsive: true,
                    retrieve:true,
                    dom: "<'row'<'col-sm-12 col-md-12'B>>" +
                            "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [{

                            text: '<li class="fa fa-user-plus"></li> Nuevo Cliente',
                            titleAttr: 'Crear nuevo Cliente',
                            className: 'btn btn-primary mb-2',
                            action: function () {
                                $('#modalClientes').modal('show');
                            }

                        },
                        {
                            extend: 'excelHtml5',
                            text: '<li class="fas fa-file-excel"></li> EXCEL',
                            titleAttr: 'Exportar a EXCEL',
                            className: 'btn btn-success  btn-sm'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<li class="fas fa-file-pdf"></li> PDF',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-danger  btn-sm'
                        },
                        {
                            extend: 'print',
                            text: '<li class="fas fa-print"></li> IMPRIMIR',
                            titleAttr: 'Imprimir Documento',
                            className: 'btn btn-info btn-sm'
                        }
                    ]

                });

            });

        },

        cargarClientes: function () {
            axios.get(this.url + 'Admin_controller/mostrarClientes').then(function (response) {
                if (response.data === null) {
                    v.noResult();
                } else {

                    v.clientes = response.data;
                    v.tabla();
                }
            });
        },
        insertarCliente: function () {
            var datos = v.formData(v.nuevoCliente);
            axios.post(this.url + 'Admin_controller/insertarCliente', datos).then(function (response) {
                if (response.data.error) {
                    v.formValidacion = response.data.msg;
                } else {
                    toastr['success'](v.successMSG = response.data.msg, 'Insertado');
                    v.cargarClientes();
                    v.refrescarDatos();
                    $('#modalClientes').modal('hide');
                    $('.modal-backdrop').remove();

                }
            });
        },
        actualizarCiente: function () {
            var datos = v.formData(v.actualizarCliente);
            axios.post(this.url + 'Admin_controller/actualizarCliente', datos).then(function (response) {
                if (response.data.error) {
                    v.formValidacion = response.data.msg;
                } else {
                    toastr['success'](v.successMSG = response.data.msg, 'Insertado');
                    v.refrescarDatos();
                    $('#modalClientesAct').modal('hide');
                    $('.modal-backdrop').remove();
                }
            });
        },
        eliminarCliente: function (cliente) {
            swal.fire({
                title: "¿Estas seguro?",
                text: "Este paso eliminara definitivamente el Cliente,  siempre que no este asociada a otra tabla, caso contrario dele cancelar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#CC0000",
                confirmButtonText: "¡Si!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false}).then((result) => {

                if (result.value) {
                    v.actualizarCliente = cliente;
                    var id = v.formData(v.actualizarCliente);
                    axios.post(this.url + "Admin_controller/eliminarCliente", id).then(function (response) {
                        if (response.data.error) {
                            v.cargarClientes();
                            v.refrescarDatos();
                            swal.fire({
                                title: 'Eliminado',
                                text: 'Cliente eliminado exitosamente',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });

                        }
                    });
                } else {
                    swal.fire({
                        title: 'Cancelado',
                        text: 'Proceso cancelado',
                        icon: 'error',
                        timer: 1000,
                        showConfirmButton: false,
                        showCancelButton: false
                    });
                }
            });




        },
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },

        obtenerCliente: function (cliente) {
            v.actualizarCliente = cliente;
        },

        refrescarDatos: function () {
            v.nuevoCliente = {
                nombre: '',
                apellido: '',
                cedula: '',
                estado: ''
            };

        },
        pincharEstado(estado) {
            return v.nuevoCliente.estado = estado; // agregar nuevo usuario con la selección de estado
        },
        changeEstado(estado) {
            return v.actualizarCliente.cli_estado = estado; // actualizar tarea           
        },
        noResult() {
            v.sinResultado = true;
            v.nuevoCliente = null;


        }
    }


});