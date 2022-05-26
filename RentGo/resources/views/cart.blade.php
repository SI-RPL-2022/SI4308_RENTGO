<?php
use App\Products;
?>
@extends('layouts.app')
@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('img/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Your cart</h1>
                        <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <table class="table table-bordered data-table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Start</th>
                            <th>Duration</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $or)
                            <tr>
                                <td>{{ $or->id }}</td>
                                @php
                                    $product = Products::find($or->id_product);
                                @endphp
                                <td>{{ $product->title }}</td>
                                <td>{{ $or->start }}</td>
                                <td>{{ $or->duration }} Days</td>
                                <td>{{ 'Rp ' . number_format($or->price, 2, ',', '.') }}</td>
                                <td>{{ $or->status }}</td>
                                @if ($or->bukti)
                                    <td><a href="{{ asset('storage/' . $or->bukti) }}" target="_blank">Lihat Bukti</a></td>
                                @else
                                    <td><a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal"
                                            data-target="#modalLoginForm{{ $or->id }}" data-id="{{ $or->id }}">Upload Bukti</a>
                                    </td>

                                    <div class="modal fade" id="modalLoginForm{{ $or->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('upload.image',$or->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Upload Image</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <div class="md-form mb-5">
                                                            <input type="file" name="foto" id="defaultForm-email"
                                                                class="form-control validate">
                                                            <label data-error="wrong" data-success="right"
                                                                for="defaultForm-email">Upload Image</label>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type=submit class="btn btn-default">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
