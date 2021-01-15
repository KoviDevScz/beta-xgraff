@section('title') 
Devolucion
@endsection
@section('title-page') 
Devolución
@endsection
@section('page') 
Devolución
@endsection 
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@extends('layouts.app')
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <!-- TODO:Crear Devolucion -->
            <div class="card">
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
                <div class="card-head">
                    <h3 class="text-center mt-3">Lista de devolución</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive m-b-30">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Codigo del alquiler</th>
                                    <th scope="col">Nombre del cliente</th>
                                    <th scope="col">Fecha devolución</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($devoluciones as $devolucion)
                                <tr class="table-striped text-center">
                                    <th scope="row">{{$devolucion->alquiler_id}}</th>
                                    <td>{{$devolucion->cliente->nombre}}</td>
                                    <td>{{$devolucion->fecha_devolucion}}</td>
                                    <td >{!! ($devolucion->estado == 1) ? ( '<span class="badge badge-success shadow">Alquiler devuelto</span>'): '<span class="badge badge-danger shadow">Alquiler pendiente</span>' !!}
                                    <td><a class="btn btn-round btn-outline-info" href="{{route('devolucion.show',$devolucion->id)}}"> <i class="dripicons-preview"></i></a></td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <th colspan="4" scope="col">No hay devoluciones</th>                                    
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
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