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
                                            <th>File Type</th>
                                            <th>File Name if Other</th>
                                            <th>File</th>
                                            <th>Applicant Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees_files as $file)
                                            <tr>
                                                <th>{{$loop->index+1}}</th>
                                                <td>{{$file -> filename}}</td>
                                                <td>{{$file -> filenameother}}</td>
                                                <td><a target="_blank" href="{{ asset('uploads/Applicants Files/' .$file -> path) }}">Download File</a></td>
                                                <td>{{$file -> FirstMiddleNames.' '.$file -> LastName}}</td>
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
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print"]
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
