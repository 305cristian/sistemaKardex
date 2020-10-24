<div id='app' class="container-fluid mt-5">
    <div class="bg-light mt-3">
        <h2>{{titulo}}</h2>
    </div>

    <!--<button @click='modalAgregar=true' type="button" class="btn btn-outline-primary" data-toggle="modal"
        data-target="#modalClientes" >NuevoCliente</button>-->
    <!--<button  type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalClientes" >NuevoCliente</button>-->

    <div class="containeridTblClientes-fluid my-3">
        <table id="idTblClientes"  class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Genero</th>
                    <th>Estado</th>
                    <th width='20'>Acciones</th>                                                
                </tr>
            </thead>
            <tbody>
                <tr  v-for="clie of clientes">
                    <td>{{clie.id}}</td>
                    <td>{{clie.cli_nombre}}</td>
                    <td>{{clie.cli_apellido}}</td>
                    <td>{{clie.cli_cedula}}</td>                                 
                    <td>{{clie.cli_genero}}</td>                                 
                    <td>
                        <span v-if="(clie.cli_estado == 'Activo')"><div class="bg-success text-white text-center">Activo</div></span>                                                  
                        <span v-else> <div class="bg-danger text-white text-center">Inactivo</div> </span>                                                                  
                    </td> 

                    <td >
                        <a href="#" class="btn btn-warning btn-sm " @click="obtenerCliente(clie)" data-toggle="modal" data-target="#modalClientesAct"><li class="fa fa-edit"></li></a>
                        <a href="#" class="btn btn-danger btn-sm "  @click="eliminarCliente(clie)" ><li class="fa fa-trash-alt"></li></a>
                    </td>   


                </tr>
                <tr v-if="sinResultado">
                    <td colspan="3" rowspan="4" class="text-center h1">No Record Found</td>
                </tr>


            </tbody>
        </table>
    </div>

    <!--MODAL INSERTAR CLIENTE-->
    <!--<modal v-if="modalAgregar">-->
    <div class=" modal fade" id="modalClientes" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h1 id="modal-title">Cree un Cliente</h1>
                    </div>
                    <div class="modal-body">
                        <form id="idFormInsertar" class="container" action="">
                            <div class="row">

                                <label>Ingre el Nombre</label>                              
                                <input class="form-control" :class="{'is-invalid': formValidacion.nombre}" type="text" name="txtNombre"                                                                         
                                       v-model="nuevoCliente.nombre"> 
                            </div>
                            <br>
                            <div class="row">
                                <label>Ingrese el Apellido</label>
                                <input class="form-control" :class="{'is-invalid': formValidacion.apellido}" type="text" name="txtApellido"
                                       v-model='nuevoCliente.apellido'>
                            </div>
                            <br>
                            <div class="row">
                                <label>Ingrese la cedula</label>
                                <input class="form-control" :class="{'is-invalid': formValidacion.cedula}" type="text" name="txtCedula"
                                       v-model='nuevoCliente.cedula'>
                            </div>
                            <br>
                            <div class="row">
                                <label>Selecione el genero</label>
                                <select id="idGenero" class="form-control" v-model='nuevoCliente.genero'>
                                    <option>Masculino</option>
                                    <option>Femenino</option>                               
                                </select>
                            </div>  

                            <br>
                            <div class="row">                            
                                <div class="form-group">
                                    <label for="">Estado</label><br>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark " :class="{'active':(nuevoCliente.estado == 'Activo')}" 
                                                @click="pincharEstado('Activo')"> Activo</button>

                                        <button type="button" class="btn btn-outline-danger " :class="{'active': (nuevoCliente.estado == 'Inactivo')}" 
                                                @click="pincharEstado('Inactivo')"> Inactivo</button>
                                    </div>
                                    <div  class="text-danger"v-html="formValidacion.estado"></div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" id="idInsertar" class="btn btn-primary"
                                    @click="insertarCliente()"> Insertar</button>

                            <button type="button" id="idCancelar" class="btn btn-danger"
                                    data-dismiss="modal"@click='formValidacion=false , refrescarDatos()'>Cancelar</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- </modal>-->


    <!--MODAL EDITAR CLIENTE-->
    <!--<modal v-if="modalAgregar">-->
    <div class=" modal fade" id="modalClientesAct" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h1 id="modal-title">Actualize el Cliente</h1>
                    </div>
                    <div class="modal-body">
                        <form id="idFormModificar" class="container" action="">
                            <div class="row">

                                <label>Ingre el Nombre</label>                              
                                <input class="form-control" :class="{'is-invalid': formValidacion.cli_nombre}" type="text" name="txtNombre"                                                                         
                                       v-model="actualizarCliente.cli_nombre">                              
                            </div>
                            <br>
                            <div class="row">
                                <label>Ingrese el Apellido</label>
                                <input class="form-control" :class="{'is-invalid': formValidacion.cli_apellido}" type="text" name="txtApellido"
                                       v-model='actualizarCliente.cli_apellido'>
                            </div>
                            <br>
                            <div class="row">
                                <label>Ingrese la cedula la cedula</label>
                                <input class="form-control" :class="{'is-invalid': formValidacion.cli_cedula}" type="text" name="txtCedula"
                                       v-model='actualizarCliente.cli_cedula'>
                            </div>
                            <br>
                            <div class="row">
                                <label>Selecione el genero</label>
                                <select id="idGenero" class="form-control" v-model='actualizarCliente.cli_genero'>
                                    <option>Masculino</option>
                                    <option>Femenino</option>                               
                                </select>
                            </div>  
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Estado</label><br>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark " :class="{'active':(actualizarCliente.cli_estado == 'Activo')}" 
                                                @click="changeEstado('Activo')"> Activo</button>

                                        <button type="button" class="btn btn-outline-dark " :class="{'active': (actualizarCliente.cli_estado == 'Inactivo')}" 
                                                @click="changeEstado('Inactivo')"> Inactivo</button>
                                    </div>
                                    <div  class="text-danger"v-html="formValidacion.estado"></div>
                                </div>

                            </div>

                        </form>
                        <div class="modal-footer">
                            <button type="button" id="idInsertar" class="btn btn-primary"
                                    @click="actualizarCiente()"> Actualizar</button>

                            <button type="button" id="idCancelar" class="btn btn-danger"
                                    data-dismiss="modal"@click='formValidacion=false, refrescarDatos()'>Cancelar</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- </modal>-->
</div>