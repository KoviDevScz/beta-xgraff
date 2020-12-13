@section('title') 
XGRAFF - Personal
@endsection
@section('page') 
Personal
@endsection 
@extends('layouts.app')
@section('style')
<!-- Sweet Alert css -->
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@section('button')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary-rgba" data-toggle="modal" data-target="#crearmodal">
    <i class="feather icon-plus mr-2"></i>Crear 
</button>
<!-- Modal -->
<div class="modal fade" id="crearmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content ">
            <form class="form-validate" action="{{route('personal.store')}}" id="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Registrar Personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre <span class="text-danger">*</span>:</label>
                            <div class="col-8 col-sm-8">
                                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($personal->nombre) ? $personal->nombre : old('nombre')}}">
                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">CI:</label>
                            <div class="col-8 col-sm-8">
                                <input type="text" class="form-control {{ $errors->has('ci') ? 'is-invalid' : ''}}" name="ci" placeholder="ci" value="{{ isset($personal->ci) ? $personal->ci : old('ci')}}">
                                {!! $errors->first('ci', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Telefono:</label>
                            <div class="col-8 col-sm-8">
                                <input type="text" class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" name="telf" placeholder="telf" value="{{ isset($personal->telf) ? $personal->telf : old('telf')}}">
                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Dirección:</label>
                            <div class="col-8 col-sm-8">
                                <input type="text" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : ''}}" name="direccion" placeholder="direccion" value="{{ isset($personal->direccion) ? $personal->direccion : old('direccion')}}">
                                {!! $errors->first('direccion', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Foto:</label>
                            <div class="col-8 col-sm-8">
                                <input type="file" class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" name="foto" placeholder="foto" value="{{ isset($personal->foto) ? $personal->foto : old('telf')}}">
                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>.
                    
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
<div class="breadcrumbbar" style="margin-top: 15px">
    <div class="card ">
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{-- <h4><i class="icon fa fa-check"></i></h4> --}}
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->get('update'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{-- <h4><i class="icon fa fa-check"></i></h4> --}}
            {{ session()->get('update') }}
        </div>
        @endif
        @if(session()->get('delete'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{-- <h4><i class="icon fa fa-check"></i></h4> --}}
            {{ session()->get('delete') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table id="default-datatable" class="display table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Nombre</th>
                            <th>CI</th>
                            <th>Telefono</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personals as $personal)
                        <tr class="text-center">
                            <td>{{$personal->nombre}}</td>
                            <td>{{$personal->ci}}</td>
                            <td>{{$personal->telf}}</td>
                            <td>
                              <img src="{{ url('public/img/personal/'.$personal->foto)}}" alt="" width="100">
                                
                            </td>
                            
                            <td >{!! ($personal->estado == 1) ? ( '<span class="badge badge-success shadow">Activo</span>'): '<span class="badge badge-danger shadow">Deshabilitado</span>' !!}
                            <td class="justify-content-center align-items-center row">
                                <button class="btn btn btn-round btn-outline-warning" data-toggle="modal" data-target="#editarmodal{{$personal->id}}"> <i class="feather icon-settings"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="editarmodal{{$personal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content ">
                                            <form class="form-validate" action="{{route('personal.update',$personal->id)}}" id="form{{$personal->id}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{$personal->id}}" name="id">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modificar personal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre <span class="text-danger">*</span>:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($personal->nombre) ? $personal->nombre : old('nombre')}}">
                                                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">ci:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('ci') ? 'is-invalid' : ''}}" name="ci" placeholder="ci" value="{{ isset($personal->ci) ? $personal->ci : old('ci')}}">
                                                                {!! $errors->first('ci', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Telefono:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" name="telf" placeholder="telf" value="{{ isset($personal->telf) ? $personal->telf : old('telf')}}">
                                                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">direccion:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : ''}}" name="direccion" placeholder="direccion" value="{{ isset($personal->direccion) ? $personal->direccion : old('direccion')}}">
                                                                {!! $errors->first('direccion', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group row">
                                                        <label  class="col-sm-4 col-form-label">Estado:</label>
                                                        <div class="col-sm-8">
                                                            <select class="js-example-basic-single form-control" id="estado{{$personal->id}}"  name="estado" value="{{ isset($personal->estado) ? $personal->estado : old('estado')}}" >
                                                                <option value="1" >Activo</option>
                                                                <option value="0" >Deshabilitado</option>
                                                                {!! $errors->first('estado', '<p class="help-block text-danger">:message</p>') !!}
                                                            </select>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="modal-footer justify-content-center align-items-center row">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-warning">Modificar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn btn-round btn-outline-info ml-2 mr-2" data-toggle="modal" data-target="#infomodal{{$personal->id}}"> <i class="dripicons-preview"></i></button>
                                <div class="modal fade" id="infomodal{{$personal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content ">
                                            <form class="form-validate" method="dialog">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Información del Personal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre <span class="text-danger">*</span>:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($personal->nombre) ? $personal->nombre : old('nombre')}}" disabled>
                                                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">CI:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('') ? 'is-invalid' : ''}}" name="ci" placeholder="ci" value="{{ isset($personal->ci) ? $personal->descripcion : old('ci')}}" disabled>
                                                                {!! $errors->first('ci', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Telefono:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" disabled class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" name="telf" placeholder="telf" value="{{ isset($personal->telf) ? $personal->telf : old('telf')}}">
                                                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Dirección:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('') ? 'is-invalid' : ''}}" name="direccion" placeholder="direccion" value="{{ isset($personal->direccion) ? $personal->direccion : old('direccion')}}" disabled>
                                                                {!! $errors->first('direccion', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group row">
                                                        <label  class="col-sm-4 col-form-label">Estado:</label>
                                                        <div class="col-sm-8">
                                                            <select class="js-example-basic-single form-control" name="estado" value="{{ isset($personal->estado) ? $personal->estado : old('estado')}}" disabled >
                                                                <option value="1" >Activo</option>
                                                                <option value="0" >Deshabilitado</option>
                                                                {!! $errors->first('estado', '<p class="help-block text-danger">:message</p>') !!}
                                                            </select>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="modal-footer justify-content-center align-items-center row">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn btn-round btn-outline-danger" data-toggle="modal" data-target="#eliminarmodal{{$personal->id}}"> <i class="feather icon-trash-2"></i></button>
                                <div class="modal fade" id="eliminarmodal{{$personal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content ">
                                            <form class="form-validate" action="{{route('personal.destroy',$personal->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Crear nuevo personal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{$personal->id}}" name="id"> 
                                                    <div class="container">
                                                        <h6> Estas seguro de eliminar al personal?</h6>
                                                    <h3 class="justify-content-center align-items-center "> personal <strong>{{$personal->nombre}}</strong> </h3>
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
            </div>
        </div>
    </div>         
</div>
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
                type: 'update',
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
<script>
     $(document).ready(function () {
        $('#form').validate({ 
            rules: {
                nombre: {
                    required: true,
                    minlength:2,
                    maxlength:20,
                }
            },
            messages: {
				nombre: {
					required: "El campo no puede estar vacio",
					minlength: "Tiene que ser mayor a 2 caracteres",
					maxlength: "No tiene que ser mayor a 20 caracteres",
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
        $('#default-datatable').DataTable( {
            //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            "scrollCollapse": true,
            responsive: true,
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
                { 'bSortable': false, 'aTargets': [ 2,3 ] }
            ]
        });
    });
</script>
@endsection  