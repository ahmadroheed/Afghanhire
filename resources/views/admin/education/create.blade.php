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
                    <h4 class="page-title">Education Management</h4>
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
                        <form action="{{route('education.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Create Education</h4>
                                <div class="form-group row">
                                    <label for="institution" class="col-sm-2 text-right control-label col-form-label">Institution</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="institution" class="form-control" id="institution" placeholder="Enter a institution name">
                                    </div>
                                    <label for="field_study" class="col-sm-2 text-right control-label col-form-label">Field of Study</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="field_study" class="form-control" id="field_study" placeholder="Enter a field of study">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_date" class="col-sm-2 text-right control-label col-form-label">Start Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="job start date">
                                    </div>
                                    <label for="end_date" class="col-sm-2 text-right control-label col-form-label">End Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="end_date" class="form-control" id="end_date" placeholder="job end date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="certification" class="col-sm-4 text-right control-label col-form-label">Certification</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="certification" class="form-control" id="certification" placeholder="Enter certification name" >
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
