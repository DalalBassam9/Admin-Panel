@extends('layouts.app')
@section('content')
    @include('layouts.sidebar')
    <div class="container">
        <div class="container-fluid">
            <div class="col py-3">
                <div class="row">
                    <div class="col-sm-5 col-md-10">
                        <div class="card">
                            <div class="card-header">Create Company</div>
                            <div class="card-body">


                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            class="form-control @error('name') border-danger @enderror">

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="text" name="website" class="form-control" id="website">

                                        @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input class="form-control" name="logo" type="file" id="logo">

                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <img id="preview-logo-before-upload"
                                        src="{{ asset('logo.png') }}"
                                            alt="" class="mt-4"  width="150" height="150" >


                                    </div>

                                    <button type="submit" class="btn btn-primary">Add</button>
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
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>




@endpush

