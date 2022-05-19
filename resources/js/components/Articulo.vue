<template>
    <div>
        <h1 class="text-center">Gestionar pacientes</h1>
        <hr>

        <button @click="modificar=false;  abrirModal();" type="button" class="btn btn-primary my-4">
            Nuevo registro
        </button>

        <!-- The Modal -->
        <div class="modal" :class="{mostrar:modal}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{tituloModal}}</h4>
                        <button @click="cerrarModal();" type="button" class="close"
                            data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="my-4">
                            <label for="departamento">Departamento</label>
                            <input v-model="articulo.deoartamento" type="text" class="form-control" id="text" placeholder="Departamento">
                        </div>
                        <div class="my-4">
                            <label for="municipio">Municipio</label>
                            <input v-model="articulo.municipio" type="text" class="form-control" id="text" placeholder="Municipio">
                        </div>
                        <div class="my-4">
                            <label for="genero">Genero</label>
                            <input v-model="articulo.genero" type="text" class="form-control" id="text" placeholder="Genero del paciente">
                        </div>
                        <div class="my-4">
                            <label for="tipo_documento">Tipo de documento</label>
                            <input v-model="articulo.tipo_documento" type="text" class="form-control" id="text" placeholder="Tipo de documento del paciente">
                        </div>
                        <div class="my-4">
                            <label for="num_documento">Numero de documento</label>
                            <input v-model="articulo.num_documento" type="text" class="form-control" id="number" placeholder="Numero de documento del paciente">
                        </div>
                        <div class="my-4">
                            <label for="nombre_1">Primer nombre</label>
                            <input v-model="articulo.nombre_1" type="text" class="form-control" id="text" placeholder="Primer nombre del paciente">
                        </div>
                        <div class="my-4">
                            <label for="nombre_2">Segundo nombre</label>
                            <input v-model="articulo.nombre_2" type="text" class="form-control" id="text" placeholder="Segundo nombre del paciente">
                        </div>
                        <div class="my-4">
                            <label for="apellido_1">Primer apellido</label>
                            <input v-model="articulo.apellido_1" type="text" class="form-control" id="text" placeholder="Primer apellido del paciente">
                        </div>
                        <div class="my-4">
                            <label for="apellido_2">Segundo apellido</label>
                            <input v-model="articulo.apellido_2" type="text" class="form-control" id="text" placeholder="Segundo apellido del paciente">
                        </div>
                        <div class="my-4">
                            <label for="stock">Stock</label>
                            <input v-model="articulo.stock" type="text" class="form-control" id="number" placeholder="Stock del paciente">
                        </div>





                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button @click="cerrarModal();" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cancelar</button>
                        <button @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                    </div>

                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Tipo de Documento</th>
                    <th scope="col">Numero de Documento</th>
                    <th scope="col">Primer Nombre</th>
                    <th scope="col">Segundo Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Stock</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="art in articulos" :key="art.id">
                    <th scope="row">{{art.id}}</th>
                    <td>{{art.departamento}}</td>
                    <td>{{art.municipio}}</td>
                    <td>{{art.genero}}</td>
                    <td>{{art.tipo_documento}}</td>
                    <td>{{art.num_documento}}</td>
                    <td>{{art.nombre_1}}</td>
                    <td>{{art.nombre_2}}</td>
                    <td>{{art.apellido_1}}</td>
                    <td>{{art.apellido_2}}</td>
                    <td>{{art.stock}}</td>
                    <td>
                        <button @click="modificar=true;  abrirModal(art);" class="btn btn-warning">Editar</button>
                    </td>
                    <td>
                        <button @click="eliminar(art.id)" class="btn btn-danger">Eliminar</button>
                        this.listar ();
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {

                articulo:{
                    departamento:'',
                    municipio:'',
                    genero:'',
                    tipo_documento:'',
                    num_documento:2,
                    nombre_1:'',
                    nombre_2:'',
                    apellido_1:'',
                    apellido_2:'',
                    stock:1,
                },
                id:0,
                modificar: true,
                modal: 0,
                tituloModal: '',
                articulos: [],
            }
        },
        methods: {
            async listar() {
                const res = await axios.get('/articulos/');
                this.articulos = res.data;
            },
            async eliminar(id) {
                const res = await axios.delete('/articulos/' + id);
                this.listar();
            },
            async guardar(id) {
                
                if (this.modificar) {
                    const res = await axios.put('/articulos/'+this.id, this.articulo);
                }else{
                    const res = await axios.post('/articulos', this.articulo);
                }
                this.cerrarModal();
                this.listar();
            },
            abrirModal(data={}) {
                this.modal = 1;
                if (this.modificar) {
                    this.id=data.id;
                    this.tituloModal = "Modificar Registro";
                    this.articulo.departamento=data.departamento;
                    this.articulo.municipio=data.municipio;
                    this.articulo.genero=data.genero;
                    this.articulo.tipo_documento=data.tipo_documento;
                    this.articulo.num_documento=data.num_documento;
                    this.articulo.nombre_1=data.nombre_1;
                    this.articulo.nombre_2=data.nombre_2;
                    this.articulo.apellido_1=data.apellido_1;
                    this.articulo.apellido_2=data.apellido_2;
                    this.articulo.stock=data.stock;
                } else {
                    this.id=0;
                    this.tituloModal = "Crear Registro";

                    this.articulo.departamento='';
                    this.articulo.municipio='';
                    this.articulo.genero='';
                    this.articulo.tipo_documento='';
                    this.articulo.num_documento=2;
                    this.articulo.nombre_1='';
                    this.articulo.nombre_2='';
                    this.articulo.apellido_1='';
                    this.articulo.apellido_2='';
                    this.articulo.stock=1;
                }
            },
            cerrarModal() {
                this.modal = 0;
            },
        },

        created() {
            this.listar();
        },
    }

</script>
<style>
    .mostrar {
        display: list-item;
        opacity: 1;
        background: rgb(113, 126, 103);
    }

</style>
