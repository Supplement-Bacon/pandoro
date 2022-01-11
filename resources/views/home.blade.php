@extends('layouts.app')

@section('pageTitle', 'Home')

@section('head')
    <!-- quill -->
    <link href="{{ url('vendors/quill/quill.snow.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">
    
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between align-items-center">
                        PANDORO
                    </h6>
                    <hr>
                    <div class="row ml-2">
                        <p>Pandoro is a traditional Italian sweet bread, most popular around Christmas and New Year.
                        <br>Typically a Veronese product, pandoro is traditionally shaped like a frustum with an eight-pointed star section.</p>
                        <img src="{{ asset('assets/media/image/pandoro.jpg') }}" alt="Pandoro">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add some magic here --}}
    
@endsection

@section('script')
    @stack('component_js')  
    
    <!-- Dashboard scripts -->
    <script src="{{ url('/assets/js/examples/dashboard.js') }}"></script>

    <!-- To use theme colors with Javascript -->
    <div class="colors">
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>

@endsection
