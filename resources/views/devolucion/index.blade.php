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
@section('style')

@endsection
@section('button')
    <a class="btn btn-primary-rgba" href="{{url('devolucion/create')}}" >
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
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
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