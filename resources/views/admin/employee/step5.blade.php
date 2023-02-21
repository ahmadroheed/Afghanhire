@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="col-md-12 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Review Information</h5>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('register.create.step.2') }}"
                               class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3>Final Step</h3>
                    <br>
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h6>
                            Personal Information
                        </h6>
                        <hr>
                        <div class="row">
                            <table class="table-bordered">
                                <thead>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Father's Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Mobile Phone</th>
                                <th>Date of Birth</th>
                                <th>Passport Number# (If Available)</th>
                                <th>Old Tazkira Number# (If Available)</th>
                                <th>New Tazkira Number#</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6>
                            Employer Information
                        </h6>
                        <hr>
                        <div class="row">
                            <table class="table-bordered">
                                <thead>
                                <th>ANHAM Badge ID#</th>
                                <th>USG Contract</th>
                                <th>USG Contractor</th>
                                <th>Direct Employer Name</th>
                                <th>Job title</th>
                                <th>Job duties</th>
                                <th>Job location</th>
                                <th>Supervisor name</th>
                                <th>Supervisor title</th>
                                <th>Supervisor work email</th>
                                <th>Supervisor personal email</th>
                                <th>Supervisor phone</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Reason of ending work</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6>
                            Additional Information
                        </h6>
                        <hr>
                        <div class="row">
                            <table class="table-bordered">
                                <thead>
                                <th>HR Letter</th>
                                <th>Number of family member</th>
                                <th>Year of higher education</th>
                                <th>Highest education level</th>
                                <th>English Writing</th>
                                <th>English Reading</th>
                                <th>English Listening</th>
                                <th>English Speaking</th>
                                <th>Professional Skill</th>
                                <th>Computer  Skill</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6>
                            Supporting Documents
                        </h6>
                        <hr>
                        <div class="row">
                            <table class="table-bordered">
                                <thead>
                                <th>Tazkira</th>
                                <th>Passport (If Available)</th>
                                <th>Work Badge</th>
                                <th>Recommendation Letter (If Available)</th>
                                <th>HR Letter</th>
                                <th>Other</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex flex-row-reversed justify-content-between">
                                <a href="{{ route('register.create.step.4') }}" class="btn btn-primary">Back - Employer Information</a>
                                <button class="btn btn-success" value="Submit" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    <br/>
                </div>
            </div>
        </div>
@endsection
