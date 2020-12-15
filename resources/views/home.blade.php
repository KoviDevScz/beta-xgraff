@extends('layouts.app')

@section('title')
    Dashboard
@endsection
@section('content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">@yield('title')</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
            </div>                        
        </div>
    </div>  
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">

            <table width=100% height=100%>
                <tr height=30>
                    <td>
                        {{-- ///TODO:CLIENTES --}}
                        <div class="card text-center m-b-30">
                            <div class="card-header">                                
                                <h5 class="card-title mb-0">Cliente</h5>
                            </div>
                            <div class="card-body px-0 pb-0">
                                <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i></p>
                                <h4 class="mb-3">125</h4>
                                <p>80% Cliente</p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{-- ///TODO:MÁQUINARIA --}}
                        <div class="card text-center m-b-30">
                            <div class="card-header">                                
                                <h5 class="card-title mb-0">Maquinaria</h5>
                            </div>
                            <div class="card-body px-0 pb-0">
                                <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i></p>
                                <h4 class="mb-3">125</h4>
                                <p>80% Maquinaria</p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{-- ///TODO:ALQUILER --}}
                        <div class="card text-center m-b-30">
                            <div class="card-header">                                
                                <h5 class="card-title mb-0">Alquiler</h5>
                            </div>
                            <div class="card-body px-0 pb-0">
                                <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i></p>
                                <h4 class="mb-3">125</h4>
                                <p>80% Alquiler</p>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </tr>
            </table>
        </div>
    </div>        
</div>
<!-- End Breadcrumbbar -->
@endsection
