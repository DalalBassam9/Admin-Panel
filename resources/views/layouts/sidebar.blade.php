<div class="container">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
                <div class="d-flex flex-column align-items-center  px-3 pt-2 text-white ">
                    <a href="/"
                        class="d-flex justify-content-center pb-3 mb-md-0  text-decoration-none">
                        <span class="fs-5 text-dark  text-center ">Mini-CRM</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">



  <li>
                            <a href="{{ route('companies.index') }}"    class="nav-link   {{ (request()->routeIs('companies.index')) ? 'active ' : '' }} ">
                                <i class="fa fa-xs fa-building"></i> <span class="ms-1 fw-bold align-items-center  d-none d-sm-inline">companies</span></a>
                        </li>


                        <li>
                            <a href="{{ route('employees.index') }}"    class=" my-2 nav-link   {{ (request()->routeIs('employees.index')) ? 'active ' : '' }} ">
                           <i class="fa fa-xs fa-users" aria-hidden="true"></i> <span class="ms-1 fw-bold align-items-center  d-none d-sm-inline">employees</span></a>
                        </li>


                    </ul>
                    <hr>

                </div>
            </div>







@section('styles')
    <style>
        .active {


        }
    </style>
@endsection

