@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Admin Manager</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
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
                            <div class="card-header">
                                <a href="{{route('user.create')}}"><button value="Create user" class="float-right btn btn-primary">Create user</button></a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Username</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$user->username}}</td>
                                            <td><img src="{{ asset('uploads/gallery/' . $user->image) }}" width="80px" height="80px" alt="Image"> </td>
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <button type="button"
                                                        username="{{$user->username}}"
                                                        role="{{$user->role}}"
                                                        email="{{$user->email}}"
                                                        salary="{{$user->salary}}"
                                                        phone="{{$user->phone}}"
                                                        address="{{$user->address}}"
                                                        gender="{{$user->gender}}"
                                                        dob="{{$user->dob}}"
                                                        join_date="{{$user->join_date}}"
                                                        job_type="{{$user->job_type}}"
                                                        city="{{$user->city}}"
                                                        age="{{$user->age}}"
                                                        class="view-data btn btn-sm btn-success">View</button>
                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-dark">Edit</a>
                                                <form id="delete-form-{{ $user->id }}" action="{{route('user.delete',$user->id)}}" method="put">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="deletePost({{ $user->id }})" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
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

                <script>
                    $('.view-data').click(function(){
                        var username=$(this).attr('username');
                        var role=$(this).attr('role');
                        var email=$(this).attr('email');
                        var salary=$(this).attr('salary');
                        var phone=$(this).attr('phone');
                        var address=$(this).attr('address');
                        var gender=$(this).attr('gender');
                        var dob=$(this).attr('dob');
                        var join_date=$(this).attr('join_date');
                        var job_type=$(this).attr('job_type');
                        var city=$(this).attr('city');
                        var age=$(this).attr('age');
                        $('#username').text(username);
                        $('#role').text(role);
                        $('#email').text(email);
                        $('#salary').text(salary);
                        $('#phone').text(phone);
                        $('#address').text(address);
                        $('#gender').text(gender);
                        $('#dob').text(dob);
                        $('#join_date').text(join_date);
                        $('#job_type').text(job_type);
                        $('#city').text(city);
                        $('#age').text(age);
                        $('#show-data').modal();
                    })
                </script>

                {{--sweetalert box for deleting start--}}
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

                <script type="text/javascript">
                    function deletePost(id)

                    {
                        const swalWithBootstrapButtons = swal.mixin({
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        })

                        swalWithBootstrapButtons({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                event.preventDefault();
                                document.getElementById('delete-form-'+id).submit();
                            } else if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons(
                                    'Cancelled',
                                    'Your file is safe :)',
                                    'error'
                                )
                            }
                        })
                    }

                </script>
                {{--sweetalert box for deleting end--}}

                <div id="show-data" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                    </tr>
                                    <tr>
                                        <td><p id="username"></p></td>
                                        <td><p id="role"></p></td>
                                        <td><p id="email"></p></td>
                                        <td><p id="phone"></p></td>
                                        <td><p id="address"></p></td>
                                        <td><p id="gender"></p></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{--@section('js')--}}
                    {{--@endsection--}}

            <footer class="footer text-center">
                All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a>  &copy;.
            </footer>
        </div>
        </div>
    </div>

    @endsection
