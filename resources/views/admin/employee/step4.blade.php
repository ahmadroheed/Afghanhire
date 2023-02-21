@extends('admin.layout.master')
@section('js')
    <script type="text/javascript">
        $('#filetype').change(function (event) {
            var filename = $('#filetype').val();
            if (filename == 'Other') {
                $('#divOther').show();
            }
        });
    </script>
@endsection
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
                    <h6 class="page-title">Please upload your supporting documentation using the upload links provided
                        below.</h6>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('dashboard')}}">Employee</a>
                                </li>
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
                        <form action="{{ route('register.post.step.4') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach($employess_data as $employee)
                                @if(count($employess_data) != 0)
                                    <div class="card-body">
                                        <h4 class="card-title">Supporting Documents</h4>
                                        <input name="applicants_id" type="hidden" value="{{$employee->id}}">
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="filetype">Document Type: نوعیت فایل<span style="color: red">*</span></label>
                                                <select name="filetype" id="filetype" class="form-control mb-2">
                                                    <option value="">Choose file type...</option>
                                                    <option value="Tazkira">Tazkira</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="HR Employment Letter">HR Employment Letter</option>
                                                    <option value="Recommendation Letter">Recommendation Letter</option>
                                                    <option value="Work Badge">Work Badge</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 form-group" id="divOther" style="display: none">
                                                <label for="fileNameOther">File name if other : اسم فایل در صورتیکه در
                                                    لست نباشد <span style="color: red">*</span></label>
                                                <input type="text" name="fileNameOther" class="form-control mb-2"
                                                       placeholder="Enter file name اسم فایل را انتخاب نمایید">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="file">Choose File اسم فایل را انتخاب نمایید <span
                                                        style="color: red">*</span></label>
                                                <input type="file" name="file" class="form-control mb-2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Save Files</button>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </form>
                        <br>
                        <br>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead>
                            <th>#</th>
                            <th>File Type</th>
                            <th>Filename if other</th>
                            <th>File</th>
                            <th>Operation</th>
                            </thead>
                            @foreach($applicants_files as $files)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$files->filename}}</td>
                                    <td>{{$files->filenameother}}</td>
                                    <td><a target="_blank" href="{{ asset('uploads/Applicants Files/' . $files->path) }}">View File</a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{ $files->id }}"
                                              action="{{route('file.delete',$files->id)}}" method="put">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="deleteFile({{ $files->id }})"
                                                    class="btn btn-sm btn-danger">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex flex-row-reversed justify-content-between">
                                <a href="{{route('register.create.step.3')}}" class="btn btn-primary">Back - Additional Information</a>
                                <a href="/register-step-1" class="btn btn-success">Finish</a>
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
