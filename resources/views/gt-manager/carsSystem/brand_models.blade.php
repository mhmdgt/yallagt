@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        {{-- ====== Page Header ====== --}}
        <nav class="page-breadcrumb">
            {{-- ====== Navagation ====== --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('show-all-car-brands') }}">All Car
                            Brands</a></li>
                    <li class="breadcrumb-item"><a>Selected Brand And Models</a></li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Add New Model
                </button>
            </div>
        </nav>
        @error('logo')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        {{-- ====== Brand Details ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-md-8">
                            <img class="image-in-box" src="{{ asset('gt_manager/media/car_brands_logo/' . $car_brand->logo) }}"
                                alt="...">
                            <span class="profile-name ml-3 h4">{{ $car_brand->brand_name }}</span>
                            <td class="col-6 col-md-4">
                                <button class="btn btn-inverse-warning ml-4 mr-1" data-toggle="modal"
                                    data-target="#EditCarBrand" title="Edit">
                                    <i data-feather="edit"></i>
                                </button>
                                <a href="{{ route('delete.brand', $car_brand->id) }}" class="btn btn-inverse-danger"
                                    data-confirm-delete="true">
                                        <i data-feather="trash-2"></i>
                                </a>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====== All Models ====== --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Models</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Model Name <span class="text-danger">(EN)</span></th>
                                        <th>Model Name <span class="text-danger">(AR)</span></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($car_brand->models as $key => $model)
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $model->model_name }}</td>
                                        <td>{{ $model->slug }}</td>
                                        <td>
                                            <a href="#" class="btn btn-inverse-warning" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-inverse-danger" id="delete" title="Delete">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Add Modal ==========================  --}}
        <div class="modal fade" id="addNewCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Model</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formValidation" class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="{{ route('store-brand-model',$car_brand->id) }}">

                            @csrf

                            {{-- <input type="hidden" name="id" value="{{ $id->id }}"> --}}

                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    placeholder="English Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- ========================== Edit Car Brand ==========================  --}}
        <div class="modal fade" id="EditCarBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Car Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formValidation" class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="{{ route('update-car-brand') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off"
                                    value="{{ $car_brand->brand_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" autocomplete="off"
                                    value="{{ $car_brand->slug }}">
                            </div>

                            <h6 class="mt-4 mb-2">Media Section</h6>
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" name="logo" class="file-upload-default" id="image">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmaill" class="form-label"> </label>
                                <img id="showImage" class="image-rec-full"
                                    src="{{ asset('gt_manager/media/car_brands_logo/' . $car_brand->logo) }}" alt="...">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
