@section('title') 
Registar - Alquiler
@endsection
@section('title-page') 
Registar
@endsection
@section('page') 
Registar
@endsection  
@extends('layouts.app')
@section('style')
<!-- Sweet Alert css -->
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Touchspin css -->
<link href="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('link-page')
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a >Alquiler</a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <alquiler-component 
                token="{{csrf_token()}}"
                maquinarias="{{$maquinarias}}"
                clientes="{{$clientes}}"
                vendedores="{{$vendedores}}"
                {{-- empleados="{{$}}" --}}
                >
            </alquiler-component>
        </div>
        <!-- End col -->
        
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Touchspin js -->
<script src="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-form-touchspin.js') }}"></script>
<!-- Datepicker JS -->
<script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.es.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>
<!-- Parsley js -->
<script src="{{ asset('assets/plugins/validatejs/validate.min.js') }}"></script>
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<!-- Sweet-Alert js -->
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script>
    $("#touchspin-value-attribute").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
    }); 
</script>
@endsection 