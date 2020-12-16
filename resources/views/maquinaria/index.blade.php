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
                <form class="form-validate" autocomplete="off" action="{{route('maquinaria.store')}}" id="form" method="post">
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
                                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" required name="nombre" placeholder="Nombre" value="{{ isset($maquinaria->nombre) ? $maquinaria->nombre : old('nombre')}}">
                                        {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Fecha de compra<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        <div class="input-group">
                                            <input type="date" class="form-control  {{ $errors->has('fecha') ? 'is-invalid' : ''}}" id="fecha" required name="fecha" required value="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                        {!! $errors->first('fecha', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Precio<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('precio') ? 'is-invalid' : ''}}" required name="precio" placeholder="precio" value="{{ old('precio',1)}}">
                                        {!! $errors->first('precio', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Categoría<span class="text-danger">*</span>:</label>
                                    <div class="col-8 col-sm-8">
                                        @if (!$categorias->isEmpty())
                                            <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : ''}}" id="categoria" name="categoria" required placehol>
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
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Hora:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('hora') ? 'is-invalid' : ''}}" name="hora" required placeholder="hora" value="{{ old('hora',1)}}">
                                        {!! $errors->first('hora', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Semana:</label>
                                    <div class="col-8 col-sm-8">
                                        <input type="text" class="form-control {{ $errors->has('semana') ? 'is-invalid' : ''}}" name="semana" required placeholder="semana" value="{{  old('semana', 1 )}}">
                                        {!! $errors->first('semana', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Mes:</label>
                                <div class="col-8 col-sm-8">
                                    <input type="text" class="form-control {{ $errors->has('mes') ? 'is-invalid' : ''}}" name="mes" placeholder="mes" required value="{{ old('mes', 1)}}">
                                    {!! $errors->first('mes', '<p class="help-block text-danger">:message</p>') !!}
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
                <div class="card-head">
                    <h3 class="text-center mt-3">Lista de maquinaria</h3>
                </div>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->get('update'))
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('update') }}
                        </div>
                    @endif
                    @if(session()->get('delete'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session()->get('delete') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-hover table-bordered m-b-30"  border="1" cellspacing="0" cellpadding="0" style="border: 1px, solid, #000">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th  >Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maquinarias as $maquinaria)
                                    <tr class="text-center">
                                        <td class="text-left p-0"width="45%" >{{$maquinaria->nombre}}</td>
                                        <td width="20%">{{$maquinaria->categoria->nombre}}</td>
                                        <td scope="row">{{$maquinaria->precio}}</td>
                                        <td width="10%" >{!! ($maquinaria->estado == 1) ? ( '<span class="badge badge-success shadow">Activo</span>'): '<span class="badge badge-danger shadow">Deshabilitado</span>' !!}
                                        <td width="17%" class="justify-content-center align-items-center p-2" colspan="3" >
                                            <button type="button" class="btn btn btn-round btn-outline-warning m-r-5" data-toggle="modal" data-target="#editarmaqui{{$maquinaria->id}}">
                                                <i class="feather icon-settings"></i>
                                            </button>
                                            <div class="modal fade" id="editarmaqui{{$maquinaria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content ">
                                                        <form class="form-validate" action="{{route('maquinaria.update',$maquinaria->id)}}" method="post">
                                                            @csrf @method('PUT')
                                                            <div class="modal-header text-white bg-warning ">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Modificar maquinaria</h5>
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
                                                                                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" required placeholder="Nombre" value="{{ isset($maquinaria->nombre) ? $maquinaria->nombre : old('nombre')}}">
                                                                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Fecha de compra<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8 text-left ">
                                                                                <div class="input-group">                                  
                                                                                    <input type="text" class="datepicker-here form-control"
                                                                                    data-language="es" data-time-format='d-m-Y'  aria-describedby="basic-addon2"  required name="fecha" value="{{\Carbon\Carbon::parse($maquinaria->fecha_compra)->format('d-m-Y')}}"/>
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
                                                                                <select class="form-control form-control-sm" name="categoria">
                                                                                    <option value="{{$maquinaria->categoria_id}}"> {{$maquinaria->categoria->nombre}}</option>
                                                                                    @foreach ($categorias as $categoria)
                                                                                        <option value="{{$maquinaria->categoria_id}}">{{$categoria->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>                                              
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label  class="col-sm-4 mt-1 p-0 control-label text-right">Estado:</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="js-example-basic-single form-control" id="estado{{$maquinaria->id}}"  name="estado" value="{{ isset($maquinaria->estado) ? $maquinaria->estado : old('estado')}}" >
                                                                                <option value="1" >Activo</option>
                                                                                <option value="0" >Deshabilitado</option>
                                                                                {!! $errors->first('estado', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Precio<span class="text-danger">*</span>:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('precio') ? 'is-invalid' : ''}}" name="precio" placeholder="precio" required value="{{ isset($maquinaria->precio) ? $maquinaria->precio : old('precio')}}">
                                                                                {!! $errors->first('precio', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Hora:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('hora') ? 'is-invalid' : ''}}" name="hora" required placeholder="hora" value="{{ isset($maquinaria->hora) ? $maquinaria->hora : old('hora')}}">
                                                                                {!! $errors->first('hora', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Semana:</label>
                                                                            <div class="col-8 col-sm-8">
                                                                                <input type="text" class="form-control {{ $errors->has('semana') ? 'is-invalid' : ''}}" name="semana" placeholder="semana" required value="{{ isset($maquinaria->semana) ? $maquinaria->semana : old('semana')}}">
                                                                                {!! $errors->first('semana', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Mes:</label>
                                                                        <div class="col-8 col-sm-8">
                                                                            <input type="text" class="form-control {{ $errors->has('mes') ? 'is-invalid' : ''}}" name="mes" placeholder="mes" required value="{{ isset($maquinaria->mes) ? $maquinaria->mes : old('mes')}}">
                                                                            {!! $errors->first('mes', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Garantia:</label>
                                                                        <div class="col-8 col-sm-8">
                                                                            <input type="text" class="form-control {{ $errors->has('garantia') ? 'is-invalid' : ''}}" name="garantia" placeholder="garantia" required value="{{ isset($maquinaria->garantia) ? $maquinaria->garantia : old('garantia')}}">
                                                                            {!! $errors->first('garantia', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-center align-items-center row">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-success">Modificar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-round btn-primary-rgba m-r-5" data-toggle="modal" data-target="#mostrarmaqui{{$maquinaria->id}}">
                                                <i class="feather icon-upload"></i>
                                            </button>
                                            <div class="modal fade" id="mostrarmaqui{{$maquinaria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content ">
                                                        <form class="form-validate" action="{{route('maquinaria.store')}}" id="form{{$maquinaria->id}}" method="post">
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
                                                                                    <input type="text" class=" form-control" disabled  aria-describedby="basic-addon2" required name="fecha" value="{{\Carbon\Carbon::parse($maquinaria->fecha_compra)->format('Y-d-m')}}"/>
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
                                                                                <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : ''}}" disabled id="formControlSelect{{$maquinaria->id}}" name="categoria" >
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
                                            <button class="btn btn btn-round btn-outline-danger" data-toggle="modal" data-target="#eliminarmodal{{$maquinaria->id}}"> <i class="feather icon-trash-2"></i></button>
                                            <div class="modal fade" id="eliminarmodal{{$maquinaria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
                                                    <div class="modal-content ">
                                                        <form class="form-validate" action="{{route('maquinaria.destroy',$maquinaria->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar maquinaría</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" value="{{$categoria->id}}" name="id"> 
                                                                <div class="container">
                                                                    <h6> Estas seguro de eliminar la maquinaria?</h6>
                                                                <h3 class="justify-content-center align-items-center "> La maquinaria <strong>{{$maquinaria->nombre}}</strong> </h3>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-center align-items-center row">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{$maquinarias->links()}}
                            </ul>
                        </nav>
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
                timer: 3000
            }).catch(swal.noop);
        </script>    
    @endif
    @if(session()->get('update'))
        <script>
            swal({
                title: "{!!session()->get('update')!!}",
                type: 'success',
                showConfirmButton:false,
                timer: 3000
            }).catch(swal.noop);
        </script>    
    @endif
    @if(session()->get('delete'))
        <script>
            swal({
                title: "{!!session()->get('delete')!!}",
                type: 'warning',
                showConfirmButton:false,
                timer: 3000
            }).catch(swal.noop);
        </script>    
    @endif
<!-- Datepicker JS -->
<script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.es.js') }}"></script>
<script>
    //TODO:Validar el select
        $(document).ready(function () {
        var disabledDays = [0, 6];
            $('#datepicker-here').datepicker({
                showAnim: "drop",
                changeMonth: true,
                changeYear: true,
                showWeek: true,
                closeOnDateSelect:true,
                format: 'Y-m-d',
                lang:'es',
                onRenderCell: function (date, cellType) {
                    if (cellType == 'day') {
                        var day = date.getDay(),
                            isDisabled = disabledDays.indexOf(day) != -1;
                        return {
                            disabled: isDisabled
                        }
                    }
                },
                maxDate: new Date(),
            });
       /* --- Form - Datepicker -- */
    });
</script>
@endsection 