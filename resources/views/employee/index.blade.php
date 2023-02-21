@extends('employee.layout.master')
@section('content')
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('dashboard')}}">Employee</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('register.post.step.1') }}" method="POST">
                            @csrf
                            @foreach($employees as $employee)
                                @if(count($employees) != 0)
                                    <input type="hidden" value="{{$employee->id}}" name="id">
                                    <div class="card-body">
                                        <h4 class="card-title">Employee Personal Information</h4>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="fname">First name:اسم مطابق تذکره </label>
                                                <input type="text" name="fname" class="form-control mb-2" placeholder="Enter your first name اسم تان را وارد نمایید" value="{{$employee->FirstMiddleNames}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="lname">Last name:تخلص  </label>
                                                <input type="text" name="lname" class="form-control mb-2" placeholder="Enter your last name تخلص تان را وارد نمایید" value="{{$employee->LastName}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="faname">Father's name:اسم پدر </label>
                                                <input type="text" name="faname" class="form-control mb-2" placeholder="Enter father's name اسم پدر تان را وارد نمایید" value="{{$employee->FatherName}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="gender">Gender: جنسیت</label>
                                                <select name="gender" class="form-control mb-2">
                                                    <option selected value="{{$employee->Gender}}">{{$employee->Gender}}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="email">Email Address:ایمیل آدرس </label>
                                                <input type="email" name="email" class="form-control mb-2" placeholder="Enter email address ایمیل آدرس تان را وارد نمایید" value="{{$employee->Email}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="address">Address: سکونت فعلی</label>
                                                <input type="text" name="address" class="form-control mb-2" placeholder="Enter your address آدرس فعلی تان را وارد نمایید" value="{{$employee->address}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="phoneno">Mobile phone:شماره تماس </label>
                                                <input type="number" name="phoneno" class="form-control mb-2" placeholder="Enter your phone number شماره تماس تان را وارد نمایید" value="{{$employee->MobilePhone}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="dob">Date of birth: تاریخ تولد</label>
                                                <input type="date" name="dob" class="form-control mb-2" placeholder="Enter your date of birth تاریخ تولد تان را وارد نمایید" value="{{$employee->dob}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="passportno">Passport number(if available) : (نمبر پاسپورت (در صورت موجود بودن </label>
                                                <input type="text" name="passportno" class="form-control mb-2" placeholder="Enter your passport number نمبر پاسپورت تان را وارد نمایید" value="{{$employee->Passport}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="oldnic">Old tazkira#: نمبر تذکره کاغذی</label>
                                                <input type="number" name="oldnic" class="form-control mb-2" placeholder="Enter your old tazkira number شماره تذکره کاغذی تان را وارد نمایید" value="{{$employee->old_Tazkira}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="newnic">E-Tazkira# نمبر تذکره برقی</label>
                                                <input type="text" name="newnic" class="form-control mb-2" placeholder="Enter your e-takizra number شماره تذکره الکترونیکی تان را وارد نمایید" value="{{$employee->ETazkira}}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Next - Employee Information</button>
                                    </div>
                                @endif
                            @endforeach
                            @if(count($employees) == 0)
                                <div class="card-body">
                                    <h4 class="card-title">Employee Personal Information</h4>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="fname">First name:اسم مطابق تذکره </label>
                                            <input type="text" name="fname" class="form-control mb-2" placeholder="Enter your first name اسم تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="lname">Last name:تخلص  </label>
                                            <input type="text" name="lname" class="form-control mb-2" placeholder="Enter your last name تخلص تان را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="faname">Father's name:اسم پدر </label>
                                            <input type="text" name="faname" class="form-control mb-2" placeholder="Enter father's name اسم پدر تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="gender">Gender: </label>
                                            <select name="gender" class="form-control mb-2">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="email">Email Address:ایمیل آدرس </label>
                                            <input type="email" name="email" class="form-control mb-2" placeholder="Enter email address ایمیل آدرس تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="address">Address: سکونت فعلی</label>
                                            <input type="text" name="address" class="form-control mb-2" placeholder="Enter your address آدرس فعلی تان را وارد نمایید" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="phoneno">Mobile phone:شماره تماس </label>
                                            <input type="number" name="phoneno" class="form-control mb-2" placeholder="Enter your phone number شماره تماس تان را وارد نمایید" value="{{ session()->get('register.name') }}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="dob">Date of birth: تاریخ تولد</label>
                                            <input type="date" name="dob" class="form-control mb-2" placeholder="Enter your date of birth تاریخ تولد تان را وارد نمایید" value="{{ session()->get('register.name') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="passportno">Passport number(if available) : (نمبر پاسپورت (در صورت موجود بودن </label>
                                            <input type="text" name="passportno" class="form-control mb-2" placeholder="Enter your passport number نمبر پاسپورت تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="oldnic">Old tazkira#: نمبر تذکره کاغذی</label>
                                            <input type="number" name="oldnic" class="form-control mb-2" placeholder="Enter your old tazkira number شماره تذکره کاغذی تان را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="newnic">E-Tazkira# نمبر تذکره برقی</label>
                                            <input type="text" name="newnic" class="form-control mb-2" placeholder="Enter your e-takizra number شماره تذکره الکترونیکی تان را وارد نمایید">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Next - Employee Information</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
