@section('title') 
XGRAFF - Cliente
@endsection
@section('title-page') 
Cliente
@endsection
@section('page') 
Cliente
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
            <form class="form-validate" action="{{route('cliente.store')}}" id="form" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Crear cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre <span class="text-danger">*</span>:</label>
                            <div class="col-8 col-sm-8">
                                <input type="text"  class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre"   required placeholder="Nombre completo" value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre')}}">
                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">CI:</label>
                            <div class="col-8 col-sm-8">
                                <input type="number" class="form-control {{ $errors->has('ci') ? 'is-invalid' : ''}}" name="ci" pattern="[0-9]{1,8}" maxlength="8" minlength="7"   required placeholder="Descripcion" value="{{ isset($cliente->ci) ? $cliente->ci : old('ci')}}">
                                {!! $errors->first('ci', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Telefonó:</label>
                            <div class="col-8 col-sm-8">
                                <input type="number" class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" name="telf" pattern="[0-9]{1,8}" maxlength="8" minlength="7"   required placeholder="Descripcion" value="{{ isset($cliente->telf) ? $cliente->telf : old('telf')}}">
                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>                                            
                    </div>.
                    <div class="form-group">
                        <div class="row">
                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Dirección:</label>
                            <div class="col-8 col-sm-8">
                                <input type="text" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : ''}}" name="direccion" placeholder="Descripcion" required value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion')}}">
                                {!! $errors->first('direccion', '<p class="help-block text-danger">:message</p>') !!}
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
<div class="breadcrumbbar m-b-20" style="margin-top: 15px;margin-bottom: 80px;">
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
        @if(session()->get('danger'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{-- <h4><i class="icon fa fa-check"></i></h4> --}}
            {{ session()->get('danger') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table id="default-datatable" class="display table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Nombre</th>
                            <th>CI</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                            <th >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr class="text-center">
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->ci}}</td>
                            <td>{{$cliente->telf}}</td>
                            <td width="10%" >{!! ($cliente->estado == 1) ? ( '<span class="badge badge-success shadow">Activo</span>'): '<span class="badge badge-danger shadow">Deshabilitado</span>' !!}
                            <td class="justify-content-center align-items-center row">
                                <button class="btn btn btn-round btn-outline-warning" data-toggle="modal" data-target="#editarmodal{{$cliente->id}}" > <i class="feather icon-settings"></i></button>
                                <div class="modal fade" id="editarmodal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content ">
                                            <form class="form-validate" action="{{route('cliente.update',$cliente->id)}}" id="formeditar{{$cliente->id}}"  method="post" autocomplete="off">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="$cliente->id" name="id">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Modificar cliente  {{$cliente->nombre}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre <span class="text-danger">*</span>:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input maxlength="" type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre')}}">
                                                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">CI:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input maxlength="8" minlength="7" type="text" class="form-control {{ $errors->has('ci') ? 'is-invalid' : ''}}" pattern="[0-9]{1,8}" min="1"   required name="ci" placeholder="Descripcion" value="{{ isset($cliente->ci) ? $cliente->ci : old('ci')}}">
                                                                {!! $errors->first('ci', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 control-label text-right">Telefonó:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input maxlength="8" minlength="7" type="text" class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" pattern="[0-9]{1,8}" min="1"   required name="telf" placeholder="Descripcion" value="{{ $cliente->telf}}">
                                                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 control-label text-right">Dirección:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : ''}}" name="direccion" placeholder="Descripcion" value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion')}}">
                                                                {!! $errors->first('direccion', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group row">
                                                        <label  class="col-sm-4 mt-1 p-0 control-label text-right">Estado:</label>
                                                        <div class="col-sm-8">
                                                            <select class="js-example-basic-single form-control"  name="estado">
                                                                <option value="1" {{ ($cliente->estado == 1) ? 'selected': ''}}>Activo</option>
                                                                <option value="0" {{ ($cliente->estado == 0) ? 'selected': ''}}>Deshabilitado</option>
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
                                <button class="btn btn btn-round btn-outline-info ml-2 mr-2"  data-toggle="modal" data-target="#infomodal{{$cliente->id}}"> <i class="feather icon-upload"></i></button>
                                <div class="modal fade" id="infomodal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content ">
                                            <form class="form-validate" >
                                                @csrf
                                                <div class="modal-header text-white bg-info">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Informacion del cliente  {{$cliente->nombre}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Nombre <span class="text-danger">*</span>:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" placeholder="Nombre" value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre')}}" disabled>
                                                                {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">CI:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('ci') ? 'is-invalid' : ''}}" name="ci" placeholder="Descripcion" value="{{ isset($cliente->ci) ? $cliente->ci : old('ci')}}" disabled>
                                                                {!! $errors->first('ci', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Telefonó:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('telf') ? 'is-invalid' : ''}}" name="telf" placeholder="Descripcion" value="{{ isset($cliente->telf) ? $cliente->telf : old('telf')}}" disabled>
                                                                {!! $errors->first('telf', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-4 col-sm-4 mt-1 p-0 control-label text-right">Dirección:</label>
                                                            <div class="col-8 col-sm-8">
                                                                <input type="text" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : ''}}" name="direccion" placeholder="Descripcion" value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion')}}" disabled>
                                                                {!! $errors->first('direccion', '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>                                            
                                                    </div>
                                                    <div class="form-group row">
                                                        <label  class="col-sm-4 mt-1 p-0 control-label text-right">Estado:</label>
                                                        <div class="col-sm-8">
                                                            <select disabled class="js-example-basic-single form-control"  name="Estado">
                                                                <option value="1" {{ ($cliente->estado == 1) ? 'selected': ''}}>Activo</option>
                                                                <option value="0" {{ ($cliente->estado == 0) ? 'selected': ''}}>Deshabilitado</option>
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
                                <button class="btn btn btn-round btn-outline-danger" data-toggle="modal" data-target="#eliminarmodal{{$cliente->id}}"> <i class="feather icon-trash-2"></i></button>
                                <div class="modal fade" id="eliminarmodal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content ">
                                            <form class="form-validate" action="{{route('cliente.destroy',$cliente->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Crear nuevo personal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{$cliente->id}}" name="id"> 
                                                    <div class="container">
                                                        <h6> Estas seguro de eliminar al cliente?</h6>
                                                    <h3 class="justify-content-center align-items-center "> cliente <strong>{{$cliente->nombre}}</strong> </h3>
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
                        {{$clientes->links()}}
                    </ul>
                </nav>
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
                timer: 2000
            }).catch(swal.noop);
        </script>    
    @endif
    @if(session()->get('update'))
        <script>
            swal({
                title: "{!!session()->get('update')!!}",
                type: 'success',
                showConfirmButton:false,
                timer: 2000
            }).catch(swal.noop);
        </script>    
    @endif
    @if(session()->get('danger'))
        <script>
            swal({
                title: "{!!session()->get('danger')!!}",
                type: 'warning',
                showConfirmButton:false,
                timer: 2000
            }).catch(swal.noop);
        </script>    
    @endif
<script>
     $(document).ready(function () {
        
        $('#default-datatable').DataTable( {
            //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            scrollCollapse: true,
            responsive: true,
            paging: false,
            ordering: false,
            info: false,
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