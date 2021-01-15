@section('title') 
Alquiler
@endsection
@section('title-page') 
Alquiler
@endsection
@section('page') 
Alquiler
@endsection 
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection 
@extends('layouts.app')
@section('style')

@endsection
@section('button')
    <a class="btn btn-primary-rgba" href="{{url('alquiler/create')}}" >
        <i class="feather icon-plus mr-2"></i>Crear 
    </a>
@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
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
                    <h3 class="text-center mt-3">Lista de alquileres</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive m-b-30">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre del cliente</th>
                                    <th scope="col">Monto Total</th>
                                    <th scope="col">Garantia</th>
                                    <th scope="col">Fecha del alquiler</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-striped text-center">
                                @forelse ($alquileres as $alquiler)
                                <tr class="text-center">
                                        <th scope="row">{{$alquiler->id}}</th>
                                        <th >{{$alquiler->cliente->nombre}}</th>
                                        <td>{{$alquiler->monto_total}}</td>
                                        <td>{{$alquiler->garantia}}</td>
                                        <td>{{$alquiler->fecha_alquiler->format('d-m-Y H:i')}}</td>
                                        <td >{!! ($alquiler->estado == 1) ? ( '<span class="badge badge-danger shadow">Alquiler pendiente</span>'): '<span class="badge badge-success shadow">Alquiler devuelto</span>' !!}
                                        <td>
                                            @if ($alquiler->estado == 1)
                                            <a class="btn btn btn-round btn-outline-success m-r-5" href="{{route('alquiler.edit',$alquiler->id )}}" ><i class="feather icon-settings"></i></a>
                                            @else
                                            <a class="btn btn-round btn-outline-info" href="{{route('alquiler.show',$alquiler->id)}}"> <i class="dripicons-preview"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <th colspan="7" scope="col">No hay alquileres registrados</th>                                    
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