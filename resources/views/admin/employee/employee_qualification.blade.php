@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">View Employee Qualification</h4>
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
                                        <th>Year of experience</th>
                                        <th>degree</th>
                                        <th>Management Experience</th>
                                        <th>Achievements</th>
                                        <th>Employee Name</th>
                                    </thead>
                                    <tbody>
                                    @foreach($EmployeeQualifications as $qualification)
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$qualification -> experience_year}}</td>
                                            <td>{{$qualification -> degree}}</td>
                                            <td>{{$qualification -> management_experience}}</td>
                                            <td>{{$qualification -> achievement}}</td>
                                            <td>{{$qualification -> first_name.' '.$qualification -> middle_name}}</td>
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
