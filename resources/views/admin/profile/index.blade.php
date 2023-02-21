@extends('admin.layout.master')
@section('content')
    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">My profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="{{route('employee')}}">Profile</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link active" id="vert-tabs-main-tab1" data-toggle="pill"
                                   href="#vert-tabs1" role="tab" aria-controls="vert-tabs1" aria-selected="true">Personal
                                    details</a>
                                <a class="nav-link" id="vert-tabs-main-tab2" data-toggle="pill" href="#vert-tabs2"
                                   role="tab" aria-controls="vert-tabs2" aria-selected="false">Employer Information</a>
                                <a class="nav-link" id="vert-tabs-main-tab3" data-toggle="pill" href="#vert-tabs3"
                                   role="tab" aria-controls="vert-tabs3" aria-selected="false">Additional
                                    Information</a>
                                <a class="nav-link" id="vert-tabs-main-tab4" data-toggle="pill" href="#vert-tabs4"
                                   role="tab" aria-controls="vert-tabs4" aria-selected="false">Supporting Files</a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs1" role="tabpanel"
                                     aria-labelledby="vert-tabs-home-tab">
                                    <div class="panel-body pn pb5">
                                        <hr class="short br-lighter">
                                        <div class="box-body no-padding">
                                            <table class="table">
                                                <tbody>
                                                @foreach($applicants as $info)
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-user"></i>
                                                        </td>
                                                        <td><strong>First Name</strong></td>
                                                        <td>{{$info->FirstMiddleNames}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-user"></i>
                                                        </td>
                                                        <td><strong>Last Name</strong></td>
                                                        <td>{{$info->LastName}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-user"></i>
                                                        </td>
                                                        <td><strong>Father's Name</strong></td>
                                                        <td>{{$info->FatherName}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-male"></i>
                                                        </td>
                                                        <td><strong>Gender</strong></td>
                                                        <td>{{$info->Gender}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Email</strong></td>
                                                        <td>{{$info->Email}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-phone"></i>
                                                        </td>
                                                        <td><strong>Contact Number</strong></td>
                                                        <td>{{$info->MobilePhone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-map"></i>
                                                        </td>
                                                        <td><strong>Address</strong></td>
                                                        <td>{{$info->address}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Passport</strong></td>
                                                        <td>{{$info->Passport}}</td>

                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-birthday-cake"></i>
                                                        </td>
                                                        <td><strong>Date of Birth</strong></td>
                                                        <td>{{$info->dob}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Old NIC</strong></td>
                                                        <td>{{$info->Old_NIC}}</td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>E Tazkira</strong></td>
                                                        <td>{{$info->ENIC}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs2" role="tabpanel"
                                     aria-labelledby="vert-tabs-profile-tab">
                                    <div class="panel-body pn pb5">
                                        <hr class="short br-lighter">
                                        <div class="box-body no-padding">
                                            <table class="table">
                                                <tbody>
                                                @foreach($applicants as $info)
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-id-badge"></i>
                                                        </td>
                                                        <td><strong>Badge</strong></td>
                                                        <td>{{$info->Badge}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-id-badge"></i>
                                                        </td>
                                                        <td><strong>USGContract</strong></td>
                                                        <td>{{$info->USGContract}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-user"></i>
                                                        </td>
                                                        <td><strong>Subcontractor</strong></td>
                                                        <td>{{$info->Subcontractor}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-user"></i>
                                                        </td>
                                                        <td><strong>Direct Employer Name</strong></td>
                                                        <td>{{$info->directemployername}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-user"></i>
                                                        </td>
                                                        <td><strong>Job Title</strong></td>
                                                        <td>{{$info->JobTitle}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-map"></i>
                                                        </td>
                                                        <td><strong>Job Location</strong></td>
                                                        <td>{{$info->JobLocation}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-list"></i>
                                                        </td>
                                                        <td><strong>Job Duties</strong></td>
                                                        <td>{{$info->JobDuties}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-male"></i>
                                                        </td>
                                                        <td><strong>Supervisor Name</strong></td>
                                                        <td>{{$info->SupvrName}}</td>

                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-list"></i>
                                                        </td>
                                                        <td><strong>Supervisor Position</strong></td>
                                                        <td>{{$info->SupvrTitle}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Supervisor Official Email</strong></td>
                                                        <td>{{$info->SupvrEmailWork}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Supervisor Personal Email</strong></td>
                                                        <td>{{$info->SupvrEmailOther}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-mobile"></i>
                                                        </td>
                                                        <td><strong>Supervisor Contact Number</strong></td>
                                                        <td>{{$info->SupvrPhone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-calendar"></i>
                                                        </td>
                                                        <td><strong>Work Start Date</strong></td>
                                                        <td>{{$info->EmpStartDate}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-calendar"></i>
                                                        </td>
                                                        <td><strong>Work End Date</strong></td>
                                                        <td>{{$info->EmpEndDate}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-book"></i>
                                                        </td>
                                                        <td><strong>Ending Reason</strong></td>
                                                        <td>{{$info->EmpEndReason}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs3" role="tabpanel"
                                     aria-labelledby="vert-tabs-messages-tab">
                                    <div class="panel-body pn pb5">
                                        <hr class="short br-lighter">
                                        <div class="box-body no-padding">
                                            <table class="table">
                                                <tbody>
                                                @foreach($applicants as $info)
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-sort-numeric-down"></i>
                                                        </td>
                                                        <td><strong>HR Available</strong></td>
                                                        <td>{{$info->HRAvailable}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-sort-numeric-down"></i>
                                                        </td>
                                                        <td><strong>HR Number</strong></td>
                                                        <td>{{$info->HRNumber}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-sort-numeric-down"></i>
                                                        </td>
                                                        <td><strong>SIVCaseNo</strong></td>
                                                        <td>{{$info->SIVCaseNo}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-users"></i>
                                                        </td>
                                                        <td><strong>Dependents</strong></td>
                                                        <td>{{$info->Dependents}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Hardships</strong></td>
                                                        <td>{{$info->Hardships}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-envelope"></i>
                                                        </td>
                                                        <td><strong>Threats</strong></td>
                                                        <td>{{$info->Threats}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-graduation-cap"></i>
                                                        </td>
                                                        <td><strong>Higher Educatuional Years</strong></td>
                                                        <td>{{$info->HigherEdYears}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-graduation-cap"></i>
                                                        </td>
                                                        <td><strong>Higher Educational Level</strong></td>
                                                        <td>{{$info->HigherEdLevel}}</td>

                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-book"></i>
                                                        </td>
                                                        <td><strong>English Reading</strong></td>
                                                        <td>{{$info->EngReading}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa fa-book"></i>
                                                        </td>
                                                        <td><strong>English Writing</strong></td>
                                                        <td>{{$info->EngWriting}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa fa-book"></i>
                                                        </td>
                                                        <td><strong>English Listening</strong></td>
                                                        <td>{{$info->EngListening}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa fa-book"></i>
                                                        </td>
                                                        <td><strong>English Speaking</strong></td>
                                                        <td>{{$info->EngSpeaking}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-users"></i>
                                                        </td>
                                                        <td><strong>Professional Skills</strong></td>
                                                        <td>{{$info->SkillsProf}}</td>
                                                        <td style="width: 10px" class="text-center"><i
                                                                class="fa fa-book"></i>
                                                        </td>
                                                        <td><strong>IT Skills</strong></td>
                                                        <td>{{$info->SkillsIT}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a> &copy;.
        </footer>
    </div>
@endsection
