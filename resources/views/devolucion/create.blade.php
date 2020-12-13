@section('title') 
Devolucion
@endsection
@section('title-page') 
Registrar
@endsection
@section('page') 
Registrar
@endsection 
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">CMS</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@extends('layouts.app')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-head col mx-auto">
                    <h4 class="text-center mt-3">Buscar alquiler</h4>
                    <form class=" justify-content-center">
                        <div class="form-group row">
                            <label for="inputEmail3" class="text-right col-5 col-form-label "> <strong> Codigo alquiler:</strong></label>
                            <input type="text" class="form-control col-2" id="inputEmail3" placeholder="codigo">
                            <button type="button" class="btn btn-primary  ml-1">Buscar</button>
                        </div>
                    </form>
                    <form class="row col-12 mt-3">
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 text-right col-form-label ">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-4 col-form-label text-right">Password</label>
                                <div class="col-8">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                
                <div class="card-body ">
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