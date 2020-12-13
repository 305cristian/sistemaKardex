
<script src="https://cdn.jsdelivr.net/npm/vue-toast-notification"></script>
<link href="https://cdn.jsdelivr.net/npm/vue-toast-notification/dist/theme-default.css" rel="stylesheet">

<div id="app">
	<div class="col-md-3">
		<form id="user-form" method="POST" v-on:submit.prevent="submit">
			<div class="panel panel-warning">
				<div class="panel-heading">Crear / Modificar Comensal</div>	
				<div class="panel-body">
					<div>
						<br>
						<label>Codigo</label>
						<input type="text"  name="cat_comensales_ci" class="form-control" required="" v-model="user.cat_comensales_ci">						
					</div>
					<div>
						<br>
						<label>Nombres</label>
						<input type="text" name="cat_comensales_nombres" class="form-control" required="" v-model="user.cat_comensales_nombres">
					</div>
					<div>
						<br>
						<label>Apellidos</label>
						<input type="text" name="cat_comensales_apellidos" class="form-control" required="" v-model="user.cat_comensales_apellidos">
					</div>
					<div>
						<br>
						<label>Contratista</label>
							<select class="form-control"  v-model="user.contratista">		
								<option disabled value="0">Seleccione una contratista</option>					
								<option v-for="(key, data) in contratista_data"  v-bind:value="key.PersonaComercio_cedulaRuc" :value="key.PersonaComercio_cedulaRuc">{{ key.nombres }}</option>
							</select>
						
						<!--<v-select label="nombres" :reduce="contratista_data => contratista_data.PersonaComercio_cedulaRuc" v-model="user.contratista" :options="contratista_data"></v-select>-->

						
						<!--<input type="text" name="codigo" class="form-control" required="" v-model="user.cat_comensales_nombres">-->
					</div>
					
					<div>
						<br>
						<label>Departamento</label>
							<select class="form-control" name="txt_departamento" v-model="user.departamento">
								<option disabled value="0">Select Departamento</option>
								<option v-for="data in departamento_data" v-bind:value="data.dep_id">{{data.dep_nombre}}</option>
							</select>
						<!--<v-select label="dep_nombre" :reduce="departamento_data => departamento_data.dep_id" v-model="user.departamento" :options="departamento_data"></v-select>-->
					</div>
					
					<div>
						<br>
						<label>Proyecto</label>						
							<select class="form-control" name="txt_proyecto" v-model="user.proyecto">
								<option disabled value="0">Select Proyecto</option>
								<option v-for="data in proyecto_data" v-bind:value="data.cod_proyect">{{ data.name_proyect }}</option>
							</select>
						
						<!--<v-select label="name_proyect" :reduce="proyecto_data => proyecto_data.cod_proyect" v-model="user.proyecto" :options="proyecto_data"></v-select>-->
					</div>
					<div>
						<br>
						<label>Estado</label>
							
							<select class="form-control" name="txt_estado" v-model="user.estado">
								<option disabled value="">Select Estado</option>
								<option v-for="data in estado_data" v-bind:value="data.cod">{{ data.nombre }}</option>
							</select>										
						

						<!--<v-select label="nombre" :reduce="estado_data => estado_data.cod" v-model="user.estado" :options="estado_data"></v-select>	-->	
						

					</div>

					

					<div>
						<br>
						<input type="submit" name="add" v-model="submitButton" class="form-control btn btn-success">
					</div>
					<div>
						<br>
						<button name="cancel" v-on:click="cancel" v-if="isEdit" class="form-control btn btn-default">Cancelar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary">
			<div class="panel-heading">Lista de Comensales</div>
			<div class="panel-body">
				<br>
				<table class="table table-stripped" style="font-size:10px" id="tabexample">
					<thead>
						<tr>
							<th width="10%">Codigo</th>
							<th width="20%">Nombres</th>
							<th width="20%">Apellidos</th>
							<th width="10%">Contratista</th>
							<th width="10%">Departamento</th>
							<th width="10%">Proyecto</th>
							<th width="10%">Estado</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="user in users">
							<td>{{ user.cat_comensales_ci }}</td>
							<td>{{ user.cat_comensales_nombres }}</td>
							<td>{{ user.cat_comensales_apellidos }}</td>							
							<td>{{ user.nombres }}</td>
							<td>{{ user.dep_nombre }}</td>
							<td>{{ user.name_proyect }}</td>
							<td v-if="user.cat_estado === '1'"><div style="background-color: #ccffcc;height: 19px;width:57px;text-align: center;border-radius:5px;"><span style="color:#00cc00;">Activo</span></div></td>
							<td v-else><div style="background-color: #ffd7cc;height: 19px;width:57px;text-align: center;border-radius:5px;"> <span style="color:#e60000;">Inactivo</span></div></td>
							
							<td>
								<button class="btn btn-xs btn-info" v-on:click="edit(user.cat_comensales_id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button>
								
							</td>
							

						</tr>
					</tbody>
				</table>


				


			</div>
		</div>
	</div>

</div>





	
	<script type="text/javascript">
		Vue.use(VueToast);

		var api = '<?php echo base_url();?>';                
    
	    var app = new Vue({
	        el: '#app',
	        data: {
				
				contratista:0,
				contratista_data:[],
				proyecto:0,
				proyecto_data:[],
				departamento:0,
				departamento_data:[],
				estado:"",
				estado_data:[],
				
	        	users: [],
	           	user: {
					cat_comensales_ci:'',
	                cat_comensales_nombres: '',
	                cat_comensales_apellidos: ''
	            },			
	            isEdit: false,
				editIdentifier: '',								
	            submitButton: 'Crear'
	        },
	        created() {
				this.nameString()
				this.get()
				//this.nameString()
				
	            axios.get(api + 'cateringlp/user_ex/contratista').then(function(rta){
					app.contratista_data = rta.data;					
				});				
				
				axios.get(api + 'cateringlp/user_ex/departamento').then(function(rta){
					app.departamento_data = rta.data;
				});

				axios.get(api + 'cateringlp/user_ex/proyect').then(function(rta){
					app.proyecto_data = rta.data;
				});

				axios.get(api + 'cateringlp/user_ex/estados').then(function(rta){
				//	console.log(rta.data);
					app.estado_data = rta.data;	
				});
				
	        },
	        methods: {
				nameString:function(){
					axios.get(api+'cateringlp/user_ex/auto_inc').then(function(rta){
						var auto = rta.data[0].cat_comensales_ci++;
						app.user.cat_comensales_ci = rta.data[0].cat_comensales_ci;
					});
				},
	        	mytable(){
					//$("#tabexample").DataTable().destroy();	

	        		$(function(){
						
						

	        			$("#tabexample").DataTable({
							//stateSave: true,
							"bDestroy": true,
	        				
							lengthMenu: [[7, 10, 15, -1], [7, 10, 15, "Todo"]],
							dom: "<'row'<'col-sm-12 col-md-12'B>>" +
									"<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" +
									"<'row'<'col-sm-12'tr>>" +
									"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
							buttons: [
								{
									extend: 'excelHtml5',
									text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> EXCEL',
									titleAttr: 'Exportar a EXCEL',
									className: 'btn btn-success btn-sm'
								},
								{
									extend: 'pdfHtml5',
									text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
									titleAttr: 'Exportar a PDF',
									className: 'btn btn-danger btn-sm'
								},
								{
									extend: 'print',
									text: '<i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR',
									titleAttr: 'Imprimir Documento',
									className: 'btn btn-info btn-sm'
								}
							]
	        			});
	        		});
				},
		
	            get: function() {
	            	var vm = this;
	                //var url = "http://3.211.143.162:3000/api/comensal"; //:TODO: producction
					var url = "http://localhost:3000/api/comensal"
					axios.get(url)
					.then(response =>{
						//console.log(response)
						//console.log(response.data)
						vm.users = response.data;
						vm.mytable()
						
					});
				},
				formData(obj){
					var formData = new FormData();
					for ( var key in obj ) {
						formData.append(key, obj[key]);
					} 
					return formData;
				},
	            submit: function(){
					var vm = this;
					var formData = app.formData(app.user);
	            	var url = api + ((vm.isEdit)? ('cateringlp/user_ex/edit/' + vm.editIdentifier) : 'cateringlp/user_ex/add')

	            	//axios.post(url, JSON.stringify(vm.user)).then(function(response) {
					axios.post(url, formData).then(function(response) {
						
						console.log(response.data);
						if(response.data == 1){
							$.notify("Success! Se procedio a actulizar correctamente el comensal", {color: "#fff", background: "#08B102", align:"center", verticalAlign:"top"});
						}
						if(response.data == 2){
							$.notify("Error! No se pudo actulizar el comensal", {color: "#fff", background: "#DA1804", align:"center", verticalAlign:"top"});
						}

						if(response.data == 3){
							$.notify("Error! Ya existe un comensal creado con ese codigo", {color: "#fff", background: "#DA1804", align:"center", verticalAlign:"top"});
						}

						if(response.data == 4){
							$.notify("Error! Yas existe un comensal con los datos ingresados", {color: "#fff", background: "#DA1804", align:"center", verticalAlign:"top"});
						}

						if(response.data == 5){
							$.notify("Success! Comensal creado correctamente", {color: "#fff", background: "#08B102", align:"center", verticalAlign:"top"});
						}

						if(response.data == 6){
							$.notify("Error! No se pudo crear el comensal", {color: "#fff", background: "#DA1804", align:"center", verticalAlign:"top"});
						}
						

            			vm.get()
            			vm.reset()
						//console.log(response);

                    });
	            },
	            reset: function(){
	            	this.user.cat_comensales_ci = ''
					this.user.cat_comensales_nombres = ''
	            	this.user.cat_comensales_apellidos = ''
					this.user.contratista = 0
					this.user.departamento = 0
					this.user.proyecto = 0
					this.user.estado = ""
					
					this.nameString()
	            	this.isEdit = false
		            this.editIdentifier = ''
		            this.submitButton = 'Crear'

	            },
	            remove: function(id){
	            	var vm = this
	            	var user = vm.select(id)
	            	var confirm = window.confirm("Are you sure you want to delete " + user.cat_comensales_nombres + "?")
	            	if(confirm){	
		            	axios.post(api + 'cateringlp/user_ex/delete/' + id).then(function(response) {
		        			vm.get()
		                })
	            	}
	            },
	            edit: function(id){
		            this.submitButton = 'Editar'
	            	this.isEdit = true
	            	this.editIdentifier = id
	            	this.setUser(this.select(id))
	            },
	            cancel:function(e){
	            	e.preventDefault()
	            	this.reset()
					$.notify("Proceso Cancelado", {color: "#000", background: "#B3B4B4", align:"center", verticalAlign:"top"});
	            },	
	            setUser: function(obj){
	            	this.user.cat_comensales_ci = obj.cat_comensales_ci
					this.user.cat_comensales_nombres = obj.cat_comensales_nombres
	            	this.user.cat_comensales_apellidos = obj.cat_comensales_apellidos					
					this.user.contratista = obj.cliente_id				
					this.user.departamento = obj.cat_id_departamento
					this.user.proyecto = obj.cat_tipo_proyecto
					this.user.estado = obj.cat_estado			
	            },
	            select: function(id){
	            	return this.users.find(function(obj){ return obj.cat_comensales_id == id})
	            }
	        }
	    })
	</script>
