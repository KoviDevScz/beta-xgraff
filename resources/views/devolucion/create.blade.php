@section('title') 
XGRAFF - Devolucion
@endsection
@section('title-page') 
Registrar
@endsection
@section('page') 
Registrar
@endsection 
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item"><a >Devolución</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@extends('layouts.app')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->   
<div class="topbar">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mt-3">Buscar alquiler</h4>
                    <form class="justify-content-center align-items-center ">
                        <div class="form-group row">
                            <label for="inputEmail3" class="text-right col-5 col-form-label "> <strong> Codigo alquiler:</strong></label>
                            <input type="search" class="form-control col-2" id="inputEmail3" name="buscar" placeholder="codigo">
                            <button type="button" class="btn btn-primary  ml-1">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card col-12">
                <div class="card-head col mx-auto">
                    <h4 class="text-center mt-3">Alquiler</h4>
                    <form class="row col-12 mt-3">
                        <div class="row ml-3">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-4 text-right col-form-label ">Cliente:</label>
                                    <input  disabled type="text" name="cliente_id" id="cliente_id" class="form-control col-8" value="{{ 'No hay cliente' ,old('cliente_id',(isset($alquiler[0]->cliente_id))) }}">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-8 text-right col-form-label ">Garantia:</label>    
                                <input  disabled type="text" class="form-control col-4" name="garantia" id="garantia" value="{{ '0' ,old('garantia',(isset($alquiler[0]->garantia))) }}">
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-8  text-right col-form-label ">Fecha de alquiler:</label>
                                    <input  disabled type="text" class="form-control col-4" name="fecha_alquiler" id="fecha_alquiler" value="{{ 'dd-mm-yyyy' ,old('fecha_alquiler',(isset($alquiler[0]->fecha_alquiler)) ) }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body ">
                    <div class="table-responsive m-b-30">
                        <div>
                            <h5 class="text-center">Detalle del alquiler</h5>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">cantidad</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row"> $producto->nombre</th>
                                    <td>$producto->monto</td>
                                    <td>$producto->fecha_devolucion</td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="modal-footer justify-content-center align-items-center row">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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

@endsection 