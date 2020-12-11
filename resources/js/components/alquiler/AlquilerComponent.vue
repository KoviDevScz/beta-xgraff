<template lang="">
    <div class="card">
        
        <form v-on:submit="agregar()">
            <div class="card-body row ">
                <div class="col-md-6 table-bordered ">
                    <blockquote class="blockquote text-center">
                        <h6 class="control-label font-10"><strong>Todos las campos con (<span class="text-danger">*</span>) son requeridos.</strong></h6>
                    </blockquote>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right"> <strong>Cliente<span class="text-danger">*</span>:</strong> </label>
                            <div class="col-8 col-sm-8">
                                <select class="form-control" ><
                                        <option v-for="client in cliente" value="" v-bind:value="client.id" v-model="cliente_select" >{{client.name}} </option>
                                </select>
                                <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right"><strong>Vendedor<span class="text-danger">*</span>:</strong> </label>
                            <div class="col-8 col-sm-8">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre del vendedor" value="">
                                <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                            </div>
                        </div>                                            
                    </div>
                   <!--  <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right"> <strong>Fecha devolucion<span class="text-danger">*</span>:</strong> </label>
                            <div class="col-8 col-sm-8">
                                <datetime v-model="fecha_devolucion" type="datetime" use12-hour 
                                    auto format="dd-MM-yyyy HH:mm" 
                                    :minute-step="15" >
                                    </datetime>
                                 {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right"><strong>Producto<span class="text-danger">*</span>:</strong></label>
                            <input type="hidden" name="nombre_producto" v-model="nombre_producto">
                            <div class="col-8 col-sm-8">
                                <select class="form-control" v-model="producto_select" @change="obtenernombre(producto_select)" >
                                    <option value="">Selecionar</option>                          
                                    <option v-for="producto in maquinas" :value="producto.id"  >{{producto.nombre}}</option>
                                </select>
                                <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                            </div>
                        </div> 
                        <div class="form-group mt-2">
                            <div class="row">
                                <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right"><strong>Cantidad<span class="text-danger">*</span>:</strong> </label>
                                <div class="col-8 col-sm-8">
                                    <input type="number" class="form-control" v-model="cantidad" min=0 max=100 name="cantidad" ></input>
                                    <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                                </div>
                            </div>                                            
                        </div>
                        <div class="row col-12 justify-content-center align-items-center " >
                            <div class="m-0 p-0">
                                <label class="mt-1 p-0 control-label"> <strong> Tiempo<span class="text-danger">*</span>: </strong></label>
                            </div>
                            <div class="form-group col-6">
                                <blockquote class="blockquote text-center">
                                    <h6 class="control-label font-10 p-0 mt-3"><strong>Selecione 1 opción.</strong></h6>
                                </blockquote>
                                <div class="form-group row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" v-model="tiempo.check" @change="check(tiempo.check)" :value="true" >
                                        <label class="form-check-label" for="inlineRadio1">Hora</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" v-model="tiempo.check2" @change="check1(tiempo.check2)":value="true" >
                                        <label class="form-check-label" for="inlineRadio2">Semana</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio3" v-model="tiempo.check3"@change="check2(tiempo.check3)" :value="true" >
                                        <label class="form-check-label" for="inlineRadio3">Mes</label>
                                    </div>
                                </div>
                                <div v-if="tiempo.check|| tiempo.check2|| tiempo.check3" >
                                    <input type="number" class="form-control col-6"  name="tiempo" v-model="tiempo.tiempo"  value="0" min=0 style="border: 0.5px solid #0080ff;">
                                </div>                                  
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center align-items-center row mt-1">
                        <button type="button" class="btn btn-primary " v-on:click="añadir()" :disabled="btn=false"><i class="feather icon-plus"></i> Añadir</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <blockquote class="blockquote text-center">
                        <h3 class="control-label font-16"><strong>Detalle del alquiler</strong></h3>
                    </blockquote>
                    <table id="default-datatable" class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="isloadingProduct" >
                                    <td rowspan="2" colspan="4" align="center">No hay maquinaria cargadas...</td>
                                </tr>                                    
                                <tr v-else v-for="item in products" :key="item.id" class="text-center">                                    
                                    <td >{{item.nombre_producto}}</td>
                                    <td >{{item.cantidad_producto}}</td>
                                    <td > {{item.precio_producto}}</button></td>
                                    <td ><button class="btn btn btn-round btn-outline-danger" @click.prevent="products.splice(item.id,1)"> <i class="feather icon-trash-2"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    <div class="col" >
                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label class="col-sm-6 mt-1 p-0 control-label text-right"><strong>Subtotal:</strong></label>
                                <input class="col-6 col-sm-6 mt-1  control-label"@change="calculartotal()"  v-model="subtotal" type="hidden" min="0"> 
                                <label class="col-4 col-sm-4 mt-1 control-label"  > {{totales}} Bs. </label>
                            </div>                                            
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label class="col-sm-6 p-0 control-label text-right" ><strong>Total:</strong> </label>
                                <label class="col-4 col-sm-4 mt-1 control-label"  > {{total}} Bs. </label>
                            </div>                                            
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label class="col-sm-6 p-0 control-label text-right" ><strong>Garantia:</strong> </label>
                                <label class="col-4 col-sm-4 mt-1 control-label"  ><strong> {{garantia2}}</strong> Bs. </label>
                            </div>                                            
                        </div>
                    </div>                    
                    <div class="justify-content-center align-items-center row ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success ml-3">Guardar</button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</template>
<script>
import { required, maxLength,numeric,helpers,minLength} from 'vuelidate/lib/validators'
import moment from 'moment'
/*const alphae = helpers.regex('alphae', /^[a-zA-Z\s?:[\u00C0-\u00FF]+]*$/);  Expresion regular letras y espacio */


export default {
    props: ['maquinarias','clientes'],
    mounted() {
        
        },
    data() {
        return {
            btn:false,
            nombre_producto:'',
            cliente:JSON.parse(this.clientes),
            empleados:[],
            cliente_select:'',
            fechas:'',
            fecha_devolucion:'',
            maquinas:JSON.parse(this.maquinarias),
            cantidad:0,
            producto_select:'',
            tiempo:{
                check:false,
                check2:false,
                check3:false,
                tiempo:0
            },
            id:0,
            subtotal:0,
            total:0,
            products:[],     
            hora_producto:0,
            semana_producto:0,
            mes_producto:0,      
            nombre:'', 
            garantia:0,
            garantia2:0,
            isloadingProduct:true,
            totales:0
        }
    },
    updated(){
            this.validaciones();
            this.fecha();
        },
    /* validations:  {
        tiempo:{required},
        validacionform:['tiempo']
    }, */
    computed: {
        
    },
    methods:{
        fecha(){
            this.fechas= moment().format('MMMM Do YYYY, h:mm:ss a');
        },
        agregar(){

        },
        validaciones(){
            /* if (this.$v.validacionform.$invalid){
                this.btn=false;
            }
            else{
                this.btn=true;
            } */
        },
        añadir(){
            if(this.tiempo.check==true){
                this.subtotal=0;
                this.tiempo.check2=false;
                this.tiempo.check3=false;
                this.subtotal= this.hora_producto*this.tiempo.tiempo
                console.log(this.subtotal);
                
            }
            if(this.tiempo.check2==true){
                this.subtotal=0;
                this.tiempo.check=false;
                this.tiempo.check3=false;
                this.subtotal= this.semana_producto*this.tiempo.tiempo
                console.log(this.subtotal);
                
            }
            if(this.tiempo.check3==true){
                this.subtotal=0;
                this.tiempo.check=false;
                this.tiempo.check2=false;
                this.subtotal= this.mes_producto*this.tiempo.tiempo
                console.log(this.subtotal);
                
            }
            if (!this.products==[]||this.tiempo.tiempo!=0||this.tiempo.check==true||this.tiempo.check2==true||this.tiempo.check3==true&&this.producto_select!=''&&this.cantidad!=0) {
                this.isloadingProduct=false;
                this.products.push(
                {  
                    'garantia':this.garantia,
                    'id':this.id,
                    'nombre_producto':this.nombre_producto,
                    'producto_id':this.producto_select,
                    'cantidad_producto':this.cantidad,
                    'precio_producto':this.subtotal,
                    
                });
                this.calculartotal();
                this.id++;
                this.cantidad=0;
                this.producto_select="";
                this.tiempo.tiempo=0;
                this.tiempo.check=false;
                this.tiempo.check2=false;
                this.tiempo.check3=false;
            }else{
                this.isloadingProduct=true;
            } 
        },
        obtenernombre:function(pk){
            if (pk!='') {
                this.nombre_producto= this.maquinas[pk-1].nombre;
                this.hora_producto= this.maquinas[pk-1].hora;
                this.semana_producto= this.maquinas[pk-1].semana;
                this.mes_producto= this.maquinas[pk-1].mes;
                this.garantia= this.maquinas[pk-1].precio;
            }
        },
        check:function(key){
            this.tiempo.check2=false;
            this.tiempo.check3=false;
        },
        check1:function(key){
            this.tiempo.check=false;
            this.tiempo.check3=false;
        },
        check2:function(key){
            this.tiempo.check=false;
            this.tiempo.check2=false;
        },
        calculartotal(){
            this.total = 0;
            this.garantia2 = 0;
            this.products.forEach((item) => { 
                this.totales= item.precio_producto;
                this.garantia2=Math.max(item.garantia);
            })
            this.total +=this.products.reduce((n, {precio_producto}) => n + precio_producto, 0)
                console.log(this.garantia,this.total)
        }
    },   
}
</script>