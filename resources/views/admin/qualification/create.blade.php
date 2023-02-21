@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Qualification Management</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('employee')}}">Employee</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('qualification.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Create Qualification</h4>
                                <div class="form-group row">
                                    <label for="year" class="col-sm-2 text-right control-label col-form-label">Year of experience</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="year" class="form-control" id="year" placeholder="Enter year of experience">
                                    </div>
                                    <label for="degree" class="col-sm-2 text-right control-label col-form-label">Degree</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="degree" class="form-control" id="degree" placeholder="Enter degree">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mexperience" class="col-sm-2 text-right control-label col-form-label">Management Experience</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="mexperience" class="form-control" id="mexperience" placeholder="Enter management experience">
                                    </div>
                                    <label for="achievement" class="col-sm-2 text-right control-label col-form-label">Achievement</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="achievement" class="form-control" id="achievement" placeholder="Enter your achievement">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a>  &copy;.
        </footer>
    </div>

@endsection
