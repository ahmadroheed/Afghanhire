@extends('admin.layout.master')

@section('content')

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @can('isAdmin')
        <div class="container-fluid">

            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-chart-timeline"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{$totalApplicants}}</h5>
                            <h6 class="text-white">Total Applicants</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-primary text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{$totalUsers}}</h5>
                            <h6 class="text-white">Total Users</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endcan
        @can('isEmployee')
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-body" style="font-size: 16pt;display: inline">
                        This Information Portal is for new ANHAM SIV Applicants that have not already been processed in ANHAM SIV Batches 1 or 2.

                        As shown in the Navigation Menu to the left, there are 4 Sections in this Portal that require your attention.  Please complete all the data fields in these Sections.  In Section-4, you will have the opportunity to upload any supporting documentation you may have available.

                        If you have any questions, please email us at <a href="mailto: anhamsivprocessing@afghanhire.org">anhamsivprocessing@afghanhire.org</a> and we will respond to your inquiry within one week.

                    </div>
                </div>
                <div class="row">
                    <a href="/register-step-1"><button class="btn btn-success">Start your Application</button></a>
                </div>

            </div>

        @endcan
        <footer class="footer text-center">
            All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a>  &copy;.
        </footer>

    </div>

@endsection

@section('js')

    <script src="{{asset('admin-panel/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{asset('admin-panel/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/calendar/cal-init.js')}}"></script>

    @endsection
