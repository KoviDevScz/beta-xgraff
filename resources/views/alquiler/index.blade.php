@section('title') 
Alquiler
@endsection
@section('page') 
Alquiler
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
            
        </div>
        <!-- End col -->
        
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')

@endsection 