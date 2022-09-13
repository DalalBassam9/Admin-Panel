@extends('layouts.app')
@section('content')
    @include('layouts.sidebar')
    <div class="container">
        <div class="container-fluid">
            <div class="col py-3">
                <div class="row">
                    <div class="col-sm-5 col-md-10">
                        <div class="card">
                            <div class="card-header">Companies</div>

                            <div class="card-body">
                                <div class="col py-3">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="card-header">Companies List</div>

                                                <div class="card-body">
                                                    @if ($message = Session::get('success'))
                                                        <div class="alert alert-success   alert-dismissible  fade show">
                                                            <strong>{{ $message }}</strong>

                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        </div>
                                                    @endif

                                                    <div class="container">

                                                        <a href="{{ route('companies.create') }}"
                                                            class="btn btn-success mb-3">Create new
                                                            Campany</a>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Website</th>
                                                                    <th>Email</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @foreach ($companies as $company)
                                                                        <td>{{ $company->name }}</td>
                                                                        <td>{{ $company->website }}</td>
                                                                        <td>{{ $company->email }}</td>
                                                                        <td>
                                                                            <div>
                                                                                <a href="{{ route('companies.edit', $company->id) }}"
                                                                                    class="btn btn-light border border-1 border-secondary  btn-sm">Edit</a>
                                                                            </div>
                                                                            <div class="py-1">

                                                                                <button data-bs-toggle="modal"
                                                                                    data-bs-target="#exampleModal"
                                                                                    class="btn btn-xs btn-danger ">Delete</button>

                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="exampleModal"
                                                                                    tabindex="-1"
                                                                                    aria-labelledby="exampleModalLabel"
                                                                                    aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="exampleModalLabel">
                                                                                                    confirmation</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"
                                                                                                    aria-label="Close"></button>
                                                                                            </div>

                                                                                            <form method="POST"
                                                                                                action="{{ route('companies.destroy', $company->id) }}">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <div class="modal-body">
                                                                                                    <p>
                                                                                                        Are you sure to
                                                                                                        delete the company ?
                                                                                                    </p>

                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-secondary"
                                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                                    <button type="submit"
                                                                                                        class="btn btn-danger">Delete</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </td>
                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>

                                                        {{ $companies->links() }}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

