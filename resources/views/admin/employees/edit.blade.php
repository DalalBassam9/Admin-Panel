@extends('layouts.app')
@section('content')
    @include('layouts.sidebar')
    <div class="container">
        <div class="container-fluid">
            <div class="col py-3">
                <div class="row">
                    <div class="col-sm-5 col-md-10">
                        <div class="card">
                            <div class="card-header">Edit Employee {{ $employee->first_name }}</div>
                            <div class="card-body">


                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success   alert-dismissible  fade show">
                                        <strong>{{ $message }}</strong>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')


                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="name"
                                            value="{{ old('first_name') ? old('first_name') : $employee->first_name }}"
                                            class="form-control">

                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name"
                                            value="{{ old('last_name') ? old('last_name') : $employee->last_name }}"
                                            class="form-control">

                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            value="{{ old('email') ? old('email') : $employee->email }}"
                                            aria-describedby="emailHelp">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            value="{{ old('phone') ? old('phone') : $employee->phone }}">

                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="company_id" class="form-label">Company Name</label>

                                        <select class="form-select" id="company_id" name="company_id"
                                            aria-label="Default select example">
                                            @php
                                                $value = old('company_id') ? old('company_id') : $employee->company_id;
                                            @endphp
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $value == $company->id ? 'selected' : '' }}>
                                                    {{ $company->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('company_id')
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
