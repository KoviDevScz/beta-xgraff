<template lang="">
    <div class="card">
        <form v-on:submit="agregar()" class="form-group">
            <div class="card-body row">
                <div class="col-12 table-bordered">
                    <blockquote class="blockquote text-center">
                        <h6 class="control-label font-10"><strong>Todos las campos con (<span class="text-danger">*</span>) son requeridos.</strong></h6>
                    </blockquote>
                    <div class="justify-content-center align-items-center mt-1">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-5 col-sm-5 mt-1 p-0 control-label text-right"> <strong>Cliente<span class="text-danger">*</span>:</strong> </label>
                                <div class="col-4 col-sm-4">
                                    <select class="form-control" v-model="cliente_select" :class="{'is-invalid': boolcliente}" @change="boolcliente=false" >
                                            <option value="0" selected>Selecionar</option> 
                                            <option v-for="client in cliente" value="" v-bind:value="client.id"  >{{client.nombre}} </option>
                                    </select>
                                    <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                                </div>
                            </div>                                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-5 col-sm-5 mt-1 p-0 control-label text-right"><strong>Vendedor<span class="text-danger">*</span>:</strong> </label>
                                <div class="col-4 col-sm-4">
                                    <select class="form-control" v-model="vendedor_select" @change="boolvendedor=false"  >
                                            <option value="0" selected>Selecionar</option> 
                                            <option v-for="empleado in empleados" v-bind:value="empleado.id"  >{{empleado.nombre}} </option>
                                    </select>
                                    <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                                </div>
                            </div>                                            
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <label class=" mt-1 p-0 control-label text-right"><strong>Producto<span class="text-danger">*</span>:</strong></label>
                            <input type="hidden" name="nombre_producto" v-model="nombre_producto">
                            <div class="col-4 ">
                                <select class="form-control" v-model="producto_select" @change="obtenernombre(producto_select)"  :class="{'is-invalid': boolproductoselect}" >
                                    <option  value="0" selected>Selecionar</option>                          
                                    <option style="width=50px" v-for="producto in maquinas" :value="producto.id"  >{{producto.nombre}}</option>
                                </select>
                                <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                            </div>
                        </div> 
                        <div class="form-group mt-2">
                            <div class="row">
                                <label class="mt-1 p-0 control-label text-right"><strong>Cantidad<span class="text-danger">*</span>:</strong> </label>
                                <div class="col-4 col-sm-4">
                                    <input type="number" class="form-control col-8 " v-model="cantidad" min="1" value="1" max=100 name="cantidad" ></input>
                                    <!-- {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!} -->
                                </div>
                            </div>                                            
                        </div>
                        <div class="col-12 justify-content-center align-items-center " >
                            <div class="from-group col-sm-4">
                                <label class="mt-1 p-0 control-label"> <strong> Tiempo<span class="text-danger">*</span>: </strong></label>
                            </div>
                            <div class="form-group">
                                <blockquote class="blockquote text-center">
                                    <h6 class="control-label font-10 p-0 mt-3"><strong>Selecione 1 opción.</strong></h6>
                                </blockquote>
                                <div class="form-group row">
                                    <div class="form-check form-check-inline" :class="{'is-invalid': boolcheck}">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" v-model="tiempo.check" @change="check(tiempo.check)" :class="{'is-invalid': boolcheck}">
                                        <label class="form-check-label" for="inlineRadio1">Hora</label>
                                    </div>
                                    <div class="form-check form-check-inline" :class="{'is-invalid': boolcheck}">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" v-model="tiempo.check2" @change="check1(tiempo.check2)":value="true" :class="{'is-invalid': boolcheck2}"  >
                                        <label class="form-check-label" for="inlineRadio2">Semana</label>
                                    </div>
                                    <div class="form-check form-check-inline" >
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio3" v-model="tiempo.check3" @change="check2(tiempo.check3)" :value="true"  :class="{'is-invalid': boolcheck3}"  >
                                        <label class="form-check-label" for="inlineRadio3">Mes</label>
                                    </div>
                                </div>
                                <div class="form-group" v-if="tiempo.check|| tiempo.check2|| tiempo.check3" >
                                    <input type="number" class="form-control col-6"  name="tiempo" v-model="tiempo.tiempo"  value="1" min=1 style="border: 0.5px solid #0080ff;">
                                </div>                                  
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    
                    <div class="justify-content-center align-items-center row mt-1">
                        <button type="button" class="btn btn-primary " v-on:click="añadir()" ><i class="feather icon-plus"></i> Añadir</button>
                    </div>
                </div>
                <div class="col-12">
                    <blockquote class="blockquote text-center">
                        <h3 class="control-label font-16"><strong>Detalle del alquiler</strong></h3>
                    </blockquote>
                    <div class="row table-responsive">
                        <table id="default-datatable" class="table table-bordered mt-3 ">
                            <thead>
                                <tr class="text-center">
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Garantia</th>
                                    <th>Fecha devolución</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class=text-center>
                                <tr v-if="isloadingProduct" >
                                    <td rowspan="2" colspan="4" align="center">No hay maquinaria cargadas...</td>
                                </tr>                                    
                                <tr v-else v-for="item in products" :key="item.id" class="text-center">                                    
                                    <td >{{item.nombre_producto}}</td>
                                    <td >{{item.cantidad_producto}}</td>
                                    <td >{{item.precio_producto}}</td>
                                    <td >{{item.garantia}}</td>
                                    <td >{{item.dia}}</td>
                                    <td ><button class="btn btn btn-round btn-outline-danger" @change="boolcliente=true"  @click.prevent="products.splice(item.id,1)"> <i class="feather icon-trash-2"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col" >
                        <div class="form-group">
                            <div class="row justify-content-center align-items-center">
                                <label class="col-sm-6 mt-1 p-0 control-label text-right"><strong>Subtotal:</strong></label>
                                <input class="col-6 col-sm-6 mt-1  control-label" @change="calculartotal()"  v-model="subtotal" type="hidden" min="0"> 
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
                                <label class="col-4 col-sm-4 mt-1 control-label"  ><strong> {{garantia_mayor}}</strong> Bs. </label>
                            </div>                                            
                        </div>
                    </div>                    
                    <div class="justify-content-center align-items-center row ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success ml-3" v-on:click.prevent="agregar">Guardar</button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</template>
<script>

import { required, maxLength,numeric,helpers,minLength} from 'vuelidate/lib/validators'
import moment from 'moment'


export default {
    props: ['maquinarias','clientes','token','vendedores'],
    mounted() {
        
        },
    data() {
        return {
            btn:false,
            nombre_producto:'',
            cliente:JSON.parse(this.clientes),
            empleados:JSON.parse(this.vendedores),
            cliente_select:0,
            vendedor_select:0,
            fechas:'',
            fecha_devolucion:'',
            maquinas:JSON.parse(this.maquinarias),
            cantidad:1,
            producto_select:0,
            tiempo:{
                check:false,
                check2:false,
                check3:false,
                tiempo:1
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
            token2:this.token,
            currentTime: null,
            isloadingProduct:true,
            garantia_mayor:0,
            boolcliente:false,
            boolvendedor:false,
            boolproductoselect:false,
            boolcantidad:false,
            boolcheck:false,
            boolcheck2:false,
            boolcheck3:false,
            totales:0
        }
    },
    updated(){
            this.fecha();
            this.created() 
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
        async agregar(){
            try {
                if(Object.keys(this.products).length !== 0){
                    const response = await axios.post('/alquiler', {
                    personal_id:this.vendedor_select,
                    cliente_id:this.cliente_select,
                    garantia:this.garantia_mayor,
                    total:this.total,
                    products:this.products,
                }).then(response => {
                        swal({
                            title: "Creado exitosamente",
                            type: 'success',
                            showConfirmButton:false,
                            timer: 2000,
                        });
                        window.location.replace('/alquiler');
                        console.log(response.data)
                    });
                }else{
                    console.log('no productos en el detalle');
                    swal({
                        title: "No hay articulos en el detalle!",
                        type: 'warning',
                    });
                }
            } catch (error) {
                swal({
                    title: "Fallo algo",
                    type: 'success',
                    showConfirmButton:false,
                    timer: 2000
                });
                console.log(error.response);
            }
            /* e.preventDefault(); */
            
        },
        añadir(){
            if(this.cliente_select==0){
                this.boolcliente=true;
            }
            if(this.vendedor_select==0){
                this.boolvendedor=true;
            }
            if(this.producto_select==0){
                this.boolproductoselect=true;
            }
            if(this.tiempo.check==false){
                this.boolckeck=true;
                this.boolckeck2=true;
                this.boolckeck3=true;
            }
            if (this.boolcliente==false && this.boolproductoselect==false && this.boolcheck==false) {
                if(this.tiempo.check==true){
                this.subtotal=0;
                this.tiempo.check2=false;
                this.tiempo.check3=false;
                this.subtotal= this.hora_producto*this.tiempo.tiempo
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
            this.isloadingProduct=false;
            if (this.tiempo.check==true) {
                var date = moment().add(this.tiempo.tiempo, 'hours').format('DD-MM-YYYY hh:mm:ss');
            }
            if (this.tiempo.check2==true) {
                var date = moment().add(this.tiempo.tiempo, 'weeks').format('DD-MM-YYYY hh:mm:ss');
            }
            if (this.tiempo.check3==true) {
                var date = moment().add(this.tiempo.tiempo, 'months').format('DD-MM-YYYY hh:mm:ss');
            }
            this.garantia_mayor
            if(this.garantia_mayor<this.garantia){
                this.garantia_mayor=this.garantia;
            }
            this.products.push(
            {  
                'garantia':this.garantia,
                'id':this.id,
                'nombre_producto':this.nombre_producto,
                'producto_id':this.producto_select,
                'cantidad_producto':this.cantidad,
                'precio_producto':this.subtotal,
                'dia':date,
                'tiempo':this.tiempo.tiempo,
                'hora':this.tiempo.check,
                'semana':this.tiempo.check2,
                'mes':this.tiempo.check3,
            });
            this.calculartotal();
            this.id++;
            this.cantidad=1;
            this.producto_select=0;
            this.tiempo.tiempo=1;
            this.tiempo.check=false;
            this.tiempo.check2=false;
            this.tiempo.check3=false; 
        }else{
            swal({
                title: "Debe selecionar los campos requeridos para el detalle!",
                type: 'error',
            });
        }
        },
        obtenernombre:function(pk){
            this.boolproductoselect=false;
            if (pk!='') {
                this.nombre_producto= this.maquinas[pk-1].nombre;
                this.hora_producto= this.maquinas[pk-1].hora;
                this.semana_producto= this.maquinas[pk-1].semana;
                this.mes_producto= this.maquinas[pk-1].mes;
                this.garantia= this.maquinas[pk-1].precio;
            }
            if(pk==0){
                this.nombre_producto="";
                this.hora_producto= 0;
                this.semana_producto= 0;
                this.mes_producto= 0;
                this.garantia= 0;
            }
        },
        check:function(key){
            this.boolckeck=false;
            this.boolckeck2=false;
            this.boolckeck3=false;
            this.tiempo.check2=false;
            this.tiempo.check3=false;
        },
        check1:function(key){
            this.boolckeck2=false;
            this.boolckeck=false;
            this.boolckeck3=false;
            this.tiempo.check=false;
            this.tiempo.check3=false;
        },
        check2:function(key){
            this.boolcheck3=false;
            this.boolcheck2=false;
            this.boolcheck=false;
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
        },
        updateCurrentTime() {

            this.currentTime = moment().format("DD-MM-YYYY hh:mm:ss");
        },
        created() {
            this.currentTime = moment().format("DD-MM-YYYY hh:mm:ss");
            setInterval(() => this.updateCurrentTime(), 1 * 1000);
        }

    } ,  
    
}
</script>