@extends('layouts.app')
@section('title')
XGRAFF - Maquinaria
@endsection
@section('title-page') 
Maquinarias
@endsection
@section('page')
    Maquinarias
@endsection
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@section('style')
<!-- Sweet Alert css -->
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Datepicker css -->
<link href="{{ asset('assets/plugins/datepicker/datepicker.css') }}" rel="stylesheet" type="text/css">
@endsection 
@section('button')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary-rgba" data-toggle="modal" data-target="#crearmodal">
        <i class="feather icon-plus mr-2"></i>Crear 
    </button>
    <!-- Modal -->
    <div class="modal fade" id="crearmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content ">
                <form class="form-validate" action="{{route('maquinaria.store')}}" id="form" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Crear nueva maquinaria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-6">
                            <blockquote class="blockquote text-center">
                                <h6 class="control-label font-10"><strong>Todos las campos con (<span class="text-danger">*</span>) son requeridos.</strong></h6>
                            </blockquote>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($maquinaria->nombre) ? $maquinaria->nombre : old('nombre')}}">
                                        {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Fecha de compra<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        <div class="input-group">                                  
                                            <input type="text" id="default-date" class="datepicker-here form-control {{ $errors->has('fecha') ? 'is-invalid' : ''}}" placeholder="dd/mm/yyyy" aria-describedby="basic-addon2" required name="fecha" value="{{ isset($maquinaria->fecha) ? $maquinaria->fecha : old('fecha')}}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        {!! $errors->first('descripcion', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Categoría<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        @if (!$categorias->isEmpty())
                                            
                                                <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : ''}}" id="formControlSelect" name="categoria" >
                                                    <option value="">Selecione una categoria</option>
                                                    @foreach ($categorias as $categoria)
                                                    <option value="{{  $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                                                @endforeach
                                                </select>
                                                {!! $errors->first('categoria', '<p class="help-block text-danger">:message</p>') !!}
                                            
                                        @else
                                        <input type="text" class="form-control is-invalid {{ $errors->has('categoria') ? 'is-invalid' : ''}}" name="categoria" disabled value="No hay categorias creadas">
                                            {!! $errors->first('categoria', '<p class="help-block text-danger">:message</p>') !!}
                                            <p class="help-block text-danger">No hay ninguna categoria</p>
                                        @endif                                                
                                    </div>
                                </div>                                            
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Precio<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('precio') ? 'is-invalid' : ''}}" name="precio" placeholder="precio" value="{{ isset($maquinaria->precio) ? $maquinaria->precio : old('precio')}}">
                                        {!! $errors->first('precio', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Hora:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('hora') ? 'is-invalid' : ''}}" name="hora" placeholder="hora" value="{{ isset($maquinaria->hora) ? $maquinaria->hora : old('hora')}}">
                                        {!! $errors->first('hora', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Semana:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('semana') ? 'is-invalid' : ''}}" name="semana" placeholder="semana" value="{{ isset($maquinaria->semana) ? $maquinaria->semana : old('semana')}}">
                                        {!! $errors->first('semana', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Mes:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('mes') ? 'is-invalid' : ''}}" name="mes" placeholder="mes" value="{{ isset($maquinaria->mes) ? $maquinaria->mes : old('mes')}}">
                                        {!! $errors->first('mes', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center align-items-center row">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar m-b-50">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th >Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maquinarias as $maquinaria)
                                    <tr class="text-center">
                                        <td>{{$maquinaria->nombre}}</td>
                                        <td>{{$maquinaria->categoria->nombre}}</td>
                                        <td>{{$maquinaria->precio}}</td>
                                        <td >{!! ($maquinaria->estado == 1) ? ( '<span class="badge badge-success shadow">Activo</span>'): '<span class="badge badge-danger shadow">Deshabilitado</span>' !!}
                                        <td class="justify-content-center align-items-center row">
                                            <button type="button" class="btn btn btn-round btn-outline-warning" data-toggle="modal" data-target="#editarmaqui{{$maquinaria->id}}">
                                                <i class="feather icon-settings"></i>
                                            </button>
                                            <div class="modal fade" id="editarmaqui{{$maquinaria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content ">
                                                        <form class="form-validate" action="{{route('maquinaria.update',$maquinaria->id)}}" id="form" method="post">
                                                            @csrf @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Crear nueva maquinaria</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-6">
                                                                    <blockquote class="blockquote text-center">
                                                                        <h6 class="control-label font-10"><strong>Todos las campos con (<span class="text-danger">*</span>) son requeridos.</strong></h6>
                                                                    </blockquote>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($maquinaria->nombre) ? $maquinaria->nombre : old('nombre')}}">
                                                                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Fecha de compra<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <div class="input-group">                                  
                                                                                    <input type="text" id="default-date" class="datepicker-here form-control {{ $errors->has('fecha') ? 'is-invalid' : ''}}" placeholder="dd/mm/yyyy" aria-describedby="basic-addon2" required name="fecha" value="{{ isset($maquinaria->fecha) ? $maquinaria->fecha : old('fecha')}}"/>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                {!! $errors->first('descripcion', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Categoría<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                @if (!$categorias->isEmpty())
                                                                                    
                                                                                        <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : ''}}" id="formControlSelect" name="categoria" >
                                                                                            <option value="">Selecione una categoria</option>
                                                                                            @foreach ($categorias as $categoria)
                                                                                            <option value="{{  $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                                                                                        @endforeach
                                                                                        </select>
                                                                                        {!! $errors->first('categoria', '<p class="help-block text-danger">:message</p>') !!}
                                                                                    
                                                                                @else
                                                                                <input type="text" class="form-control is-invalid {{ $errors->has('categoria') ? 'is-invalid' : ''}}" name="categoria" disabled value="No hay categorias creadas">
                                                                                    {!! $errors->first('categoria', '<p class="help-block text-danger">:message</p>') !!}
                                                                                    <p class="help-block text-danger">No hay ninguna categoria</p>
                                                                                @endif                                                
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Precio<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('precio') ? 'is-invalid' : ''}}" name="precio" placeholder="precio" value="{{ isset($maquinaria->precio) ? $maquinaria->precio : old('precio')}}">
                                                                                {!! $errors->first('precio', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Hora:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('hora') ? 'is-invalid' : ''}}" name="hora" placeholder="hora" value="{{ isset($maquinaria->hora) ? $maquinaria->hora : old('hora')}}">
                                                                                {!! $errors->first('hora', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Semana:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('semana') ? 'is-invalid' : ''}}" name="semana" placeholder="semana" value="{{ isset($maquinaria->semana) ? $maquinaria->semana : old('semana')}}">
                                                                                {!! $errors->first('semana', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Mes:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('mes') ? 'is-invalid' : ''}}" name="mes" placeholder="mes" value="{{ isset($maquinaria->mes) ? $maquinaria->mes : old('mes')}}">
                                                                                {!! $errors->first('mes', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-center align-items-center row">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-success">Guardar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <button type="button" class="btn btn-round btn-primary-rgba" data-toggle="modal" data-target="#mostrarmaqui{{$maquinaria->id}}">
                                                <i class="feather icon-upload"></i>
                                            </button>
                                            <div class="modal fade" id="mostrarmaqui{{$maquinaria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content ">
                                                        <form class="form-validate" action="{{route('maquinaria.store')}}" id="form" method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Mostrar datos Maquinaria</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-6">
                                                                    <blockquote class="blockquote text-center">
                                                                        <h6 class="control-label font-10"><strong>Todos las campos con (<span class="text-danger">*</span>) son requeridos.</strong></h6>
                                                                    </blockquote>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control" disabled name="nombre" placeholder="Nombre" value="{{$maquinaria->nombre}}">
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Fecha de compra<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <div class="input-group">                                  
                                                                                    <input type="text" id="default-date" class="datepicker-here form-control" disabled placeholder="dd/mm/yyyy" aria-describedby="basic-addon2" required name="fecha" value="{{$maquinaria->fecha}}"/>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                    
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Categoría<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">     
                                                                                   
                                                                                        <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : ''}}" disabled id="formControlSelect" name="categoria" >
                                                                                            @foreach ($categorias as $categoria)
                                                                                            <option value="{{  $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                                                                                            @endforeach
                                                                                        </select>                                                    
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Precio<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control " name="precio" disabled placeholder="precio" value="{{$maquinaria->precio}}">
                                                                                
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Hora:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control " name="hora" disabled placeholder="hora" value="{{ $maquinaria->hora}}">
                                                                              
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Semana:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control " disabled name="semana" placeholder="semana" value="{{$maquinaria->semana}}"> 
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Mes:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control" disabled name="mes" placeholder="mes" value="{{$maquinaria->mes}}">
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-center align-items-center row">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>   
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn btn-round btn-outline-danger"> <i class="feather icon-trash-2"></i></button>
                                        </td>
                                    </tr>
                                @endforeach                        
                            </tbody>
                            
                        </table>
                        <div>
                            {{$maquinarias->links()}}
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- End col -->        
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Parsley js -->
<script src="{{ asset('assets/plugins/validatejs/validate.min.js') }}"></script>
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<!-- Sweet-Alert js -->
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    @if(session()->get('success'))
        <script>
            swal({
                title: "{!!session()->get('success')!!}",
                type: 'success',
                showConfirmButton:false,
                timer: 2000
            });
        </script>    
    @endif
<!-- Datepicker JS -->
<script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.es.js') }}"></script>
<script>
     $(document).ready(function () {
        $('#default-date').datepicker({
            language: 'es',
            dateFormat: 'dd/mm/yyyy',
        });
        $('#form').validate({ 
            rules: {
                nombre: {
                    required: true,
                    minlength:1,
                    maxlength:20,
                },
                categria:{
                    required:true
                },
                fecha: {
                    required: true,
                },
                precio: {
                    required: true,
                    minlength:1,
                    maxlength:7,
                    min:1,
                    number: true
                },
                hora: {
                    maxlength:7,
                    number: true
                },
                semana: {
                    maxlength:7,
                    number: true
                },
                mes: {                    
                    maxlength:7,
                    number: true
                },
            },
            messages: {
				nombre: {
					required: "El campo no puede estar vacio",
					minlength: "Tiene que ser mayor a 2 caracteres",
					maxlength: "No tiene que ser mayor a 20 caracteres",
				},
				categoria: {
					required: "Debes selecionar una categoria",
                },
                fecha: {
					required: "Se necesita la fecha de la compra",
                },
                precio: {
					required: "El campo no puede estar vacio",
					minlength: "Tiene que ser mayor a 1 digito",
                    maxlength: "No tiene que ser mayor a 7 digitos",
                    min:"El valor minimo es 1",
                    number:"El campo solo permite digitos "
                },
                hora: {
                    number:"El campo solo permite digitos ",
                    maxlength: "No tiene que ser mayor a 7 digitos",
                },
                semana: {
                    number:"El campo solo permite digitos ",
                    maxlength: "No tiene que ser mayor a 7 digitos",
                },
                mes: {
                    number:"El campo solo permite digitos ",
                    maxlength: "No tiene que ser mayor a 7 digitos",
                },
			},
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('is-invalid');
            },
            errorElement: 'span',
            errorClass: 'help-block text-danger',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
        /* --- Form - Datepicker -- */
        
        $('#default-datatable').DataTable( {
            //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            "scrollCollapse": true,
            "autoWidth": false,
            "paging": false,
            responsive: true,
            "bInfo": false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 4 ] }
            ]
        });
    });
</script>
@endsection 