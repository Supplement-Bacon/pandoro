@extends('layouts.app')

@section('pageTitle', 'Licenses')

@section('head')
    <!-- quill -->
    <link href="{{ url('vendors/quill/quill.snow.css') }}" rel="stylesheet" type="text/css">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Licenses</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1>Content in redaction...</h1>
        </div>
    </div>

@endsection

@section('script')
@stack('component_js')  
@endsection
