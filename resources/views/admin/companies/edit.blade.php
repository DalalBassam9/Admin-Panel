@extends('layouts.app')
@section('content')
    @include('layouts.sidebar')
    <div class="container">
        <div class="container-fluid">
            <div class="col py-3">
                <div class="row">
                    <div class="col-sm-5 col-md-10">
                        <div class="card">
                            <div class="card-header">Edit Company {{ $company->name }}</div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success   alert-dismissible  fade show">
                                        <strong>{{ $message }}</strong>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('companies.update', $company->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            class="form-control @error('name') border-danger @enderror"
                                            value="{{ old('name') ? old('name') : $company->name }}">

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                            value="{{ old('email') ? old('email') : $company->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="text" name="website" class="form-control" id="website"
                                            value="{{ old('website') ? old('website') : $company->website }}">

                                        @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input class="form-control" id="logo" name="logo" type="file">

                                        @if ($company->logo)
                                            <img src=" {{ asset('storage/' . $company->logo) }}" alt=""
                                                id="old-logo" class="mt-4" style="max-height: 250px;">
                                        @endif


                                        <img id="preview-logo-before-upload" src="" alt="" class="mt-4"
                                            style="max-height: 250px;">


                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {


            $('#logo').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-logo-before-upload').attr('src', e.target.result);

                    $('#old-logo').hide();

                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
@endpush
