@extends('gt-manager.aBody.app-layout')
@section('content')
    <div class="page-content">
        {{-- ========================== NAV Section ==========================  --}}
        <nav class="page-breadcrumb">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">All Car Brands</li>
                </ol>
                {{-- ====== Modal button ====== --}}
                <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0" data-toggle="modal"
                    data-target="#addNewCarModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Add New Brand
                </button>
            </div>
        </nav>
        @error('logo')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        {{-- ========================== All Brands ==========================  --}}
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="col-md-12 grid-margin stretch-card">

                        <div class="card-body">
                            <h6 class="card-title">All Car Brands</h6>
                            <div class="row">
                                @foreach ($brands as $brand )
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
                                    <a href="{{ route('brand-models',$brand->id) }}">
                                    <div class="border border-light rounded shadow-sm">
                                        <div class="card-logo ">
                                            <img width="100px" src="{{ asset('gt_manager/media/car_brands_logo/'.$brand->logo) }}"
                                                alt="">
                                            </div>
                                        </div>
                                        <p class="text-center mt-3 text-dark ">{{ $brand->brand_name }}</p>
                                    </a>
                                </div>
                                @endforeach
                            </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add new brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="formValidation" class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('store-car-brand')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(EN)</span></label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off" placeholder="English Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name <span class="text-danger">(AR)</span></label>
                                <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name">
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
                                    src="{{ asset('gt_manager/assets/images/no_image.jpg') }}"
                                    alt="...">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="add_employee_btn" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Validation JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formValidation').validate({
                rules: {
                    name_en: {
                        required: true,
                    },
                    name_ar: {
                        required: true,
                    },
                    photo: {
                        required: true,
                    },

                },
                messages: {
                    name_en: {
                        required: 'Please write the English name',
                    },
                    name_ar: {
                        required: 'Please write the Arabic name',
                    },
                    photo: {
                        required: 'Photo Must Be Inserted',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <!-- Ajax ADD JS -->
    {{-- <script>
        // add new employee ajax request
        $("#addCarForm").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_employee_btn").text('Adding...');
            $.ajax({
                url: '{{ route('store-car-brand') }}',
                method: 'POST',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {}
            });
            console.log(res);
        })
    </script> --}}
@endsection
