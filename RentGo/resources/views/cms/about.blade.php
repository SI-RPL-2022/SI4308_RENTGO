@extends('layouts.admin')
@section('title', 'About')
@section('main-content')
<!-- Page Heading -->

<div class="row justify-content-center">

    <div class="col-lg-12">

        <div class="card shadow mb-4 p-0">

            <h1 class="font-weight-bold my-4 text-center" style="color: #EC5863;">Contact US</h1>

            <div class="card-body p-0 m-0">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 pb-2 w-75 mx-auto">
                            <div class="card-body text-center">
                                <h2 class="text-center font-weight-bold">Email</h2>
                                <p>rentgo@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 pb-2 w-75 mx-auto">
                            <div class="card-body text-center">
                                <h2 class="text-center font-weight-bold">Phone</h2>
                                <p>+0812345678</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 pb-2 w-75 mx-auto">
                            <div class="card-body text-center">
                                <h2 class="text-center font-weight-bold">Address</h2>
                                <p>Bandung</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row p-0 m-0">
                    <div class="col-lg-12" style="height: 500px;">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Disperindag%20Kota%20Palangka%20Raya%20Bukit%20Tunggal&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-org.net"></a><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 500px;
                                        width: 100%;
                                    }
                                </style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 500px;
                                        width: 100%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
