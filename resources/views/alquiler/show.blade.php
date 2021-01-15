@section('title') 
XGRAFF - Detalle del alquiler
@endsection
@section('title-page') 
Detalle del alquiler
@endsection
@section('page') 
Detalle del alquiler
@endsection 
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item"><a >Alquiler</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@extends('layouts.app')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar" style="margin-top: -100px">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card col-12">
                <div class="card-head col mx-auto">
                    <h4 class="text-center mt-3">Detalle del alquiler</h4>
                </div>
                <div class="card-body ">
                    <form action="{{route('devolucion.store')}}" method="POST">
                        @csrf
                        <div class="row form-group justify-content-center align-items-center col-12">
                            <div class="col-4 row justify-content-center align-items-center">
                                <div class="form-group row ">
                                    <input  type="hidden" name="alquiler_id" id="alquiler_id" class="form-control " value="{{ $alquiler[0]->id }}">
                                    <label for="inputEmail3" class="col-form-label ">Empleado:</label>
                                    <input  readonly type="text"  class="form-control " value="{{ $alquiler[0]->personal->nombre }}">                                    
                                    <input  type="hidden" name="personal_id" id="personal_id" class="form-control " value="{{ $alquiler[0]->personal_id }}">                                    
                                </div>
                                <div class="form-group row ">
                                    <label for="inputEmail3" class="col-form-label ">Cliente:</label>
                                    <input  readonly type="text"  class="form-control " value="{{ $alquiler[0]->cliente->nombre }}">                                    
                                    <input  type="hidden" name="cliente_id" id="cliente_id" class="form-control " value="{{ $alquiler[0]->cliente_id }}">                                    
                                </div>
                                <div class="form-group row ">
                                    <label for="inputEmail3" class="col-form-label ">Garantia:</label>    
                                    <input  readonly type="text" class="form-control" name="garantia" id="garantia" value="{{ ($alquiler[0]->garantia) }}">
                                    {{-- <input  type="hidden" name="garantia" id="cliente_id" class="form-control " value="{{ $alquiler[0]->garantia }}"> --}}
                                </div>
                            </div>
                            <div class="row col-4 justify-content-center align-items-center ml-3">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-form-label ">Fecha de alquiler:</label>
                                    <input type="text" class="datepicker-here form-control" readonly
                                                                                    data-language="es" data-time-format='d-m-Y H:i'  aria-describedby="basic-addon2"  required name="fecha" value="{{\Carbon\Carbon::parse($alquiler[0]->fecha_alquiler)->format('d-m-Y H:i')}}"/>
                                    {{-- {{dd($alquiler[0])}} --}}
                                </div>
                                <div class="form-group row ">
                                    <label for="inputEmail3" class="col-form-label ">Monto Total:</label>
                                    <input  readonly type="text" class="form-control" name="monto_total" id="monto_total" value="{{($alquiler[0]->monto_total) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group justify-content-center align-items-center">
                        </div>
                        <div class="table-responsive m-b-30">
                            <div>
                                <h5 class="text-center">Detalle del alquiler</h5>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark text-center">
                                    <tr >
                                        <th scope="col">Nombre del producto</th>
                                        <th scope="col">cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th  scope="col">Fecha de devolución</th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                    {{-- {{dd($maquinarias)}} --}}
                                    @forelse ($maquinarias as $maquinaria)
                                        <tr class="text-center" >                                  
                                            <th >{{$maquinaria->nombre}}</th>                                    
                                            <th >{{$maquinaria->cantidad}}</th>                                    
                                            <th >{{$maquinaria->monto}}</th>                                    
                                            <th >{{ date("Y-m-d H:i",strtotime($maquinaria->fecha_devolucion) ) }}</th>                                    
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <th colspan="4" scope="col">No hay productos cargados</th>                                    
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="modal-footer justify-content-center align-items-center row">
                                <a href="{{url('alquiler')}}" type="button" class="btn btn-info" data-dismiss="modal"><i class="feather icon-arrow-left"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
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