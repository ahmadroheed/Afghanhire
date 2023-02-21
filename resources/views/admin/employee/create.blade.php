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
                    <h4 class="page-title">Employee Management</h4>
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
                        <form action="{{route('employee.update',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Update Employee Info</h4>
                                @foreach($employees as $employee)
                                @if(count($employees) != 0)
                                    <div class="form-group row">
                                        <input type="hidden" name="empid" value="{{$employee->id}}">
                                        <label for="hrid" class="col-sm-2 text-right control-label col-form-label">HR ID</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="hrid" class="form-control" id="hrid" placeholder="Enter a HR ID" value="{{$employee->hr_id}}">
                                        </div>
                                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter a first name" value="{{$employee->first_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mname" class="col-sm-2 text-right control-label col-form-label">Middle Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Enter a middle name" value="{{$employee->middle_name}}">
                                        </div>
                                        <label for="nname" class="col-sm-2 text-right control-label col-form-label">Nick name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="nname" class="form-control" id="nname" placeholder="Enter a nick name" value="{{$employee->nick_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter a last name" value="{{$employee->last_name}}">
                                        </div>
                                        <label for="gender" class="col-sm-2 text-right control-label col-form-label">Gender</label>
                                        <div class="col-sm-4">
                                            <select name="gender" class="form-control" id="gender" placeholder="gender">
                                                <option value="{{$employee->gender}}" selected="selected">{{$employee->gender}}</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob" class="col-sm-2 text-right control-label col-form-label">Date of birth</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of birth" value="{{$employee->dob}}">
                                        </div>
                                        <label for="email" class="col-sm-2 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email address" value="{{$employee->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="{{$employee->address}}">
                                        </div>
                                        <label for="phone" class="col-sm-2 text-right control-label col-form-label">Phone number</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" value="{{$employee->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="progress" class="col-sm-2 text-right control-label col-form-label">Onboarding Progress</label>
                                        <div class="col-sm-4">
                                            <select name="progress" class="form-control" id="progress" placeholder="Select onboarding progress">
                                                <option value="{{$employee->progress}}" selected>{{$employee->progress}}</option>
                                                <option value="Infor Form">Infor Form</option>
                                                <option value="Confid Agreement">Confid Agreement</option>
                                                <option value="Vol Agreement">Vol Agreement</option>
                                                <option value="AH Email Created">AH Email Created</option>
                                                <option value="Resume Submitted">Resume Submitted</option>
                                            </select>
                                        </div>
                                        <label for="team" class="col-sm-2 text-right control-label col-form-label">Team Association</label>
                                        <div class="col-sm-4">
                                            <select name="team" class="form-control" id="team" placeholder="Select Team Association">
                                                <option value="{{$employee->team}}" selected>{{$employee->team}}</option>
                                                <option value="Team HR">Team HR</option>
                                                <option value="Team BD">Team BD</option>
                                                <option value="Team SIV">Team SIV</option>
                                                <option value="Team IT">Team IT</option>
                                                <option value="Team AB">Team AB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <img src="{{ asset('uploads/gallery/' . $employee->image) }}" alt="user" class="rounded-circle" width="31">
                                        </div>

                                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">File Upload</label>
                                        <div class="col-md-4">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <label class="custom-file-label">Choose file...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                                @if(count($employees) == 0)
                                    <div class="form-group row">
                                        <label for="hrid" class="col-sm-2 text-right control-label col-form-label">HR ID</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="hrid" class="form-control" id="hrid" placeholder="Enter a HR ID" value="">
                                        </div>
                                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter a first name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mname" class="col-sm-2 text-right control-label col-form-label">Middle Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Enter a middle name" value="">
                                        </div>
                                        <label for="nname" class="col-sm-2 text-right control-label col-form-label">Nick name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="nname" class="form-control" id="nname" placeholder="Enter a nick name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter a last name" value="">
                                        </div>
                                        <label for="gender" class="col-sm-2 text-right control-label col-form-label">Gender</label>
                                        <div class="col-sm-4">
                                            <select name="gender" class="form-control" id="gender" placeholder="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob" class="col-sm-2 text-right control-label col-form-label">Date of birth</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of birth" value="">
                                        </div>
                                        <label for="email" class="col-sm-2 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email address" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="">
                                        </div>
                                        <label for="phone" class="col-sm-2 text-right control-label col-form-label">Phone number</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="progress" class="col-sm-2 text-right control-label col-form-label">Onboarding Progress</label>
                                        <div class="col-sm-4">
                                            <select name="progress" class="form-control" id="progress" placeholder="Select onboarding progress">
                                                <option value="Infor Form">Infor Form</option>
                                                <option value="Confid Agreement">Confid Agreement</option>
                                                <option value="Vol Agreement">Vol Agreement</option>
                                                <option value="AH Email Created">AH Email Created</option>
                                                <option value="Resume Submitted">Resume Submitted</option>
                                            </select>
                                        </div>
                                        <label for="team" class="col-sm-2 text-right control-label col-form-label">Team Association</label>
                                        <div class="col-sm-4">
                                            <select name="team" class="form-control" id="team" placeholder="Select Team Association">
                                                <option value="Team HR">Team HR</option>
                                                <option value="Team BD">Team BD</option>
                                                <option value="Team SIV">Team SIV</option>
                                                <option value="Team IT">Team IT</option>
                                                <option value="Team AB">Team AB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <img src="" alt="user" class="rounded-circle" width="31">
                                        </div>

                                        <label for="image" class="col-sm-2 text-right control-label col-form-label">File Upload</label>
                                        <div class="col-md-4">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <label class="custom-file-label">Choose file...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
