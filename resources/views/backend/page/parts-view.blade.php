@extends('backend.master')


@section('content')

<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
        <img class="card-img-top mb-5 mb-md-0" src="{{url('/upload/upload/'.$parts->image)}}" alt="Parts image" style="width: 300px;"></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">{{$parts->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span class="">{{$parts->price}} .BDT</span>
                           
                        </div>
                        <p class="lead">description here</p>
                       
                    </div>
                </div>
            </div>
        </section>


@endsection