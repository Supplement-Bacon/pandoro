@extends('layouts.app')

@section('pageTitle', 'Profile')

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-4">

                    <div class="card">
                        <img src="{{ url('assets/media/image/image1.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center m-t-70-minus">
                            <x-user.round :user="$user" :size="'lg'"/>
                            <h5 class="mt-2">{{ $user->fullName }}</h5>
                            <p class="text-muted">{{ class_basename( $user->typable_type ) }}</p>
                           
                        </div>
                        <hr class="m-0">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6 text-info">
                                    <h4 class="font-weight-bold">{{ rand(82736, 678987)}}</h4>
                                    <span>Ideas</span>
                                </div>
                                <div class="col-6 text-success">
                                    <h4 class="font-weight-bold">{{ rand(23, 879) }}</h4>
                                    <span>Coffees</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title d-flex justify-content-between align-items-center">
                                Informations
                                <x-user.editor :type="'update'" :user="$user"/>
                            </h6>
                            <div class="row mb-2">
                                <div class="col-4 text-muted">First Name:</div>
                                <div class="col-8">{{ $user->first_name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 text-muted">Last Name:</div>
                                <div class="col-8">{{ $user->last_name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 text-muted">Role:</div>
                                <div class="col-8">{{ class_basename( $user->typable_type ) }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 text-muted">Phone:</div>
                                <div class="col-8">{{ $user->phone }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 text-muted">Email:</div>
                                <div class="col-8">{{ $user->email }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    {{-- Add some magic here --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@stack('component_js')  
@endsection
