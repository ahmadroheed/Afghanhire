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
                    <h6 class="page-title">Please enter your data as requested below.  Required fields are indicated with <span style="color: red">*</span>.</h6>
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
                                <h4 class="card-title">Personal Information</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="fname">First name:اسم مطابق تذکره <span style="color: red">*</span> </label>
                                        <input type="text" name="fname" class="form-control mb-2" placeholder="Enter your first name اسم تان را وارد نمایید" value="{{$employee->FirstMiddleNames}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lname">Last name:تخلص <span style="color: red">*</span> </label>
                                        <input type="text" name="lname" class="form-control mb-2" placeholder="Enter your last name تخلص تان را وارد نمایید" value="{{$employee->LastName}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="faname">Father's name:اسم پدر <span style="color: red">*</span> </label>
                                        <input type="text" name="faname" class="form-control mb-2" placeholder="Enter father's name اسم پدر تان را وارد نمایید" value="{{$employee->FatherName}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="gender">Gender: جنسیت <span style="color: red">*</span></label>
                                        <select name="gender" class="form-control mb-2">
                                            <option selected value="{{$employee->Gender}}">{{$employee->Gender}}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="email">Email Address:ایمیل آدرس <span style="color: red">*</span></label>
                                        <input type="email" name="email" class="form-control mb-2" placeholder="Enter email address ایمیل آدرس تان را وارد نمایید" value="{{$employee->Email}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="address">Address:  سکونت فعلی <span style="color: red">*</span></label>
                                        <input type="text" name="address" class="form-control mb-2" placeholder="Enter your address آدرس فعلی تان را وارد نمایید" value="{{$employee->address}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="phoneno">Mobile phone:شماره تماس <span style="color: red">*</span></label>
                                        <input type="number" name="phoneno" class="form-control mb-2" placeholder="Enter your phone number شماره تماس تان را وارد نمایید" value="{{$employee->MobilePhone}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="dob">Date of birth: تاریخ تولد <span style="color: red">*</span></label>
                                        <input type="date" name="dob" class="form-control mb-2" placeholder="Enter your date of birth تاریخ تولد تان را وارد نمایید" value="{{$employee->dob}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="passportno">Passport number(if available) : (نمبر پاسپورت (در صورت موجود بودن </label>
                                        <input type="text" name="passportno" class="form-control mb-2" placeholder="Enter your passport number نمبر پاسپورت تان را وارد نمایید" value="{{$employee->Passport}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="enic_number">ٍE Tazkira Number # نمبر تذکره الکترونیکی: <span style="color: red">*</span></label>
                                        <input type="text" name="enic_number" class="form-control mb-2" placeholder="Enter your E-Tazkira number شماره تذکره الکترونیکی تان را وارد نمایید" value="{{$employee->ENIC}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="old_nic_number">
                                            Old Tazkira (Required for AFGS Applicants only)
                                            تذکره کاغذی ( برای درخواست کننده گان AFGS ضروری میباشد)
                                            <span style="color: red">*</span></label>
                                        <input type="text" name="old_nic_number" class="form-control mb-2" placeholder="Enter your old tazkira number شماره تذکره کاغذی تان را وارد نمایید" value="{{$employee->Old_NIC}}">
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
                                            <label for="fname">First name:اسم مطابق تذکره <span style="color: red">*</span></label>
                                            <input type="text" name="fname" class="form-control mb-2" placeholder="Enter your first name اسم تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="lname">Last name:تخلص  <span style="color: red">*</span></label>
                                            <input type="text" name="lname" class="form-control mb-2" placeholder="Enter your last name تخلص تان را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="faname"> Father's name:اسم پدر <span style="color: red">*</span></label>
                                            <input type="text" name="faname" class="form-control mb-2" placeholder="Enter father's name اسم پدر تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="gender">Gender: جنسیت <span style="color: red">*</span></label>
                                            <select name="gender" class="form-control mb-2">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="email">Email Address: ایمیل آدرس <span style="color: red">*</span></label>
                                            <input type="email" name="email" class="form-control mb-2" placeholder="Enter email address ایمیل آدرس تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="address">Address: سکونت فعلی <span style="color: red">*</span> </label>
                                            <input type="text" name="address" class="form-control mb-2" placeholder="Enter your address آدرس فعلی تان را وارد نمایید" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="phoneno"> Mobile phone:شماره تماس <span style="color: red">*</span></label>
                                            <input type="number" name="phoneno" class="form-control mb-2" placeholder="Enter your phone number شماره تماس تان را وارد نمایید" value="{{ session()->get('register.name') }}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="dob">Date of birth: تاریخ تولد <span style="color: red">*</span></label>
                                            <input type="date" name="dob" class="form-control mb-2" placeholder="Enter your date of birth تاریخ تولد تان را وارد نمایید" value="{{ session()->get('register.name') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="passportno">Passport number(if available) : (نمبر پاسپورت (در صورت موجود بودن </label>
                                            <input type="text" name="passportno" class="form-control mb-2" placeholder="Enter your passport number نمبر پاسپورت تان را وارد نمایید">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="old_nic_number">
                                                Old Tazkira (Required for AFGS Applicants only)
                                                تذکره کاغذی ( برای درخواست کننده گان AFGS ضروری میباشد)
                                                <span style="color: red">*</span></label>
                                            <input type="text" name="old_nic_number" class="form-control mb-2" placeholder="Enter your old tazkira number شماره تذکره کاغذی تان را وارد نمایید" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="enic_number">ٍE Tazkira Number # نمبر تذکره الکترونیکی: <span style="color: red">*</span></label>
                                            <input type="text" name="enic_number" class="form-control mb-2" placeholder="Enter your E-Tazkira number شماره تذکره الکترونیکی تان را وارد نمایید" >
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
        <footer class="footer text-center">
            All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a>  &copy;.
        </footer>
    </div>
@endsection
