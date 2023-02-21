@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Applicants Management</h4>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="overflow: scroll">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Father Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Contact Number</th>
                                            <th>Passport Number</th>
                                            <th>Data of Birth</th>
                                            <th>Old Tazkira</th>
                                            <th>E Tazkira</th>
                                            <th>Badge</th>
                                            <th>USGContract</th>
                                            <th>Subcontractor</th>
                                            <th>Direct Employer Name</th>
                                            <th>Job Title</th>
                                            <th>Job Location</th>
                                            <th>Job Duties</th>
                                            <th>Supervisor Name</th>
                                            <th>Supervisor Position</th>
                                            <th>Supervisor Official Email</th>
                                            <th>Supervisor Personal Email</th>
                                            <th>Supervisor Contact Number</th>
                                            <th>Employment Start Date</th>
                                            <th>Employment End Date</th>
                                            <th>Employment End Reason</th>
                                            <th>Is HR Available</th>
                                            <th>HR Number</th>
                                            <th>SIV Case Number</th>
                                            <th>Dependents</th>
                                            <th>Hardships</th>
                                            <th>Threats</th>
                                            <th>Higher Educational Years</th>
                                            <th>Higher Educational Level</th>
                                            <th>English Reading</th>
                                            <th>English Writing</th>
                                            <th>English Listening</th>
                                            <th>English Speaking</th>
                                            <th>Professional Skills</th>
                                            <th>IT Skills</th>
                                            <th>Date Entered</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_applicants as $employee)
                                            <tr>
                                                <th>{{$loop->index+1}}</th>
                                                <td>{{$employee -> FirstMiddleNames}}</td>
                                                <td>{{$employee -> LastName}}</td>
                                                <td>{{$employee -> FatherName}}</td>
                                                <td>{{$employee -> Gender}}</td>
                                                <td>{{$employee -> Email}}</td>
                                                <td>{{$employee -> address}}</td>
                                                <td>{{$employee -> MobilePhone}}</td>
                                                <td>{{$employee -> Passport}}</td>
                                                <td>{{$employee -> dob}}</td>
                                                <td>{{$employee -> Old_NIC}}</td>
                                                <td>{{$employee -> ENIC}}</td>
                                                <td>{{$employee -> Badge}}</td>
                                                <td>{{$employee -> USGContract}}</td>
                                                <td>{{$employee -> Subcontractor}}</td>
                                                <td>{{$employee -> directemployername}}</td>
                                                <td>{{$employee -> JobTitle}}</td>
                                                <td>{{$employee -> JobLocation}}</td>
                                                <td>{{$employee -> JobDuties}}</td>
                                                <td>{{$employee -> SupvrName}}</td>
                                                <td>{{$employee -> SupvrTitle}}</td>
                                                <td>{{$employee -> SupvrEmailWork}}</td>
                                                <td>{{$employee -> SupvrEmailOther}}</td>
                                                <td>{{$employee -> SupvrPhone}}</td>
                                                <td>{{$employee -> EmpStartDate}}</td>
                                                <td>{{$employee -> EmpEndDate}}</td>
                                                <td>{{$employee -> EmpEndReason}}</td>
                                                <td>{{$employee -> HRAvailable}}</td>
                                                <td>{{$employee -> HRNumber}}</td>
                                                <td>{{$employee -> SIVCaseNo}}</td>
                                                <td>{{$employee -> Dependents}}</td>
                                                <td>{{$employee -> Hardships}}</td>
                                                <td>{{$employee -> Threats}}</td>
                                                <td>{{$employee -> HigherEdYears}}</td>
                                                <td>{{$employee -> HigherEdLevel}}</td>
                                                <td>{{$employee -> EngReading}}</td>
                                                <td>{{$employee -> EngWriting}}</td>
                                                <td>{{$employee -> EngListening}}</td>
                                                <td>{{$employee -> EngSpeaking}}</td>
                                                <td>{{$employee -> SkillsProf}}</td>
                                                <td>{{$employee -> SkillsIT}}</td>
                                                <td>{{$employee -> created_at}}</td>
                                                <td><a href="{{route('view.files',$employee->id)}}">View Files</a></td>
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
            <footer class="footer text-center">
                All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a>  &copy;.
            </footer>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
