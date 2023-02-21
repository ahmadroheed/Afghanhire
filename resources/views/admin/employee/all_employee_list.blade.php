@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>HR ID</th>
                                        <th>First Name</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>OnBoarding Progress</th>
                                        <th>Team Association</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allEmployees as $employee)
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$employee -> hr_id}}</td>
                                            <td>{{$employee -> first_name.' '.$employee -> middle_name}}</td>
                                            <td>{{$employee -> gender}}</td>
                                            <td>{{$employee -> dob}}</td>
                                            <td>{{$employee -> email}}</td>
                                            <td>{{$employee -> address}}</td>
                                            <td>{{$employee -> phone}}</td>
                                            <td>{{$employee -> progress}}</td>
                                            <td>{{$employee -> team}}</td>
                                            <td>
                                                <img src="{{ asset('uploads/gallery/' . $employee->image) }}" width="80px" height="80px" alt="Image">
                                            </td>
                                            <td>
                                                <a href="{{route('employee.experience',$employee->id)}}"><buttton class="fa fa-eye">work experience</buttton></a>
                                                <a href="{{route('employee.education',$employee->id)}}"><buttton class="fa fa-eye">education</buttton></a>
                                                <a href="{{route('employee.expertise',$employee->id)}}"><buttton class="fa fa-eye">expertise</buttton></a>
                                                <a href="{{route('employee.achievement',$employee->id)}}"><buttton class="fa fa-eye">achievements</buttton></a>
                                                <a href="{{route('employee.professional.achievement',$employee->id)}}"><buttton class="fa fa-eye">professional</buttton></a>
                                                <a href="{{route('employee.qualification',$employee->id)}}"><buttton class="fa fa-eye">qualification</buttton></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": false,
            });
        });
    </script>
@endsection
