<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body class="bg-dark">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5>Product Detail</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('signup') }}" class="btn btn-md btn-success float-right"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @can('isEmployee')
                <p>
                    This Information Portal is for new ANHAM SIV Applicants that have not already been processed in ANHAM SIV Batches 1 or 2.

                    As shown in the Navigation Menu to the left, there are 4 Sections in this Portal that require your attention.  Please complete all the data fields in these Sections.  In Section-4, you will have the opportunity to upload any supporting documentation you may have available.

                    If you have any questions, please email us at anhamsivprocessing@afghanhire.org and we will respond to your inquiry within one week.

                </p>
                @endcan
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td><a href="">{{$product->name}}</a></td>
                            <td>{{$product->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
