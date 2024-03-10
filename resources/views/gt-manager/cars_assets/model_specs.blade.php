@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a>Model Specs</a></li>
                </ol>
            </div>
        </nav>
        {{-- ========================== Body Shapes ==========================  --}}
        <div class="row mb-4">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            {{-- Top --}}
                            <nav class="page-breadcrumb">
                                {{-- ====== Navagation ====== --}}
                                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                    <h4>Body Shapes</h4>
                                    {{-- ====== Modal button ====== --}}
                                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                        data-toggle="modal" data-target="#addNewCarModal">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        Add
                                    </button>
                                </div>
                            </nav>
                            {{-- Data --}}
                            <div class="row">
                                {{-- Loop Starts --}}
                                <div class="left-drop-down-btn">
                                    {{-- image --}}
                                    <img width="40" class="pl-2"
                                        src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                    {{-- name --}}
                                    <h5 class="p-1 ml-2">Automaic </h5>
                                    {{-- controller --}}
                                    <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                        <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- Loop Ends --}}
                            </div>
                            {{-- Edit Model --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Transmission Types ==========================  --}}
        <div class="row mb-4">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            {{-- Top --}}
                            <nav class="page-breadcrumb">
                                {{-- ====== Navagation ====== --}}
                                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                    <h4>Transmission Types</h4>
                                    {{-- ====== Modal button ====== --}}
                                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                        data-toggle="modal" data-target="#addNewCarModal">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        Add
                                    </button>
                                </div>
                            </nav>
                            {{-- Data --}}
                            <div class="row">
                                {{-- Loop Starts --}}
                                <div class="left-drop-down-btn">
                                    {{-- image --}}
                                    <img width="40" class="pl-2"
                                        src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                    {{-- name --}}
                                    <h5 class="p-1 ml-2">Automaic </h5>
                                    {{-- controller --}}
                                    <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                        <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- Loop Ends --}}
                            </div>
                            {{-- Edit Model --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Engine Aspiration ==========================  --}}
        <div class="row mb-4">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            {{-- Top --}}
                            <nav class="page-breadcrumb">
                                {{-- ====== Navagation ====== --}}
                                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                    <h4>Engine Aspiration</h4>
                                    {{-- ====== Modal button ====== --}}
                                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                        data-toggle="modal" data-target="#addNewCarModal">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        Add
                                    </button>
                                </div>
                            </nav>
                            {{-- Data --}}
                            <div class="row">
                                {{-- Loop Starts --}}
                                <div class="left-drop-down-btn">
                                    {{-- image --}}
                                    <img width="40" class="pl-2"
                                        src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                    {{-- name --}}
                                    <h5 class="p-1 ml-2">Automaic </h5>
                                    {{-- controller --}}
                                    <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                        <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- Loop Ends --}}
                            </div>
                            {{-- Edit Model --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Fuel Types ==========================  --}}
        <div class="row mb-4">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            {{-- Top --}}
                            <nav class="page-breadcrumb">
                                {{-- ====== Navagation ====== --}}
                                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                    <h4>Fuel Types</h4>
                                    {{-- ====== Modal button ====== --}}
                                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                                        data-toggle="modal" data-target="#addNewCarModal">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        Add
                                    </button>
                                </div>
                            </nav>
                            {{-- Data --}}
                            <div class="row">
                                {{-- Loop Starts --}}
                                <div class="left-drop-down-btn">
                                    {{-- image --}}
                                    <img width="40" class="pl-2"
                                        src="{{ asset('gt_manager/media/car_brands_logo/12365538e7f9a805f184681552abe5042585cd.webp') }}">
                                    {{-- name --}}
                                    <h5 class="p-1 ml-2">Automaic </h5>
                                    {{-- controller --}}
                                    <div class="btn-toolbar ml-auto p-2" role="toolbar">
                                        <button type="button" class="btn text-dark dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- Loop Ends --}}
                            </div>
                            {{-- Edit Model --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== End ==========================  --}}
    </div>
@endsection
