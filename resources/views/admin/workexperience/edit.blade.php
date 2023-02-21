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
                    <h4 class="page-title">Work Experience Management</h4>
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
                        <form action="{{route('experience.update',$experience->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Update Work Experience</h4>
                                <div class="form-group row">
                                    <label for="employer_name" class="col-sm-2 text-right control-label col-form-label">Employer Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="employer_name" class="form-control" id="employer_name" placeholder="Enter a employer name" value="{{$experience->employer_name}}">
                                    </div>
                                    <label for="location" class="col-sm-2 text-right control-label col-form-label">Job Location</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="location" class="form-control" id="location" placeholder="Enter a job location" value="{{$experience->location}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_date" class="col-sm-2 text-right control-label col-form-label">Start Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="job start date" value="{{$experience->start_date}}">
                                    </div>
                                    <label for="end_date" class="col-sm-2 text-right control-label col-form-label">End Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="end_date" class="form-control" id="end_date" placeholder="job end date" value="{{$experience->end_date}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="job_title" class="col-sm-2 text-right control-label col-form-label">Job Title</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Enter job title" value="{{$experience->job_title}}">
                                    </div>
                                    <label for="job_desc" class="col-sm-2 text-right control-label col-form-label">Job Description</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="job_desc" class="form-control" id="job_desc" placeholder="Enter job description" value="{{$experience->job_description}}">
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
            All Rights Reserved by Khoz Informatics Pvt. Ltd. Designed and Developed by <a href="https://khozinfo.com/">Khozinfo</a>.
        </footer>
    </div>

@endsection
